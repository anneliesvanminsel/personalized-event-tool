<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
	use SoftDeletes;
	//
	protected $fillable = [
		'street', 'streetnumber', 'box', 'postalcode', 'city',
	];

    public function address() {
        return $this->morphTo();
    }
}
