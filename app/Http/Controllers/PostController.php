<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Traits\Common;

class PostController extends Controller
{
    use Common;
    //private $columns=[
    //'title',
    //'description',
    //'author',
    //'published'
    //];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts= Post::get();
        return view ('posts', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addPost');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $posts= new Post();
        // $posts -> title = $request -> title;
        // $posts -> description = $request -> description;
        // $posts -> author = $request -> author;
        // if (isset ($request -> published)){
        // $posts -> published = 1;}
        // else{$posts -> published = 0;}
        // $posts -> save();
        // return 'Data added successfully';
        //$data= $request->only ($this->columns);
        $messages = $this->message();
        $data=$request->validate([
            'title'=>'required|string|max:50',
            'description'=>'required|string',
            'author'=>'required|string|max:50',
            'image'=>'required|mimes:png,jpg,jpeg|max:2048'
        ],$messages);
        $fileName = $this->uploadFile($request->image, 'assets/images');
        $data['image'] = $fileName;
        $data['published']= isset($request->published);
        Post:: create ($data);
        return redirect('posts');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post=Post::findOrFail($id);
        return view('showPost', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post=Post::findOrFail($id);
        return view('updatePost', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //$data= $request->only ($this->columns);
        $messages = $this->message();
        $data=$request->validate([
            'title'=>'required|string|max:50',
            'description'=>'required|string',
            'author'=>'required|string|max:50',
            'image'=>'sometimes|mimes:png,jpg,jpeg|max:2048'
        ],$messages);
        if($request->hasFile('image')){
            $fileName = $this->uploadFile($request->image, 'assets/images');
            $data['image'] = $fileName;
            unlink('assets/images/'. $request->oldImage);
        }
        $data['published']= isset($request->published);
        Post:: where('id', $id)->update ($data);
        return redirect('posts');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Post::where('id', $id)->delete();
        return redirect('posts');
    }

    public function trashed()
    {
        $posts=Post::onlyTrashed()->get();
        return view('postTrashed',compact('posts'));
    }
    public function forceDelete(string $id)
    {
        Post::where('id', $id)->forceDelete();
        return redirect('posts');
    }
    public function restore(string $id)
    {
        Post::where('id', $id)->restore();
        return redirect('posts');
    }
    public function message(){
        return[
            'title.required'=>' This field is required ',
            'title.string'=>'Should be string',
            'description.required'=> ' This field is required',
            'image.required'=>' You Should choose a file',
            'image.mimes'=> 'Incorrect image type',
            'image.max'=> 'Max file size exceeded',
        ];
    }
}