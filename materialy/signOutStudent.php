<?php 
	session_start();
	$connect = mysqli_connect('127.0.0.1', 'root', '', 'University');
	$_SESSION['id'] = null;
 	header('Location:index.php');
 ?>