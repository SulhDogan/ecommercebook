<?php
if (session_status() == PHP_SESSION_NONE)
  session_start();
?>
<!doctype html>
<html lang="tr">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>World Of Books</title>
  <style>
    .carousel-inner {
      height: 400px;
      max-height: 400px !important;

    }

    .checked {
      color: orange;
    }
  </style>
</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  @include('templates.navbar')
  @if(Session::has('Başarılı'))
          <div class="alert alert-success">{{Session::get('Başarılı')}}</div>
          @endif
          @if(Session::has('Başarısız'))
          <div class="alert alert-danger">{{Session::get('Başarısız')}}</div>
          @endif
  <div class="container text-center" style="margin-top: 30px">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="{{ url('/storage/slider/nresim1')}}" class="d-block w-100" alt="..." height="400px">
        </div>
        <div class="carousel-item">
          <img src="{{ url('/storage/slider/nresim2')}}" class="d-block w-100" alt="..." height="400px">
        </div>
        <div class="carousel-item">
          <img src="{{ url('/storage/slider/nresim3')}}" class="d-block w-100" alt="..." height="400px">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
  <div class="container " style="margin-top: 30px">
    <div class="text-center">
      <h1 class="display-4">Son Eklenenler</h1>
    </div>
    <div class="row  text-center justify-content-center">
      @foreach($books as $item)
      
      
        <div class="col-sm card m-1" style="width: 17rem;">
          <div class="p-3">
          <a href="{{url('bookinfo/'.$item->BookID)}}" class="col-sm card m-1 text-decoration-none text-dark" ><img src="{{$item->BookPicture}}" class="card-img-top" alt="{{$item->BookName}}" style="height: 18rem"></a>
          </div>
          <div class="card-body">
            <p class="card-text">{{$item->BookName}}</p>
            <p class="card-text">{{$item->author->AuthorName}} </p>
            <p class="card-text">{{$item->publisher->PublisherName}}</p>
            <p class="card-text">{{$item->BookPrice}} ₺</p>
          </div>
        </div>
      
      @endforeach
    </div>

  </div>
  @include('templates.footer')

</body>

</html>