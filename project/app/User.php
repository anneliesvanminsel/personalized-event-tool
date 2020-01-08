<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'birthday', 'phonenumber', 'role', 'organisation_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array

		protected $casts = [
			'email_verified_at' => 'datetime',
		];
	 *
	 */

	public function organisation() {
		return $this->belongsTo('App\Organisation', 'organisation_id');
	}

	public function groups(){
		return $this->belongsToMany('App\User',
			'user_group',
			'user_id',
			'group_id')->withTimestamps();
	}

	public function shifts(){
		return $this->belongsToMany('App\Shift',
			'user_shift',
			'user_id',
			'shift_id')->withTimestamps();
	}

	public function tickets(){
		return $this->belongsToMany('App\Ticket',
			'user_ticket',
			'user_id',
			'ticket_id')->withPivot('attendance')->withTimestamps();
	}

    public function address(){
        return $this->morphMany('App\Address', 'address');
    }
}
