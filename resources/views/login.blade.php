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
            <div class="col border text-center p-5 m-1">
                <h1 class="display-5">Üye Girişi</h1>
                <form action="{{url('/loginuser')}}"method="post">
                  @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">E-Posta Adresi</label>
                        <input type="email" class="form-control" id="inputEmail" name="EMail" aria-describedby="emailHelp" placeholder="E-Posta">
                        <small id="emailHelp" class="form-text text-muted">E-Postanızı kimseyle paylaşmayız.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Şifre</label>
                        <input type="password" class="form-control" id="inputPassword" name="Password" placeholder="Şifre">
                    </div>
                    <input type="submit" class="btn btn-secondary px-5 btn-block" >
                </form>
            </div>
            <div class="col border text-center p-5 m-1">
                <div class="col">
                    <h1 class="display-5">Üye Ol</h1><span class="fas fa-user-plus fa-10x p-4" style="color: rgb(220,220,220)"></span>
                </div>
                <div class="col"><a href="{{url('/register')}}"><button type="submit" class="btn btn-secondary px-5">Üye Ol</button></a></div>
            </div>
        </div>
    </div>
    <div class="modal fade" data-backdrop="static" id="loadingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-sm modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mx-auto" id="exampleModalLabel">Giriş Yapılıyor</h5>
                </div>
                <div class="modal-body mx-auto">
                    <div class="spinner-border" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('templates.footer')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>