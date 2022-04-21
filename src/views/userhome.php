<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>User Books</title>
</head>

<body>
	<a href="/">Library</a> |
	<a href="<?= $router->generate('logout') ?>"> Logout</a>
	<h1><?= $user->name ?>'s Books</h1>
	<table>
		<thead>
			<tr>
				<th>Title</th>
				<th>Binding</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($user->books as $book) : ?>
				<tr>
					<td><?= $book->title ?></td>
					<td><?= $book->binding ?></td>
					<td id="<?= $book->id ?>"><button>Return</button></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
	$(document).ready(function() {
		$('button').on('click', function(e) {
			const title = $(this).closest('tr').find('td:first').text();
			const id = $(this).closest('td').prop('id');
			if (confirm(`Ban muon tra sach ${title}?`)) {
				window.location = `/return/${id}`;
			}
		});
	});
</script>

</html>