<?php
function invest_protocol($email, $password){
	global $db;
    $sql = "select * from `user` where `email` = '$email' AND `password`='$password'";
    $result = mysqli_query($db, $sql);

	mysqli_free_result($result);
	return mysqli_fetch_assoc($result);
    // if ($result != null)
    //     {
    //         return false;
    //     }
    //                 else{
    //                     return true;
    //                     }

}

function get_products2($category){
	global $db;
	$sql = "select * from products where categoryID = ".$category." order by id ASC; ";
	$result = mysqli_query($db, $sql);
	confirm_result_set($result);
	return $result; // returns an assoc. array
}
function get_products_by_category($categoryID){
	global $db;
	$sql = "select * from `products` where `CategoryID` = $categoryID";
	$result = mysqli_query($db, $sql);
	$returned = mysqli_fetch_assoc($result);
	mysqli_free_result($result);
	return $returned;
}


function get_category_name_by_id($categoryID){
	global $db;
	$sql = "select name from `categories` where `CategoryID` = $categoryID ";
	$result = mysqli_query($db, $sql);
	$returned = mysqli_fetch_assoc($result);
	mysqli_free_result($result);
	return $returned;
}
// 
// Admins
// 
// Find an admin by id
function get_user_by_id($id)
{
	global $db;

	$sql = "SELECT * FROM `user` where `id` = '$id'";
	$result = mysqli_query($db, $sql);
	confirm_result_set($result);
	$admin = mysqli_fetch_assoc($result); // get first
	mysqli_free_result($result);
	return $admin; // returns an assoc. array
}


// Find an admin by username, used in admin login
function get_user_by_username($username)
{
	global $db;

	$sql = "SELECT * FROM `user` ";
	$sql .= "WHERE username='" . db_escape($db, $username) . "' ";
	$sql .= "LIMIT 1";
	$result = mysqli_query($db, $sql);
	confirm_result_set($result);
	$admin = mysqli_fetch_assoc($result); // find first
	mysqli_free_result($result);
	return $admin; // returns an assoc. array
}

// 
// Products
// 
function get_all_products()
{
	global $db;

	$sql = "SELECT * FROM `products` ";
	$sql .= "ORDER BY brand ASC";
	$result = mysqli_query($db, $sql);
	confirm_result_set($result);
	return $result; // returns an assoc. array
}

function get_all_categories()
{
	global $db;

	$sql = "SELECT * FROM `categories` ";
	$sql .= "ORDER BY id ASC";
	$result = mysqli_query($db, $sql);
	confirm_result_set($result);
	return $result; // returns an assoc. array
}

function get_product_by_id($id)
{
	global $db;
	$sql = "SELECT * FROM `products` WHERE `id` = $id";
	$result = mysqli_query($db, $sql);
	confirm_result_set($result);
	$p = mysqli_fetch_assoc($result);
	mysqli_free_result($result);
	return $p; // returns an assoc. array
}

function get_reviews_by_product($prod)
{
	global $db;
	
	$sql = "SELECT * FROM `ratings` WHERE `productID` = $prod";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result, $db);
    return $result; // returns all rows
}

function update_product_by_id($id, $brand, $name, $img)
{
	global $db;

	$sql = "UPDATE `products` SET `brand`='$brand',`name`='$name',`img`='$img' WHERE `id`='$id';";

	$result = mysqli_query($db, $sql);
	// For UPDATE statements, $result is true/false
	if ($result) {
		return true;
	} else {
		// UPDATE failed
		echo mysqli_error($db);
		db_disconnect($db);
		exit;
	}
}

function delete_product_by_id($id)
{
	global $db;

	$sql = "DELETE FROM `products` WHERE `id` = $id;";
	$result = mysqli_query($db, $sql);

	// For DELETE statements, $result is true/false
	if ($result) {
		return true;
	} else {
		// DELETE failed
		echo mysqli_error($db);
		db_disconnect($db);
		exit;
	}
}

function insert_product($name, $description, $img) {
	global $db;

	$sql = "INSERT INTO `products`(`name`, 'description', `img`) VALUES ('$name','$description,'$img')";

	$result = mysqli_query($db, $sql);
	if ($result) {
		return true;
	} else {
		// UPDATE failed
		echo mysqli_error($db);
		db_disconnect($db);
		exit;
	}
}

// Hours
function get_all_orders()
{
	global $db;

	$sql = "SELECT * FROM `orders` ";
	$result = mysqli_query($db, $sql);
	confirm_result_set($result);
	return $result; // returns an assoc. array
}

function update_products_by_id($id, $name, $description, $img, $price, $stock)
{
	global $db;

	$sql = "UPDATE `products` SET `i aint writing all that WHERE `id`'$id';";

	$result = mysqli_query($db, $sql);
	// For UPDATE statements, $result is true/false
	if ($result) {
		return true;
	} else {
		// UPDATE failed
		echo mysqli_error($db);
		db_disconnect($db);
		exit;
	}
}