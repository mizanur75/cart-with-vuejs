<?php
	$db = new mysqli("localhost","root","","test");

	$code = $_POST["code"];

	$select = $db->query("select name, price from product where code='$code'");

	list($name, $price) = $select->fetch_row();
	
	echo json_encode(['name'=>$name,'price'=>$price]);
	
?>