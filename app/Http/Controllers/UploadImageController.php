<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

class UploadImageController extends Controller
{
    public function index()
    {
        return view('upload-image.index');
    }

    public function saveImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'search_key'=>'required|unique:images'
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');

            $image = new Image();
            $image->image = $imagePath;
            $image->search_key = $request->search_key;
            $image->save();

            return redirect()->back()->with('message', 'Image uploaded successfully.');
        }

        return back()->with('error', 'Error uploading image.');
    }



    public function manage()
    {
        $images = Image::orderBy('id','desc')->get();
        return view('upload-image.manage',['images'=>$images]);
    }

    public function deleteImage($id)
    {
        $image = Image::find($id);
        $image->delete();
        return redirect()->back()->with('message','image delete successfully!');
    }

    public function editImage($id)
    {

        $image = Image::find($id);
        return view('upload-image.edit',['image'=>$image]);

    }

    public function updateImage(Request $request,$id)
    {

        $request->validate([
            'search_key'=>'required'
        ]);

    $image = Image::findOrFail($id);
    // Update image details

    $image->search_key = $request->search_key;

    // Handle file update
    if ($request->hasFile('image')) {
        // Delete the old file
        Storage::delete($image->image);

        // Upload the new file

        $newPath = $request->file('image')->store('images', 'public');
        $image->image = $newPath;
    }else
    {
        $image->image = $image->image;
    }

    $image->save();

    return redirect()->route('manage.image')->with('message', 'Image updated successfully.');

    }



    public function searchImg(Request $request)
    {
        $image = Image::where('search_key',$request->search_key)->first();
        if($image)
        {

            $dataArray =[
                'message' => 'Success! Report ID Found',
                'data_img'=>$image
            ];

             return redirect()->route('image.view')->with('data',$dataArray);

        }else
        {
            return redirect()->back()->with('message','Sorry! Report ID not Found!');
        }
    }


    public function imgView()
    {
        return view('view-image');
    }

    public function download($id)
    {
        $image = Image::findOrFail($id);

        $imagePath = Storage::url($image->image);

    return response()->download(public_path($imagePath));
        
    }
}
