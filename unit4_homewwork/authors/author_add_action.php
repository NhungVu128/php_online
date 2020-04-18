<?php 
	require_once('../connection.php');
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$password_cf = $_POST['password_cf'];
	 $query = "INSERT INTO authors(name,email,password,status) VALUES ('".$name."','".$email."','".md5($password)."',1)";
	 

	if($password != $password_cf){
		setcookie('msg','Mật khẩu không khớp',time()+5);
		header('Location: author_add.php');
	}else{
		$status = $conn->query($query);
		if ($status == true) {
			setcookie('msg','Thêm mới thành công',time()+5);
			header('Location: authors.php');
		} else {
			setcookie('msg','Thêm mới thất bại',time()+5);
			header('Location: author_add.php');
		}
	}
	


 ?>