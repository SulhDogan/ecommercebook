@extends('author.layout')
@section('content')
<div class="card">
  <div class="card-header">Yazar Bilgileri</div>
  <div class="card-body">
      
      <form action="{{ url('author/' .$authors->AuthorID) }}" method="post">
      @csrf
      @method("PATCH")
        <label>Yazar ID</label></br>
        <input type="text" name="AuthorID" id="name" value="{{$authors->AuthorID}}"class="form-control" readonly></br>
        <span class="text-danger">@error('AuthorID'){{$message}} @enderror</span> </br>
        <label>İsim</label></br>
        <input type="text" name="AuthorName" id="name" value="{{$authors->AuthorName}}"class="form-control"></br>
        <span class="text-danger">@error('AuthorName'){{$message}} @enderror</span> </br>
         </br>
        <input type="submit" value="Güncelle" class="btn btn-success"></br>
    </form>
  
  </div>
</div>
@stop