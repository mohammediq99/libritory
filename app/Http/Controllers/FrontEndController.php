<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\News;
use App\Stuff;
class FrontEndController extends Controller
{
    public function profile(){
        $user = Auth::user();
        return view('profile')->with('user' , $user);
    }
    public function homepage(){
        $articles  = News::orderBy('id', 'desc')->take(3)->get();
        $emps = Stuff::orderBy('id', 'desc')->take(4)->get();
        return view('front.home')
        ->with('articles' , $articles)
        ->with('emps' , $emps);
    }
     public function read($id){
         $art = News::find($id);
         return view('front.read')->with('art',$art);

     }
}