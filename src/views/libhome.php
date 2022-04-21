<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Library Books</title>
</head>

<body>
	<?php
	if (isset($_SESSION['user'])) {
		echo '<a href="' . $router->generate(
			'user.show',
			['username' => $_SESSION['user']]
		) . '">' . $_SESSION['user'] . '</a> | ';
		echo '<a href="' . $router->generate('logout') . '">Logout</a>';
	}
	?>
	<h1>Library Books</h1>
	<table>
		<thead>
			<tr>
				<th>Title</th>
				<th>Binding</th>
				<th>Quantity</th>
				<?php if (isset($_SESSION['user'])) : ?>
					<th>Actions</th>
				<?php endif; ?>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($books as $book) : ?>
				<tr>
					<td><?= $book->title ?></td>
					<td><?= $book->binding ?></td>
					<td><?= $book->quantity ?></td>
					<?php if (isset($_SESSION['user'])) : ?>
						<td id="<?= $book->id ?>"><button>Borrow</button></td>
					<?php endif; ?>
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
			if (confirm(`Ban muon muon sach ${title}?`)) {
				window.location = `/borrow/${id}`;
			}
		});
	});
</script>

</html>