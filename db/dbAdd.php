<?php
		use PhpOffice\PhpSpreadsheet\Spreadsheet;
		use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


if (isset($_POST['submit'])) {

	include_once 'dbCon.php';

	$name = mysqli_real_escape_string($dbcon, $_POST['u_name']);
	$surname = mysqli_real_escape_string($dbcon, $_POST['u_surname']);
	$phoneNum = mysqli_real_escape_string($dbcon, $_POST['u_phoneNum']);


	//ПРОВЕРКА ВВОДА ДАННЫХ
	if(empty($name) || empty($surname) || empty($phoneNum)) {
		header("Location: ../index.php?add=err_empty");
		exit();
	} else {
		if(!preg_match('/[^a-zA-ZА-Яа-я]/', $name) || !preg_match(
			'/[^a-zA-ZА-Яа-я]/', $surname)) 
		{
			header("Location: ../index.php?add=err_char");
			exit();
		} 
		if(preg_match('/^[0-9\/-]+$/', $phoneNum))
			{
			mysqli_query($dbcon, "INSERT INTO `clients` (`u_id`, `u_name`, `u_surname`, `u_phone`) VALUES (NULL, '$name', '$surname', '$phoneNum')");
				header("Location: ../index.php?add=success");
				exit();
		} else {
				header("Location: ../index.php?add=err_phone");
				exit();
			}
	}
} else {
	echo 'Используйте кнопку добавить клиента!';
}

?>