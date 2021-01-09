<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller{

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct()
    {
        $this->middleware('can:admin')->only('admin');
    }
    public  function index(){
        $users = User::orderBy('id', 'desc')->take(5)->get()->where('id' , '!=' , 1);
       return view('admin.users.index')
       ->with('users' , $users);
    }
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public  function show($id){
         $user = User::find($id);
         return view('admin.users.single')
        ->with('user' , $user);
    }
    public function create (){
        return view('admin.users.create');
    }
    public function store(Request $request ){
  
        $request->validate([
        'name' => 'required|max:255',
         'username'  => 'required|min:6|max:255',
         'password' =>  'required|min:6|max:255|unique:users,username',
         'address' =>  'required|min:6|max:255',
         'phone' =>  'required|max:12',
         'result' =>  'required|mimes:png,gif,jpeg,txt,pdf,doc',
    ]); 
    $user = new User;
    $user->name = $request->name;
    $user->username = $request->username;
    $user->password = Hash::make($request->password);
    $user->address = $request->address;
    $user->phone = $request->phone;
    // file 
    $ldate = date('Y-m-d H:i:s');

    // dd(explode("-",$ldate)[0]);
    $path = 'public/' . explode("-",$ldate)[0] .'/' . explode("-",$ldate)[1] . '/';
    $filename = str_random(5) . '.' . $request->result->getClientOriginalExtension();
    $request->result->move(public_path($path), $filename);
    $user->result = ($path . $filename)  ;
    $user->save();
    return redirect()->route('admin.users.index')
      ->with('success' , "You have successfully create client");
    }
    public function edit ($id){
         $user = User::find($id);
        return view('admin.users.edit')->with('user',$user);

    }
    public function update( Request $request , $id){
        $user = User::find($id);
    //   dd($request->result);
        $request->validate([
            'name' => 'required|max:255',
             'username'  => 'required|min:6|max:255',
            //  'password' =>  'min:6|max:255',
             'address' =>  'required|min:6|max:255',
             'phone' =>  'required|max:12',
             'result' =>  'mimes:png,gif,jpeg,txt,pdf,doc',
        ]); 
        $user->name = $request->name;
        $user->username = $request->username;
       ($request->password) ?  $user->password = Hash::make($request->password) : '';
        $user->address = $request->address;
        $user->phone = $request->phone;
        
        if($request->result ) {
            $ldate = date('Y-m-d H:i:s');

            // dd(explode("-",$ldate)[0]);
            $path = 'public/' . explode("-",$ldate)[0] .'/' . explode("-",$ldate)[1] . '/';
            $filename = str_random(5) . '.' . $request->result->getClientOriginalExtension();
            $request->result->move(public_path($path), $filename);
            $user->result = ($path . $filename)  ;
        }
        $user->save();
        return redirect()->route('admin.users.index');
    }
    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users.index');
    }
    public function recive($id){
        $user = User::findOrFail($id);
        $user->recived = true;
        $user->save();
        return redirect()->route('admin.users.show' ,['user'=> $user])->with('user' , $user);

    }
}
