<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
	use SoftDeletes;
	//
	protected $fillable = [
		'name', 'price', 'type', 'totaltickets', 'date', 'event_id', 'description',
	];

	public function event(){
		return $this->belongsTo('App\Event', 'event_id');
	}
}
