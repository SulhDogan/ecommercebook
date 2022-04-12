<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table='users';
    protected $primaryKey='UserID';
    protected $fillable=[
        'Name',
        'Surname',
        'EMail',
        'Password',
        'Phone',
        
    ];
}
