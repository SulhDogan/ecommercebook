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
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Ürün</th>
                        <th scope="col">Adet</th>
                        <th scope="col">Birim Fiyat</th>
                        <th scope="col">Toplam Fiyat</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total = 0;
                    $totalcount = 0; ?>
                    <?php $id = session()->get("UserLoginID"); ?>
                    @foreach ($shopcarts as $key )

                    <tr id="bigcart">
                        <td class="align-middle"><img src="{{ asset($key->books->BookPicture) }}"></td>
                        <td class="align-middle"> {{ $key->books->BookName }}</td>
                        <td class="align-middle" id=""><div class="col align-self-center">
                    <form action="{{ route('shopcard_edit',['id'=>$key->ShopCartID]) }}" method="post">
                        @csrf
                <input class="input" type="number" name="BookCount" value="{{ $key->BookCount }}" max="{{$key->books->BookCount}}" min="1">
                </div>

                            </td>
                        <td class="align-middle">{{ $key->books->BookPrice }} ₺</td>
                        <td class="align-middle"><span id="">{{ $key->books->BookPrice * $key->BookCount }}</span> ₺</td>
                        <td class="align-middle">
                            <div class="col">

                                <input type="submit" class="btn btn-danger" value="Düzenle" >
                            </form>
                            </div>
                            <div class="col">
                            <a href="{{ url('ushopcart/'.$key->ShopCartID.'/delete')}}">
                                <button type="button" class="btn btn-danger">Sil</button>
                            </a>
                            </div>
                        </td>
                    </tr>
                    <?php $total = $total + ($key->books->BookPrice * $key->BookCount);
                    $totalcount = $totalcount + $key->BookCount;$UserID=$key->UserID ?>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            <h5 class="col align-self-center">Toplam: <b id="cartTotal">{{ $total}}</b><b>₺</b></h5>
            <div class="col align-self-center"> <a href="{{ url('/buy/'.$id)}}"><button class="btn btn-block btn-success" >Ödemeye Devam <span class="ml-sm-2 fa fa-angle-right"></span> </button></a></div>
        </div>

    </div>
    </div>
</body>

</html>