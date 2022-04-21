<?php

namespace App\Models;

class Bill extends \Illuminate\Database\Eloquent\Model
{
	protected $table = 'bill';
	protected $fillable = ['id', 'taikhoan', 'name', 'address', 'tel', 'email', 'total', 'pttt', 'nagydat', 'status'];
	public $timestamps = false;
}