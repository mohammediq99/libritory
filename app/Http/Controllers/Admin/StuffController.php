<?php

namespace App\Http\Controllers\Admin;
use App\Stuff;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StuffController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct()
    {
        $this->middleware('can:admin')->only('admin');
    }
    public function index(){
        $stuff = Stuff::all();
         return view('admin.stuff.index')->with('stuff' , $stuff);
    }
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function show($id){
        $user = Stuff::find($id);
        return view('admin.stuff.single')
        ->with('user' , $user);
    }
    public function create(){
        return view('admin.stuff.create');
    }
    public function store(Request $request){
    $request->validate([
            'name' => 'required|max:255',
             'degree'  => 'required|max:255',
              'phone' =>  'required|max:12',
             'image' =>  'required|mimes:png,gif,jpeg,txt,pdf,doc',
    ]); 
    $stuff = new Stuff();
    $stuff->name = $request->name;
    $stuff->position = $request->degree;
    $stuff->phone = $request->phone;
    $ldate = date('Y-m-d H:i:s');
    $path = 'public/stuff/' . explode("-",$ldate)[0] .'/' . explode("-",$ldate)[1]  . '/';
    $filename = str_random(5) . '.' . $request->image->getClientOriginalExtension();
    $request->image->move(public_path($path), $filename);
    $stuff->image = ($path . $filename)  ;
    $stuff->save();
    return redirect()->route('admin.stuff.index')
      ->with('success' , "You have successfully create  astuff member");
   }
    public function edit($id){
        $user = Stuff::find($id);
        return view('admin.stuff.edit')->with('user' , $user);
    }
    public function update(Request $request,$id){
        $stuff = Stuff::find($id);
         //   dd($request->result);
            $request->validate([
                'name' => 'required|max:255',
                'degree'  => 'required|min:6|max:255',
                 'phone' =>  'required|max:12',
            ]); 
            $stuff->name = $request->name;
            $stuff->position = $request->degree;
             $stuff->phone = $request->phone;
            
            if($request->image ) {
                $ldate = date('Y-m-d H:i:s');
                // dd(explode("-",$ldate)[0]);
                $path = 'public/stuff/' . explode("-",$ldate)[0] .'/' . explode("-",$ldate)[1] .'/';
                $filename = str_random(5) . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(public_path($path), $filename);
                $stuff->image = ($path . $filename)  ;
            }
            $stuff->save();
            return redirect()->route('admin.stuff.index');
       
        dd($req);
    }
    public function destroy($id){
        $user = Stuff::find($id);
        $user->delete();
        return redirect()->route('admin.stuff.index');
    }

}
