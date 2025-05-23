<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use File;

class ServiceController extends Controller
{
    public function View(){
        $file=Service::orderby('id','desc')->get();
        return view('backend.service.view',['file'=>$file]);
    }

    public function service(){
        return view('backend.service.create');
    }

    public function Store(ServiceRequest $request){

        $data=$request->except('_token','image');
        $filename = $request->file('image');        
        $file = time() . '-' . 'image' . '.' .$filename->getClientOriginalExtension();
        $destination = public_path('storage/service/');
        $filename-> move($destination, $file);
        $data['image']=$file;
        $data=Service::insert($data);
        return redirect()->route('view.service')->with('message','Data Inserted Successfully');
    }

    public function Edit($id){
        $data=Service::find($id);
        return view('backend.service.edit',['data'=>$data]);
    }

    public function Update(Request $request,$id){
        $data=Service::find($id);
        $data1=$request->except('_token','image');
        if($request->file('image')){
                File::delete(public_path('storage/service/'.$data->image));
                $filename=$request->file('image');
                $file= time(). '-'. 'image'. $filename->getClientOriginalExtension();
                $destination=public_path('storage/service/');
                $filename->move($destination,$file);
                $data1['image']=$file;
        }
        $data->update($data1);
        return redirect()->route('view.service')->with('message', 'Data Updated Successfully');
    }

    public function Delete($id){
        $data=Service::find($id);
        $img_path=public_path('storage/service/').$data->image;
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
        $service = Service::find($request->service_id);
        $service->status=$request->servicestatus;
        $service->save();
        return response()->json(['success'=>'service status change successfully.']);
    }
}
