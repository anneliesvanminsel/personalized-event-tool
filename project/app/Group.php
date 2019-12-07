<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
	use SoftDeletes;
	//
	protected $fillable = [
		'name',
	];

	public function users(){
		return $this->belongsToMany('App\User',
			'user_group',
			'user_id',
			'group_id')->withTimestamps();
	}
}
