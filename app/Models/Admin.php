<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table='admins';
    protected $primaryKey='AdminID';
    protected $fillable=[
        'Username',
        'Password',
    ];
}
