<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Posts;
use App\Http\Requests\AdminPostRequest;
use App\Category;
use App\Photo;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Posts::paginate(2);
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        $cat = Category::pluck('name','id')->all();
        return view('admin.posts.create',compact('cat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminPostRequest $request)
    {
        //
        $input = $request->all();
        
        $user = Auth::user();
        if($file = $request->file('profileImage')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images',$name);
            $input['photo_id'] = Photo::create(['profileImage'=>$name])->id;
        }
        
        $user->posts()->create($input);

        return redirect('admin/posts');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $cat = Category::pluck('name','id')->all();
        $post = Posts::findOrFail($id);
        return view('admin.posts.edit',compact(['post','cat']));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $input = $request->all();
        $input['status'] = isset($input['status']) ? $input['status'] : 0;
        if ($file = $request->file('profileImage')) {
            # code...
            $name = time() . $file->getClientOriginalName();
            $file->move('images',$name);
            $input['photo_id'] = Photo::create(['profileImage'=>$name])->id;
        }
        Posts::findOrFail($id)->update($input);
        return redirect('admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Posts::findOrFail($id);
        unlink(public_path().'/images/'.$post->photo->profileImage);
        $post->photo->delete();
        $post->delete();
        return redirect('admin/posts');
    }




    public function post($slug){
        
        $post = Posts::findBySlugOrFail($slug);
        
        return view('post',compact('post'));
    }
}
