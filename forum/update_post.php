<?php
	if ($_SESSION['role'] == 'readonly') {
		header('location: index.php');
	}
if (!isset($_GET['id'])) {
    header('location: index.php');
}else{
    $post_id=$_GET['id'];
    session_start();
    include 'config/db.php';
    $logged_user = $_SESSION['username'];
    $user_id = $_SESSION['id'];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = $_POST['post_title'];
        $content = $_POST['post_content'];
        $author = $_POST['post_author'];

        // This is for the Image
        $image = $_FILES['post_img'];
        $imagename = $image['name'];
        $imagename = rand(100, 1000) . "." . $imagename;
        $tmp_name = $image['tmp_name'];

        date_default_timezone_set('Europe/London');
        $create_datetime = date("Y-m-d H:i:s");
        $datetime = date('m/d/Y h:i:s a', time());

        // MOVE IMAGE FILE
        move_uploaded_file($tmp_name, "post_images/" . $imagename);

        // $query = "INSERT INTO `posts`(created, title, content, author, image, user_id) VALUES('$datetime', '$title', '$content', '$author', '$imagename', '$user_id')";
        $query = "UPDATE posts SET author='$author', image='$imagename', title='$title', content='$content' WHERE id='$post_id'";
        $result = mysqli_query($connection, $query);
        if (!$result) {
            die("Error in Query<br>" . mysqli_error($connection));
        } else {
            header("location: postdetail.php?id=$post_id");
        }

    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Update Post</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="apple-touch-icon" href="apple-touch-icon.png">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/linearicons.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/jquery-ui.css">
	<link rel="stylesheet" href="css/owl.theme.css">
	<link rel="stylesheet" href="css/prettyPhoto.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/flipclock.css">
	<link rel="stylesheet" href="css/slick.css">
	<link rel="stylesheet" href="css/slick-theme.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/color.css">
	<link rel="stylesheet" href="css/transitions.css">
	<link rel="stylesheet" href="css/responsive.css">
	<script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>


    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Main CSS-->
    <link href="addpost/css/main.css" rel="stylesheet" media="all">

</head>
<body>

    <div>
        <header id="tg-header" class="tg-header tg-haslayout">
        <div class="clearfix"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <div class="tg-logoarea">
                        <center class="tg-logo"><a href="index.php"><h2>Mr Chudi</h2></a></center>
                    </div>
                    <div class="tg-logoarea">
                        <center class=""><a href="index.php"><h2>Hello <?php echo $_SESSION['username']; ?></h2></a></center>
                    </div>
                    <div class="tg-navigationarea tg-navigationareamiddle">
                        <nav id="tg-nav" class="tg-nav">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#tg-navigation" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div id="tg-navigation" class="collapse navbar-collapse tg-navigation">
                                <ul>
                                    <li class="">
                                        <a href="index.php">Home</a>
                                    </li>
                                    <li><a href="addpost.php">Add Post</a></li>
                                    <li><a href="sports.html">Sports</a></li>
                                    <li><a href="doityourself.html">DIY</a></li>
                                </ul>
                            </div>
                        </nav>
                        <a id="tg-btnsearchtoggle" class="tg-btnsearchtoggle" href="#tg-search"><i class="lnr lnr-magnifier"></i></a>
                    </div>
                </div>
            </div>
        </div>
        </header>
        <div>
            <?php 
                $sql = "select * from posts where id=$post_id";
                $result = mysqli_query($connection , $sql);
                if (!$result) {
                    die("Error in Query<br>" . mysqli_error($connection));
                } else {
                    while ($rows = mysqli_fetch_assoc($result)) {
                        $id = $rows['id'];
                        $id = htmlentities($id);
                        $created = $rows['created'];
                        $title = $rows['title'];
                        $title = htmlentities($title);
                        $image = $rows['image'];
                        $image = htmlentities($image);
                        $author = $rows['author'];
                        $author = htmlentities($author);
                        $content = $rows['content'];
                        $content = htmlentities($content);
            ?>
            <div class="page-wrapper bg-dark p-t-100 p-b-50">
                <div class="wrapper wrapper--w900">
                    <div class="card card-6">
                        <div class="card-heading">
                            <h2 class="title">Update <?php echo $_SESSION['session_title']?></h2>
                        </div>
                        <div class="card-body">
                            <form method="POST" action='update_post.php?id=<?php echo $post_id?>'  enctype="multipart/form-data">
                                <div class="form-row">
                                    <div class="name">Author</div>
                                    <div class="value">
                                        <input readonly class="input--style-6" name="post_author" type="text" value="<?php echo $logged_user; ?>">
                                    </div>
                                </div>
                                <div class="text-center d-flex justify-content-center">
                                <div class="form-row text-center">

                                        <?php 
											if (strlen($image) >5) {
                                                ?>
                                            <img src="post_images/<?php echo $image; ?>" alt="">
											<?php 
											}else{																
											?>
											<img src="images/nope.jpg" alt="image description">
											<?php 
											}
											
											?>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="name">Upload Image</div>
                                    <div class="value">
                                        <div class="input-group js-input-file">
                                            <input required class="input-file" type="file" name="post_img" accept="image/*" id="file" >
                                            <label class="label--file" for="file" >Choose file</label>
                                            <span class="input-file__info">No file chosen</span>
                                        </div>
                                        <div class="label--desc">Upload Image. Max file size 50 MB</div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="name">Title</div>
                                    <div class="value">
                                        <input value="<?php echo $title; ?>" required class="input--style-6" type="text" name="post_title">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="name">Content</div>
                                    <div class="value">
                                        <textarea class="textarea--style-6" name="post_content" placeholder="insert a Content for your Blog Here" required><?php echo $content;?></textarea>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn--radius-2 btn--green " type="submit">Update Blog</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                }
            ?>

    </div>
    </div>





    <all>
        <script src="addpost/vendor/jquery/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="addpost/js/global.js"></script>
    </all>

</body>
</html>
<?php
        }
    }
?> 