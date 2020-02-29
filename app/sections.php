<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sections extends Model
{
    //
    protected $fillable=[
        'title','cat_id'
    ];
    public function categories(){
        return $this->belongsTo('App\categories','cat_id','id');
    }

    public function artical(){
        return $this->hasMany('App\artical','cat_id','id');
    }
}
