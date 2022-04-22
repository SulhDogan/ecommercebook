@extends('author.layout')
@section('content')
<div class="card">
  <div class="card-header">Yayıncı Sayfası</div>
  <div class="card-body">
  
        <div class="card-body">
        <h5 class="card-title">Yazar ID : {{ $authors->AuthorID }}</h5>
        <p class="card-text">İsmi :{{ $authors->AuthorName }}</p>
        <p class="card-text">Eklenme Tarihi :{{ $authors->created_at }}</p>
        <p class="card-text">Güncellenme Tarihi :{{ $authors->updated_at }}</p>
       
  </div>
      
    </hr>
  
  </div>
</div>
@stop