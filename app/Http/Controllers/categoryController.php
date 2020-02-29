<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\categories;
class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cat=categories::orderBy('updated_at','desc')->get();
        return view('admin.categories.allcategory')->with('cat',$cat);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.categories.addcategory');
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
        ]);
        $cat=new categories();
        $cat->title=$request->title;
        $photo=$request->photo_category;
  
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
        $cat=categories::find($id);
        return view('admin.categories.editcategory')->with('cat',$cat);
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
        ]);

        $cat=categories::find($id);
        $cat->title=$request->title;

        $cat->save();
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
        $cat=categories::find($id);
        $cat->delete();
        return redirect()->back()->with('success','تم حذف القسم بنجاح');
    }
}
