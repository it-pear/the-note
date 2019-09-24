<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Список важнейших дел</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
	<p>Привет, это мое приложение по добавлению заметок</p>
	<div class="container">
		<div class="row">
			<div class="col">
				<h1>Список дел</h1>
				<form action="/add.php" method="post">
					<input type="text" name="task" id="task" placeholder="Нужно сделать" class="form-control">
					<button type="submit" name="sendTask" class="btn btn-success">Отправить</button>
				</form>

				<?php 
					require 'config.php';

					echo "<ul>";
						$query = $pdo->query('SELECT * FROM `tasks` ORDER BY `id` DESC');
						while ($row = $query->fetch(PDO::FETCH_OBJ)) {
							echo '<li>'.$row->task.'<a href="/delete.php?id='.$row->id.'"><button type="button" class="btn btn-danger">Удалить</button></a></li>';
						}
					echo "</ul>";
				?>

			</div>
		</div>
	</div>

</body>
</html>