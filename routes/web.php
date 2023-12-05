<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\TaskController;

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


// بداية شغلنا

//الايرور 
// Route:: fallback (function(){
//     return redirect ('/');
// });
// استدعاء ملف html من ملف تاني
// Route::get('food', function(){
//     return view ('task');
// });
// نعمل لينك يجمع كل اللينكات دي
// Route::prefix ('lar')->group (function(){
    // استدعاء ملف بلاد ف نفس اللينك الرئيسي
//// Route::get('/', function(){
//     return view ('test');
// });
// لإنشاء لينك 
// Route::get('test', function(){
//     return 'Welcome to my first laravel website';
// });
// //لإعطاء قيمة للينك
// Route::get('test1/{id}', function($id){
//     return 'The id is: ' . $id;
// });
// اعطاء شرط للينك
// // Route::get('test2/{id?}', function($id = 0){
// //     return 'The id2 is: ' . $id;
// // })-> where (['id' => '[0-9]+']);
// //طريقة تانية عشان نحدد ان لازم يدخل رقم ف اللينك بديله للي فوق
// Route::get('test2/{id?}', function($id = 0){
//     return 'The id2 is: ' . $id;
// })-> whereNumber ('id');
// //عشان نخلي القيمة حروف
// Route::get('test3/{Name?}', function($name = null){
//     return 'The name is: ' . $name;
// })-> whereAlpha ('Name');
// //عشان ندخل رقم وحروف ف قيمة اللينك
// Route::get('test4/{id?}/{Name}', function($id, $name){
//     return 'The Age is: '.$id . ' and The name is: ' . $name;
// })-> where (['id' => '[0-9]+' , 'name'=> 'a-zA-Z0-9']);
// عشاننحدد قيمة اللينك بقيم محددة
// Route::get('product/{category}', function($cat){
//     return 'The category is: ' . $cat;
// })-> wherein ('category',['pc', 'laptop', 'mobile']);
// });

//First  Task
Route::get('About', function(){
    return view ('info');
});
Route::get('Contact Us', function(){
    return view ('contact');
});

Route::prefix ('Blog')->group (function(){
    Route::get('/', function(){
        return view ('sub');
    });
    Route::get('sceince/{score?}', function($score=0){
        return 'The Sceince score is : ' . $score;
    })-> where (['score' => '[0-9]+']);
    Route::get('sports/{score?}', function($score=0){
        return 'The Sports score is: ' . $score;
    })-> where (['score'=>'[0-9]+']);
    Route::get('math/{score?}', function($score=0){
        return 'The Math score is: ' . $score;
    })-> where (['score'=>'[0-9]+']);
    Route::get('medical/{score?}', function($score=0){
        return 'The Medical score is: ' . $score;
    })-> where (['score'=>'[0-9]+']);
});
//Second Lec  test
// Route::get('login', function(){
//     return view ('login');
// });
// Route::post('logged', function(){
//     return 'you are logged in';
// })->name ('logged');
// Route::get('control', [ExampleController::class,'show']);


// second task
Route::get('login', function(){
    return view ('login');
});

Route::post('logged', [TaskController::class,'task'])->name ('logged');