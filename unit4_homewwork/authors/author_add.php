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
    <h3 align="center">Add New Author</h3>
    <hr>
    <?php if(isset($_COOKIE['msg'])){ ?>  	
        <div class="alert alert-warning">
          <strong>Thất bại!!!</strong> <?= $_COOKIE['msg']?>
        </div>
    <?php }?>  
        <form action="author_add_action.php" method="POST" role="form" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" id="" placeholder="" name="name">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" class="form-control" id="" placeholder="" name="email">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="Password" class="form-control" id="" placeholder="" name="password">
            </div>
            <div class="form-group">
                <label for="">Confirm Password</label>
                <input type="Password" class="form-control" id="" placeholder="" name="password_cf">
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
            <a href="authors.php" type="button" class="btn btn-primary">Cancel</a>
        </form>
    </div>
</body>
</html>