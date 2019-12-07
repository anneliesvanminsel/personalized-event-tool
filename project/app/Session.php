<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Session extends Model
{
	use SoftDeletes;
    //
	protected $fillable = [
		'name', 'city', 'date', 'status', 'locationname', 'totaltickets', 'grondplan',
	];

	//TODO: link naar event, bericht, tickets, planning, taak, adres, etc.
}
