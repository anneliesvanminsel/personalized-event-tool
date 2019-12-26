<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Session extends Model
{
	use SoftDeletes;
    //
	protected $fillable = [
		'date', 'status', 'event_id',
	];

	public function event(){
		return $this->belongsTo('App\Event', 'event_id');
	}

	public function schedules(){
		return $this->hasMany('App\Schedule');
	}

	public function tasks(){
		return $this->hasMany('App\Task');
	}
}
