<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SaleItems extends Model
{
	use SoftDeletes;
    //
	protected $fillable = [
		'name', 'description', 'price', 'image',
	];

	public function sessions(){
		return $this->belongsToMany('App\Session',
			'session_saleitems',
			'session_id',
			'saleitem_id')->withTimestamps();
	}
}
