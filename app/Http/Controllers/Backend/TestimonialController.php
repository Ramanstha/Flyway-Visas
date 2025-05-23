<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TestimonialRequest;
use App\Models\Testimonial;
use File;
    
class TestimonialController extends Controller
{
    public function View(){
        $file=Testimonial::orderby('id','desc')->get();
        return view('backend.testimonial.view',['file'=>$file]);
    }

    public function testimonial(){
        return view('backend.testimonial.create');
    }

    public function Store(TestimonialRequest $request){

        $data=$request->except('_token','image');
        $filename = $request->file('image');        
        $file = time() . '-' . 'image' . '.' .$filename->getClientOriginalExtension();
        $destination = public_path('storage/testimonial/');
        $filename-> move($destination, $file);
        $data['image']=$file;
        $data=Testimonial::insert($data);
        return redirect()->route('view.testimonial')->with('message','Data Inserted Successfully');
    }

    public function Edit($id){
        $data=Testimonial::find($id);
        return view('backend.testimonial.edit',['data'=>$data]);
    }

    public function Update(Request $request,$id){
        $data=Testimonial::find($id);
        $data1=$request->except('_token','image');
        if($request->file('image')){
                File::delete(public_path('storage/testimonial/'.$data->image));
                $filename=$request->file('image');
                $file= time(). '-'. 'image'. $filename->getClientOriginalExtension();
                $destination=public_path('storage/testimonial/');
                $filename->move($destination,$file);
                $data1['image']=$file;
        }
        $data->update($data1);
        return redirect()->route('view.testimonial')->with('message', 'Data Updated Successfully');
    }

    public function Delete($id){
        $data=Testimonial::find($id);
        $img_path=public_path('storage/testimonial/').$data->image;
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
        $testimonial = Testimonial::find($request->testimonial_id);
        $testimonial->status=$request->testimonialstatus;
        $testimonial->save();
        return response()->json(['success'=>'testimonial status change successfully.']);
    }
}
