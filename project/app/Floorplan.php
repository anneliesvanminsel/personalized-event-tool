<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Floorplan extends Model
{
	use SoftDeletes;
	//
	protected $fillable = [
		'title', 'afbeelding',
	];

	public function sessions(){
		return $this->belongsToMany('App\Session',
			'session_floorplan',
			'session_id',
			'floorplan_id')->withTimestamps();
	}
}
