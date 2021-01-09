<?php

namespace App\Http\Controllers\Admin;

use App\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('can:admin')->only('admin');
    }
    public function index(){
        $news = News::all();
        return view('admin.news.index')->with('news' , $news);
    }
    public function show($id){
        $article = News::find($id);
        return view('admin.news.single')
        ->with('article' , $article);
    }
    public function create(){
        return view('admin.news.create');
    }
    public function store(Request $request){
        $request->validate([
            'title' => 'required|max:255',
             'body'  => 'required',
              'image' =>  'required|mimes:png,gif,jpeg,txt,pdf,doc',
    ]); 
    $art  = new News();
    $art->title = $request->title;
    $art->body = $request->body;
    $art->slug = str_slug($request->title ,  '_');
    $ldate = date('Y-m-d H:i:s');
    $path = 'public/news/' . explode("-",$ldate)[0] .'/' . explode("-",$ldate)[1]  . '/';
    $filename = str_random(5) . '.' . $request->image->getClientOriginalExtension();
    $request->image->move(public_path($path), $filename);
    $art->image = ($path . $filename)  ;
    $art->save();
    return redirect()->route('admin.news.index')
      ->with('success' , "You have successfully create  an article");
    }
    public function edit($id){
        $article = News::find($id);
        return view('admin.news.edit')->with('article' , $article);
    }
    public function update(Request $request,$id){
        $art = News::find($id);
        $request->validate([
            'title' => 'required|max:255',
             'body'  => 'required',
              'image' =>  'mimes:png,gif,jpeg,txt,pdf,doc',
    ]); 
    $art->title = $request->title;
    $art->body = $request->body;
    $art->slug = str_slug($request->title ,  '_');
    if($request->image ) {
    $ldate = date('Y-m-d H:i:s');
    $path = 'public/news/' . explode("-",$ldate)[0] .'/' . explode("-",$ldate)[1]  . '/';
    $filename = str_random(5) . '.' . $request->image->getClientOriginalExtension();
    $request->image->move(public_path($path), $filename);
    $art->image = ($path . $filename)  ;
    }
    $art->save();
    return redirect()->route('admin.news.index')
    ->with('success' , "You have successfully create Article");
        dd($req);
    }
    public function destroy($id){
        $article = News::find($id);
        $article->delete();
        return redirect()->route('admin.news.index');
    }

}
