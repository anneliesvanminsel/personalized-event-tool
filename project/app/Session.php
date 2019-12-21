<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Session extends Model
{
	use SoftDeletes;
    //
	protected $fillable = [
		'name', 'city', 'date', 'status', 'locationname', 'totaltickets', 'event_id',
	];

	//TODO: link adres
	public function event(){
		return $this->belongsTo('App\Event', 'event_id');
	}

	public function messages(){
		return $this->hasMany('App\Message');
	}

	public function tasks(){
		return $this->hasMany('App\Task');
	}

	public function floorplans(){
		return $this->belongsToMany('App\Floorplan',
			'session_floorplan',
			'floorplan_id',
			'session_id')->withTimestamps();
	}

	public function saleitems(){
		return $this->belongsToMany('App\SaleItems',
			'session_saleitems',
			'saleitem_id',
			'session_id')->withTimestamps();
	}

	public function schedules(){
		return $this->belongsToMany('App\Schedule',
			'session_schedule',
			'schedule_id',
			'session_id')->withTimestamps();
	}
}
