<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sections;
use App\artical;

class articalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $artical=artical::orderBy('updated_at','desc')->get();
        return view('admin.articals.allartical')->with('artical',$artical);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $section=sections::all();
        return view('admin.articals.addartical')->with('section',$section);
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
            'question'=>'nullable',
            'content'=>'required',
            'photo'=>'required|image',

        ]);
        $artical=new artical();
        $artical->title=$request->title;
        $artical->questions=$request->question;
        $artical->content=$request->content;
        $artical->section_id=$request->section;
        $artical->user_id=auth()->user()->id;


        $photo=$request->photo;
        $photoname=time().'-'.$photo->getClientOriginalName();
        $photo->move(base_path().'/public/imges/img artical/',$photoname);
        $artical->photo=$photoname;

        $artical->approve=1;
        $artical->save();
        return redirect()->back()->with('success','تم اضافة المقال بنجاح');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artical=artical::find($id);
        return view('admin.articals.showartical')->with('artical',$artical);
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
        $artical=artical::find($id);
        $section=sections::all();
        return view('admin.articals.editartical')->with('artical',$artical)->with('section',$section);
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
            'question'=>'nullable',
            'content'=>'required',
            'photo'=>'nullable|image',

        ]);
        $artical=artical::find($id);
        $artical->title=$request->title;
        $artical->questions=$request->question;
        $artical->content=$request->content;
        $artical->section_id=$request->section;
        if($request->photo){
        $photo=$request->photo;
        $photoname=time().'-'.$photo->getClientOriginalName();
        $photo->move(base_path().'/public/imges/img artical/',$photoname);
        $artical->photo=$photoname;
        }
        $artical->save();
        return redirect()->back()->with('success','تم تعديل المقال بنجاح');
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
        $artical=artical::find($id);
        $artical->delete();
        return redirect()->back()->with('success','تم حذف المقال بنجاح');

    }

    public function search(Request $request)
    {
        //
        $artical=artical::where('title','like','%'.$request->search_title.'%')->get();
        return view('admin.articals.searchartical')->with('artical',$artical);
    }

    public function approve($id)
    {
        //
        $artical=artical::find($id);
        $artical->approve=1;
        $artical->save();

        return redirect()->back()->with('success','تم الموافقة على المقال بنجاح وجاهز للعرض');

    }


    
    public function pedding()
    {
        //
        $artical=artical::where('approve','=',0)->get();
        return view('admin.articals.peddingartical')->with('artical',$artical);

    }
}
