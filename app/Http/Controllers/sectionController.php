<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\categories;
use App\sections;
class sectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $section=sections::all();
        return view('admin.sections categories.allsection')->with('section',$section);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cat=categories::all();
        return view('admin.sections categories.addsection')->with('cat',$cat);
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
        $request->validate([
            'title' =>'required|max:200',
            'cat'=>'required'
        ]);
        $cat=new sections();
        $cat->title=$request->title;
        $cat->cat_id=$request->cat;
        $cat->save();
        return redirect()->back()->with('success','تم اضافة القسم بنجاح');

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
        $cat=categories::all();
        $section=sections::find($id);
        return view('admin.sections categories.editsection')->with('section',$section)->with('cat',$cat);
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
        //
        
        $request->validate([
            'title' =>'required|max:200',
            'cat'=>'required'
        ]);

        $section=sections::find($id);
        $section->title=$request->title;
        $section->cat_id=$request->cat;
        $section->save();
        return redirect()->back()->with('success','تم تعديل بيانات القسم بنجاح');
    
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
        $section=sections::find($id);
        $section->delete();
        return redirect()->back()->with('success','تم حذف القسم بنجاح');

    }
}
