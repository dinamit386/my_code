<?php

require_once 'dbCon.php';

$id = $_GET['u_id'];

mysqli_query($dbcon, "DELETE FROM `clients` WHERE `clients`.`u_id` = $id");

header('Location: ../index.php');


?>