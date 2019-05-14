<?php
namespace Uistacks\Locations\Controllers;

use Illuminate\Http\Request;
use Uistacks\Locations\Controllers\StatesApiController as API;
use Uistacks\Locations\Models\Country;
use Uistacks\Locations\Models\Location;
use Uistacks\Locations\Models\LocationTrans;
use Uistacks\Media\Models\Media;

class StatesController extends StatesApiController
{

    /*
   |--------------------------------------------------------------------------
   | Uistacks States Controller
   |--------------------------------------------------------------------------
   |
   | This controller handles States for the application.
   |
   */
    public function __construct()
    {
        $this->api = new API;
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function index(Request $request)
    {
        $request->request->add(['paginate' => 20]);
        $items = $this->api->listItems($request);

        return view('Locations::states.index', compact('items'));
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function create()
    {
        $categories = Country::where('active', 1)->get();
        return view('Locations::states.create-edit', compact('items', 'categories', 'states'));
    }


    /**
     *
     *
     * @param
     * @return
     */
    public function store(Request $request)
    {
        $state = $this->api->createState($request);
        if($state == "Duplicate Entry Present")
            return back();

        $state = $state->getData();

        if(isset($state->errors)){
            return back()->withInput()->withErrors($state->errors);
        }

        \Session::flash('alert-class', 'alert-success');
        \Session::flash('message', $state->message);

        if($request->back){
            return back();
        }
        return redirect(action('\Uistacks\Locations\Controllers\StatesController@index'));
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function edit($id)
    {
        $item = State::findOrFail($id);
        $trans = StateTrans::where('state_id', $id)->get()->keyBy('lang')->toArray();
        $edit = 1;
        return view('Locations::states.create-edit', compact('item', 'trans', 'edit'));
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function update(Request $request, $id)
    {
        $update = $this->api->updateState($request, '', $id);

        if($update == "Duplicate Entry Present")
            return back();
        $update = $update->getData();

        if(isset($update->errors)){
            return back()->withInput()->withErrors($update->errors);
        }

        \Session::flash('alert-class', 'alert-success');
        \Session::flash('message', $update->message);

        if($request->back){
            return back();
        }
        return redirect(action('\Uistacks\Locations\Controllers\StatesController@index'));
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function confirmDelete($id)
    {
        $item = State::findOrFail($id);
        return view('Locations::states.confirm-delete', compact('item'));
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function bulkOperations(Request $request)
    {
        if($request->ids){
            $items = State::whereIn('id', $request->ids)->get();
            if($items->count()){
                foreach ($items as $item) {
                    // Do something with your model by filter operation
                    if($request->operation && $request->operation === 'activate'){
                        $item->active = true;
                        $item->save();
                        \Session::flash('message', trans('Core::operations.activated_successfully'));
                    }elseif($request->operation && $request->operation === 'deactivate'){
                        $item->active = false;
                        $item->save();
                        \Session::flash('message', trans('Core::operations.deactivated_successfully'));
                    }

                }
            }

            \Session::flash('alert-class', 'alert-success');

        }else{
            \Session::flash('alert-class', 'alert-warning');
            \Session::flash('message', trans('Core::operations.nothing_selected'));
        }
        return back();
    }

}