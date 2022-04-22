<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BookController extends Controller
{
    public function index(Request $request){
        $books=Book::all();
        return view('book.index')->with('books',$books);
    }
    public function show($id){
        $books=Book::find($id);
        return view('book.show')->with('books',$books);

    }
    public function destroy($id){
        Book::destroy($id);
        return redirect('book')->with('flash_message', 'Kitap Silindi'); 
    }
    public function edit($id){
        $books=Book::find($id);
        $authors=Author::all();
        $publishers=Publisher::all();
        return view('book.edit')->with('books',$books)->with('authors',$authors)->with('publishers',$publishers);

    }
    public function update(Request $request,$id){
       $books=Book::find($id);
        $books->BookName= $request->BookName;
        $books->BookInfo= $request->BookInfo;
        $books->BookCount= $request->BookCount;
        $books->BookPage= $request->BookPage;
        $books->BookLanguage = $request->BookLanguage;
        $books->BookYear= $request->BookYear;
        $books->BookPrice= $request->BookPrice;
        $books->AuthorID= $request->AuthorID;
        $books->PublisherID= $request->PublisherID;
        if($request->hasFile('picture'))
        {
            $path=$books->BookPicture;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file=$request->file('picture');
        
        $filename=$file->getClientOriginalName();
            $path=$request->file('picture')->storeAs('images', $filename, 'public');
            $books['BookPicture']='/storage/'.$path;
        }
    $books->update();
    return redirect('book')->with('flash_message','Kitap Güncellendi'); 
    }
    public function create()
    {
        $authors=Author::all();
        $publishers=Publisher::all();
        return view('book.create')->with('authors',$authors)->with('publishers',$publishers);
    }
    public function store(Request $request)
    {
        $input=$request->all();
        $file=$request->file('picture');
        
        $filename=$file->getClientOriginalName();
            $path=$request->file('picture')->storeAs('images', $filename, 'public');
            $input['BookPicture']='/storage/'.$path;
            Book::create($input);
        
         
        
        return redirect('book')->with('flash_message','Kitap Eklendi');
    }
    public function mainindex(Request $request)
    {
        $books = Book::orderBy('BookID', 'desc')->take(5)->get();
        return view('index')->with('books',$books);
    }
    public function bookinfo(Request $request,$id)
    {
        $books=Book::find($id);
        return view('book.bshow')->with('books',$books);
    }
    public function ara(Request $request)
    {
        $books=Book::where('BookName','like', '%'. $request->Sorgu .'%' )->get();
        if(empty($books))
        {
            

        }
        else
        {
            $authors=Author::where('AuthorName','like', '%'. $request->Sorgu .'%')->get();
            if(empty($authors))
            {

                return back()->with('Başarısız','Kitap yada Yazar bulunamadı');
            }
            else
            {
                foreach($authors as $item)
                {
                    $books=Book::where('AuthorID',$item->AuthorID)->get();
                }

                return view('book.search')->with('books',$books);
            }
        }
        
    }
}
