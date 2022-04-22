<?php

namespace App\Http\Controllers;

use App\Models\ShopCart;
use Illuminate\Http\Request;

class ShopCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $shopcarts=ShopCart::where('UserID',$id)->get();
        return view('ushopcart')->with('shopcarts',$shopcarts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ekle(Request $request,$id)
    {
        $ShopCart=ShopCart::where('BookID',$id)->where('UserID',$request->session()->get('UserLoginID'))->first();
        if($ShopCart)
        {
            $ShopCart->BookCount+=$request->BookCount;
        }else{
            $ShopCart=new ShopCart();
            $ShopCart->UserID=$request->session()->get('UserLoginID');
            $ShopCart->BookID=$id;
            $ShopCart->BookCount=$request->BookCount;
        }
        
        $ShopCart->save();
        return back();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShopCart  $shopCart
     * @return \Illuminate\Http\Response
     */
    public function gonder($id)
    {
        $ShopCarts=ShopCart::where('UserID',$id)->get();
        return view('buy')->with('ShopCarts',$ShopCarts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShopCart  $shopCart
     * @return \Illuminate\Http\Response
     */
    public function edit(ShopCart $shopCart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShopCart  $shopCart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ShopCart=ShopCart::find($id);
        $ShopCart->BookCount=$request->BookCount;
        $ShopCart->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShopCart  $shopCart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       ShopCart::destroy($id);
       return back();
    }
}
