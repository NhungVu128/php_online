<?php 
require_once('../connection.php');
$query_category = "SELECT * FROM authors WHERE status = 1";
$result_category = $conn->query($query_category);
$categories = array();

while($row = $result_category->fetch_assoc()){
  $categories[] = $row;
}

 ?>




<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Zent - Education And Technology Group</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
    <h3 align="center">Zent - Education And Technology Group</h3>
    <h3 align="center">Author List</h3>
    <a href="author_add.php" type="button" class="btn btn-primary">Thêm mới</a>
    <hr>
    <?php if(isset($_COOKIE['msg'])){ ?>  	
        <div class="alert alert-success">
          <strong>Thông báo!</strong> <?= $_COOKIE['msg']?>
        </div>
    <?php }?>
    <hr>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          foreach ($categories as $cate) { ?>
        

        <tr>
          <th scope="row"><?= $cate['id'] ?></th>
          <td><?= $cate['name'] ?></td>
          <td><?= $cate['email'] ?></td>
          <td>
            <a href="author_detail.php?id=<?= $cate['id'] ?>" type="button" class="btn btn-default">Xem</a>
            <a href="author_edit.php?id=<?= $cate['id'] ?>" type="button" class="btn btn-success">Sửa</a>
            <a href="author_delete.php?id=<?= $cate['id'] ?>" type="button" class="btn btn-warning">Xóa</a>
          </td>
        </tr>

        <?php } ?>
      </tbody>
    </table>
    </div>
</body>
</html>