<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
	use SoftDeletes;
	//
	protected $fillable = [
		'locationname', 'street', 'streetnumber', 'box', 'postalcode', 'city', 'region', 'country', 'googleframe',
	];

    public function address() {
        return $this->morphTo();
    }
}
