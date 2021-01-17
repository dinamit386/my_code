<?php

require_once 'db/dbCon.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title>Клиенты</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<table>
		<tr>
			<th>ID</th>
			<th>Имя</th>
			<th>Фамилия</th>
			<th>Номер телефона</th>
		</tr>

		<?php

			$db_select = "SELECT * FROM `clients`";

			$client = mysqli_query($dbcon, $db_select);
			
			$client = mysqli_fetch_all($client);


			foreach ($client as $client) {
			?>
			
			<tr>
				<td><?= $client[0] ?></td>
				<td><?= $client[1] ?></td>
				<td><?= $client[2] ?></td>
				<td><?= $client[3] ?></td>
				<td><a style="text-decoration: none; color: #d10015; font-weight: bold;" class="remove" href="db/dbRem.php?u_id=<?= $client[0] ?>">Удалить</a></td>
			</tr>

			<?php
			
			}

		?>
	</table>

	<h2>Добавить клиента</h2>

	<form action="db/dbAdd.php" method="post">
		<p>Имя</p>
		<input type="text" name="u_name">
		<p>Фамилия</p>
		<input type="text" name="u_surname">
		<p>Номер телефона</p>
		<input type="text" name="u_phoneNum"><br>

		<button type="submit" name="submit">Добавить</button>
	</form>
	<?php
		$URL = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

		if(strpos($URL, "add=err_empty") == true) {
			echo "<p class='error'>Вы не заполнили все поля!</p>";
		}
		else if(strpos($URL, "add=err_char") == true) {
			echo "<p class='error'>Имя или фамилия содержит запрещённые символы!</p>";
		}
		else if(strpos($URL, "add=err_phone") == true) {
			echo "<p class='error'>Некорректный номер телефона!</p>";
		}
	?>
</body>
</html>