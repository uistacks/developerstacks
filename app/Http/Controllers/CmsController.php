<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Uistacks\Pages\Models\Page;
use Uistacks\Pages\Models\PageTrans;

class CmsController extends Controller
{
    //

    /**
     * Show page
     *
     * @var view
     */
    public function showPage(Request $request, $page) {
        $item = Page::where(array('page_url'=> $page, 'published'=>'1'))->first();
        if(count($item) == null){
            return redirect('/');
        }
//        $trans = PageTrans::where('page_id', $item->id)->get()->keyBy('lang')->toArray();
        return view('website.pages.show', compact('item'));
    }


}
