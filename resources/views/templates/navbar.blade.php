<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="row col-lg justify-content-md-center">
    <div class="row col-lg justify-content-md-center">
      <div class="col-auto">
        <a class="navbar-brand" href="/index"><img src="{{ url('/storage/favicon.ico')}}" alt="" width="30" height="24" class="d-inline-block align-text-top">
        </a>
        <a class="navbar-brand">WorldOfBooks</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="col-auto collapse navbar-collapse row" id="navbarSupportedContent">
        <div class="col">
          <form class="d-flex" method="get" action="{{url('/search')}}">
            @csrf
            <input class="form-control me-2" type="text" name="Sorgu" placeholder="Kitap ya da Yazar (örn. Harry Potter)" aria-label="Search">
            <button class="btn btn-outline-success" type="submit"><span class="material-icons">search</span></button>
          </form>
        </div>
        <div class="navbar-nav col-auto">
          <?php
          if (!session()->has('UserLoginID') && !session()->has('AdminLoginID')) {
          ?>

            <a class="nav-item nav-link active mr-sm-2" href="/login">Giriş Yap </a>

          <?php
          } else {
          ?>


            <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                <?php if (session()->has('AdminLoginID')) { ?>
                  <?php $id = session()->get("AdminLoginID"); ?>
                  {{ session()->get("AdminName") }}
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                <li><a class="dropdown-item" href="/logoutuser">Çıkış Yap</a></li>
              </ul>
            </div>
          <?php
                } else { ?>
            {{ (session()->get("UserName") . " " . session()->get("UserSurname")) }}
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <?php $id = session()->get("UserLoginID"); ?>
              <li><a class="dropdown-item" href="{{url('/edituser'.'/'.$id)}}">Bilgilerim</a></li>
              <li><a class="dropdown-item" href="{{url('/gecmis/'.$id)}}">Satın Aldıklarım</a></li>
              <li><a class="dropdown-item" href="/logoutuser">Çıkış Yap</a></li>
            </ul>
        </div>
      <?php } ?>

    
    <div class="justify-content-center">
    <a href="{{url('/ushopcard/'.$id)}}">
      <button class="btn btn-secondary " type="button" >
    
        Sepet
      </button>
      </a>
    
    </div>
    <?php
          }
    ?>

      </div>
    </div>
  </div>
  </div>
</nav>