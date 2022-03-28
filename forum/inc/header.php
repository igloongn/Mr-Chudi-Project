
<style>
    #custom-logout:hover{
        color: red;
    }
</style>

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
									<ul  class="mr-4">
										<li class="">
											<h3><a href="index.php">Home</a></h3>
										</li>
										<?php 
                                            if ($_SESSION['role'] == 'readonly') {
                                            }else{
                                        ?>
                                            <li><h3><a href="addpost.php">Add Post</a></h3></li>
                                        <?php 
                                        }
                                        ?>
										<li><h3><a id="custom-logout" href="forum_logout.php">Logout</a></h3></li>
									</ul>
								</div>
							</nav>


                            <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">

                                <a class="navbar-brand mr-5" href="">The Main Project</a>

                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                            
                                <div class="collapse navbar-collapse" id="navbarContent">
                                    <ul class="navbar-nav mr-auto">
                                        <li class="nav-item active">
                                            <a class="nav-link" href="index.php" >Home </a>
                                        </li>
                                                        
                                        <li><a class="nav-link" href="addpost.php">Add Post</a></li>
										<li><a class="nav-link" href="sports.html">Sports</a></li>
										<li><a class="nav-link" href="doityourself.html">DIY</a></li>
                                    </ul>

                                    <form class="form-inline my-2 my-lg-0">
                                        <input class="form-control mr-sm-2" type="search" placeholder="Search here" aria-label="Search">
                                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                                    </form>
                                </div>
                            </nav> -->



							<a id="tg-btnsearchtoggle" class="tg-btnsearchtoggle" href="#tg-search"><i class="lnr lnr-magnifier"></i></a>
						</div>
					</div>
				</div>
			</div>
		</header>


