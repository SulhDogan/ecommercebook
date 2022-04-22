@extends('book.layout')
@section('content')
<div class="row  text-center justify-content-center">
@if(Session::has('Başarılı'))
          <div class="alert alert-success">{{Session::get('Başarılı')}}</div>
          @endif
          @if(Session::has('Başarısız'))
          <div class="alert alert-danger">{{Session::get('Başarısız')}}</div>
          @endif
      @foreach($books as $item)
      
      <a href="{{url('bookinfo/'.$item->BookID)}}" class="col-sm card m-1 text-decoration-none text-dark" >
        <div class="col-sm card m-1" style="width: 17rem;">
          <div class="p-3">
            <img src="{{$item->BookPicture}}" class="card-img-top" alt="{{$item->BookName}}" style="height: 18rem">
          </div>
          <div class="card-body">
            <p class="card-text">{{$item->BookName}}</p>
            <p class="card-text">{{$item->author->AuthorName}} </p>
            <p class="card-text">{{$item->publisher->PublisherName}}</p>
            <p class="card-text">{{$item->BookPrice}} ₺</p>
          </div>
        </div>
      </a>
      @endforeach
    </div>
    @endsection