<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class artical extends Model
{
    //
    protected $fillable=[
        'title','questions','content','photo','user_id','section_id'
    ];
    public function sections(){
        return $this->belongsTo('App\sections','section_id','id');
    }

    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }
}
