<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
  	protected $table = "cates";

  	protected $fillable = 
  	[
  		'name','alias','latitude','longitude','zoom'
  	];
  	public function Place()
  	{
  		return $this->hasMany('App\Place','cate_id','id');
  	}
}
