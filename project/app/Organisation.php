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
		return $this->hasMany('App\Event');
	}

	public function users(){
		return $this->hasMany('App\User');
	}

    public function address(){
        return $this->morphMany('App\Address', 'address');
    }
}
