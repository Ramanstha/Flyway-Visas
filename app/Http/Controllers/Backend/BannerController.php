<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use File;

class BannerController extends Controller
{
    public function View(){
        $file=Banner::orderby('id','desc')->get();
        return view('backend.banner.view',['file'=>$file]);
    }

    public function banner(){
        return view('backend.banner.create');
    }

    public function Store(BannerRequest $request){

        $data=$request->except('_token','image');
        $filename = $request->file('image');        
        $file = time() . '-' . 'image' . '.' .$filename->getClientOriginalExtension();
        $destination = public_path('storage/banner/');
        $filename-> move($destination, $file);
        $data['image']=$file;
        $data=Banner::insert($data);
        return redirect()->route('view.banner')->with('message','Data Inserted Successfully');
    }

    public function Edit($id){
        $data=Banner::find($id);
        return view('backend.banner.edit',['data'=>$data]);
    }

    public function Update(Request $request,$id){
        $data=Banner::find($id);
        $data1=$request->except('_token','image');
        if($request->file('image')){
                File::delete(public_path('storage/banner/'.$data->image));
                $filename=$request->file('image');
                $file= time(). '-'. 'image'. $filename->getClientOriginalExtension();
                $destination=public_path('storage/banner/');
                $filename->move($destination,$file);
                $data1['image']=$file;
        }
        $data->update($data1);
        return redirect()->route('view.banner')->with('message', 'Data Updated Successfully');
    }

    public function Delete($id){
        $data=Banner::find($id);
        $img_path=public_path('storage/banner/').$data->image;
        if(file_exists($img_path) && $data->image!=null){
            unlink($img_path);
            $data->delete();
        }
        else{
            $data->delete();
        }
        return redirect()->back()->with('message','Data Deleted Successfully');
    }

    public function Status(Request $request){
        $banner = Banner::find($request->banner_id);
        $banner->status=$request->bannerstatus;
        $banner->save();
        return response()->json(['success'=>'banner status change successfully.']);
    }
}
