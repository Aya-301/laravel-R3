<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route:: fallback (function(){
//     return redirect ('/');
// });
Route::get('food', function(){
    return view ('task');
});
Route::prefix ('lar')->group (function(){
//لإنشاء لينك 
Route::get('/', function(){
    return view ('test');
});
Route::get('test', function(){
    return 'Welcome to my first laravel website';
});
//لإعطاء قيمة للينك
Route::get('test1/{id}', function($id){
    return 'The id is: ' . $id;
});
// Route::get('test2/{id?}', function($id = 0){
//     return 'The id2 is: ' . $id;
// })-> where (['id' => '[0-9]+']);
//طريقة تانية عشان نحدد ان لازم يدخل رقم ف اللينك بديله للي فوق
Route::get('test2/{id?}', function($id = 0){
    return 'The id2 is: ' . $id;
})-> whereNumber ('id');
//عشان نخلي القيمة حروف
Route::get('test3/{Name?}', function($name = null){
    return 'The name is: ' . $name;
})-> whereAlpha ('Name');
//عشان ندخل رقم وحروف ف قيمة اللينك
Route::get('test4/{id?}/{Name}', function($id, $name){
    return 'The Age is: '.$id . ' and The name is: ' . $name;
})-> where (['id' => '[0-9]+' , 'name'=> 'a-zA-Z0-9']);

Route::get('product/{category}', function($cat){
    return 'The category is: ' . $cat;
})-> wherein ('category',['pc', 'laptop', 'mobile']);
});
