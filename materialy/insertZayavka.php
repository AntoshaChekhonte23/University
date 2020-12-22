<?php 
	$connect = mysqli_connect("127.0.0.1","root","","University");
	$text_insert = "INSERT INTO applications (universitiesID) VALUES ('".$_POST["id"]."')";
	$insert = mysqli_query($connect, $text_insert);
	header('Location:index.php');
 ?>