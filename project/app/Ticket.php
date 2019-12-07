<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
	use SoftDeletes;
	//
	protected $fillable = [
		'name', 'price', 'type', 'totaltickets',
	];
}
