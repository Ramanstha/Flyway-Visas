<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\MedialinkRequest;
use App\Models\Medialink;

class MedialinksController extends Controller
{
     public function View(){
        $file=Medialink::orderby('id','desc')->get();
        return view('backend.media.view',['file'=>$file]);
    }

    public function medialink(){
        return view('backend.media.create');
    }

    public function Store(MedialinkRequest $request){

        $data=$request->except('_token');
        $data=Medialink::insert($data);
        return redirect()->route('view.medialink')->with('message','Data Inserted Successfully');

    }

    public function Edit($id){
        $data=Medialink::find($id);
        return view('backend.media.edit',['data'=>$data]);
    }

    public function Update(Request $request,$id){
        $data=Medialink::find($id);
        $data1=$request->except('_token');
        $data->update($data1);
        return redirect()->route('view.medialink')->with('message', 'Data Updated Successfully');
    }

    public function Delete($id){
        $data=Medialink::find($id);
        $data->delete();
        return redirect()->back()->with('message','Data Deleted Successfully');
    }
}
