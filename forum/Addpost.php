<?php
session_start();
if ($_SESSION['role'] == 'readonly') {
    header('location: index.php');
}
include 'config/db.php';
require_once 'inc/auth.php';
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

    date_default_timezone_set("africa/lagos");
    $currenttime = time();
    // $datetime =strftime("%b-%d-%Y %H:%M:%S", $currenttime);
    $datetime = strftime("%B-%d-%Y %H:%M", $currenttime);

    $create_datetime = date("Y-m-d H:i:s");

    // MOVE IMAGE FILE
    // moveimage($tmp_name, $imagename);
    move_uploaded_file($tmp_name, "post_images/" . $imagename);

    $query = "INSERT INTO `posts`(created, title, content, author, image, user_id) VALUES('$datetime', '$title', '$content', '$author', '$imagename', '$user_id')";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("Error in Query<br>" . mysqli_error($connection));
    } else {
        // $_SESSION['success'] = "Category Added Successfully";
        // redirect_to("basic.html");
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Add Post</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="apple-touch-icon" href="apple-touch-icon.png">
	<!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
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
	<link rel="stylesheet" href="addpost/css/main.css">
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
        <?php 
			include 'inc/header.php';
		
		?>
    <div>
        <div class="page-wrapper bg-dark p-t-100 p-b-50">
            <div class="wrapper wrapper--w900">
                <div class="card card-6">
                    <div class="card-heading">
                        <h2 class="title">Add a Post</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action='addpost.php'  enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="name">Author</div>
                                <div class="value">
                                    <input readonly class="input--style-6" name="post_author" type="text" value="<?php echo $logged_user; ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="name">Upload CV</div>
                                <div class="value">
                                    <div class="input-group js-input-file">
                                        <input class="input-file" type="file" name="post_img" accept="image/*" id="file" >
                                        <label class="label--file" for="file" >Choose file</label>
                                        <span class="input-file__info">No file chosen</span>
                                    </div>
                                    <div class="label--desc">Upload Image. Max file size 50 MB</div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="name">Title</div>
                                <div class="value">
                                    <input class="input--style-6" type="text" name="post_title">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="name">Content</div>
                                <div class="value">
                                    <textarea class="textarea--style-6" name="post_content" placeholder="insert a Content for your Blog Here"></textarea>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn--radius-2 btn--blue-2" type="submit">Post Blog</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

</div>
</div>





<all>
        <!-- Jquery JS-->
        <script src="addpost/vendor/jquery/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- Main JS-->
    <script src="addpost/js/global.js"></script>

</all>
</body>
</html>
