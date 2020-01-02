<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Floorplan extends Model
{
	use SoftDeletes;
	//
	protected $fillable = [
		'title', 'image', 'event_id',
	];

	public function event(){
		return $this->belongsTo('App\Event', 'event_id')->withTimestamps();
	}
}
