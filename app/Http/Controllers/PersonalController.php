<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\personal;
use File;
use Intervention\Image\Facades\Image;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personals = personal::orderBy('id','asc')->get();
        return view('backend.pages.personal.manage',compact('personals'));
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
        

        $personal = new personal();
        $personal->title=$request->title;
        $personal->description=$request->description;
        $personal->name=$request->name;
        $personal->job=$request->job;
        $personal->phone=$request->phone;
        $personal->birthday=$request->birthday;
        $personal->email=$request->email;
        $personal->location=$request->location;
        $personal->link=$request->link;
        
       
        if( $request->image ){
            $image  = $request->file('image');
            $img    = rand(0, 100). '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $img);
            Image::make($image)->save($location);
            $personal->image = $img;
        }
        $personal->save();


        return redirect()->route('personalShow');
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
    public function update(Request $request, personal $personal)
    {
        $personal->title=$request->title;
        $personal->description=$request->description;
        $personal->name=$request->name;
        $personal->job=$request->job;
        $personal->phone=$request->phone;
        $personal->birthday=$request->birthday;
        $personal->email=$request->email;
        $personal->location=$request->location;
        $personal->link=$request->link;
        if( $request->image ){
            if( File::exists('images/'. $personal->image) ){
                File::delete('images/'. $personal->image);
            }
            $image  = $request->file('image');
            $img    = time() .Str::random(12). '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $img);
            Image::make($image)->save($location);
            $personal->image = $img;
        }
        $personal->save();
        
        return redirect()->route('personalShow');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(personal $personal)
    {
        if( File::exists('images/'. $personal->image) ){
            File::delete('images/'. $personal->image);
        }
        $personal->delete();
    
        return redirect()->route('personalShow');
    }
}
