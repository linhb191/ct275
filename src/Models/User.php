<?php

namespace App\Models;

class User extends \Illuminate\Database\Eloquent\Model
{
	protected $table = 'user';
	protected $fillable = ['username', 'password', 'fullname', 'mobile', 'address', 'email', 'status'];
	public $timestamps = false;

}
