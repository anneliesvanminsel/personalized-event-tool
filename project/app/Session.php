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

	//TODO: link tickets, planning, taak, adres, etc.
	public function event(){
		return $this->belongsTo('App\Event', 'event_id');
	}

	public function messages(){
		return $this->hasMany('App\Message');
	}

	public function tickets(){
		return $this->hasMany('App\Ticket');
	}

	public function tasks(){
		return $this->hasMany('App\Task');
	}

	public function floorplans(){
		return $this->belongsToMany('App\Floorplan',
			'session_floorplan',
			'session_id',
			'floorplan_id')->withTimestamps();
	}

	public function saleitems(){
		return $this->belongsToMany('App\SaleItems',
			'session_saleitems',
			'session_id',
			'saleitem_id')->withTimestamps();
	}

	public function schedules(){
		return $this->belongsToMany('App\Schedule',
			'session_schedules',
			'session_id',
			'schedule_id')->withTimestamps();
	}
}
