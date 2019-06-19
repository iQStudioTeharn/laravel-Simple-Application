<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\EditUserRequest;
use App\User;
use App\Role;
use App\Photo;
use Illuminate\Support\Facades\Hash;
use Session;
class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $users = User::all();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        

        $roles = Role::select('id','name')->get();
       
        return view('admin.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddUserRequest $request)
    {
        //
        

        $request = $request->all();
        
        $request['password'] = Hash::make($request['password']);
       
        if($photo = $request['profileImage']){
            
            
            $name = time() . $photo->getClientOriginalName();

            $photo->move('images',$name);

            $request['photo_id'] = Photo::create(['profileImage'=>$name])->id;
             $request['photo_id'];

        }

         User::create($request);
         return redirect('admin/users');
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
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('admin.users.edit',compact(['user','roles']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUserRequest $request, $id)
    {
        //
        $user = User::findOrFail($id);
        $input = $request->all();
        $input['password'] = Hash::make($request->password);
        if($file = $request->file('profileImage')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images',$name);
            $input['photo_id'] = Photo::create(['profileImage'=>$name])->id;
            
        }
        $user->update($input);
        return redirect('admin/users');
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
        
        $user = User::findOrFail($id);
        unlink(public_path()."/images/".$user->photo->profileImage);
        $user->photo->delete();
        Session::flash('Deleted', "$user->name Has Been Deleted");
        $user->delete();
        
        return redirect('admin/users');
    }
}
