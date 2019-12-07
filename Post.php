<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
		protected $fillable =[ "description","category","user_id","time1","time2","status","price","price2","title","price_time"];
}
