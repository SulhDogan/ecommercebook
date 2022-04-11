<!doctype html>
<html lang="tr">

<head>
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
      @include('templates.navbar') 

    <div class="container text-center" style="margin-top: 30px">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="/storage/slider/nresim1.jpg" alt="First slide" height="400px" style="background-image: url('slider/nresim1.jpg')">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="/storage/slider/nresim2.jpg" alt="Second slide" height="400px" style="background-image: url('slider/nresim2.jpg')">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="/storage/slider/nresim3.jpg" alt="Third slide" height="400px">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="container " style="margin-top: 30px">
        <div class="text-center">
            <h1 class="display-4">Son Eklenenler</h1>
        </div>
       
    </div>
    @include('templates.footer')

</body>

</html>