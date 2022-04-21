<?php

namespace App\Controllers;

use App\Models\Book;

class BookController
{
	public function index()
	{
		global $router;

		view('libhome', [
			'books' => Book::orderBy('title')->get(),
			'router' => $router
		]);
	}
}
