<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscription extends Model
{
	use SoftDeletes;
	//
	protected $fillable = [
		'title', 'description', 'price', 'items',
	];

	public function organisations(){
		return $this->hasMany('App\Organisation');
	}
}
