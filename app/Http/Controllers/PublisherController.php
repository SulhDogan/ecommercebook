<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publisher;
class PublisherController extends Controller
{
    public function index(Request $request)
    {
        $publishers=Publisher::all();
        return view('publisher.index')->with('publishers',$publishers);
    }
    public function create()
    {
        return view('publisher.create');
    }
    public function store(Request $request)
    {
        $input=$request->all();
        Publisher::create($input);
        return redirect('publisher')->with('flash_message','Yayınevi Eklendi');
    }
    public function show($id)
    {
        $publishers=Publisher::find($id);
        return view('publisher.show')->with('publisher',$publishers);
    }
    public function edit(Request $request,$id)
    {
        $publishers=Publisher::find($id);
        return view('publisher.edit')->with('publishers',$publishers);
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'PublisherName'=>'required|unique:publishers'
        ]);
        $publishers=Publisher::find($id);
        $input=[
            'PublisherName'=>$request->PublisherName
        ];
        $publishers->update($input);
        return redirect('publisher')->with('flash_message','Yayınevi Güncellendi');
    }
    public function destroy($id)
    {
        Publisher::destroy($id);
        return redirect('publisher')->with('flash_message','Yayınevi Silindi');
    }
}
