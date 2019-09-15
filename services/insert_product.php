<?php
	// params:
	// email, name, description, daily_price, category, worth

	require_once("dbmanager.php");

	$q = "SELECT id FROM users where email='".$_GET['email']."';";
	$res = $conn->query($q);
	$owner_id = ($res->fetch_assoc())['id'];

	$q = "SELECT id FROM categories where name='".$_GET['category']."';";
	$res = $conn->query($q);
	$category_id = ($res->fetch_assoc())['id'];

	$q = "INSERT INTO products (owner, name, description, daily_price, category_id, worth) VALUES ('".$owner_id."', '".$_GET['name']."', '".$_GET['description']."', '".$_GET['daily_price']."', '".$category_id."', '".$_GET['worth']."');";
	$conn->query($q);

	$q = "SELECT id FROM products where owner='".$owner_id."' AND name='".$_GET['name']."';";
	$res = $conn->query($q);
	$product_id = ($res->fetch_assoc())['id'];

	echo json_encode($product_id);
?>