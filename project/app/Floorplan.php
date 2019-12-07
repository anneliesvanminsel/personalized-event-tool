<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Floorplan extends Model
{
	use SoftDeletes;
	//
	protected $fillable = [
		'title', 'afbeelding',
	];
}
