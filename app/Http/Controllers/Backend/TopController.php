<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Top;
use Auth;
use Carbon;

class TopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
        $top = new Top();
        $top->status = $request->status;
        $top->date = $request->date;
        $top->title = $request->title;
        $top->description = $request->description;
        $top->creation_date = Carbon::now()->toDateTimeString();
        $top->author_id = Auth::user()->id;
       
        
        
        $top->logo = $request->logo;
        if( $request->image ){
            $image  = $request->file('image');
            $img    = rand(0, 100) . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $img);
            Image::make($image)->save($location);
            $top->image = $img;
        }

      
        $top->save();
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
    public function update(Request $request, Top $top)
    {
        $top->status = $request->status;
        $top->date = $request->date;
        $top->title = $request->title;
        $top->description = $request->description;
        
        $top->update_date = Carbon::now()->toDateTimeString();
        $top->changer = Auth::user()->id;
      
        $top->logo = $request->logo;
        

        if( $request->image ){
            if( File::exists('images/'. $top->image) ){
                File::delete('images/'. $top->image);
            }
            $image  = $request->file('image');
            $img    = rand(0, 100) . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $img);
            Image::make($image)->save($location);
            $top->image = $img;
        }

        

        $top->save();
        // Toastr::success('Personal Info');
        return redirect()->route('');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
