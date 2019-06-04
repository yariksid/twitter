<?php
	$id = $_POST['id'];
	$txt = $_POST['text'];
	$conn = mysqli_connect('127.0.0.1', 'root', '' , 'yaroslav_pn_11');
	$query = mysqli_query($conn,"UPDATE tweet SET text='" . $txt . "' WHERE id='" . $id . "' ");
	header("Location: http://yaroslav/twitter/");
 ?>