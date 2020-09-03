<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	public function category(){

		return $this->belongsTo('App\Model\Category', 'category_id');
	}
	public function user(){

		return $this->belongsTo('App\User', 'user_id');
	}    
}
