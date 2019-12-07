<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
	use SoftDeletes;
	//
	protected $fillable = [
		'title', 'message', 'type', 'image', 'session_id',
	];

	public function session(){
		return $this->belongsTo('App\Session', 'session_id');
	}
}
