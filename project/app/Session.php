<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    //
	protected $fillable = [
		'name', 'city', 'date', 'status', 'locationname', 'totaltickets', 'grondplan',
	];

	//TODO: link naar event, bericht, tickets, planning, taak, adres, etc.
}
