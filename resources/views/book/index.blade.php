@extends('book.layout')
@section('content')
    <div class="container">
        <div class="row">
 
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h2>Kitap İşlemleri</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/book/create') }}" class="btn btn-success btn-sm" title="Add New book">
                            <i class="fa fa-plus" aria-hidden="true"></i> Yeni Ekle
                        </a>
                        <br/>
                        <br/>
                        @if(Session::has('flash_message'))
          <div class="alert alert-danger">{{Session::get('flash_message')}}</div>
          @endif
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Kitap ID</th>
                                        <th>Kitap İsmi</th>
                                        
                                        <th>Adet</th>
                                        <th>Sayfa</th>
                                        <th>Dil</th>
                                        <th>Basım Yılı</th>
                                        <th>Fiyat</th>
                                        <th>Resim</th>
                                        <th>Yazar</th>
                                        <th>Yayın Evi</th>
                                        <th>Eklenme Tarihi</th>
                                        <th>Güncellenme Tarihi</th>
                                        <th>İşlemler</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($books as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->BookID }}</td>
                                        <td>{{ $item->BookName }}</td>
                                        
                                        <td> {{$item->BookCount}} </td>
                                        <td>  {{$item->BookPage}}  </td>
                                        <td>  {{$item->BookLanguage }}  </td>
                                        <td>{{  $item->BookYear }}</td>
                                        <td>{{  $item->BookPrice }}</td>
                                        <td>  <img src="{{   asset($item->BookPicture)   }}" width="50" height="50">  </td>
                                        <td>{{ $item->author->AuthorName}}</td>
                                        <td>{{ $item->publisher->PublisherName}}</td>
                                        <td>{{ $item->created_at}}</td>
                                        <td>{{ $item->updated_at }}</td>
                                        <td>
                                            <a href="{{ url('/book/' . $item->BookID) }}" title="View book"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Göster</button></a>
                                            <a href="{{ url('/book/' . $item->BookID . '/edit') }}" title="Edit book"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Düzenle</button></a>
 
                                            <form method="POST" action="{{ url('/book' . '/' . $item->BookID) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete book" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Sil</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-grid gap-2">
  <button class="btn btn-primary" type="button"onclick="location.href='{{ url('/panel') }}'">Geri Dön</button>
</div>
@endsection