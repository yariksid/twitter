<?php header("Location: http://yaroslav/twitter/");
 $connect = mysqli_connect('127.0.0.1', 'root', '', 'yaroslav_pn_11');
	$img = $_POST['imgg'];
	$text = $_POST['textt'];
$query = mysqli_query($connect, "INSERT INTO tweet (logo, title, text, img) VALUES ('avatar.jpg', 'test123', '" . $text . "' ,'images/" . $img . "')");
?> 
