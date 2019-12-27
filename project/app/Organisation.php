<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Organisation extends Model
{
	use SoftDeletes;
	//
	protected $fillable = [
		'name', 'description', 'subscription_id', 'bkgcolor', 'textcolor', 'logo',
	];

	public function subscription() {
		return $this->belongsTo('App\Subscription', 'subscription_id');
	}

	public function events(){
		return $this->belongsToMany('App\Event',
			'organisation_event',
			'organisation_id',
			'event_id')->withTimestamps();
	}

	public function users(){
		return $this->hasMany('App\User');
	}
}
