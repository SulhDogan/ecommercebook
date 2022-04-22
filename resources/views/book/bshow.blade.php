@extends('book.layout')
@section('content')
<script src="https://unpkg.com/feather-icons"></script>
<div class="container container-fixed" style="margin-top: 50px">
    <div class="row">
        <div class="col">
            <h1 class="display-5">{{ $books->BookName }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <img src="{{   asset($books->BookPicture)   }}" width="400px" height="300px" class="card-img-top" alt="...">
        </div>
        <div class="col">
            <div class="row col-sm-auto w-100 border">
                <span style="padding: 10px">Yazar : <span class="font-weight-bold">{{ $books->author->AuthorName }}</span></span>
            </div>
            <div class="row col-sm-auto w-100 border">
                <span style="padding: 10px">Yayın Evi : <span class="font-weight-bold">{{$books->publisher->PublisherName}}</span></span>
            </div>
            <div class="border col-sm-auto w-100 row text-center" style="padding: 10px;height: 200px">
                <div class="col align-self-center">
                    <span class="font-weight-bold text-primary">{{ $books->BookPrice }} ₺</span>
                </div>
                <div class="col align-self-center">
                    <form action="{{ route('shopcard_add',['id'=>$books->BookID]) }}" method="post">
                        @csrf
                <input class="input" type="number" name="BookCount" value="1" max="{{$books->BookCount}}" min="1">
                </div>
                <div class="col align-self-center">
                    <input type="submit" class="btn btn-danger" value="Sepete Ekle" >
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="container">
            <p>{{$books->BookInfo}}</p>
            <p class="text-center"> <span class="font-weight-bold">Sayfa Sayısı : </span> <span>{{$books->BookPage}}</span> </p>
            <p class="text-center"> <span class="font-weight-bold">İlk Baskı Yılı : </span> <span>{{$books->BookYear}}</span> </p>
            <p class="text-center"> <span class="font-weight-bold">Dili : </span> <span>{{$books->BookLanguage}}</span> </p>
        </div>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.js"></script>

<!-- <div class="card" style="width: 36rem;">

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
</div> -->
@stop