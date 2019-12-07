<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
	use SoftDeletes;
	//
	protected $fillable = [
		'title', 'message', 'type', 'afbeelding',
	];
}
