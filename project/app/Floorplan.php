<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Floorplan extends Model
{
	use SoftDeletes;
	//
	protected $fillable = [
		'title', 'afbeelding',
	];
}
