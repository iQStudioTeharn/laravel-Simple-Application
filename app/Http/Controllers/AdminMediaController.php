<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\bulkDleteRequest;
use App\Photo;

class AdminMediaController extends Controller
{
    //
    public function index(){
        $photos = Photo::all();
        return view('media.index',compact('photos'));
    }
    public function upload(){
        return view('media.upload');
    }


    public function save(Request $request){
        $file = $request->file('file');

        $name = time() . $file->getClientOriginalName();
        
        $file->move('images',$name);

        Photo::create(['profileImage'=>$name]);


        
    }

    public function destroy(Request $request){
        
         $photo = $request->all();
         $photo = Photo::findOrFail($photo['id']);
         unlink('images/'. $photo->profileImage);
         $photo->delete();
         return redirect('admin/media');
    }

     public function bulkDelete(bulkDleteRequest $request)
    {
        # code...
        $request = $request->all();
        $ids = $request['bulkDelete'];
        $photo = Photo::findOrFail($ids);
        foreach ($photo as $p) {
            # code...
            unlink('images/'. $p->profileImage);
            $p->delete();
        }
        return redirect('admin/media');
    }
}
