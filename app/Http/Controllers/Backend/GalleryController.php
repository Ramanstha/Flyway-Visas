<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\GalleryRequest;
use App\Models\Gallery;
use File;
use Image;

class GalleryController extends Controller
{
    public function View(){
        $data=Gallery::orderBy('id','desc')->get();
        return view('backend.gallery.view',['data'=>$data]);
    }

    public function gallery(){
        return view('backend.gallery.create');
    }
    
    Public function Store(GalleryRequest $request){
        $data = $request->except('_token','image');
        if ($request->hasFile('image')) {
        foreach($request->image as $image){
                $destinationimage = $image;
                $destinationimage_name = rand(0, 9999) . '-destination' . '.webp';
                $destinationPath = public_path('storage/gallery/main');
                $thumbdestinationPath = public_path('storage/gallery/thumbnail');
                if (!file_exists($destinationPath) && !file_exists($thumbdestinationPath)) {
                    mkdir($destinationPath, 0777, true);
                    mkdir($thumbdestinationPath, 0777, true);
                }
                $orginalimage = Image::make($destinationimage->getRealPath())->encode('webp', 100)->save($destinationPath . '/' . $destinationimage_name);
                $img = Image::make($destinationimage->getRealPath())->encode('webp', 100)->resize(374, 321)->save($thumbdestinationPath . '/' . $destinationimage_name);
                $data['image'] = $destinationimage_name;
                $gallery = Gallery::insert($data);
            }    
        }
        return redirect()->route('view.gallery')->with('message','Data Inserted Successfully !!!');

    }

    public function Edit($id){
        $data=Gallery::Find($id);
        return view('backend.gallery.edit',['data'=>$data]);
    }

    public function Update(Request $request,$id){
        $data1=Gallery::find($id);
        $data = $request->except('_token','image');
        if ($request->file('image')){
            File::delete(public_path('storage/gallery/'.$data1->image));
                $filename=$request->file('image');
                $file = rand(1,3333) . '-' . 'image' . '.' . $filename->getClientOriginalExtension();
                $destination = public_path('storage/gallery/');
                $filename->move($destination, $file);
                $data1['image'] = $file;
            }
            $data1->type=$request->type;
            $data1->save();
        return redirect()->route('view.gallery')->with('message','Data Updated Successfully!!!');
    }
    
    public function Delete($id){
        $data=Gallery::find($id);
        $img_path=public_path('storage/gallery/').$data->image;
        if(file_exists($img_path) && $data->image!=null){
            unlink($img_path);
            $data->delete();
        }
        else{
            $data->delete();
        }
        return redirect()->back()->with('message',"Data Deleted Successfully!!!");
    }
}
