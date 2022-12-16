<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\Photo;
use App\Models\Album;
use Illuminate\Http\Request;

class PhotosController extends Controller
{
    public function create(int $albumId){
        
        return view('photos.create')->with('albumId', $albumId);
    }

    public function store(Request $request){
        $this->validate($request,[
            'title' => ['required'],
            'description' => ['required'],
            'photo' => ['required'],
        ]);

        $filenameWithExtension = $request->file('photo')->getClientOriginalName();
        $filename              = pathinfo($filenameWithExtension,PATHINFO_FILENAME);
        $extension             =  $request->file('photo')->getClientOriginalExtension();

        $filenameToStore = $filename."_".time().'.'.$extension;
        
        $path = $request->file('photo')->storeAs('public/albums/' . $request->input('album-id'),$filenameToStore);
        
        $photo = new Photo();
        $photo->title = $request->input('title');
        $photo->description = $request->input('description');
        $photo->photo = $filenameToStore;
        $photo->size = $request->file('photo')->getSize();
        $photo->album_id = $request->input('album-id');
        $photo->save();

        return redirect('/albums/'.$request->input('album-id'))->with('success','Photo has benn added successfully');
    }

    public function show($id)
    {
        $photo = Photo::find($id);
        return view('photos.show')->with('photo',$photo);
    }

    public function destroy($id){
        $photo = Photo::find($id);
        if(Storage::delete('/storage/albums/'.$photo->album_id.'/'.$photo->photo)){
            $photo->delete();

            return redirect('/')->with('success','Photo has been deleted Successfully');
        }
    }
}
