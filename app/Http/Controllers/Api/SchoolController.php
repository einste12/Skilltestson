<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $school = School::all();
        return response()->json($school);
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
        $email = $request->email;
        $logo = $request->logo;

        $input['name'] =$name;
        $input['email'] =$email;
        $input['logo'] =$logo;

        $rules=array(
            'name'=>'required',
            'email'=>'required|email',
            'logo'=>'required|dimensions:max_width=800,max_height=800',
        );


        $messages=array(
            'name.required'=>'İsim Alanı Zorunludur',
            'email.required'=>'Mail Alanı Zorunludur.',
            'email.email'=>'Bu e-posta formatı yanlış',
            'logo.required'=>'Logo Boş geçilemez',
            'logo.dimensions'=>'Boyutları lütfen  100 * 100 giriniz!'
        );

        $validate=Validator::make($input,$rules,$messages);
        if($validate->fails())
        {
            return response()->json(['status'=>400,'message'=>$validate->errors()]);
        }
        else
        {

            $app_logo=uniqid().".jpg";
            $application=new School();
            $application->name=$input["name"];
            $application->email=$input["email"];
            $application->logo=$app_logo;
            $image_path=storage_path("app/school_images/".$app_logo);
            Image::make($input["logo"])->resize(100, 100)->save($image_path);
            $application->save();

            return response()->json(['status'=>201,'message'=>'Okul Başarı İle Eklendi']);
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
