@extends('book.layout')
@section('content')

<div class="card" style="width: 36rem;">
  <img src="{{   asset($books->BookPicture)   }}" width="100" height="300" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">İsmi :{{ $books->BookName }}</h5>
    <p class="card-text">İçerik :{{ $books->BookInfo }}</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Kitap ID: {{ $books->BookID }}</li>
    <li class="list-group-item">Adet :{{ $books->BookCount }}</li>
    <li class="list-group-item">Sayfa Sayısı :{{ $books->BookPage }}</li>
    <li class="list-group-item">Dil :{{ $books->BookLanguage }}</li>
    <li class="list-group-item">Basım Yılı : {{ $books->BookYear }}</li>
    <li class="list-group-item">Fiyat : {{ $books->BookPrice }}</li>
    <li class="list-group-item">Yazar : {{ $books->author->AuthorName }}</li>
    <li class="list-group-item">Basım Evi : {{ $books->publisher->PublisherName }}</li>
  </ul>
</div>
@stop