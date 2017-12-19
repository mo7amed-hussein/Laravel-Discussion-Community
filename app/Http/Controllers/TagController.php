<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use Session;
class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tags = Tag::orderBy('name','asc')->paginate(10);
        return view('tags.index')->with('tags',$tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,['name'=>'required|max:255|unique:tags']);
        $tag = new Tag;
        $tag->name=$request->name;
        $tag->save();
        Session::flash("success","tag added successfully");
        return redirect()->route('tags.index');
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
        $tag =Tag::find($id);
        return view('tags.show')->with('tag',$tag);

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
        $tag =Tag::find($id);
        return view('tags.edit')->with('tag',$tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $tag =Tag::find($id);
        if($tag->name != $request->name)
        {
            $this->validate($request,['name'=>'required|max:255|unique:tags']);
            $tag->name=$request->name;
            $tag->save();
            Session::flash("success","tag updated successfully");
        }
        return redirect()->route('tags.show',$id);
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
        $tag =Tag::find($id);
        $tag->questions()->detach();
        $tag->delete();
        Session::flash("success","tag deleted successfully");
        return redirect()->route('tags.index');
    }
}
