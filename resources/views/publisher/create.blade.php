@extends('publisher.layout')
@section('content')
<div class="card">
  <div class="card-header">Yayıncı Bilgileri</div>
  <div class="card-body">
      
      <form action="{{ url('publisher') }}" method="post">
        {!! csrf_field() !!}
        <label>Yayıncı İsmi</label></br>
        <input type="text" name="PublisherName" id="name" class="form-control"></br>
        <span class="text-danger">@error('PublisherName'){{$message}} @enderror</span> </br>
        <input type="submit" value="Kaydet" class="btn btn-success"></br>
    </form>
  
  </div>
</div>
@stop