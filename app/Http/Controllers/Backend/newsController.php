<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\news;
use Auth;
use Carbon;

class newsController extends Controller
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
        $news = new news();
        $news->status = $request->status;
        $news->date = $request->date;
        $news->title = $request->title;
        $news->description = $request->description;
        $news->creation_date = Carbon::now()->toDateTimeString();
        $news->author_id = Auth::user()->id;
       
        
        
        $news->logo = $request->logo;
        if( $request->image ){
            $image  = $request->file('image');
            $img    = rand(0, 100) . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $img);
            Image::make($image)->save($location);
            $news->image = $img;
        }

      
        $news->save();
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
    public function update(Request $request, news $news)
    {
        $news->status = $request->status;
        $news->date = $request->date;
        $news->title = $request->title;
        $news->description = $request->description;
        
        $news->update_date = Carbon::now()->toDateTimeString();
        $news->changer = Auth::user()->id;
      
        $news->logo = $request->logo;
        

        if( $request->image ){
            if( File::exists('images/'. $news->image) ){
                File::delete('images/'. $news->image);
            }
            $image  = $request->file('image');
            $img    = rand(0, 100) . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $img);
            Image::make($image)->save($location);
            $news->image = $img;
        }

        

        $news->save();
        // Toastr::success('Personal Info');
        return redirect()->route('');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(news $news)
    {
        $news->delete();
        
        return redirect()->route('');
    }
}
