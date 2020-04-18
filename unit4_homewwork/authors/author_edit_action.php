<?php 
	require_once('../connection.php');
	$id = $_POST['id'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password_old = $_POST['password_old'];
	$password_new = $_POST['password_new'];
	$password_cf = $_POST['password_cf'];
	$pass = $_POST['pass'];

	if($password_old == "" && $password_new == "" && $password_cf == ""){
		$query = "UPDATE authors SET name = '".$name."', email = '".$email."' WHERE id = ".$id;
		$status = $conn->query($query);
		if ($status == true) {
								setcookie('msg','Cập nhật thành công',time()+5);
								header('Location: authors.php');//trở về trang categories.php
							} else {
								setcookie('msg','Cập nhật thất bại',time()+5);
								header('Location: author_edit.php?id='.$id);
							}
	} else if($password_old != ""){
		if($password_new == "") {
			setcookie('msg','Chưa nhập mật khẩu mới',time()+5);
			header('Location: author_edit.php?id='.$id);
		}else if($password_new != ""){
			if ($password_cf == ""){
				setcookie('msg','Chưa xác nhận lại khẩu mới',time()+5);
				header('Location: author_edit.php?id='.$id);
			}else if($password_cf != ""){
				if($pass != md5($password_old)){
					setcookie('msg','Mật khẩu cũ không đúng',time()+5);
					header('Location: author_edit.php?id='.$id);
				}else{
					if($password_new != $password_cf){
						setcookie('msg','Mật khẩu mới không khớp',time()+5);
						header('Location: author_edit.php?id='.$id);
					}else{
						$query = "UPDATE authors SET name = '".$name."', email = '".$email."',password = '".md5($password_new)."' WHERE id = ".$id;
							$status = $conn->query($query);
							if ($status == true) {
								setcookie('msg','Cập nhật thành công',time()+5);
								header('Location: authors.php');//trở về trang categories.php
							} else {
								setcookie('msg','Cập nhật thất bại',time()+5);
								header('Location: author_edit.php?id='.$id);
							}
					}
				}
			}
		}
	}else if($password_old == "" && ($password_new != "" || $password_cf != "")){
		setcookie('msg','Chưa nhập mật khẩu cũ',time()+5);
		header('Location: author_edit.php?id='.$id);
	}


 ?>