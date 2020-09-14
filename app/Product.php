<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
//    public function getCotegory()
//    {
//        return Cat::find($this->category_id);
//    }

    public function category(){
        return $this->belongsTo(Cat::class,'category_id','id');
    }

    public function getAllcount(){
        if (!is_null($this->pivot)){
        return $this->price * $this->pivot->count;
        }
        return $this->price;
    }


}
