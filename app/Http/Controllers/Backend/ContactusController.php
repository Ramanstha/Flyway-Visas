<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contactus;;

class ContactusController extends Controller
{
    public function View(){
        $file=Contactus::orderby('id','desc')->get();
        return view('backend.contact.view',['file'=>$file]);
    }

    public function contact(){
        return view('backend.contact.create');
    }

    public function Store(ContactRequest $request){

        $data=$request->except('_token');
        $data=Contactus::insert($data);
        return redirect()->route('view.contact')->with('message','Data Inserted Successfully');

    }

    public function Edit($id){
        $data=Contactus::find($id);
        return view('backend.contact.edit',['data'=>$data]);
    }

    public function Update(Request $request,$id){
        $data=Contactus::find($id);
        $data1=$request->except('_token');
        $data->update($data1);
        return redirect()->route('view.contact')->with('message', 'Data Updated Successfully');
    }

    public function Delete($id){
        $data=Contactus::find($id);
        $data->delete();
        return redirect()->back()->with('message','Data Deleted Successfully');
    }

    public function viewUserMessage($id){
        $userMessage=Usercontactus::findOrfail($id);
        return view('backend.contact.user_contact_detail',['userMessage'=>$userMessage]);
    }

    public function viewUserContactMessage(){
        $userContactMessage=Usercontactus::orderby('id','desc')->get();
        return view('backend.contact.user_contact',['userContactMessage'=>$userContactMessage]);
    }

    public function userMessageDelete($id){
        $userMessageDelete=Usercontactus::find($id);
        $userMessageDelete->delete();
        return redirect()->back()->with('message','Data Deleted Successfully');
    }
}
