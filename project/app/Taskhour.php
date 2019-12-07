<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Taskhour extends Model
{
	use SoftDeletes;
	//
	protected $fillable = [
		'starttime', 'endtime',
	];
}
