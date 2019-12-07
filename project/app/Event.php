<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
	use SoftDeletes;
    //
	protected $fillable = [
		'title', 'description', 'type', 'status',
	];
}
