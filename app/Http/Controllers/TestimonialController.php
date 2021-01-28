<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\testimonial;
use File;
use Intervention\Image\Facades\Image;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = testimonial::orderBy('id','asc')->get();
        return view('backend.pages.testimonial.manage',compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $testimonial = new testimonial();
        $testimonial->name=$request->name;
        $testimonial->speech=$request->speech;
        $testimonial->designation=$request->designation;
        
       
        if( $request->image ){
            $image  = $request->file('image');
            $img    = rand(0, 100). '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $img);
            Image::make($image)->save($location);
            $testimonial->image = $img;
        }
        $testimonial->save();


        return redirect()->route('testimonialShow');
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
    public function update(Request $request, testimonial $testimonial)
    {
        $testimonial->name=$request->name;
        $testimonial->speech=$request->speech;
        $testimonial->designation=$request->designation;

        if( $request->image ){
            if( File::exists('images/'. $testimonial->image) ){
                File::delete('images/'. $testimonial->image);
            }
            $image  = $request->file('image');
            $img    = time() .Str::random(12). '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $img);
            Image::make($image)->save($location);
            $testimonial->image = $img;
        }

        $testimonial->save();
        
        return redirect()->route('testimonialShow');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(testimonial $testimonial)
    {
        if( File::exists('images/'. $testimonial->image) ){
            File::delete('images/'. $testimonial->image);
        }
        $testimonial->delete();
    
        return redirect()->route('testimonialShow');
    }
}
