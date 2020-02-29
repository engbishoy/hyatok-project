<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\User;
class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user=User::where('id','!=',auth()->user()->id)->get();
        return view('admin.users.index')->with('user',$user);
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
        //
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
    public function edit()
    {
        //
        $user=User::find(auth()->user()->id);
        return view('website.users.editprofile')->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $request->validate([
            'name' => ['string', 'max:10'],
            'password' => ['nullable', 'string', 'min:8'],
            'phone' => ['required', 'min:11','max:11'],
            'photo' => ['nullable', 'image'],
        ]);
        

        $user=User::find(auth()->user()->id);
        $user->name=$request->name;
        if(!empty($request->password)){
            $user->password=Hash::make($request->password);
        }
        $user->phone=$request->phone;
        if(empty($request->file('photo'))){
            $photoname='1.png';
        }else{
            $photo=$request->photo;
            $photoname=time().'-'.$photo->getClientOriginalName();
            $photo->move(base_path().'/public/imges/img user/',$photoname);
        }
        $user->photo=$photoname;
        $user->save();

         return redirect()->back()->with('success','تم تعديل البيانات بنجاح');

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
        $user=User::find($id);
        $user->delete();
        return redirect()->back()->with('success','تم حذف المستخدم بنجاح');
    }

    public function makenormaluser($id)
    {
        //
        $user=User::find($id);
        $user->admin=0;
        $user->save();
        return redirect()->back()->with('success','تم تعديل صلاحيات المستخدم الى مستخدم عادى');

    }    

    public function makeadmin($id)
    {
        //
        $user=User::find($id);
        $user->admin=1;
        $user->save();
        return redirect()->back()->with('success','تم تعديل صلاحيات المستخدم الى ادمن');

    }   

    public function searchuser(Request $request)
    {
        //
        $user=User::where([
            ['name','like','%'.$request->name.'%'],
            ['id','!=',auth()->user()->id]
            ])->get();
        return view('admin.users.searchuser')->with('user',$user);

    }   


}
