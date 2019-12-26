<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
	use SoftDeletes;
    //
	protected $fillable = [
		'title', 'description', 'type', 'status', 'bkgcolor', 'textcolor', 'logo', 'starttime', 'endtime', 'address_id',
	];

	public function sessions(){
		return $this->hasMany('App\Session');
	}

	public function organisations(){
		return $this->belongsToMany('App\Organisation',
			'organisation_event',
			'event_id',
			'organisation_id')->withTimestamps();
	}

	public function tickets(){
		return $this->hasMany('App\Ticket');
	}

	public function messages(){
		return $this->hasMany('App\Message');
	}

	public function tasks(){
		return $this->hasMany('App\Task');
	}
}
