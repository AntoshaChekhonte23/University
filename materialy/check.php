<?php 
session_start();
$connect = mysqli_connect('127.0.0.1', 'root', '', 'University');
$query = mysqli_query($connect, "SELECT * FROM students WHERE phone='".$_POST["phone"]."' AND password='".$_POST["password"]."'");
$result = $query->fetch_assoc();
$num = mysqli_num_rows($query);
if($num>0){
	$_SESSION["id"]=$result["id"];
 	header('Location:accountStudent.php');
} else{
 	header('Location:loginStudent.php');
}
?>
