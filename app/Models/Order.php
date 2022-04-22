<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table='orders';
    protected $primaryKey='OrderID';
    protected $fillable=[
        'Address',
        'TotalPrice',
        'UserID',
        'Status'
    ];
    public function users()
    {
        return $this->hasOne(Users::class, 'UserID', 'UserID');
    }
}
