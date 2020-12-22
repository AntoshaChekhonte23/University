<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Профиль поступающего</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

	<!--если студент НЕ авторизовался, то показывается эта часть, в том числе ссылка на страницу  логина-->
<?php 
	if($_SESSION['id']==null){ ?>
	<div class="login1__error">
		<div class="login2__error">
			<div class="login3__error">
				<h3 class="nicefont">Вы не авторизованы</h3>
				<a class="nicefont" href="loginStudent.php">Авторизация абитуриента</a>
			</div>
		</div>	
	</div>	
<?php } else { ?>
	<?php 
		$connect = mysqli_connect('127.0.0.1', 'root', '', 'University');
		$text_query = ("SELECT * FROM students WHERE id={$_SESSION['id']}");
		$query = mysqli_query($connect,$text_query);
		$result = $query->fetch_assoc();
	 ?>
	<!--если студент авторизовался, то показываются nav (меню) и контент всего сайта-->
	<nav class="navbar navbar-expand-lg backgr">
	 <a class="navbar-brand titlefont" href="index.php">Поступай легко!</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNav">
	    <ul class="navbar-nav">
	      <li class="nav-item ml-3 mt-1">
	        <a class="linkfont" href="loginStudent.php">Авторизация</a>
	       	<a class="linkfont ml-4" href="index.php">Главная</a>
	       	<a class="linkfont ml-4" href="signOutStudent.php">Выйти</a>
	      </li>
	    </ul>
	  </div>
	</nav>
	<?php 
		$connect = mysqli_connect('127.0.0.1', 'root', '', 'University');
		$text_query = ("SELECT * FROM works INNER JOIN students ON works.usersID = students.id WHERE works.usersID= '{$_SESSION['id']}'");
		$query = mysqli_query($connect,$text_query);
	 ?>
	<div class="col-10 mx-auto mt-5">
		<div class="row mb-3">
			<h3 class="titlefont text-dark">Здравствуйте, <?php echo $result["fio"] ?>.</h3>
		</div>
		<div class="row">
			<div class="col-3 border py-3 rounded mr-2">
				<h5>Добавить работу</h5>
				<form action="insertWork.php" method="POST" enctype="multipart/form-data">
					<input class="mt-3 form-control nicefont" type="" placeholder="Описание" name="desc">
					<div class="file-upload mt-3">
						<label>
							<input class="mt-3" type="file" name="Img" placeholder="Выбрать файл" id="uploade-file">
							<span class="nicefont">Выберите файл</span>
						</label>
					</div>
					<button class="account__btn nicefont mt-3">Загрузить работу в портфолио</button>	
				</form>				
			</div>
			
			<!--Вывод работ-->
			<?php 
				for ($i=0; $i < $query->num_rows; $i++) { 
				$result = $query->fetch_assoc();
				
			?>
			<div class="col-3 account__otstup">
				<div class="main__img" style="background-image: url(<?php echo $result["img"]; ?>);"></div>
				<p style="font-weight: 700;" class="nicefont"><?php echo $result["description"] ?></p>
			</div>	
			<?php } ?>	
		</div>
		<?php 
			$connect = mysqli_connect('127.0.0.1', 'root', '', 'University');
			$text_query = ("SELECT * FROM applications INNER JOIN students ON applications.usersId = students.id WHERE applications.usersID= '{$_SESSION['id']}' ");
			$query = mysqli_query($connect,$text_query);
			$num = mysqli_num_rows($query);
		 ?>
		 <div class="row">
			<div class=" mt-5">
				<h1 class="titlefont text-dark">Мои заявки в университеты</h1>
				<?php 
					for ($i=0; $i < $query->num_rows; $i++) { 
					$result = $query->fetch_assoc();
				?>		
				<li class="nicefont"><?php echo $result["universitiesID"] ?></li>
				<?php } ?>	
				<p class="nicefont "><?php
					if($num==false){
						echo "- Вы пока не подавали никаких заявок";
					}					
				?></p>
				
			</div>
		</div>
	</div>
<?php } ?>

</body>
</html>
