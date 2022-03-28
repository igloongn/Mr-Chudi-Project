<?php 
	session_start();
	if ($_SESSION['role'] == 'readonly') {
		header('location: index.php');
	}
	if (isset($_GET['id'])) {
		include 'config/db.php';
		require_once 'inc/auth.php';

		$url_id = $_GET['id'];
		$_SESSION['user_id']=$_GET['id'];
		print_r($_SESSION)

?>
<!doctype html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $_SESSION['session_title']; ?></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="apple-touch-icon" href="apple-touch-icon.png">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
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
</head>
<body>
	<div id="tg-search" class="tg-search">
		<button type="button" class="close"><i class="lnr lnr-cross"></i></button>
		<form>
			<fieldset>
				<div class="form-group">
					<input type="search" name="search" class="form-control" value="" placeholder="Enter Keyword">
					<button type="submit" class="tg-btn"><span class="lnr lnr-magnifier"></span></button>
				</div>
				<div class="tg-description"><p>Search What You’re Looking For!</p></div>
			</fieldset>
		</form>
	</div>
	<div id="tg-wrapper" class="tg-wrapper tg-haslayout">
		<!--************************************
				Header Start
		*************************************-->
		<?php 
			include 'inc/header.php';
		
		?>
		<!--************************************
				Header End
		*************************************-->
		<!--************************************
				Inner Page Banner Start
		*************************************-->
		<div class="tg-bannerinnerpage">
			<div class="container">
				<ol class="tg-breadcrumb">
					<li><a href="index.php">Home</a></li>
					<!-- <li><a href="#">News</a></li> -->
					<li class="tg-active"><?php echo $_SESSION['session_title'];?></li>
				</ol>
			</div>
		</div>
		<!--************************************
				Inner Page Banner End
		*************************************-->
		<!--************************************
				Main Start
		*************************************-->
		<main id="tg-main" class="tg-main tg-haslayout">
			<div class="container">
				<div class="row">
					<!-- <div id="tg-twocolumns" class="tg-twocolumns"> -->
						<div class="col-xs-12 col-sm-7 col-md-7 col-lg-8">
							<?php 
								$sql = "select * from posts where id = $url_id";
								$result = mysqli_query($connection, $sql);
							
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
								$_SESSION['session_title'] = $rows['title'];
								$foreign_user_id = $rows['user_id'];
								$foreign_user_id = htmlentities($foreign_user_id);
							?>
							<div id="tg-content" class="tg-content">
								<div class="tg-post tg-postdetailpage">
									<div class="tg-posttitle text-center m-3">
										<h1><?php echo $title; ?></h1>
									</div>
									<br>
									<figure class="tg-postimg">
										<span class="tg-postfeatured"><i class="fa fa-bolt"></i></span>
										<?php 
											if (strlen($image) >5) {
											?>
											<img class="" width="30" src="post_images/<?php echo $image; ?>" alt="image description">
											<?php 
											}else{																
											?>
											<img src="images/nope.jpg" alt="image description">
											<?php 
											}
											
											?>
									</figure>
									<!-- Update and Delete button -->
										<!-- 
									<div class="">
										<div class="text-center mb-3 ">
											<a href="update_post.php?id=<?php echo $url_id; ?>"><button type="button" class="btn btn-success btn-lg mr-5">Update</button></a>
											<a href=""><button type="button" class="btn btn-danger btn-lg">Delete</button></a>
										</div>	
									</div>										 -->
									<div class="textf-center">
										<strong>Content:</strong>
									</div>

									<div class="tg-description">
										<p><?php echo $content; ?></p>
									</div>
									<div class="tg-reviewoverview">
										<div class="tg-borderheading">
											<h3>Review Overview</h3>
										</div>
										<ul class="tg-reviewsstars">
											<li><strong>Consectetur</strong><span class="tg-stars"><span></span></span></li>
											<li><strong>Aadipisicing</strong><span class="tg-stars"><span></span></span></li>
											<li><strong>Eiusmod</strong><span class="tg-stars"><span></span></span></li>
											<li><strong>Tempor</strong><span class="tg-stars"><span></span></span></li>
										</ul>
										<div class="tg-reviewsummery">
											<div class="tg-overallrating">
												<h4>6.9</h4>
												<span>Overall Score</span>
												<div class="tg-stars"><span></span></div>
											</div>
											<div class="tg-summerybox">
												<div class="tg-borderheading">
													<h3>Summary</h3>
												</div>
												<div class="tg-description">
													<p>Consequat duis aute irure dolor in reprehenderit voluptate velit esse cillum dolore fugiat nullaiat pariatur occaecat cupidatat non proident sunt in culpa qui officia deserunti mollit anim id estiate laborum perspiciatis unde omnis istea natus error voluptatem acantium doloremque laudantium totam remiat tok aperiam duis aute irure dolor.</p>
												</div>
											</div>
										</div>
									</div>
									<div class="tg-tagspostshare">
										<div class="tg-tags">
											<span>Tags:</span>
											<div class="tg-tagholder">
												<a class="tg-tag" href="#">Gadgets</a>
												<a class="tg-tag" href="#">Flying Drone</a>
												<a class="tg-tag" href="#">Smart Phones</a>
												<a class="tg-tag" href="#">Phones</a>
												<a class="tg-tag" href="#">Technology</a>
												<a class="tg-tag" href="#">Video</a>
												<a class="tg-tag" href="#">Fun Time</a>
												<a class="tg-tag" href="#">Entertainment</a>
												<a class="tg-tag" href="#">News</a>
												<a class="tg-tag" href="#">Viral Blog</a>
											</div>
										</div>
										<div class="tg-socialshare">
											<span>Share:</span>
											<ul class="tg-socialblackwhite tg-socialicons">
												<li class="tg-facebook">
													<a class="tg-roundicontext" href="javascript:void(0);">
														<em class="tg-usericonholder">
															<i class="fa fa-facebook-f"></i>
															<span>share on facebook</span>
														</em>
													</a>
												</li>
												<li class="tg-twitter">
													<a class="tg-roundicontext" href="javascript:void(0);">
														<em class="tg-usericonholder">
															<i class="fa fa-twitter"></i>
															<span>share on twitter</span>
														</em>
													</a>
												</li>
												<li class="tg-linkedin">
													<a class="tg-roundicontext" href="javascript:void(0);">
														<em class="tg-usericonholder">
															<i class="fa fa-linkedin"></i>
															<span>share on linkdin</span>
														</em>
													</a>
												</li>
												<li class="tg-googleplus">
													<a class="tg-roundicontext" href="javascript:void(0);">
														<em class="tg-usericonholder">
															<i class="fa fa-google-plus"></i>
															<span>share on googl+</span>
														</em>
													</a>
												</li>
												<li class="tg-facebook">
													<a class="tg-roundicontext" href="javascript:void(0);">
														<em class="tg-usericonholder">
															<i class="fa fa-facebook-f"></i>
															<span>share on facebook</span>
														</em>
													</a>
												</li>
												<li class="tg-twitter">
													<a class="tg-roundicontext" href="javascript:void(0);">
														<em class="tg-usericonholder">
															<i class="fa fa-twitter"></i>
															<span>share on twitter</span>
														</em>
													</a>
												</li>
												<li class="tg-linkedin">
													<a class="tg-roundicontext" href="javascript:void(0);">
														<em class="tg-usericonholder">
															<i class="fa fa-linkedin"></i>
															<span>share on linkdin</span>
														</em>
													</a>
												</li>
												<li class="tg-googleplus">
													<a class="tg-roundicontext" href="javascript:void(0);">
														<em class="tg-usericonholder">
															<i class="fa fa-google-plus"></i>
															<span>share on googl+</span>
														</em>
													</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="tg-author">
									<div class="tg-authorbox">
										<figure class="tg-authorimg"><img src="images/author-img.jpg" alt="image description"></figure>
										<div class="tg-authorhead">
											<div class="tg-leftarea">
												<h3><?php echo $author ?></h3>
												<span>Author Since: <?php echo $created; ?></span>
											</div>
											<div class="tg-rightarea">
												<ul class="tg-socialicons tg-socialiconsround">
													<li class="tg-facebook"><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
													<li class="tg-twitter"><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
													<li class="tg-linkedin"><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
													<li class="tg-youtube"><a href="javascript:void(0);"><i class="fa fa-youtube"></i></a></li>
												</ul>
											</div>
										</div>
										<div class="tg-description">
											<p>Consequat duis aute irure dolor in reprehenderit voluptate velit esse cillum dolore eu fugiat nulla pariatur occaecat cupidatat non proident sunt in culpa qui officia deserunt mollit anim id est laborum perspiciatis unde omnis iste natus error sit quae ab illo inventore irure dolor in reprehenderit voluptate velit esse cillum dolore eu fugiat nulla pariatur occaecat cupidatat non.</p>
										</div>
									</div>
								</div>

								<div class="tg-leavereview">
									<div class="tg-borderheading">
										<h3>Leave Your Review</h3>
									</div>
									<form class="tg-formtheme tg-formleavereview">
										<fieldset>
											<div class="form-group">
												<input type="text" name="name" class="form-control" placeholder="Name*">
											</div>
											<div class="form-group">
												<input type="email" name="email" class="form-control" placeholder="Email* (Your email address will not be published.)">
											</div>
											<div class="form-group">
												<input type="text" name="subject" class="form-control" placeholder="Subject">
											</div>
											<div class="form-group">
												<textarea placeholder="Comment"></textarea>
											</div>
											<button class="tg-btn" type="submit">Submit</button>
										</fieldset>
									</form>
								</div>
							</div>
							<?php 
							}
							
							?>
						</div>
						<div class="col-xs-12 col-sm-5 col-md-3 col-lg-3">
							<!-- <aside id="tg-sidebar" class="tg-sidebar"> -->
							<aside>
								<div class="tg-widget tg-widgetsearch">
									<div class="tg-widgettitle">
										<h3>Start Search Here</h3>
									</div>
									<div class="tg-widgetcontent">
										<form class="tg-formtheme">
											<fieldset>
												<div class="form-group">
													<input type="search" name="search" class="form-control" placeholder="Search Here">
												</div>
												<button class="tg-btn" type="submit">Search</button>
											</fieldset>
										</form>
									</div>
								</div>

								<div class="tg-widget tg-widgetlatestposts">
									<div class="tg-widgettitle">
										<h3>Latest in Action</h3>
									</div>
									<div class="tg-widgetcontent">
										<div class="tg-postmargin">
											<?php 
												$query = "SELECT * FROM `posts` ORDER BY id desc limit 0,4";
												$result = mysqli_query($connection, $query);
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
											<article class="tg-post">
												<figure class="tg-postimg">
													<?php 
														if (strlen($image) >5) {
														?>
														<a href="postdetail.php?id=<?php echo $id; ?>"><img src="post_images/<?php echo $image; ?>" alt="image description"></a>
														<?php 
														}else{																
														?>
														<a href="postdetail.php?id=<?php echo $id; ?>"><img src="images/nope.jpg" alt="image description"></a>
														<?php 
														}
														
														?>


													<a class="tg-btnview" href="postdetail.php?id=<?php echo $id; ?>">view</a>
												</figure>
												<div class="tg-postcontent">
													<div class="tg-borderleft">
														<div class="tg-posttitle">
															<h3><a href="postdetail.php?id=<?php echo $id; ?>"><?php echo $title; ?></a></h3>
														</div>
													</div>
												</div>
											</article>
											<?php 
												}
											
											?>
										</div>
									</div>
								</div>
								<div class="tg-widget tg-widgetfacebook">
									<div class="tg-widgetcontent">
										<img src="images/placeholder/placeholder-01.jpg" alt="image description">
									</div>
								</div>

											<!-- Update and Delete button -->

								<br>
								<?php 
									if ( $_SESSION['id'] == $foreign_user_id OR $_SESSION['role']=='admin') {
										?>
									<div class="mt-5">
										<div class="text-center  ">
											<a href="update_post.php?id=<?php echo $url_id; ?>"><button type="button" class="btn btn-success btn-lg ">Update</button></a>
											<br>
											<br>
											<a href="deletepost.php?id=<?php echo $url_id; ?>"><button type="button" class="btn btn-danger btn-lg ">Delete</button></a>
										</div>	
									</div>	

								<?php
									}	else {
									}
								?>

								<br>
								<br>
								<br>

								<div class="tg-widget tg-widgetstayconnected">
									<div class="tg-widgettitle">
										<h3>Stay Connected</h3>
									</div>
									<div class="tg-widgetcontent">
										<ul>
											<li class="tg-facebook">
												<a href="javascript:void(0);">
													<i class="fa fa-facebook"></i>
													<span>15.4K Fans</span>
													<em>LIKE</em>
												</a>
											</li>
											<li class="tg-twitter">
												<a href="javascript:void(0);">
													<i class="fa fa-twitter"></i>
													<span>11.2K Followers</span>
													<em>Follow</em>
												</a>
											</li>
											<li class="tg-youtubeplay">
												<a href="javascript:void(0);">
													<i class="fa fa-youtube-play"></i>
													<span>29.8K Subscribers</span>
													<em>Subcribe</em>
												</a>
											</li>
											<li class="tg-linkedin">
												<a href="javascript:void(0);">
													<i class="fa fa-linkedin"></i>
													<span>22.4K Subscribers</span>
													<em>Subcribe</em>
												</a>
											</li>
										</ul>
									</div>
								</div>
								<div class="tg-widget tg-widgetnewsletter">
									<div class="tg-widgettitle">
										<h3>Subscribe Newsletter</h3>
									</div>
									<div class="tg-widgetcontent">
										<div class="tg-description">
											<p>Consectetur adipisicing elit sed eiusmod tempor incididunt labore.</p>
										</div>
										<form class="tg-formtheme">
											<fieldset>
												<div class="form-group">
													<input type="text" name="yourname" class="form-control" placeholder="Your Name">
												</div>
												<div class="form-group">
													<input type="email" name="youremail" class="form-control" placeholder="Your Email">
												</div>
												<button class="tg-btn" type="submit">send</button>
											</fieldset>
										</form>
									</div>
								</div>
								<div class="tg-widget tg-widgettrendingposts">
									<div class="tg-widgettitle">
										<h3>Trending Posts</h3>
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
											<li>
												<figure>
													<a href="#"><img src="images/thumbnail/img-04.jpg" alt="image description"></a>
													<a class="tg-btnview" href="#"></a>
												</figure>
												<div class="tg-trendingpostcontent">
													<h4><a href="#">Buckle Up For Your Next Adventure</a></h4>
													<time datetime="2016-02-02">April 27, 2017</time>
													<span class="tg-postviews">2.4K Views</span>
												</div>
											</li>
										</ul>
									</div>
								</div>
								<div class="tg-widget tg-widgetinstagram">
									<div class="tg-widgettitle">
										<h3>Instagram</h3>
									</div>
									<div class="tg-widgetcontent">
										<div class="tg-instagramgallery">
											<ul>
												<li>
													<figure>
														<a href="images/instagram/small/img-01.jpg" data-rel="prettyPhoto[instagram]"><img src="images/instagram/small/img-01.jpg" alt="image description"></a>
														<span class="tg-instagramlike">50,134</span>
													</figure>
												</li>
												<li>
													<figure>
														<a href="images/instagram/small/img-02.jpg" data-rel="prettyPhoto[instagram]"><img src="images/instagram/small/img-02.jpg" alt="image description"></a>
														<span class="tg-instagramlike">50,134</span>
													</figure>
												</li>
												<li>
													<figure>
														<a href="images/instagram/small/img-03.jpg" data-rel="prettyPhoto[instagram]"><img src="images/instagram/small/img-03.jpg" alt="image description"></a>
														<span class="tg-instagramlike">50,134</span>
													</figure>
												</li>
												<li>
													<figure>
														<a href="images/instagram/small/img-04.jpg" data-rel="prettyPhoto[instagram]"><img src="images/instagram/small/img-04.jpg" alt="image description"></a>
														<span class="tg-instagramlike">50,134</span>
													</figure>
												</li>
												<li>
													<figure>
														<a href="images/instagram/small/img-05.jpg" data-rel="prettyPhoto[instagram]"><img src="images/instagram/small/img-05.jpg" alt="image description"></a>
														<span class="tg-instagramlike">50,134</span>
													</figure>
												</li>
												<li>
													<figure>
														<a href="images/instagram/small/img-06.jpg" data-rel="prettyPhoto[instagram]"><img src="images/instagram/small/img-06.jpg" alt="image description"></a>
														<span class="tg-instagramlike">50,134</span>
													</figure>
												</li>
												<li>
													<figure>
														<a href="images/instagram/small/img-07.jpg" data-rel="prettyPhoto[instagram]"><img src="images/instagram/small/img-07.jpg" alt="image description"></a>
														<span class="tg-instagramlike">50,134</span>
													</figure>
												</li>
												<li>
													<figure>
														<a href="images/instagram/small/img-08.jpg" data-rel="prettyPhoto[instagram]"><img src="images/instagram/small/img-08.jpg" alt="image description"></a>
														<span class="tg-instagramlike">50,134</span>
													</figure>
												</li>
												<li>
													<figure>
														<a href="images/instagram/small/img-09.jpg" data-rel="prettyPhoto[instagram]"><img src="images/instagram/small/img-09.jpg" alt="image description"></a>
														<span class="tg-instagramlike">50,134</span>
													</figure>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="tg-widget tg-widgettrendingposts">
									<div class="tg-widgettitle">
										<h3>Video Posts</h3>
									</div>
									<div class="tg-widgetcontent">
										<ul>
											<li>
												<figure>
													<a href="javascript:void(0);"><img src="images/thumbnail/img-01.jpg" alt="image description"></a>
													<a class="tg-btnplayvideo" href="javascript:void(0);"><i class="fa fa-play"></i></a>
												</figure>
												<div class="tg-trendingpostcontent">
													<h4><a href="#">Buckle Up For Your Next Adventure</a></h4>
													<time datetime="2016-02-02">April 27, 2017</time>
													<span class="tg-postviews">2.4K Views</span>
												</div>
											</li>
											<li>
												<figure>
													<a href="javascript:void(0);"><img src="images/thumbnail/img-02.jpg" alt="image description"></a>
													<a class="tg-btnplayvideo" href="javascript:void(0);"><i class="fa fa-play"></i></a>
												</figure>
												<div class="tg-trendingpostcontent">
													<h4><a href="#">Buckle Up For Your Next Adventure</a></h4>
													<time datetime="2016-02-02">April 27, 2017</time>
													<span class="tg-postviews">2.4K Views</span>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</aside>
					</div>
				</div>
			</div>
		</main>
		<!--************************************
				Main End
		*************************************-->
		<!--************************************
				Footer Start
		*************************************-->
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
						<div class="col-xs-12 col-sm-12 col-md-7 col-lg-8">
							<form class="tg-formtheme tg-formnewsletter">
								<fieldset>
									<div class="form-group">
										<input type="text" class="form-control" name="yourname" placeholder="Your Name">
									</div>
									<div class="form-group">
										<input type="text" class="form-control" name="yourname" placeholder="Your Name">
									</div>
									<button type="submit" class="tg-btn">Signup Now</button>
								</fieldset>
							</form>
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
		<!--************************************
				Footer End
		*************************************-->
	</div>
	<!--************************************
			Wrapper End
	*************************************-->
	<script src="js/vendor/jquery-library.js"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="https://maps.google.com/maps/api/js?key=AIzaSyCR-KEWAVCn52mSdeVeTqZjtqbmVJyfSus&amp;language=en"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/prettyPhoto.js"></script>
	<script src="js/flipclock.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/jquery-ui.js"></script>
	<script src="js/gmap3.js"></script>
	<script src="js/main.js"></script>
</body>

</html>
<?php 
	} else{
		header('Location: index.php');
	}

?>