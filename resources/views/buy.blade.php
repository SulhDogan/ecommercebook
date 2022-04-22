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
    <form class="w-100" action="{{ route('order_add',['id'=>session()->get('UserLoginID')]) }}" method="post">
        @csrf
            <div class="row">
                <div class="col mt-sm-5">
                    <fieldset>
                    <?php $total=0;$totalcount=0;?>
                        <legend>Fatura Bilgileri</legend>
                        @foreach ($ShopCarts as $key )
                        <?php $Name=$key->users->Name;$Surname=$key->users->Surname;$EMail=$key->users->EMail;$Phone=$key->users->Phone;?>
                        <?php $total +=($key->books->BookPrice*$key->BookCount);
                            $totalcount +=$key->BookCount?>
                        @endforeach
                        <div class="form-row mb-sm-3">
                            <div class="col">
                                <input type="text" class="form-control" name="Name "value="{{ $Name}}" required>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="Surname" value="{{ $Surname}}" required>
                            </div>
                        </div>
                        <div class="form-row mb-sm-3">
                            <div class="col">
                                <input type="email" class="form-control" name="EMail" value="{{ $EMail}}" required>
                            </div>
                            <div class="col">
                                <input type="tel" class="form-control" name="Phone" value="{{ $Phone}}" required>
                                <input type="hidden" id="custId" name="TotalPrice" value="{{ $total}}">
                            </div>
                        </div>
                        <div class="form-row mb-sm-3">
                            <div class="col">
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="Address"rows="3" placeholder="Adres" required></textarea>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="col-sm-2 mt-sm-5">
                    <fieldset class="text-right border p-sm-2">
                        <legend>Sipariş Özeti</legend>
                        
                       
                        <div><small><?php echo $totalcount; ?> Ürün</small></div>
                        <div><small>Ödenecek Tutar</small></div>
                        <h4><?php echo $total; ?> ₺</h4>
                        <button class="btn btn-primary d-block w-100">Onayla</button>
                    </fieldset>
                </div>
            </div>
            <div class="row mb-sm-5">
                <small>*Bilgiler toplanmıyor sadece görünüş amaçlıdır. Yine de gerçek bilgiler girmemeniz tavsiye edilir.</small>
            </div>
        </form>

    </div>

</body>
</html>