<?php 
	require_once('../connection.php');
	$id = $_POST['id'];

	$allowtypes    = array('jpg', 'png', 'jpeg', 'gif');
	$tmp = explode('.',$_FILES['thumbnail']['name']);
	$file_ext = strtolower(end($tmp));

	if (in_array($file_ext,$allowtypes)=== false) {
		setcookie('msg_al','File upload không phải file ảnh',time()+5);
		header('Location: post_edit.php?id='.$id);
		
	}else{
			// upload file
		$target_dir = "../img/";  // thư mục chứa file upload
		$thumbnail="";

		$target_file = $target_dir . basename($_FILES["thumbnail"]["name"]); // link sẽ upload file lên: ../img/zent.jpg

		// echo "<pre>";
		// 	print_r($_FILES);
		// echo "</pre>";
		// die;

		$status_upload = move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file);

		if ($status_upload) { // nếu upload file không có lỗi 
		    $thumbnail = basename( $_FILES["thumbnail"]["name"]);
		}


		$title = $_POST['title'];
		$description = $_POST['description'];
		$content = $_POST['content'];
		$category_id = $_POST['category_id'];
		$author_id = 2;
		$status = 0;
		if(isset($_POST['status'])){ // isset():hàm check có tồn tại hay k
			$status = $_POST['status'];
		}
		
		date_default_timezone_set('Asia/Ho_Chi_Minh');

		$created_at =  date('Y-m-d H:i:s');

		$query = "UPDATE posts SET title = '".$title."',description = '".$description."',content = '".$content."',thumbnail = '".$thumbnail."',author_id = ".$author_id.",category_id = ".$category_id.",status = ".$status.",created_at = '".$created_at."' WHERE id = ".$id;
		$status_query = $conn->query($query);
		if ($status_query == true) {
			setcookie('msg','Cập nhật thành công',time()+5);
			header('Location: posts.php');//trở về trang categories.php
		} else {
			setcookie('msg','Cập nhật thất bại',time()+5);
			header('Location: post_edit.php?id='.$id);
		}
	}

	



 ?>