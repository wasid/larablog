<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Session;

use App\Photo;

class AdminMediasController extends Controller
{
        public function index()
    {
        $photos = Photo::all();
        return view('admin.media.index', compact('photos'));
    }
    
        public function create()
    {
       return view('admin.media.create', compact('photos'));
    }
    
        public function store(Request $request)
    {
               
        $file = $request->file('file');
        
        $name = time() . $file->getClientOriginalName();
        
        $file->move('images', $name);
        
        $photo = Photo::create(['file'=>$name]);
        
        Session::flash('alert-info', 'Media Successfully Uploaded!');
        
        return redirect()->route('admin.users.index');

    }
    
      public function destroy($id)
    {
        $photo = Photo::findOrFail($id);
        
        unlink(public_path() . $photo->file);
        
        $photo->delete();
        
        Session::flash('alert-danger', 'Media Successfully Deleted!');
        
        return redirect()->route('admin.media.index');
    }
}
