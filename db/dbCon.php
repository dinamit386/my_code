<?php

$servername = 'localhost';
$user = 'root';
$password = '';
$database = 'client_list';

$dbcon = mysqli_connect($servername, $user, $password, $database);

if(!$dbcon)
{
	die('Error');
}

?>