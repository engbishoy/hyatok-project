<?php

use App\categories;
use App\sections;
use App\User;
use App\artical;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// admin


Route::group(['prefix' => '/admins','middleware'=>'admin'], function () {

    Route::get('/',function(){
        
        $section=sections::all();
        $users=User::all();
        $artical=artical::all();
        $pedding=artical::where('approve','=',0)->get();
            return view('admin.dashboard')->with('section',$section)->with('users',$users)->with('artical',$artical)->with('pedding',$pedding);
        });
        
    //categories
    route::get('/addcat','categoryController@create')->name('addcat');
    route::post('/storecategory','categoryController@store')->name('storecategory');

    route::get('/allcategory','categoryController@index')->name('allcat');
    
    route::get('/editcategory/{id}','categoryController@edit')->name('editcat');
    route::put('/updatecategory/{id}','categoryController@update')->name('updatecat');

    route::delete('/deletecategory/{id}','categoryController@destroy')->name('deletecat');

    //end

    //sections category
    route::get('/addsection','sectionController@create')->name('addsection');
    route::post('/storesection','sectionController@store')->name('storesection');

    route::get('/allsection','sectionController@index')->name('allsection');
    
    route::get('/editsection/{id}','sectionController@edit')->name('editsection');
    route::put('/updatesection/{id}','sectionController@update')->name('updatesection');

    route::delete('/deletesection/{id}','sectionController@destroy')->name('deletesection');


    // articals

    route::get('/addartical','articalController@create')->name('addartical');
    route::post('/storeartical','articalController@store')->name('storeartical');

    route::get('/allartical','articalController@index')->name('allartical');

    //show artical
    route::get('/showartical/{id}','articalController@show')->name('showartical');

    route::get('/editartical/{id}','articalController@edit')->name('editartical');
    route::put('/updateartical/{id}','articalController@update')->name('updateartical');


    //delete artical
    route::delete('/deleteartical/{id}','articalController@destroy')->name('deleteartical');


    //approve
    route::put('/approveartical/{id}','articalController@approve')->name('approveartical');


    // all artical pedding
    route::get('/pedding artical','articalController@pedding')->name('peddingartical');


    // search artical
    route::get('/search artical','articalController@search')->name('searchartical');




    // users
    route::get('/alluser','userController@index')->name('alluser');
    route::delete('/deleteuser/{id}','userController@destroy')->name('deleteuser');

    //search user
    route::get('/searchuser','userController@searchuser')->name('searchuser');
    //make admin
    route::get('/makeadmin/{id}','userController@makeadmin')->name('makeadmin');
    //make normal user
    route::get('/makenormaluser/{id}','userController@makenormaluser')->name('makenormaluser');


});


//end admin




// site


Route::group(['prefix' => '/'], function () {
    Route::get('/', function () {
        $cat=categories::orderBy('created_at','desc')->get();
        $section=sections::orderBy('created_at','desc')->get();
        $artical=artical::orderBy('created_at','desc')->where('approve','=',1)->take(5)->get();
        return view('index')->with('cat',$cat)->with('section',$section)->with('artical',$artical);
    })->name('home');
    
    //about us
    route::get('/about us',function(){
        return view('website.aboutus');
    })->name('aboutus');


    //سياسة الاستخدام
    route::get('/سياسة الاستخدام',function(){
        return view('website.siasa');
    })->name('siasa');

    //اتفاقية الاستخدام

    route::get('/اتفاقية الاستخدام',function(){
        return view('website.acceptuse');
    })->name('acceptuse');

    // اتصل بنا
    
    route::get('/اتصل بنا','contactController@create')->name('contactus');
    route::post('/contact','contactController@store')->name('contact');




    //جميع مقالات القسم الفرعي
    route::get('/articalsection/{id}/{name}','articalsectionController@index')->name('articalsection');    
    
    //اظهار المقال 
    route::get('/showarticalsection/{id}/{title}','articalsectionController@show')->name('showarticalsection');
    
    // احدث المواضيع
    route::get('/احدث المواضيع','articalsectionController@allartical')->name('newartical');

    
    // الاكثر مشاهدة
    route::get('/اكتر المواضيع مشاهدة','articalsectionController@bigviews')->name('bigviews');


    //search artical
    route::get('/نتايج البحث','articalsectionController@search')->name('searchartical');
     
    // اكتب موضوعك 
    route::get('/اكتب موضوعك','articalsectionController@create')->name('createartical')->middleware('auth');
    route::post('/save artical','articalsectionController@store')->name('saveartical')->middleware('auth');


    //my profile
    route::get('/my profile','userController@edit')->name('myprofile')->middleware('auth');
    route::put('/update profile','userController@update')->name('updateprofile')->middleware('auth');

});




Auth::routes();
