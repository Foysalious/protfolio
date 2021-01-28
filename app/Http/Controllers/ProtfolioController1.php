<?php


namespace App\Http\Controllers;

use App\Models\protfolio;
use Illuminate\Http\Request;
use file;
use image;


class menuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $protfolios = protfolio::orderBy('id','asc')->get();
        return view('backend.pages.protfolio.manage',compact('protfolios'));
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
        $protfolio = new protfolio();
        $protfolio->name=$request->name;
        $protfolio->link=$request->link;
        
       
        if( $request->image ){
            $image  = $request->file('image');
            $img    = time() .Str::random(12). '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $img);
            Image::make($image)->save($location);
            $protfolio->image = $img;
        }
        $protfolio->save();


        return redirect()->route('protfolioShow');
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
    public function update(protfolio $protfolio,Request $request)
    {
        $protfolio->name=$request->name;
        $protfolio->link=$request->link;

        if( $request->image ){
            if( File::exists('images/'. $protfolio->image) ){
                File::delete('images/menu/'. $protfolio->image);
            }
            $image  = $request->file('image');
            $img    = time() .Str::random(12). '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $img);
            Image::make($image)->save($location);
            $protfolio->image = $img;
        }

        $menu->save();
        
        return redirect()->route('protfolioShow');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(protfolio $protfolio)
    {
        if( File::exists('images/'. $protfolio->image) ){
            File::delete('images/'. $protfolio->image);
        }
        $protfolio->delete();
        Toastr::error('protfolio Deleted');
        return redirect()->route('protfolioShow');
    }
}