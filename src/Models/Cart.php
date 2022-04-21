<?php

namespace App\Models;

class Cart extends \Illuminate\Database\Eloquent\Model
{
	protected $table = 'cart';
	protected $fillable = ['id', 'tensp', 'hinhsp', 'dongia', 'soluong', 'thanhtien', 'idbill'];
	public $timestamps = false;

}