<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\car;
use App\Traits\Common;
use App\Models\Category;

class CarController extends Controller
{
    use Common;
    // private $columns =[
    //     'title',
    //     'description',
    //     'published',
    //     ];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = car::get();
        return view ('cars', compact ('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view ('addCar', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $cars= new car();
        // $cars -> title = $request -> title;
        // $cars -> description = $request -> description;
        // if (isset ($request -> published)){
        // $cars -> published = 1;}
        // else{$cars -> published = 0;}
        // $cars -> save();
        // return 'Data entered successfully';
        //$data= $request->only($this->columns);
        $message = $this->message();
        $data= $request->validate([
            'title'=>'required|string|max:50',
            'description'=>'required|string', 
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'category_id' => 'required'
        ],$message);
        $fileName = $this->uploadFile($request->image, 'assets/images');    
        $data['image'] = $fileName;
        $data['published'] = isset($request-> published);
        car::create ($data);
        return redirect('cars');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car = car::findOrFail($id);
        return view('showCar', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $car = car::findOrFail($id);
        $categories = Category::get();
        return view('updateCar', compact('car','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $message = $this->message();
        $data= $request->validate([
            'title'=>'required|string|max:50',
            'description'=>'required|string',
            'image' => 'sometimes|mimes:png,jpg,jpeg|max:2048',
            'category_id' => 'required'
        ],$message);

        if($request->hasFile('image')){
            $fileName = $this->uploadFile($request->image, 'assets/images');    
            $data['image'] = $fileName;
            unlink('assets/images/'. $request->oldImage);
        }
        $data['published'] = isset($request-> published);
        car::where('id', $id)->update ($data);
        return redirect('cars');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        car::where('id', $id)->delete();
        return redirect('cars');
    }
//trashed list
    public function trashed(){
        $cars=car::onlyTrashed()->get();
        return view('trashed', compact('cars'));
    }

    public function forceDelete(string $id){
        car::where('id', $id)->forceDelete();
        return redirect('cars');
    }

    public function restore(string $id){
        car::where('id', $id)->restore();
        return redirect('cars');
    }
    public function message(){
        return[
            'title.required'=>' This field is required ',
            'title.string'=>'Should be string',
            'description.required'=> ' This field is required',
            'image.required'=>' You Should choose a file',
            'image.mimes'=> 'Incorrect image type',
            'image.max'=> 'Max file size exceeded',
            'category_id.required'=>' You Should choose a file',
        ];
    }
}