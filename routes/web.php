<?php
 Route::get('lang/{lang}', function ($lang) {
     if(in_array($lang,['ar','en'])){
        if(session()->has('lang')){
            session()->forget('lang');
        }
        session()->put('lang',$lang);
    }else{
        if(session()->has('lang')){
            session()->forget('lang');
        }
        session()->put('lang','en');
    }
     return back();
});
Route::get('/welcome' , function (){
return view('welcome');
});
Route::group(['prefix' => 'admin' , 'namespace'=>'Admin' , 'as' => 'admin.' ,  
 'middleware' => ['admin','auth' , 'setLocale' ]   ], function (){
     Route::group(['middleware' => ['admin:admin']] , function () {
        Route::get('/', function () {
            return view('admin.home');
        })->name('home');
        Route::resource('users', 'UsersController');
        Route::resource('news', 'NewsController');
        Route::resource('stuff', 'StuffController');
        Route::get('/users/recive/{id}' , 'UsersController@recive')->name('users.recive');
        
    }); 
    });
 Auth::routes(['register' => false]);
// ['register' => false]

// front end routes 
Route::get('/', 'FrontEndController@homepage')->middleware('setLocale');

Route::get('news/read/{id}', 'FrontEndController@read')->name('news.read');

Route::get('/profile' , 'FrontEndController@profile')->middleware('auth');
