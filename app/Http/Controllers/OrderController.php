<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\ShopCart;
use App\Models\Order;
use App\Models\OrderBook;
use Illuminate\Http\Request;
use SebastianBergmann\Type\MixedType;

class OrderController extends Controller
{
    public function olustur(Request $request,$id)
    {
        $Order=new Order();
        
        $Order->Address=$request->Address;
        $Order->TotalPrice=$request->TotalPrice;
        $Order->UserID=$id;
        $Order->Status=0;
        $Order->save();
        $ShopCart=ShopCart::where('UserID',$id)->get();
        foreach($ShopCart as $item)
        {
            $OrderBook=new OrderBook();
            $OrderBook->BookID=$item->BookID;
            $OrderBook->Count=$item->BookCount;
            $OrderBook->OrderID=$Order->OrderID;
            $OrderBook->Price=$item->books->BookPrice;
            $OrderBook->save();
            ShopCart::destroy($item->ShopCartID);
            $books=Book::find($item->BookID);
            $books->BookCount=$books->BookCount-$item->BookCount;
            $books->save();
        }
        $OrderBook=OrderBook::where('OrderID',$Order->OrderID)->get();
        return redirect('/index');
        
    }
    public function gecmis($id)
    {
        $Order=Order::where('UserID',$id)->get();
        $data = array();
        
        foreach($Order as $order)
        {
            $OrderBook=OrderBook::where('OrderID',$order->OrderID)->get();
            foreach ($OrderBook as $book)
            {
                array_push($data, $book);
            }
        }

        return view('history')->with('OrderBook',$data);

    }
   
}
