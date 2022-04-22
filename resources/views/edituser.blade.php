<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Page Title</title>
</head>

<body>
    <div>
        @include('templates.navbar')
    </div>

    <div class="container container-fixed" style="margin-top: 50px">

        <div class="row">
            @if(Session::has('Başarılı'))
            <div class="alert alert-success">{{Session::get('Başarılı')}}</div>
            @endif
            @if(Session::has('Başarısız'))
            <div class="alert alert-danger">{{Session::get('Başarısız')}}</div>
            @endif
        </div>
        <?php $id=session()->get('LoginUserID');?>
        <form action="{{url('/edituser/'.$user->UserID)}}" method="POST">
            @csrf
            @method("PATCH")
            <?php $id=session()->get('LoginUserID'); ?>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" name="EMail" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Example@example.com" value="{{$user->EMail}}">
                <div id="emailHelp" class="form-text">E-Posta Adresini Paylaşmayacağız.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="Password" id="exampleInputPassword1" value="{{$user->Password}}">
                <div id="emailHelp" class="form-text">Şifrenizi 6 haneli olarak belirleyiniz.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail11" class="form-label">Telefon</label>
                <input type="text" class="form-control" name="Phone" id="exampleInputEmail11" aria-describedby="emailHelp" placeholder="01112223344"value="{{$user->Phone}}">
                <div id="emailHelp" class="form-text">Telefon numaranızı belirtilen formatta giriniz 01112223344</div>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Güncelle</button>
            </div>
            
        </form>
    </div>
    @include('templates.footer')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>