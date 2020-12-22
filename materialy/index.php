<!DOCTYPE html>
<html>
<head>
	<title>Проект</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg backgr">
	 <a class="navbar-brand titlefont" href="index.php">Поступай легко!</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNav">
	    <ul class="navbar-nav">
	      <li class="nav-item ml-3 mt-1">
	         <a class="linkfont" href="accountStudent.php">Аккаунт студента</a>
	      </li>
	    </ul>
	  </div>
	</nav>
	<?php 
		$connect = mysqli_connect("127.0.0.1","root","","University");
		$text_query = "SELECT * FROM universities";
		$query = mysqli_query($connect,$text_query);
		
	 ?>
	<div class="col-10 mx-auto mt-5">
		<div class="row">	
			<?php 
				for ($i=0; $i < $query->num_rows; $i++) { 
				$result = $query->fetch_assoc();
			 ?>	
			<!--карточка одного университета-->
			<div class="col-3">
				<div class="main__img" style="background-image: url(<?php echo $result["photo"]; ?>);"></div>
				<h4><?php echo $result["name"] ?></h4>
				<p><?php echo $result["description"] ?></p>
				<form action="insertZayavka.php" method="POST">
					<input class="none"  name="id" value="<?php echo $result["name"] ?>">
					<button class="main__btn nicefont">Подать заявку</button>	
				</form>			
			</div>	
			<?php } ?>
		</div>
	</div>
</body>
</html>