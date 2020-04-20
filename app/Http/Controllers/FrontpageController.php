<?php

namespace App\Http\Controllers;
use App\Frontpage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Session;

class FrontpageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $frontpage = Frontpage::all();
        return view('pages.backend.frontpage.frontpageIndex')->with('data',$frontpage);
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
        $image = $request->image->store('img');
        $frontpage = Frontpage::create([
            'image' => $image,
            'title' => $request->title,
            'desc' => $request->desc,
        ]);

        Session::flash('success','Created Successfully');

        return redirect(route('frontpage.index'));
        
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
    public function update(Request $request, Frontpage $frontpage)
    {
        if($request->hasFile('image')){
            $image = $request->image->store('img');
            $frontpage->deleteImage();
            $frontpage->image = $image;
        }

        $frontpage->title = $request->title;
        $frontpage->desc = $request->desc;
        $frontpage->save();
        Session::flash('success','Website Updated Successfully');
        return redirect(route('frontpage.index'));
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
