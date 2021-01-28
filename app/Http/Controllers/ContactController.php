<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contacts;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = contacts::orderBy('id','desc')->get();
        return view('backend.pages.contact.manage',compact('contacts'));
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
        $contact = new contacts();
        $contact->address=$request->address;
        $contact->contact=$request->contact;
        $contact->email=$request->email;
        $contact->facebook=$request->facebook;
        $contact->instagram=$request->instagram;
        $contact->linkedin=$request->linkedin;
        $contact->github=$request->github;
        $contact->youtube=$request->youtube;
       
        $contact->save();


        return redirect()->route('contactShow');
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
    public function update(Request $request, contacts $contact)
    {
        $contact->address=$request->address;
        $contact->contact=$request->contact;
        $contact->email=$request->email;
        $contact->facebook=$request->facebook;
        $contact->instagram=$request->instagram;
        $contact->linkedin=$request->linkedin;
        $contact->github=$request->github;
        $contact->youtube=$request->youtube;
        $contact->save();


        return redirect()->route('contactShow');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(contacts $contact)
    {
        $contact->delete();
   
        return redirect()->route('contactShow');
    }
}
