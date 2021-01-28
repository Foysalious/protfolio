<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\newInfo;
use Auth;
use Carbon;

class newInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newInfos = newInfo::orderBy('id','desc')->get();
        return view();
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
        $newInfo = new newInfo();
        $newInfo->status = $request->newInfo;
        $newInfo->date = $request->date;
        $newInfo->title = $request->title;
        $newInfo->description = $request->description;
        $newInfo->creation_date = Carbon::now()->toDateTimeString();
        $newInfo->author_id = Auth::user()->id;
       
        
        
        $newInfo->logo = $request->logo;
        if( $request->image ){
            $image  = $request->file('image');
            $img    = rand(0, 100) . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $img);
            Image::make($image)->save($location);
            $newInfo->image = $img;
        }

      
        $newInfo->save();
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
    public function update(Request $request,newInfo $newInfo )
    {
        $newInfo->status = $request->status;
        $newInfo->date = $request->date;
        $newInfo->title = $request->title;
        $newInfo->description = $request->description;
        
        $newInfo->update_date = Carbon::now()->toDateTimeString();
        $newInfo->changer = Auth::user()->id;
      
        $newInfo->logo = $request->logo;
        

        if( $request->image ){
            if( File::exists('images/'. $newInfo->image) ){
                File::delete('images/'. $newInfo->image);
            }
            $image  = $request->file('image');
            $img    = rand(0, 100) . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $img);
            Image::make($image)->save($location);
            $newInfo->image = $img;
        }

        

        $newInfo->save();
        // Toastr::success('Personal Info');
        return redirect()->route('');
    }

    /** 
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
      $from=$request->from;
      $to=$request->to;
      $search=newInfo::orwhere('status', 'LIKE', "%$request->status%")->whereBetween('date', [$from, $to])->orwhere('title', 'LIKE', "%$request->title%");
        // return $search;
    return view('');
    }
}
