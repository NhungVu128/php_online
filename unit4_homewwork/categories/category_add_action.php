<?php 
	require_once('../connection.php');
	$title = $_POST['title'];
	$description = $_POST['description'];
	$query = "INSERT INTO categories(title,description) VALUES ('".$title."','".$description."')";
	$status = $conn->query($query);
	if ($status == true) {
		setcookie('msg','Thêm mới thành công',time()+5);
		header('Location: categories.php');//trở về trang categories.php
	} else {
		setcookie('msg','Thêm mới thất bại',time()+5);
		header('Location: category_add.php');
	}
	// var_dump($status); hiển thị giá trị true/false của status 


 ?>