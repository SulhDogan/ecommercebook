<?php 
if (session_status() == PHP_SESSION_NONE)
session_start();
?>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

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
          <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Kitap ya da Yazar (örn. Harry Potter)" aria-label="Search">
            <button class="btn btn-outline-success" type="submit"><span class="material-icons">search</span></button>
          </form>
        </div>
        <div class="navbar-nav col-auto">
        <?php
                    if (!isset($_SESSION["logged"])) {
                    ?>

                        <a class="nav-item nav-link active mr-sm-2" href="/login">Giriş Yap </a>

                    <?php
                    } else {
                    ?>

                        <a class="nav-link dropdown-toggle mr-2" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo ($_SESSION["user_name"] . " " . $_SESSION["user_surname"]) ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="history.php">Satın Aldıklarım</a>
                            <!-- <a class="dropdown-item" href="#">Another action</a> -->
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" onclick="ajaxlogout()">Çıkış Yap</a>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="justify-content-center">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Sepet
                        </button>
                    </div>

        </div>
      </div>
    </div>
  </div>
</nav>