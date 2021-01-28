<?php

namespace App\Http\Controllers;

use App\Models\experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $experiences = experience::orderBy('id','desc')->get();
        return view('backend.pages.experience.manage',compact('experiences'));
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
        $experience= new experience;

        $experience->comp_name = $request->comp_name;
        $experience->date = $request->date;
        $experience->details = $request->details;
        $experience->save();
        

        return redirect()->route('expericeShow');
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
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(experience $experience,Request $request )
    {
        
        $experience->comp_name = $request->comp_name;
        $experience->date = $request->date;
        $experience->details = $request->details;
        $experience->save();
        

        return redirect()->route('expericeShow');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(experience $experience)
    {
        $experience->delete();
   
        return redirect()->route('expericeShow');
    }
}
