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

    <div class="container">
        <div class="card text-center">
            <div class="card-header">
                <h5 class="card-header text-center">Yönetici Paneli</h5>
            </div>
            @if(Session::has('Başarılı'))
                    <div class="alert alert-success">{{Session::get('Başarılı')}}</div>
                    @endif
                    @if(Session::has('Başarısız'))
                    <div class="alert alert-danger">{{Session::get('Başarısız')}}</div>
                    @endif
            <div class="card-body">
                <form action="{{url('/panellogin')}}" method="post">
                    @csrf
                    <div class="mb-2">
                        <label for="Username" class="form-label">Kullanıcı adı</label>
                        <input type="text" name="Username"class="form-control"  aria-describedby="emailHelp">
                        <span class="text-danger">@error('Username'){{$message}} @enderror</span>
                    </div>
                    <div class="mb-2">
                        <label for="Password" class="form-label">Şifre</label>
                        <input type="password"name="Password" class="form-control" >
                        <span class="text-danger">@error('Password'){{$message}} @enderror</span>
                    </div>
                    <div class="mb-2">
                        <input type="submit" class="btn btn-primary" value="Giriş">
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>