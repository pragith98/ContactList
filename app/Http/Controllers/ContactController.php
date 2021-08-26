<?php

namespace App\Http\Controllers;

use App\Models\contact;
use Facade\FlareClient\Stacktrace\File;
use FFI;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function addcontact(Request $request){
        $this->validate($request,['name'=>'required|max:20|min:3','tp'=>'required|numeric|digits:10','address'=>'required|max:20|min:5']);


        $contact=new contact();

        $contact->name=$request->name;
        $contact->tp=$request->tp;
        $contact->address=$request->address;
        
        if($request->hasFile('photo')){
            $file=$request->file('photo');
            $extention= $file->getClientOriginalExtension();
            $filename=time().'.'.$extention;
            $file->move('uploads/photos/',$filename);
            $contact->photo=$filename;
            
        }
            
        $contact->save();

        return redirect()->back();
    }


    public function deletecontact($id){
        $contact=contact::find($id);


        $file=$contact->photo;
        if($file != "default.png"){
            $filepath=public_path('uploads/photos/'.$file);
            unlink($filepath);
        }

        $contact->delete();
        return redirect()->back();
        
    }


    public function updatecontactview($id){
        $contact=contact::find($id);
        return view('updatecontactview')->with('contactdata',$contact);
    }


    public function updatecontact(Request $request){
        
        $this->validate($request,['name'=>'required|max:20|min:3','tp'=>'required|numeric|digits:10','address'=>'required|max:20|min:5']);


        $id=$request->id;
        $name=$request->name;
        $tp=$request->tp;
        $address=$request->address;


        $contactdata=contact::find($id);

        $contactdata->name=$name;
        $contactdata->tp=$tp;
        $contactdata->address=$address;



        if($request->hasFile('photo')){

            $file=$contactdata->photo;
            if($file != "default.png"){
                $filepath=public_path('uploads/photos/'.$file);
                unlink($filepath);
            }

            $file=$request->file('photo');
            $extention= $file->getClientOriginalExtension();
            $filename=time().'.'.$extention;
            $file->move('uploads/photos/',$filename);
            $contactdata->photo=$filename;
            
        }




        $contactdata->save();

        return redirect('/contactview');



    }
}
