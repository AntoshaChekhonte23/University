<?php 
	session_start();
 ?>
<?php 
	$connect = mysqli_connect("127.0.0.1","root","","University");
	$img_direct = "img/";
	$img_name = $img_direct . basename($_FILES['Img']['name']); 
	$upload = move_uploaded_file($_FILES['Img']['tmp_name'], $img_name);
	if($upload==true){
		// $query = mysqli_query($connect, "UPDATE works SET img='".$img_name."' WHERE id='{$_SESSION["id"]}' ");
		$text_insert = "INSERT INTO works (img, description) VALUES ('".$img_name."','".$_POST["desc"]."')";
		$insert = mysqli_query($connect, $text_insert);
		header('Location:accountStudent.php');
	}
 ?>
