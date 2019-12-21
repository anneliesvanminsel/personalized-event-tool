<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
	use SoftDeletes;
	//
	protected $fillable = [
		'name', 'price', 'type', 'totaltickets', 'date','event_id',
	];

	protected $dateFormat = 'dd/mm/yyyy';

	protected $casts = [
		'created_at' => 'datetime:d-m-y',
		'date' => 'datetime:d-m-y',
	];

	public function session(){
		return $this->belongsTo('App\Event', 'event_id');
	}
}
