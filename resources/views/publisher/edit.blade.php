@extends('publisher.layout')
@section('content')
<div class="card">
  <div class="card-header">Yayıncı Bilgileri</div>
  <div class="card-body">
      
      <form action="{{ url('publisher/' .$publishers->PublisherID) }}" method="post">
      @csrf
      @method("PATCH")
        <label>Yayıncı ID</label></br>
        <input type="text" name="PublisherID" id="name" value="{{$publishers->PublisherID}}"class="form-control" readonly></br>
        <span class="text-danger">@error('PublisherID'){{$message}} @enderror</span> </br>
        <label>İsim</label></br>
        <input type="text" name="PublisherName" id="name" value="{{$publishers->PublisherName}}"class="form-control"></br>
        <span class="text-danger">@error('PublisherName'){{$message}} @enderror</span> </br>
         </br>
        <input type="submit" value="Güncelle" class="btn btn-success"></br>
    </form>
  
  </div>
</div>
@stop