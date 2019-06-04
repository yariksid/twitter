<!DOCTYPE html>
<html>
<head>
	<title>twitter</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head> 
<body class="bg-light">
	<!--Навигация-->
	<div class="header d-flex container-fluid bg-white">
		<div class="links">
			<a href="">Главная</a>
			<a href="">Уведомления</a>
			<a href="">Сообщения</a>
		</div>
		<img class="icon" src="Twitter-Logo.png">
		<div><input class="input" type="" name=""></div>
	</div>
	<!--Контент-->
<div class="main">
	<div class="container d-flex">
		<!--Левая колонка-->
	<div class="col-3 ml-2">
		<div class="card col-12 bg-white">
  			<div>
  				<img class="col-12" src="background.jpg">
  			</div>
  			<div class="d-flex col-12">
  				<div class="col-4">
  					<img class="rounded-circle" src="avatar.jpg">
  				</div>
  				<div class="col-8">
  					<a href="#">@Test</a>
  					<a href="#">Test</a>
  				</div>
  			</div>
		</div>
		<div class="col-12 bg-white d-flex">
			<div class="col-6"><a href="">Твиты: 228</a></div>
			<br>
			<div class="col-6"><a href="">Читаемые: 228</a></div>
		</div>
		<div class="col-12 bg-white">
			<hr>
			<h3>
				Актуальные темы для вас
			</h3>
			<?php 
				$connect = mysqli_connect('127.0.0.1', 'root', '', 'yaroslav_pn_11');
				$find = mysqli_query($connect, "SELECT * FROM theme");
				$count = $find->num_rows;
				for ($i=0; $i < $count; $i++) { 
					
				?>
					<div>
						<a href="">
							<?php $content = $find->fetch_assoc();
								  echo $content['title'];
							?>
						</a>
						<p>
							<?php echo $content['tweets']; ?>
						</p>
					</div>



				<?php 
					}
				 ?>
		</div>
	</div>

	<!--Средняя колонка-->
	<div class="news col-6 bg-white" style="height: 100%;">
		<form method="POST" action="baz.php">
			<input type="" name="textt">
			<input type="" name="imgg">
			<button class="btn btn-primary">Твитнуть</button>
		</form>
		<!--Пост1-->
		<?php
			  $query = mysqli_query($connect, "SELECT * FROM tweet ORDER BY id DESC");	
			  $num = $query->num_rows;
			  for ($i=0; $i < $num; $i++) { 
			  		
		?>
			<div style="margin-bottom: 25px;" class="row">
				<div class="col-2">
					<a href="">
					<?php 
						$logo = $query->fetch_assoc();
						echo '<img class="rounded-circle" src="' . $logo['logo'] . '">';
					 ?>	
					</a>
				</div>
				<div class="col-10">
			<div class="d-flex">
				<h5>
					<?php 
						echo $logo['title']
					 ?>
				</h5>
			</div>
			<div class="d-flex">
				<p><?php
				echo $logo['text'] 
				 ?></p>
			</div>
			<div class="d-flex">
				<?php
					echo '<img style="height: 200px; width: 330px;" src="' . $logo['img'] . '">'
				 ?>
			</div>
			<div class="d-flex">
				<div class="col-3">
					<img src="images/comment.png">
				</div>
				<div class="col-3">
					<img src="images/envelope.png">
				</div>
				<div class="col-3">
					<img src="images/like.png">
				</div>
				<div class="col-3">
					<img src="images/retweet.png">
				</div>
			</div>
			<div>
				<form method="GET" action="delete2.php">
				<button>
					<?php echo '<a href="delete2.php?id=' . $logo['id'] . '">' . 'Удалить' . '</a>' ?>	
				</button>
				</form>
				
				<form method="GET" action="change.php">
					<button>
						<?php echo '<a href="change2.php?text=' .  $logo['text'] . '&id=' . $logo['id'] . '">' . 'Редактировать' . '</a>' ?>	
					</button>
				</form> 
			</div>
		</div>
			</div>
			<!--Конец 1 поста-->
			<?php 
				}
			 ?>
		</div>
			</div>
				<!--Правая колонка-->
	<div style="margin-top: 25px;" class="col-3">
			<div class="bg-white">
				<div class="col-12 row">
					<h3>Кого читать</h3>
					<li><a href="#">Обновить</a></li>
					<li><a href="#">Все</a></li>
				</div>
				<?php
				  	$query = mysqli_query($connect, "SELECT * FROM kogo_chitat");	
			 	 	$num2 = $query->num_rows;
			 		for ($i=0; $i < $num2; $i++) { 	
				?>
				<div class="row">
					<div class="col-2">
						<?php  
						$file = $query->fetch_assoc();
						echo '<img src="' . $file['img'] . '">';
						?>
					</div>
					<div class="col-10">
						<h3><?php echo $file['name']; ?></h3>
						<button class="btn btn-outline-primary">Читать</button>
					</div>
				</div>
			<?php } ?>
			</div>
		</div>
	</div>
</body>
</html>