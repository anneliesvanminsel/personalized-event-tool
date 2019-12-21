<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
	use SoftDeletes;
	//
	protected $fillable = [
		'title', 'description', 'starttime', 'endtime', 'location',
	];

	public function sessions(){
		return $this->belongsToMany('App\Session',
			'session_schedules',
			'session_id',
			'schedule_id')->withTimestamps();
	}
}
