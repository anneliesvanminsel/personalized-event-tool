<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
	use SoftDeletes;
	//
	protected $fillable = [
		'title', 'description',
	];

	public function event(){
		return $this->belongsTo('App\Event', 'event_id');
	}

	public function taskhours(){
		return $this->hasMany('App\Taskhours');
	}
}
