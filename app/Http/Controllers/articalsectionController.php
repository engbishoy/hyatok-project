<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\artical;
use App\sections;
class articalsectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     // search artical

     public function search(Request $request)
     {
         //
         $important_tsnef=sections::orderBy('created_at','desc')->take(7)->get();

         $allartical=artical::where('approve','=',1)->where('title','like','%'.$request->search.'%')->orWhere('questions','like','%'.$request->search.'%')->orWhere('content','like','%'.$request->search.'%')->paginate(30);
         return view('website.articals.search')->with('allartical',$allartical)->with('important_tsnef',$important_tsnef);
     }
  
  
  
     //all artical
    public function allartical()
    {
        //
        $important_tsnef=sections::orderBy('created_at','desc')->take(7)->get();

        $allartical=artical::where('approve','=',1)->orderBy('created_at','desc')->paginate(30);
        return view('website.articals.allartical')->with('allartical',$allartical)->with('important_tsnef',$important_tsnef);
    }

    // big views

    public function bigviews()
    {
        //
        $important_tsnef=sections::orderBy('created_at','desc')->take(7)->get();

        $bigviews=artical::where('approve','=',1)->orderBy('count_views','desc')->where('count_views','>',0)->paginate(30);
        return view('website.articals.bigviews')->with('bigviews',$bigviews)->with('important_tsnef',$important_tsnef);
    }

     //artical section
    public function index($id)
    {
        //
        $section=sections::find($id);
        $artical=artical::where('approve','=',1)->where('section_id','=',$id)->orderBy('created_at','desc')->paginate(30);
        $allartical=artical::where('approve','=',1)->orderBy('created_at','desc')->take(7)->get();
        return view('website.articals.index')->with('artical',$artical)->with('allartical',$allartical)->with('section',$section);
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
        return view('website.articals.create')->with('section',$section);
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

        $artical->save();
        return redirect()->back()->with('success',' شكرا لك تم اضافة المقال بنجاح وبانتظار موافقة الادمن للعرض');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,$title)
    {
        //
            //حساب عدد المشاهدات
            $plusview=artical::find($id);
            $plusview->count_views=$plusview->count_views +1;
            $plusview->save();
            //end  

        
        $artical=artical::find($id);

        $sla=artical::orderBy('created_at','asc')->where([
            ['section_id','=',$artical->section_id],
            ['id','!=',$artical->id]
            ])->take(6)->get();

        $lateastsla=artical::orderBy('created_at','desc')->where([
        ['section_id','=',$artical->section_id],
        ['id','!=',$artical->id]
        ])->take(6)->get();
        $important_tsnef=sections::orderBy('created_at','desc')->take(7)->get();
        return view('website.articals.show')->with('artical',$artical)->with('sla',$sla)->with('important',$important_tsnef)->with('lateastsla',$lateastsla);
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
    public function update(Request $request, $id)
    {
        //
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
