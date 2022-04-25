<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<title>World Of Books</title>
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
            <div class="col-4 border  p-4 m-1">
                <div class="group-row text-center mb-2">
                    <span class="text-center"> Zaten Üyeyim! <a href="{{url('/login')}}" style="text-decoration: underline">Giriş Yap</a></span>
                </div>
                <form action="{{url('/registeruser')}}"method="post">
                    @csrf
               
                    <div class="form-group row">
                        <div class="col-sm">
                            <label for="exampleInputEmail1">Ad*</label>
                            <input type="text" class="form-control" id="inputName" name="Name" placeholder="Adınızı Yazınız" required>
                        </div>
                        <div class="col-sm">
                            <label for="exampleInputEmail1">Soyad*</label>
                            <input type="text" class="form-control" id="inputSurname" name="Surname" placeholder="Soyadınızı Yazınız" required>
                        </div>
                    </div>
                    <div class="form-group row">
                    <label for="exampleInputEmail1">Soyad*</label>
                            <input type="text" class="form-control" id="inputSurname" name="Phone" placeholder="Telefon Numaranızı '05554443322' Şeklinde Yazınız" required>

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">E-Posta Adresi*</label>
                        <input type="email" class="form-control" id="inputEmail" name="EMail" placeholder="E-Postanızı Yazınız" style="margin-bottom: 4px" required>
                        <label for="exampleInputEmail1">E-Posta Adresi(Tekrar)*</label>
                        <input type="email" class="form-control" id="inputEmailRe" name="EMailre" placeholder="E-Postanızı Yazınız" required>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm">
                            <label for="exampleInputPassword1">Şifre*</label>
                            <input type="password" class="form-control" id="inputPassword" name="Password" placeholder="Şifrenizi Yazınız" required>
                        </div>
                        <div class="col-sm">
                            <label for="exampleInputPassword1">Şifre(Tekrar)*</label>
                            <input type="password" class="form-control" id="inputPasswordRe" name="Passwordre" placeholder="Şifrenizi Yazınız" required>
                        </div>
                    </div>
                    <div class="form-group row text-center">
                        <div class="col-sm">
                            <input type="submit" class="btn btn-danger px-5 btn-block" >
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-7  text-center p-5 m-1">
                <div class="col-sm">
                    <h1 class="display-5">Üye Ol</h1>
                </div>
                <div class="col-sm"><span class="fas fa-user-plus fa-10x p-4" style="color: rgb(220,220,220)"></span></div>
                <div class="col-sm"><span>Üyelik formundaki boş alanları doldurarak hemen üye olabilirsiniz.</br>Hemen üye olarak binlerce kitaba anında ulaşın!</span></div>
            </div>
        </div>
        <div class="modal fade" data-backdrop="static" id="loadingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-sm modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mx-auto" id="exampleModalLabel">Kayıt Yapılıyor</h5>
                    </div>
                    <div class="modal-body mx-auto">
                        <div class="spinner-border" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
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