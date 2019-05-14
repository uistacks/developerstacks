<?php
namespace Uistacks\Banners\Controllers;

use Illuminate\Http\Request;
use Uistacks\Banners\Controllers\BannersApiController as API;
use Uistacks\Banners\Models\Banner;
use Uistacks\Banners\Models\BannerTrans;

class BannersController extends BannersApiController
{

    /*
   |--------------------------------------------------------------------------
   | uistacks Banners Controller
   |--------------------------------------------------------------------------
   |
   | This controller handles Banners for the application.
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
        $request->request->add(['paginate' => 10]);
        $items = $this->api->listItems($request);
        
//        $sections = Section::get();
        return view('Banners::index', compact('items'));
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function create()
    {
        return view('Banners::create-edit');
    }


    /**
     *
     *
     * @param
     * @return
     */
    public function store(Request $request)
    {
        $store = $this->api->storeBanner($request);
        $store = $store->getData();

        if(isset($store->errors)){
            return back()->withInput()->withErrors($store->errors);
        }

        \Session::flash('alert-class', 'alert-success');
        \Session::flash('message', $store->message);

        if($request->back){
            return back();
        }
        return redirect(action('\Uistacks\Banners\Controllers\BannersController@index'));
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function edit($id)
    {
//        $item = Banner::findOrFail($id);
        $item = Banner::findOrFail($id);
        $trans = BannerTrans::where('banner_id', $id)->get()->keyBy('lang')->toArray();
        return view('Banners::create-edit', compact('item','trans'));
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function update(Request $request, $id)
    {
//        dd($request);
        $update = $this->api->updateBanner($request, '', $id);
        $update = $update->getData();
        if(isset($update->errors)){
            return back()->withInput()->withErrors($update->errors);
        }
        \Session::flash('alert-class', 'alert-success');
        \Session::flash('message', $update->message);

        if($request->back){
            return back();
        }
        return redirect(action('\Uistacks\Banners\Controllers\BannersController@index'));
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function confirmDelete($id)
    {
        $item = Page::findOrFail($id);
        return view('Banners::ads.confirm-delete', compact('item'));
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
            $items = Banner::whereIn('id', $request->ids)->get();
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