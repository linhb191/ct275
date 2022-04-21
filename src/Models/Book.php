<?php

namespace App\Models;

class Book extends \Illuminate\Database\Eloquent\Model
{
	protected $table = 'book';
	protected $fillable = ['title', 'binding', 'quantity'];
	public $timestamps = false;

	public function users()
	{
		return $this->belongsToMany(User::class, 'borrow')->withPivot('borrowed_at');
	}
}
