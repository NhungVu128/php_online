<?php 
require_once('../connection.php');
$query_category = "SELECT * from categories";
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
    <h3 align="center">Add New Post</h3>
    <hr>
    <?php if(isset($_COOKIE['msg'])){ ?>  	
        <div class="alert alert-warning">
          <strong>Thất bại!!!</strong> <?= $_COOKIE['msg']?>
        </div>
    <?php }?>  

    <?php if(isset($_COOKIE['msg_al'])){     
        echo '<script language="javascript">';
        echo 'alert("File upload không phải file ảnh")';
        echo '</script>';
     }?>  
        <form action="post_add_action.php" method="POST" role="form" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" class="form-control" id="" placeholder="" name="title">
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <input type="text" class="form-control" id="" placeholder="" name="description">
            </div>
            <div class="form-group">
                <label for="">Content</label>
                <textarea class="form-control" id="" placeholder="" name="content" rows = "10"></textarea>
            </div>
            <div class="form-group">
                <label for="">Category</label>
                <select name="category_id" class="form-control">
                <?php foreach ($categories as $cate) {?>  
                  <option value="<?= $cate['id'] ?>"><?= $cate['title'] ?></option>
                <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Thumbnail</label>
                <input type="file" class="form-control" id="" placeholder="" name="thumbnail">
            </div>
            <div class="form-group">
                <label for="">Hiển thị bài viết</label>
                <input type="checkbox" id="" placeholder="" name="status" value="1" width="50px"> <em>(Check để hiển thị bài viết)</em>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
            <a href="posts.php" type="button" class="btn btn-primary">Cancel</a>
        </form>
    </div>
</body>
</html>