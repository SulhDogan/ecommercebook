<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
class AuthorController extends Controller
{
    public function index(Request $request)
    {
        $authors=Author::all();
        return view('author.index')->with('authors',$authors);
    }
    public function create()
    {
        return view('author.create');
    }
    public function store(Request $request)
    {
        $input=$request->all();
        Author::create($input);
        return redirect('author')->with('flash_message','Yazar Eklendi');
    }
    public function show($id)
    {
        $authors=Author::find($id);
        return view('author.show')->with('authors',$authors);
    }
    public function edit(Request $request,$id)
    {
        $authors=Author::find($id);
        return view('author.edit')->with('authors',$authors);
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'AuthorName'=>'required|unique:authors'
        ]);
        $authors=Author::find($id);
        $input=[
            'AuthorName'=>$request->AuthorName
        ];
        $authors->update($input);
        return redirect('author')->with('flash_message','Yazar Güncellendi');
    }
    public function destroy($id)
    {
        Author::destroy($id);
        return redirect('author')->with('flash_message','Yazar Silindi');
    }
}
