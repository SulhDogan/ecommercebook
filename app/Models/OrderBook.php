<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderBook extends Model
{
    protected $table='orderbooks';
    protected $primaryKey='OrderBookID';
    protected $fillable=[
        'BookID',
        'BookCount',
        'UserID',
        'OrderID',
        'Price'
    ];
    public function users()
    {
        return $this->hasOne(Users::class, 'UserID', 'UserID');
    }
    public function books()
    {
        return $this->hasOne(Book::class, 'BookID', 'BookID');
    }
    public function orders()
    {
        return $this->hasOne(Order::class, 'OrderID', 'OrderID');
    }
}
