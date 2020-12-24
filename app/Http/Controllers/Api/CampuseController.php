<?php

namespace App\Http\Controllers\Api;

use App\Campuses;
use App\Http\Controllers\Controller;
use App\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class CampuseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $compuses = Campuses::all();
        return response()->json($compuses);




    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $name = $request->name;
        $school_id = $request->school_id;
        $email = $request->email;
        $phone = $request->phone;
        $address = $request->address;


        $input['name'] =$name;
        $input['school_id'] =$school_id;
        $input['email'] =$email;
        $input['phone'] =$phone;
        $input['address'] =$address;

        $rules=array(
            'name'=>'required',
            'school_id'=>'required',
            'email'=>'required|email',
        );


        $messages=array(
            'name.required'=>'İsim Alanı Zorunludur',
            'school_id.required'=>'Okul Seçilmesi Gereklidir',
            'email.required' => 'E-posta Girilmesi Gereklidir',
            'email.email'=>'Bu e-posta formatı yanlış',
        );

        $validate=Validator::make($input,$rules,$messages);
        if($validate->fails())
        {
            return response()->json(['status'=>400,'message'=>$validate->errors()]);
        }
        else
        {

            $campuse=new Campuses();
            $campuse->name=$input["name"];
            $campuse->school_id=$input["school_id"];
            $campuse->email=$input["email"];
            $campuse->phone=$input["phone"];
            $campuse->address=$input["address"];
            $campuse->save();


            $school_email = School::where('id',$input['school_id'])->first()->email;
            $school_name = School::where('id',$input['school_id'])->first()->name;



            $data = array('success_message'=>"Bu Okula Kampüs Eklendi.",
                          'school_name' => $school_name
                );
            Mail::send('mail.addschoolmailtocampuse', $data, function($message) use($school_email) {
                $message->to($school_email, 'Yeni Kampüs Eklendi');
            });


            return response()->json(['status'=>201,'message'=>'Kampüs Başarı ile Eklendi']);
        }







    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
