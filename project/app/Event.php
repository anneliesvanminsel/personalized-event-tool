<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
	use SoftDeletes;
    //
	protected $fillable = [
		'image', 'title', 'description', 'category', 'published', 'prim-color', 'sec-color', 'tert-color', 'theme', 'shape',
		'schedule', 'starttime', 'endtime', 'address_id', 'username',
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

    public function users(){
        return $this->belongsToMany('App\User',
            'user_event',
            'event_id',
            'user_id')->withTimestamps();
    }

	public function tickets(){
		return $this->hasMany('App\Ticket');
	}

    public function floorplans(){
        return $this->hasMany('App\Floorplan');
    }

	public function messages(){
		return $this->hasMany('App\Message');
	}

	public function tasks(){
		return $this->hasMany('App\Task');
	}

    public function address(){
        return $this->morphMany('App\Address', 'address');
    }
}
