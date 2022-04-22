@extends('book.layout')
@section('content')
<div class="card">
  <div class="card-header">Kitap Bilgileri</div>
  <div class="card-body">
      
      <form action="{{ url('book/'.$books->BookID) }}" method="post"enctype="multipart/form-data">
        @csrf
        @method("PATCH")
        <label>Kitap ID</label></br>
        <input type="text" name="BookID" id="name" value="{{$books->BookID}}"class="form-control" readonly></br>
        <span class="text-danger">@error('BookID'){{$message}} @enderror</span> </br>
        <label>Kitap İsmi</label></br>
        <input type="text" name="BookName" id="name" value="{{$books->BookName}}" class="form-control"></br>
        <span class="text-danger">@error('BookName'){{$message}} @enderror</span> </br>
        <label>Kitap İçerik</label></br>
        <input type="text" name="BookInfo" id="name" value="{{$books->BookInfo}}"class="form-control"></br>
        <span class="text-danger">@error('BookInfo'){{$message}} @enderror</span> </br>
        <label>Adet</label></br>
        <input type="text" name="BookCount" id="name" value="{{$books->BookCount}}"class="form-control"></br>
        <span class="text-danger">@error('BookCount'){{$message}} @enderror</span> </br>
        <label>Sayfa Sayısı</label></br>
        <input type="text" name="BookPage" id="name" value="{{$books->BookPage}}"class="form-control"></br>
        <span class="text-danger">@error('BookPage'){{$message}} @enderror</span> </br>
        <label>Dil</label></br>
        <input type="text" name="BookLanguage" id="name" value="{{$books->BookLanguage}}"class="form-control"></br>
        <span class="text-danger">@error('BookLanguage'){{$message}} @enderror</span> </br>
        <label>Basım Yılı</label></br>
        <input type="text" name="BookYear" id="name" value="{{$books->BookYear}}"class="form-control"></br>
        <span class="text-danger">@error('BookYear'){{$message}} @enderror</span> </br>
        <label>Fiyat</label></br>
        <input type="text" name="BookPrice" id="name" value="{{$books->BookPrice}}"class="form-control"></br>
        <span class="text-danger">@error('BookPrice'){{$message}} @enderror</span> </br>
        <label>Resim</label></br>
        <div class="input-group mb-3">
            
            <input type="file" class="form-control" id="inputGroupFile02" name="picture">
            <img src="{{   asset($books->BookPicture)   }}" width="100" height="100">
        </div></br>
        <label>Yazar</label></br>
        <select class="form-select" name="AuthorID">
        <option selected value="{{$books->AuthorID}}">{{$books->author->AuthorName}}</option>
        
        @foreach($authors as $key)
        <option value="{{$key->AuthorID}}">{{$key->AuthorName}}

        </option>

        @endforeach
          </select> </br>
          <label>Yayın Evi</label></br>
        <select class="form-select" name="PublisherID">
        <option selected value="{{$books->PublisherID}}">{{$books->publisher->PublisherName}}</option>
        @foreach($publishers as $key)
        <option value="{{$key->PublisherID}}">{{$key->PublisherName}}

        </option>

        @endforeach
          </select> </br>

        <input type="submit" value="Kaydet" class="btn btn-success"></br>
    </form>
  
  </div>
</div>
@stop