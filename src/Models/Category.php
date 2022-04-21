<?php

namespace App\Models;

class Category extends \Illuminate\Database\Eloquent\Model
{
	protected $table = 'category';
	protected $fillable = ['id', 'title', 'image_name', 'featured', 'active'];
	public $timestamps = false;
}