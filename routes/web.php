<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



// Route::get('/first', function(){
//     return view('first_page');
// });

// Route::get('/second',function(){
//     return view('second_page');
// })->name('second1');

Route::get('/first','fuckController@firstfirst');
Route::get('/second','fuckController@secondsecond')->name('second');


//Route::resource('products', 'App\Http\Controllers\ProductController');

Route::post('/products','ProductController@create');


Route::get('check0','DBcontroller@checkUser');
//Route::get('/check1','secondController@checkUser');
//Route::get('/check2','secondController@checkUser');
//Route::get('/check_user','firstController@checkUserName');
//Route::get('/lNamebb','secondController@checkUserLname');
//Route::get('ageChecker','thirdController@checkUserAge');


Route::get('test2',function(){

   $infos = request('infos');
   return $infos;
    //return view('test2',[
    //    'infos'=> request('infos')
    //]);
});


Route::get('test1',function(){
    //return view('test1');
    //$name = request('name');
    //return $name;

    return view('test1',[
        'name'=> request('name')
    ]);

});



Route::get('/posts/{post}',function($post){
    $posts = [
        'my-first-post' => 'Welcome to first post',
        'my-second-post' => 'welcome to second post'
    ];

    return view('post',[
        $post => $posts[$post] ?? 'nothing here'
    ]);
});



//Route::get('/test4/{ex?}',function($ex){
//    return $ex;
//});


Route::get('/tony/{ex}',function($ex){
    $tony =[
        'my-first-blog' => 'Hello this is my first blog',
        'my-second-blod' => 'Hello this is my seccond blog'
    ];

    return view('tony',[
        'ex'=>$tony[$tony]
    ]);
});














































