<?php 
	require_once('../connection.php');
	$id = $_GET['id'];
	$query = "DELETE FROM posts WHERE id = ".$id;
		$status_query = $conn->query($query);
		if ($status_query == true) {
			setcookie('msg','Xóa thành công',time()+5);

		} else {
			setcookie('msg','Xóa không thành công',time()+5);

		}
	header('Location: posts.php');//trở về trang categories.php
 ?>