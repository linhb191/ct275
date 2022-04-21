<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\Book;

class UserController
{
	public function index($username)
	{
		global $router;

		view('userhome', [
			'user' => User::where('name', $username)->with('books')->first(),
			'router' => $router
		]);
	}

	public function borrow($bookId)
	{
		global $router;

		$user = User::where('name', $_SESSION['user'])->with('books')->first();
		$book = Book::find($bookId);

		// User có mượn sách này chưa?
		$borrowed = $user->books->find($book->id);

		// PHP in Action còn trong thư viện hay không?
		$outOfStock = $book->users()->count() >= $book->quantity;

		// Nếu sách còn trong thư viện, và chưa được mượn, thì mượn cho user
		if (!$outOfStock && !$borrowed) {

			// User mượn sách này
			$user->books()->attach($book->id, [
				'borrowed_at' => date('Y-m-d')
			]);
		}

		redirect(
			$router->generate(
				'user.show',
				['username' => $_SESSION['user']]
			)
		);
	}

	public function return($bookId)
	{
		global $router;

		$user = User::where('name', $_SESSION['user'])->with('books')->first();
		$book = Book::find($bookId);

		$borrowed = $user->books->find($book->id);

		if ($borrowed) {
			$user->books()->detach($book->id);
		}

		redirect(
			$router->generate(
				'user.show',
				['username' => $_SESSION['user']]
			)
		);
	}
}
