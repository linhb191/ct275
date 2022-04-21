<?php

namespace App\Models;

class Food extends \Illuminate\Database\Eloquent\Model
{
	protected $table = 'food';
	protected $fillable = ['title', 'description', 'price', 'image_name', 'category_id', 'featured', 'active'];
	public $timestamps = false;

}
