<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\construction;
use Auth;
use Carbon;

class ConstructionController extends Controller
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
        $construction = new construction();
        $construction->status = $request->construction;
        $construction->category = $request->category;
        $construction->city = $request->city;
        $construction->facility = $request->facility;
        $construction->construction = $request->construction;
        $construction->place = $request->place;
        $construction->complete = $request->complete;
        $construction->size = $request->size;
        $construction->explanation = $request->explanation;
      
     

     
        if( $request->image ){
            $image  = $request->file('image');
            $img    = rand(0, 100) . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $img);
            Image::make($image)->save($location);
            $construction->image = $img;
        }

        if( $request->image1 ){
            $image  = $request->file('image1');
            $img    = rand(0, 100) . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $img);
            Image::make($image)->save($location);
            $construction->image1 = $img;
        }
        $construction->creation_date = Carbon::now()->toDateTimeString();
        $construction->author_id = Auth::user()->id;
        $construction->save();
        // Toastr::success('Personal Info');
        return redirect()->route('');
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
    public function update(Request $request, construction $construction)
    {
        $construction->status = $request->construction;
        $construction->category = $request->category;
        $construction->city = $request->city;
        $construction->facility = $request->facility;
        $construction->construction = $request->construction;
        $construction->place = $request->place;
        $construction->complete = $request->complete;
        $construction->size = $request->size;
        $construction->explanation = $request->explanation;
        $construction->update_date = Carbon::now()->toDateTimeString();
        $construction->changer = Auth::user()->id;

        if( $request->image1 ){
            if( File::exists('images/'. $construction->image1) ){
                File::delete('images/'. $construction->image1);
            }
            $image  = $request->file('image');
            $img    = rand(0, 100) . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $img);
            Image::make($image)->save($location);
            $construction->image1 = $img;
        }
        if( $request->image ){
            if( File::exists('images/'. $construction->image) ){
                File::delete('images/'. $construction->image);
            }
            $image  = $request->file('image');
            $img    = rand(0, 100) . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $img);
            Image::make($image)->save($location);
            $construction->image = $img;
        }
        $construction->save();
        // Toastr::success('Personal Info');
        return redirect()->route('');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(construction $construction)
    {
        $construction->delete();
        
        return redirect()->route('');
    }
}
