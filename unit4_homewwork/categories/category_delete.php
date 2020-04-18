<?php 
	require_once('../connection.php');
	$id = $_GET['id'];
	$query = "DELETE FROM categories WHERE id = ".$id;
	$status = $conn->query($query);
	if ($status == true) {
		setcookie('msg','Xóa thành công',time()+5);
	} else {
		setcookie('msg','Xóa không thành công',time()+5);
	}
	// var_dump($status); hiển thị giá trị true/false của status 

	header('Location: categories.php');//trở về trang categories.php
 ?>