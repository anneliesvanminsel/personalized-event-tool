<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
	use SoftDeletes;
    //
	protected $fillable = [
		'title', 'description', 'type', 'status', 'bkgcolor', 'textcolor', 'logo',
	];

	public function session(){
		return $this->hasMany('App\Session');
	}

	public function organisations(){
		return $this->belongsToMany('App\Organisation',
			'organisation_event',
			'organisation_id',
			'event_id')->withTimestamps();
	}
}
