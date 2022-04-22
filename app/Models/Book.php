<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table='books';
    protected $primaryKey='BookID';
    protected $fillable=[
        'BookName',
        'BookInfo',
        'BookCount',
        'BookPage',
        'BookLanguage',
        'BookYear',
        'BookPrice',
        'BookPicture',
        'AuthorID',
        'PublisherID',
    ];
    public function publisher()
    {
        return $this->hasOne(Publisher::class, 'PublisherID', 'PublisherID');
    }
    public function author()
    {
        return $this->hasOne(Author::class, 'AuthorID', 'AuthorID');
    }
}
