@extends('publisher.layout')
@section('content')
<div class="card">
  <div class="card-header">Yayıncı Sayfası</div>
  <div class="card-body">
  
        <div class="card-body">
        <h5 class="card-title">Yayıncı ID : {{ $publisher->PublisherID }}</h5>
        <p class="card-text">İsmi :{{ $publisher->PublisherName }}</p>
        <p class="card-text">Eklenme Tarihi :{{ $publisher->created_at }}</p>
        <p class="card-text">Güncellenme Tarihi :{{ $publisher->updated_at }}</p>
       
  </div>
      
    </hr>
  
  </div>
</div>
@stop