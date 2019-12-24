<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
	use SoftDeletes;
	//
	protected $fillable = [
		'title', 'message', 'type', 'image', 'event_id',
	];

	public function event(){
		return $this->belongsTo('App\Event', 'event_id');
	}
}
