<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\OrderBook;
use App\Models\ShopCart;
use Illuminate\Http\Request;

class OrderBookController extends Controller
{
    public function olustur($id)
    {
        $request=ShopCart::where('UserID',$id)->get();
        foreach($request as $item)
        {
            $OrderBook=new OrderBook();
            $OrderBook->BookID=$item->BookID;
            $OrderBook->BookCount=$item->BookCount;
            $OrderBook->UserID=$item->UserID;
            $OrderBook->OrderID=$id;
            $OrderBook->Price=$item->books->BookPrice;
            $OrderBook->save();
            $books=Book::find($item->BookID);
            $books->BookCount=$books->BookCount-$item->BookCount;
            $books->save();

        }
        $Orders=OrderBook::where('OrderID',$id);
        return view('bas')->with('orders',$Orders);
        
    }
}
