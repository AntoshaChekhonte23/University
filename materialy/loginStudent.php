<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg  backgr">
	 <a class="navbar-brand titlefont" href="index.php">Поступай легко!</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	</nav>
	<?php 
		$connect = mysqli_connect("127.0.0.1","root","","University");
		$text_query = "SELECT * FROM students WHERE id={$_SESSION["id"]}";
		$query = mysqli_query($connect,$text_query);
		
	 ?>
	<div class="col-6 mx-auto mt-5">
		<h1 class="nicefont ">Авторизация студента</h1>
		<form action="check.php" method="POST">
			<input class="form-control mt-3 nicefont"  name="phone" placeholder="phone">
			<input class="form-control mt-3 nicefont"  name="password" placeholder="password">
			<button class="main__btn nicefont mt-3">Зарегистрироваться</button>	
		</form>
	</div>
	

</body>
</html>

