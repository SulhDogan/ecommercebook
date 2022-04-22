<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopCart extends Model
{
    protected $table='shopcarts';
    protected $primaryKey='ShopCartID';
    protected $fillable=[
        'BookID',
        'BookCount',
        'UserID'
    ];
    public function books()
    {
        return $this->hasOne(Book::class, 'BookID', 'BookID');
    }
    public function users()
    {
        return $this->hasOne(Users::class, 'UserID', 'UserID');
    }
}
