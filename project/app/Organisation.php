<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Organisation extends Model
{
	use SoftDeletes;
	//
	protected $fillable = [
		'name', 'subscription_id',
	];

	public function subscription() {
		return $this->belongsTo('App\Subscription', 'subscription_id');
	}

	public function events(){
		return $this->belongsToMany('App\Event',
			'organisation_event',
			'event_id',
			'organisation_id')->withTimestamps();
	}
}
