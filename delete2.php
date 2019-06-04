<?php header("Location: http://yaroslav/twitter/");
	echo $id = $_GET['id'];
	$conn = mysqli_connect('127.0.0.1', 'root', '' , 'yaroslav_pn_11');
	$query = mysqli_query($conn,"DELETE FROM tweet WHERE id = '" . $id . "' ");
 ?>