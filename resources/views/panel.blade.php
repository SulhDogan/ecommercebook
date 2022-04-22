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
    <div>
        @include('templates.navbar')
    </div>
    <div class="container container-fixed" style="margin-top: 50px">

        <div class="d-grid gap-2">
            <label>HoşGeldin {{$data->Username}}</label>
            <button class="btn btn-primary" type="button" onclick="location.href='{{ url('publisher') }}'">YayınEvi İşlemleri</button>
            <button class="btn btn-primary" type="button" onclick="location.href='{{ url('author') }}'">Yazar İşlemleri</button>
            <button class="btn btn-primary" type="button" onclick="location.href='{{ url('book') }}'">Kitap İşlemleri</button>
            <button class="btn btn-primary" type="button" onclick="location.href='{{ url('panellogout') }}'">Çıkış Yap</button>

        </div>

    </div>
</body>

</html>