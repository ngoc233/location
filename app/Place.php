<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $table = 'places',
    $fillable = 
    [
    	'name','alias','image','latitude','longitude','description','cate_id','type_id'
    ];
    public function Cate()
  	{
  		return $this->belongsTo('App\Cate','cate_id','id');
  	}
  	public function Type()
  	{
  		return $this->belongsTo('App\Type','type_id','id');
  	}
}
