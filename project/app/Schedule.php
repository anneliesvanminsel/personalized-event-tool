<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
	use SoftDeletes;
	//
	protected $fillable = [
		'title', 'description', 'starttime', 'endtime', 'location', 'image', 'session_id',
	];

	public function sessions(){
		return $this->belongsTo('App\Session',
			'session_id')->withTimestamps();
	}
}
