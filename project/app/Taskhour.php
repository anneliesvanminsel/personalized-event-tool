<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Taskhour extends Model
{
	use SoftDeletes;
	//
	protected $fillable = [
		'starttime', 'endtime', 'task_id'
	];

	public function task(){
		return $this->belongsTo('App\Task', 'task_id');
	}

	public function workers(){
		return $this->belongsToMany('App\User',
			'user_hour',
			'hour_id',
			'user_id')->withTimestamps();
	}
}
