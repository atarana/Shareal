<?php
	// params:
	// view, email, category

	require_once("dbmanager.php");

	$res = NULL;

	if ($_GET['view'] == 'all') {	//listo tutti i prodotti (no miei)
		$q = "SELECT products.id, users.last, users.addr, products.name, products.description, categories.name AS category, products.daily_price, products.worth, images.src FROM users, products, images, categories WHERE products.owner=users.id AND products.category_id=categories.id AND images.product_id=products.id AND users.email<>'".$_GET['email']."' AND products.available<>0;";
		$res = $conn->query($q);

	} else if ($_GET['view'] == 'category') {	//listo tutti i prodotti di una categoria (no miei)
		$q = "SELECT products.id, users.last, users.addr, products.name, products.description, categories.name AS category, products.daily_price, products.worth, images.src FROM users, products, images, categories WHERE products.owner=users.id AND products.category_id=categories.id AND images.product_id=products.id AND users.email<>'".$_GET['email']."' AND products.available<>0 AND categories.name='".$_GET['category']."';";
		$res = $conn->query($q);

	} else if ($_GET['view'] == 'profile') {	//listo tutti i miei prodotti
		$q = "SELECT products.id, products.name, products.description, categories.name AS category, products.daily_price, products.worth, images.src FROM users, products, images, categories WHERE products.owner=users.id AND images.product_id=products.id AND products.category_id=categories.id AND users.email='".$_GET['email']."';";
		$res = $conn->query($q);
	}

	echo json_encode(resultToArray($res));

	function resultToArray($result) {
	    $rows = array();
	    while($row = $result->fetch_assoc()) {
	        $rows[] = $row;
	    }
	    return $rows;
	}
?>