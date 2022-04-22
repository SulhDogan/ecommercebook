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
   @isset($Order)
   {

       <p>order id :{{ $Order->OrderID}}</p>
       <p>order totalprice :{{ $Order->TotalPrice}}</p>
       <p>order userid :{{ $Order->UserID}}</p>
       <p>order address :{{ $Order->Address}}</p>
       <p>order status :{{ $Order->Status}}</p>
   }
   @endisset
   @isset($ShopCart)
   {
       @foreach ($ShopCart as $key )
           
       @endforeach
       <p>shopcart id :{{ $key->ShopCartID}}</p>
       <p>shopcart bookid :{{ $key->BookID}}</p>
       <p>shopcart userid :{{ $key->UserID}}</p>
       <p>shopcart count :{{ $key->BookCount}}</p>
      
   }@endisset
   @isset($OrderBook)
   {
       @foreach ($Orders as $key )
       <p> orderbook id : {{ $key->OrderBookID}}</p>
       <p> orderbook bookid :{{ $key->BookID}}</p>
       <p> orderbook bookcount :{{ $key->BookCount}}</p>
       <p> orderbook user id :{{ $key->UserID}}</p>
       <p> orderbook order id :{{ $key->OrderID}}</p>
       <p> orderbook price :{{ $key->Price}}</p>
           
       @endforeach
   }
   @endisset
   
            
        
    </div>

</body>
</html>