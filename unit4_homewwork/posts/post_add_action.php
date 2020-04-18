<?php 
	require_once('../connection.php');

	$allowtypes    = array('jpg', 'png', 'jpeg', 'gif');
	$tmp = explode('.',$_FILES['thumbnail']['name']);
	$file_ext = strtolower(end($tmp));

	if (in_array($file_ext,$allowtypes)=== false) {
		setcookie('msg_al','File upload không phải file ảnh',time()+5);
		header('Location: post_add.php');
		
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
		$author_id = 1;
		$status = 0;
		if(isset($_POST['status'])){ // isset():hàm check có tồn tại hay k
			$status = $_POST['status'];
		}
		
		date_default_timezone_set('Asia/Ho_Chi_Minh');

		$created_at =  date('Y-m-d H:i:s');

		$query = "INSERT INTO posts(title,description,content,thumbnail,author_id,category_id,status,created_at) VALUES ('".$title."','".$description."','".$content."','".$thumbnail."',".$author_id.",".$category_id.",".$status.",'".$created_at."')";
		$status_query = $conn->query($query);
		if ($status_query == true) {
			setcookie('msg','Thêm mới thành công',time()+5);
			header('Location: posts.php');//trở về trang categories.php
		} else {
			setcookie('msg','Thêm mới thất bại',time()+5);
			header('Location: post_add.php');
		}
	}

	



 ?>