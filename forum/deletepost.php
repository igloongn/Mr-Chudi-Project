<?php 
    session_start();
    if ($_SESSION['role'] == 'readonly') {
		header('location: index.php');
	}
    include 'config/db.php';
    require_once 'inc/auth.php';


    $searchqueryparameter=$_SESSION['user_id'];
    global $connection;
    
$query = "SELECT * FROM posts WHERE id='$searchqueryparameter'";
$result = mysqli_query($connection, $query);
if (!$result) {
    die("Error in Query".mysqli_error($connection));
}
while ($rows=mysqli_fetch_assoc($result)) {
    $authortobeupdated = $rows['author'];
    $id = $rows['id'];
    $title = $rows['title'];
    $author = $rows['author'];
    $image = $rows['image'];
    $content = $rows['content'];

}

// if (isset($_POST['submit'])) {
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
global $connection;
// $id=$_SESSION['user_id']; 
$id=$_POST['post_id']; 
$query = "DELETE FROM `posts` WHERE id='$id'";
$result = mysqli_query($connection, $query);
if (!$result) {
    die("Error in Query<br>".mysqli_error($connection));
} else {
    $targetpathtodeleteimage = "post_images/$image";
    unlink($targetpathtodeleteimage);
    header("location: index.php");
    echo 'The Deleted went through';
}

}
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
	<link rel="stylesheet" href="css/color.css">
	<link rel="stylesheet" href="css/transitions.css">
	<link rel="stylesheet" href="css/responsive.css">
	<script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script><title>Title</title>
</head>
<body>
<?php 
			include 'inc/header.php';
		
		?>
    <div>
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Are you sure?</h1>
                <p class="lead"><strong class="mr-2"><?php echo $title; ?> </strong>  will be deleted</p>
                <hr class="my-4">
                <p><b>Note:</b> This action is irreversible 🚧.</p>
                <form method="POST" action="deletepost.php?id=<?php echo $searchqueryparameter;?>">
                    <input type="hidden" name="post_id" value="<?php echo $searchqueryparameter; ?>">
                    <a class="btn btn-success btn-lg" href="postdetail.php?id=<?php echo $id?>" role="button">Go Back</a>
                    <button name="submit" class="btn btn-danger btn-lg ml-4" type='submit'  >Delete</button>
                </form>
            </div>
        </div>
    </div>



    <footer id="tg-footer" class="tg-footer tg-haslayout">
			<div class="tg-newsletter">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
							<div class="tg-borderleft">
								<span>Singup for Free!</span>
								<h3>Get Amazing &amp; New Information.</h3>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tg-threecolumns">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
							<div class="tg-column">
								<div class="tg-widget tg-widgetaboutus">
									<figure><img src="images/img-01.jpg" alt="image description"></figure>
									<h3>The Article</h3>
									<div class="tg-description">
										<p>Consectetur adipisicing elit sed eiusmod tempor incididunt ut labore et dolore magna aliqua enim ad minim veniam quis nostrud exercitation ullamco laboris.</p>
									</div>
									<ul class="tg-socialicons">
										<li><a href="#"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
										<li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
										<li><a href="#"><i class="fa fa-instagram"></i></a></li>
									</ul>
									<div class="tg-btnbox">
										<a class="tg-btn" href="javascript:void(0);">Contact Now</a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
							<div class="tg-column">
								<div class="tg-widget tg-widgetcategories">
									<div class="tg-widgettitle">
										<h3>Popular Categories</h3>
									</div>
									<div class="tg-widgetcontent">
										<ul>
											<li><a href="javascript:void(0);"><span>Funny</span>28245</a></li>
											<li><a href="javascript:void(0);"><span>Sports</span>4856</a></li>
											<li><a href="javascript:void(0);"><span>DIY</span>8654</a></li>
											<li><a href="javascript:void(0);"><span>Fashion</span>6247</a></li>
											<li><a href="javascript:void(0);"><span>Travel</span>888654</a></li>
											<li><a href="javascript:void(0);"><span>Lifestyle</span>873144</a></li>
											<li><a href="javascript:void(0);"><span>Gifs</span>873144</a></li>
											<li><a href="javascript:void(0);"><span>Video</span>18465</a></li>
											<li><a href="javascript:void(0);"><span>Gadgets</span>3148</a></li>
											<li><a href="javascript:void(0);"><span>Audio</span>77531</a></li>
											<li><a href="javascript:void(0);"><span>All</span>9247</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
							<div class="tg-column">
								<div class="tg-widget tg-widgettrendingposts">
									<div class="tg-widgettitle">
										<h3>Editor Picks</h3>
									</div>
									<div class="tg-widgetcontent">
										<ul>
											<li>
												<figure>
													<a href="#"><img src="images/thumbnail/img-01.jpg" alt="image description"></a>
													<a class="tg-btnview" href="#"></a>
												</figure>
												<div class="tg-trendingpostcontent">
													<h4><a href="#">Buckle Up For Your Next Adventure</a></h4>
													<time datetime="2016-02-02">April 27, 2017</time>
													<span class="tg-postviews">2.4K Views</span>
												</div>
											</li>
											<li>
												<figure>
													<a href="#"><img src="images/thumbnail/img-02.jpg" alt="image description"></a>
													<a class="tg-btnview" href="#"></a>
												</figure>
												<div class="tg-trendingpostcontent">
													<h4><a href="#">Buckle Up For Your Next Adventure</a></h4>
													<time datetime="2016-02-02">April 27, 2017</time>
													<span class="tg-postviews">2.4K Views</span>
												</div>
											</li>
											<li>
												<figure>
													<a href="#"><img src="images/thumbnail/img-03.jpg" alt="image description"></a>
													<a class="tg-btnview" href="#"></a>
												</figure>
												<div class="tg-trendingpostcontent">
													<h4><a href="#">Buckle Up For Your Next Adventure</a></h4>
													<time datetime="2016-02-02">April 27, 2017</time>
													<span class="tg-postviews">2.4K Views</span>
												</div>
											</li>
											<li><a href="javascript:void(0);">View All</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tg-footerbar">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<strong class="tg-logo"><a href="javascript:void(0);"><img src="images/logo2.png" alt="image description"></a></strong>
							<div class="tg-copyrightbox">
								<span>&copy; 2017 - The Article. All  Rights Reserved</span>
								<ul>
									<li><a href="javascript:void(0);">Disclaimer</a></li>
									<li><a href="javascript:void(0);">Privacy</a></li>
									<li><a href="javascript:void(0);">Advertisement</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>