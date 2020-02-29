<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    //
    protected $fillable=[
        'title','photo'
    ];

    public function categories(){
        return $this->hasMany('App\sections');
    }

}
