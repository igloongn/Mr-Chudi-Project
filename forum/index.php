<?php
session_start();
include 'config/db.php';
require_once 'inc/auth.php';

if (!isset($_GET['page'])) {
	header('location: index.php?page=1');
}
else{
	$page = $_GET['page'];
	if ($page == 0 || $page < 1) {
		$showpostfrom = 0;
	} else {
		$showpostfrom = ($page*5)-5;
	}

	$sqlpage ="SELECT * FROM `posts` order by id desc LIMIT $showpostfrom,5";
	$page_result = mysqli_query($connection, $sqlpage);


?>
<!doctype html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Home</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="apple-touch-icon" href="apple-touch-icon.png">
	<link rel="stylesheet" href="css/bootstrap.min.css">
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
	<link rel="stylesheet" href="css/color.css">
	<link rel="stylesheet" href="css/transitions.css">
	<link rel="stylesheet" href="css/responsive.css">
	<link rel="stylesheet" href="css/main.css">
	<script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>
<body class="tg-home tg-boxed tg-homefour">
	<!--************************************
			Search Start
	*************************************-->
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
	<!--************************************
			Search End
	*************************************-->
	<!--************************************
			Wrapper Start
	*************************************-->
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
				Home Slider Start
		*************************************-->
		<div class="clearfix"></div>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div id="tg-bannerfullslider" class="tg-bannerfullslider tg-btnslider">
						<div class="item">
							<article class="tg-post tg-postcononimg">
								<figure class="tg-postimg">
									<span class="tg-postfeatured"><i class="fa fa-bolt"></i></span>
									<img src="images/postimg/img-30.jpg" alt="image description">
									<figcaption>
										<div class="tg-postcontent">
											<ul class="tg-posttags">
												<li><a href="javascript:void(0);">Travel</a></li>
											</ul>
											<div class="tg-posttitle tg-posttitlelarge">
												<h3><a href="javascript:void(0);">Road Trips Aren't Measure By Mile Markers, But By Moments.</a></h3>
											</div>
										</div>
										<div class="tg-postbtnbox">
											<a class="tg-btn" href="javascript:void(0);">View All Post</a>
										</div>
									</figcaption>
								</figure>
							</article>
						</div>
						<div class="item">
							<article class="tg-post tg-postcononimg">
								<figure class="tg-postimg">
									<span class="tg-postfeatured"><i class="fa fa-bolt"></i></span>
									<img src="images/postimg/img-31.jpg" alt="image description">
									<figcaption>
										<div class="tg-postcontent">
											<ul class="tg-posttags">
												<li><a href="javascript:void(0);">Travel</a></li>
											</ul>
											<div class="tg-posttitle tg-posttitlelarge">
												<h3><a href="javascript:void(0);">Road Trips Aren't Measure By Mile Markers, But By Moments.</a></h3>
											</div>
										</div>
										<div class="tg-postbtnbox">
											<a class="tg-btn" href="javascript:void(0);">View All Post</a>
										</div>
									</figcaption>
								</figure>
							</article>
						</div>
						<div class="item">
							<article class="tg-post tg-postcononimg">
								<figure class="tg-postimg">
									<span class="tg-postfeatured"><i class="fa fa-bolt"></i></span>
									<img src="images/postimg/img-32.jpg" alt="image description">
									<figcaption>
										<div class="tg-postcontent">
											<ul class="tg-posttags">
												<li><a href="javascript:void(0);">Travel</a></li>
											</ul>
											<div class="tg-posttitle tg-posttitlelarge">
												<h3><a href="javascript:void(0);">Road Trips Aren't Measure By Mile Markers, But By Moments.</a></h3>
											</div>
										</div>
										<div class="tg-postbtnbox">
											<a class="tg-btn" href="javascript:void(0);">View All Post</a>
										</div>
									</figcaption>
								</figure>
							</article>
						</div>
					</div>
					<div class="tg-bannerslidecount">
						<span class="tg-currentItem"><span class="tg-result"></span></span>
						<span>/</span>
						<span class="tg-owlItems"><span class="tg-result"></span></span>
					</div>
				</div>
			</div>
		</div>
		<!--************************************
				Home Slider End
		*************************************-->
		<!--************************************
				Main Start
		*************************************-->
		<div >
		<!-- <div > -->
			<main id="tg-main" class="tg-main tg-haslayout">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="tg-heading">
								<h3>Explore Whats Trending</h3>
							</div>
						</div>

						<section style="min-height: 2000px;" class="tg-main-section tg-haslayout">
							<div id="tg-twocolumns" class="tg-twocolumns">
								<!-- <div> -->
								<!-- <div class="col-xs-12 col-sm-7 col-md-9 col-lg-12"> -->
								<div class="">
									<div id="tg-content" class="tg-content">
										<div class="row">
											<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
												<div class="tg-borderheading">
													<h3>All the Blogs</h3>
												</div>
		
													<?php 
														// $query = "SELECT * FROM `posts` ORDER BY id desc";
														// $result = mysqli_query($connection, $query);
		
														
													while ($rows = mysqli_fetch_assoc($page_result)) {
														$id = $rows['id'];
														$id = htmlentities($id);
														$created = $rows['created'];
														$title = $rows['title'];
														$title = htmlentities($title);
														$author = $rows['author'];
														$author = htmlentities($author);
														$image = $rows['image'];
														$image = htmlentities($image);
														$content = $rows['content'];
														$content = htmlentities($content);
		
													
													?>
		
												<div class="tg-postmargin mb-5">
													<article class="tg-post tg-postleftimg">
														<figure class="tg-postimg">
															<span class="tg-postfeatured"><i class="fa fa-bolt"></i></span>
															<?php 
															if (strlen($image) >5) {
															?>
															<a href="postdetail.php?id=<?php echo $id?>"><img src="post_images/<?php echo $image; ?>" alt="image description"></a>
															<?php 
															}else{																
															?>
															<a href="postdetail.php?id=<?php echo $id?>"><img src="images/nope.jpg" alt="image description"></a>
															<?php 
															}
															
															?>
															<a class="tg-btnview" href="postdetail.php?id=<?php echo $id?>">view post</a>
														</figure>
														<div class="tg-postcontent">
															<div class="tg-borderleft">
																<ul class="tg-posttags">
																	<li><a href="javascript:void(0);">Audio</a></li>
																	<li><a href="javascript:void(0);">Travel</a></li>
																</ul>
																<div class="tg-posttitle tg-posttitlelarge">
																	<h3><a href="postdetail.php?id=<?php echo $id?>"><?php echo $title; ?></a></h3>
																</div>
															</div>
															<div class="tg-description">
																<?php if (strlen($content) > 150) {
																	$content = substr($content,0,800)."...";
																} echo $content; ?>
															</div>
															<ul class="tg-postmatadata">
																<li>
																	<a href="javascript:void(0);">
																		<span class="lnr lnr-eye"></span>
																		<span>2.4K</span>
																	</a>
																</li>
																<li>
																	<a href="javascript:void(0);">
																		<span class="lnr lnr-bubble"></span>
																		<span>17.9K</span>
																	</a>
																</li>
																<li>
																	<a href="javascript:void(0);">
																		<span class="lnr lnr-calendar-full"></span>
																		<span><?php echo $created; ?></span>
																	</a>
																</li>
																<li>
																	<a href="javascript:void(0);">
																		<span class="lnr lnr-user"></span>
																		<span>By: <?php echo $author; ?></span>
																	</a>
																</li>
															</ul>
															<div class="tg-postbtnbox">
																<a class="tg-btn" href="postdetail.php?id=<?php echo $id?>">view post</a>
															</div>
														</div>
													</article>
												</div>
											</div>
											<br>
											<br>
											<?php 
												}
											?>
										</div>
									</div>
								</div>
							</div>
						</section>

						<!-- Pagination -->
						<div class="d-flex justify-content-center w-100">
						<nav aria-label="Page navigation">
							<ul class="pagination pagination-lg">

							<!-- CREATING BACKWARD BUTTON -->
								<?php 
									if (isset($page)) { 
										if ($page>1) {
										?>
									<li class="page-item" aria-current="page"><a class="page-link" href="index.php?page=<?php echo $page-1; ?>">Previous</a></li>
											
									<?php } } ?>
								<?php 
									global $connection;
									$sql = "SELECT COUNT(*) from posts";
									$query = mysqli_query($connection, $sql);
									$rowpagination = mysqli_fetch_assoc($query);
									$totalpaginationposts = array_shift($rowpagination);
		
									$postpagination = $totalpaginationposts/2;
									$postpagination = ceil($postpagination);
									
									for ($i=1; $i+1 <=$postpagination ; $i++) { 
										if (isset($page)) {
											if ($i == $page) { ?>
												<li class="page-item active"><a class="page-link" href="index.php?page=<?php echo $i; ?>"><?php echo $i;?></a></li>
											<?php } else { ?>
												<li class="page-item"><a class="page-link" href="index.php?page=<?php echo $i; ?>"><?php echo $i;?></a></li>
											<?php }  ?>
								<?php } }?>
								<!-- CREATING FORWORD BUTTON -->
								<?php 
									if (isset($page)&&!empty($page)) { 
										if ($page+2<= $postpagination) { ?>
										<li class="page-item" aria-current="page"><a class="page-link" href="index.php?page=<?php echo $page+1; ?>">Next</a></li>

									<?php } } ?>
							</ul>
						</nav>
					</div>

					<!-- PAGINATION END-->
				</div>
					</div>
				</div>
			</main>
		</div>
		<!--************************************
				Main End
		*************************************-->
		<!--************************************
				Footer Start
		*************************************-->
		<footer id="tg-footer" class="tg-footer tg-haslayout">
			<div class="tg-instagramgallery">
				<ul>
					<li>
						<figure>
							<a class="tg-btnview" href="images/instagram/big/img-17.jpg" data-rel="prettyPhoto[lrginstagram]">view</a>
							<img src="images/instagram/big/img-17.jpg" alt="image description">
							<figcaption>
								<span class="tg-instagramlike">50,134</span>
								<span class="tg-instagramcomment">16,788</span>
							</figcaption>
						</figure>
					</li>
					<li>
						<figure>
							<a class="tg-btnview" href="images/instagram/big/img-18.jpg" data-rel="prettyPhoto[lrginstagram]">view</a>
							<img src="images/instagram/big/img-18.jpg" alt="image description">
							<figcaption>
								<span class="tg-instagramlike">50,134</span>
								<span class="tg-instagramcomment">16,788</span>
							</figcaption>
						</figure>
					</li>
					<li>
						<figure>
							<a class="tg-btnview" href="images/instagram/big/img-19.jpg" data-rel="prettyPhoto[lrginstagram]">view</a>
							<img src="images/instagram/big/img-19.jpg" alt="image description">
							<figcaption>
								<span class="tg-instagramlike">50,134</span>
								<span class="tg-instagramcomment">16,788</span>
							</figcaption>
						</figure>
					</li>
					<li>
						<figure>
							<a class="tg-btnview" href="images/instagram/big/img-20.jpg" data-rel="prettyPhoto[lrginstagram]">view</a>
							<img src="images/instagram/big/img-20.jpg" alt="image description">
							<figcaption>
								<span class="tg-instagramlike">50,134</span>
								<span class="tg-instagramcomment">16,788</span>
							</figcaption>
						</figure>
					</li>
				</ul>
			</div>
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

<!-- Mirrored from exprostudio.com/html/article/index4.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 26 Mar 2022 08:49:05 GMT -->
</html>
<?php 
	}

?>