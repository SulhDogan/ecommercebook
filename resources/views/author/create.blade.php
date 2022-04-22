@extends('author.layout')
@section('content')
<div class="card">
  <div class="card-header">Yazar Bilgileri</div>
  <div class="card-body">
      
      <form action="{{ url('author') }}" method="post">
        {!! csrf_field() !!}
        <label>Yazar İsmi</label></br>
        <input type="text" name="AuthorName" id="name" class="form-control"></br>
        <span class="text-danger">@error('AuthorName'){{$message}} @enderror</span> </br>
        <input type="submit" value="Kaydet" class="btn btn-success"></br>
    </form>
  
  </div>
</div>
@stop