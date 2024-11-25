<!DOCTYPE html>
<html class="no-js">

<?php 

	session_start();
	include ("connect.php"); 
	include ("check_session.php");
	echo "jeff";

?>

<head>
	<title>Cherubim Of Heaven - Multipurpose Funeral Service HTML template</title>
	<meta charset="utf-8">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="format-detection" content="telephone=no">

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/animations.css">
	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" href="css/main.css" class="color-switcher-link">
	<link rel="stylesheet" href="css/shop.css" class="color-switcher-link">
	<script src="js/vendor/modernizr-2.6.2.min.js"></script>

</head>

<body>

	<div class="preloader">
		<div class="preloader_image"></div>
	</div>
	<div class="modal" tabindex="-1" role="dialog" aria-labelledby="search_modal" id="search_modal">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		<div class="widget widget_search">
			<form method="get" class="searchform search-form" action="#">
				<div class="form-group">
					<input type="text" value="" name="search" class="form-control" placeholder="Search keyword"
						id="modal-search-input">
				</div>
				<button type="submit" class="btn">Search</button>
			</form>
		</div>
	</div>
	<div class="modal fade" tabindex="-1" role="dialog" id="messages_modal">
		<div class="fw-messages-wrap ls p-normal">
		</div>
	</div>

			<section class="page_toplogo ls s-pt-25 s-pb-20 s-py-md-30">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-12">

							<div class="d-md-flex justify-content-md-end align-items-md-center">
								<div class="mr-auto">

									<div class="d-none d-md-flex justify-content-center justify-content-md-start">
										<a href="index.php" class="logo">
											<img src="images/logo.png" alt="">
											<div class="d-flex flex-column">
												<h4 class="logo-text color-main">Cherubim Of Heaven</h4>
												<span class="logo-subtext">Funeral Service</span>
											</div>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<header class="page_header ls s-bordertop home-header nav-narrow s-py-5 s-py-lg-0">
				<div class="container">
					<div class="row align-items-center">
						<div class="d-block d-md-none col-12">
							<a href="index.php" class="logo">
								<img src="images/logo.png" alt="">
								<div class="d-flex flex-column">
									<h4 class="logo-text color-main">Cherubim Of Heaven</h4>
									<span class="logo-subtext">Funeral Service</span>
								</div>
							</a>
						</div>
						<div class="col-xl-12">

							<div class="nav-wrap with-top-buttons">
								<!-- main nav start -->
								<nav class="top-nav">
									<ul class="nav sf-menu">
										<li class="active">
											<a href="index.php">Home</a>
										</li>

										<li>
											<a href="home-blocks.php">Contents</a>
										</li>
										<li>
											<a href="about.php">Pages</a>
											<ul>
												<li>
													<a href="about.php">About</a>
												</li>

												<li>
													<a href="services.php">Our Services</a>
												</li>

												<li>
													<a href="plan-ahead.php">Plan Ahead</a>
												</li>

												<li>
													<a href="pricing.php">Pricing</a>
												</li>

												<!-- shop -->
												<li>
													<a href="shop-right.php">Shop</a>
													<ul>
														<li>
															<a href="shop-account-dashboard.php">Account</a>
															<ul>

																<li>
																	<a href="shop-account-details.php">Account details</a>
																</li>
																<li>
																	<a href="shop-account-addresses.php">Addresses</a>
																</li>
																<li>
																	<a href="shop-account-address-edit.php">Edit Address</a>
																</li>
																<li>
																	<a href="shop-account-orders.php">Orders</a>
																</li>
																<li>
																	<a href="shop-account-order-single.php">Single Order</a>
																</li>
																<li>
																	<a href="shop-account-downloads.php">Downloads</a>
																</li>
																<li>
																	<a href="shop-account-password-reset.php">Password Reset</a>
																</li>
																<li>
																	<a href="shop-account-login.php">Login/Logout</a>
																</li>

															</ul>
														</li>
														<li>
															<a href="shop-right.php">Right Sidebar</a>
														</li>
														<li>
															<a href="shop-left.php">Left Sidebar</a>
														</li>
														<li>
															<a href="shop-product-right.php">Product Right Sidebar</a>
														</li>
														<li>
															<a href="shop-product-left.php">Product Left Sidebar</a>
														</li>
														<li>
															<a href="shop-cart.php">Cart</a>
														</li>
														<li>
															<a href="shop-checkout.php">Checkout</a>
														</li>
														<li>
															<a href="shop-order-received.php">Order Received</a>
														</li>

													</ul>
												</li>

												<!-- events -->
												<li>
													<a href="events-full.php">Events</a>
												</li>
												<!-- eof events -->

												<li>
													<a href="team.php">Team</a>
													<ul>
														<li>
															<a href="team.php">Team List</a>
														</li>
														<li>
															<a href="team-single.php">Team Member</a>
														</li>
													</ul>
												</li>

												<!-- gallery -->
												<li>
													<a href="gallery-regular.php">Gallery</a>
												</li>

												<li>
													<a href="comingsoon.php">Comingsoon</a>
												</li>

												<li>
													<a href="faq2.php">FAQ</a>
												</li>
												<li>
													<a href="404.php">404</a>
												</li>

											</ul>
										</li>
										<!-- eof pages -->
										<!-- blog -->
										<li>
											<a href="blog-right.php">Blog</a>
										</li>
										<!-- eof blog -->

										<!-- contacts -->
										<li>
											<a href="contact.php">Contacts</a>
										</li>

										<!-- eof contacts -->
									</ul>


								</nav>
								<!-- eof main nav -->
								<span class="d-none d-xl-block">
									<a href="#" class="search_modal_button">
										<i class="fa fa-search"></i>
									</a>
								</span>

								<a href="#" class="d-none d-md-block btn btn-small btn-outline-maincolor mr-2">Time Capsule </a>
								<a href="shop-account-login.php" class="d-none d-md-block btn btn-small btn-maincolor"><?php echo $login_text ?></a>

							</div>

						</div>
					</div>
				</div>

				<!-- header toggler -->

				<span class="toggle_menu main-toggle"><span></span></span>

			</header>

			<section class="page_slider ds">
				<div class="flexslider" data-nav="false">
					<ul class="slides">
						<li class="cover-image">
							<span class="flexslider-overlay"></span>
							<img src="images/slide01.jpg" alt="">
							<div class="container">
								<div class="row">
									<div class="col-md-12">
										<div class="intro_layers_wrapper">
											<div class="intro_layers">
												<div class="intro_layer" data-animation="fadeInDown">
													<p class="intro_before_featured_word">today, tomorrow and beyond.
													</p>
												</div>
												<div class="intro_layer" data-animation="fadeInDown">
													<div class="d-inline-block">
														<h2 class="intro_featured_word">
															<span class="color-main">Guiding</span> you<br> with
															knowledge
														</h2>
													</div>
												</div>

												<div class="intro_layer" data-animation="fadeInDown">
													<p class="intro_after_featured_word">We understand every funeral is
														different because every person is<br> unique and each family
														situation is different.</p>
												</div>

												<div class="intro_layer slider-buttons" data-animation="fadeInDown">
													<a href="#" class="btn btn-big btn-maincolor">Learn More</a>
													<a href="#" class="btn btn-big btn-outline-darkgrey">Contact Us</a>
												</div>
											</div> <!-- eof .intro_layers -->
										</div> <!-- eof .intro_layers_wrapper -->
									</div> <!-- eof .col-* -->
								</div><!-- eof .row -->
							</div><!-- eof .container -->
						</li>
						<li class="cover-image">
							<span class="flexslider-overlay slide03"></span>
							<img src="images/slide03.jpg" alt="">
							<div class="container">
								<div class="row">
									<div class="col-md-12">
										<div class="intro_layers_wrapper">
											<div class="intro_layers">
												<div class="intro_layer" data-animation="fadeInDown">
													<p class="intro_before_featured_word">today, tomorrow and beyond.
													</p>
												</div>
												<div class="intro_layer" data-animation="fadeInDown">
													<div class="d-inline-block">
														<h2 class="intro_featured_word">
															<span class="color-main">Guiding</span> you<br> with
															knowledge
														</h2>
													</div>
												</div>

												<div class="intro_layer" data-animation="fadeInDown">
													<p class="intro_after_featured_word">We understand every funeral is
														different because every person is<br> unique and each family
														situation is different.</p>
												</div>

												<div class="intro_layer slider-buttons" data-animation="fadeInDown">
													<a href="#" class="btn btn-big btn-maincolor">Learn More</a>
													<a href="#" class="btn btn-big btn-outline-darkgrey">Contact Us</a>
												</div>
											</div> <!-- eof .intro_layers -->
										</div> <!-- eof .intro_layers_wrapper -->
									</div> <!-- eof .col-* -->
								</div><!-- eof .row -->
							</div><!-- eof .container -->
						</li>
						<li class="cover-image">
							<span class="flexslider-overlay"></span>
							<img src="images/slide01.jpg" alt="img" draggable="false">
							<video loop="" muted="" id="myVideo">
								<source src="images/video/video.mp4" data-src="images/video/video.mp4" type="video/mp4">
							</video>
							<div class="container">
								<div class="row">
									<div class="col-md-12">
										<div class="intro_layers_wrapper">
											<div class="intro_layers">
												<div class="intro_layer" data-animation="fadeInDown">
													<p class="intro_before_featured_word">today, tomorrow and beyond.
													</p>
												</div>
												<div class="intro_layer" data-animation="fadeInDown">
													<div class="d-inline-block">
														<h2 class="intro_featured_word">
															<span class="color-main">Guiding</span> you<br> with
															knowledge
														</h2>
													</div>
												</div>

												<div class="intro_layer" data-animation="fadeInDown">
													<p class="intro_after_featured_word">We understand every funeral is
														different because every person is<br> unique and each family
														situation is different.</p>
												</div>

												<div class="intro_layer slider-buttons" data-animation="fadeInDown">
													<a href="#" class="btn btn-big btn-maincolor">Learn More</a>
													<a href="#" class="btn btn-big btn-outline-darkgrey">Contact Us</a>
												</div>
											</div> <!-- eof .intro_layers -->
										</div> <!-- eof .intro_layers_wrapper -->
									</div> <!-- eof .col-* -->
								</div><!-- eof .row -->
							</div><!-- eof .container -->
						</li>
					</ul>
				</div> <!-- eof flexslider -->
			</section>

			<section id="about"
				class="s-pt-60 s-pb-55 s-pt-lg-100 s-pb-lg-95 s-pt-xl-150 s-pb-xl-50 images-overlay ls c-gutter-70 container-px-0 text-center text-xl-left">
				<div class="container">
					<div class="row">
						<div class="col-12 col-xl-6 animate" data-animation="fadeInLeft">
							<div class="overlay-image">
								<div class="image-front img-overlay">
									<a href="images/img-02.jpg" class="photoswipe-link"
										data-iframe="https://www.youtube.com/embed/mHaynL_uW3k" data-index="1">
										<img src="images/img-02.jpg" alt="">
									</a>
								</div>
								<div class="image-back img-overlay">
									<img src="images/img-01.jpg" alt="">
								</div>
							</div>
						</div>
						<div class="col-12 col-xl-6 animate" data-animation="fadeInRight">
							<div class="divider-60 hidden-divider"></div>
							<p class="subtitle special-subtitle">today, tomorrow and beyond.</p>
							<h3 class="special-heading"><span class="color-main">Experience </span>the Difference</h3>
							<div class="divider-55 d-none d-lg-block"></div>
							<p>Having established itself long ago as San Diego’s most prestigious funeral home and
								cemetery, Greenwood Memorial Park, Mortuary and Crematory is truly a place like no
								other.</p>
							<p>Built in 1907 on a slight hill with an ocean view, Greenwood’s appeal began with its
								location.</p>
							<div class="divider-40"></div>
							<div class="media centered-media">
								<div class="icon-styled color-main fs-40">
									<i class="ico-planning"></i>
								</div>

								<div class="media-body">
									<h6>
										Plan Ahead - Pre-Plan
									</h6>
									<p>
										You can make these important decisions in the privacy of your own home
									</p>
								</div>
							</div>
							<div class="divider-40"></div>
							<div class="media centered-media">
								<div class="icon-styled color-main fs-40">
									<i class="ico-favorites"></i>
								</div>

								<div class="media-body">
									<h6>
										Experience the Difference
									</h6>
									<p>
										We offer unique opportunities for families to create healing moments after loss.
									</p>
								</div>
							</div>
						</div>
					</div>
					<div class="divider-95 divider-exl-140 d-none d-xl-block"></div>
				</div>
			</section>

			<section id="services"
				class="s-pt-55 s-pb-10 s-pt-lg-95 s-pb-lg-50 s-pt-xl-145 s-pb-xl-100 ls ms c-gutter-0 text-center text-lg-left">
				<div class="container">
					<div class="row">
						<div class="col-12 col-lg-6">
							<p class="subtitle special-subtitle">today, tomorrow and beyond.</p>
							<h3 class="special-heading"><span class="color-main">Enjoy </span> our quality<br> services
							</h3>
						</div>
						<div class="col-12 col-lg-6">
							<div class="divider-11 d-none d-lg-block"></div>
							<p>Over the years, it has expanded to include several chapels, a mortuary, crematory, three
								mausoleums, a collection of international and rare vegetation and statuary.</p>
							<p>Many prominent San Diego residents are laid to rest here and many of the markers tell a
								fascinating story. </p>

						</div>
						<div class="divider-40 d-block d-lg-none"></div>
						<div class="divider-60 d-none d-lg-block"></div>
						<div class="col-sm-12 text-center">
							<div class="owl-carousel" data-responsive-lg="3" data-responsive-md="2"
								data-responsive-sm="2" data-responsive-xs="1" data-nav="false" data-autoplay="true"
								data-loop="true">
								<div class="vertical-item text-center">
									<div class="item-media">
										<img src="images/service/01.jpg" alt="">
										<div class="media-links">
											<a class="abs-link" title="" href="service-single.php"></a>
										</div>
									</div>
									<div class="item-content hero-bg box-shadow relative-content">
										<p class="big">
											<a href="service-single.php">San Diego Burial at Sea Captains</a>
										</p>
									</div>
								</div>
								<div class="vertical-item text-center">
									<div class="item-media">
										<img src="images/service/02.jpg" alt="">
										<div class="media-links">
											<a class="abs-link" title="" href="service-single.php"></a>
										</div>
									</div>
									<div class="item-content hero-bg box-shadow relative-content">
										<p class="big">
											<a href="service-single.php">Funeral Your Way is a licensed California</a>
										</p>
									</div>
								</div>
								<div class="vertical-item text-center">
									<div class="item-media">
										<img src="images/service/03.jpg" alt="">
										<div class="media-links">
											<a class="abs-link" title="" href="service-single.php"></a>
										</div>
									</div>
									<div class="item-content hero-bg box-shadow relative-content">
										<p class="big">
											<a href="service-single.php">One contact point for Cremation</a>
										</p>
									</div>
								</div>
								<div class="vertical-item text-center">
									<div class="item-media">
										<img src="images/service/04.jpg" alt="">
										<div class="media-links">
											<a class="abs-link" title="" href="service-single.php"></a>
										</div>
									</div>
									<div class="item-content hero-bg box-shadow relative-content">
										<p class="big">
											<a href="service-single.php">Lorem ipsum dolor sit amet, conse</a>
										</p>
									</div>
								</div>
								<div class="vertical-item text-center">
									<div class="item-media">
										<img src="images/service/05.jpg" alt="">
										<div class="media-links">
											<a class="abs-link" title="" href="service-single.php"></a>
										</div>
									</div>
									<div class="item-content hero-bg box-shadow relative-content">
										<p class="big">
											<a href="service-single.php">adipiscing elit in vel elit scelerisque</a>
										</p>
									</div>
								</div>
								<div class="vertical-item text-center">
									<div class="item-media">
										<img src="images/service/06.jpg" alt="">
										<div class="media-links">
											<a class="abs-link" title="" href="service-single.php"></a>
										</div>
									</div>
									<div class="item-content hero-bg box-shadow relative-content">
										<p class="big">
											<a href="service-single.php">Eros tempor elementum ut ligula</a>
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section id="obituaries"
				class="s-pt-55 s-pb-60 s-py-lg-100 s-py-xl-150 ls c-gutter-60 obituaries-alt text-center text-lg-left">
				<div class="container">
					<div class="row">
						<div class="col-12 col-lg-6 animate" data-animation="fadeInLeft">
							<div class="divider-30 d-none d-xl-block"></div>
							<p class="subtitle">today, tomorrow and beyond.</p>
							<h3 class="special-heading"><span class="color-main">Recent </span>Obituaries</h3>
							<div class="divider-60 d-none d-lg-block"></div>
							<div class="row c-gutter-0">
								<div class="col-12 col-md-10">
									<p>For those unfamiliar with Belle Benchley, for example, it might come as a
										surprise to stumble across a grave marker depicting the face of a gorilla.</p>
									<p>Known as The Zoo Lady, Benchley was the director of the San Diego Zoo from 1927
										to 1953.</p>
									<div class="text-center text-lg-left">
										<div class="divider-43 d-none d-lg-block"></div>
										<a href="contact.php" class="btn btn-maincolor">Contact Us</a>
										<span>or</span>
										<a href="#" class="btn-link">Learn More</a>
										<div class="divider-5 d-none d-lg-block"></div>
										<div class="divider-45 d-block d-lg-none"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-lg-6 text-center animate" data-animation="fadeInRight">
							<div class="owl-carousel" data-responsive-lg="2" data-responsive-md="2"
								data-responsive-sm="2" data-responsive-xs="1" data-nav="true" data-autoplay="true"
								data-loop="true">
								<div class="card ds ms">
									<div class="item-media">
										<img src="images/team/obituaries-01.jpg" alt="">
										<div class="media-links">
											<a class="abs-link" title="" href="#"></a>
										</div>
									</div>
									<div class="card-body">
										<h6 class="card-title">
											<a href="#">Martha R. Foster</a>
										</h6>
										<p class="card-text">
											October 7, 1927 - March 18, 2024
										</p>
									</div>
								</div>
								<div class="card ds ms">
									<div class="item-media">
										<img src="images/team/obituaries-03.jpg" alt="">
										<div class="media-links">
											<a class="abs-link" title="" href="#"></a>
										</div>
									</div>
									<div class="card-body">
										<h6 class="card-title">
											<a href="#">Jason V. Little</a>
										</h6>
										<p class="card-text">
											October 7, 1946 - March 14, 2024
										</p>
									</div>
								</div>
								<div class="card ds ms">
									<div class="item-media">
										<img src="images/team/obituaries-02.jpg" alt="">
										<div class="media-links">
											<a class="abs-link" title="" href="#"></a>
										</div>
									</div>
									<div class="card-body">
										<h6 class="card-title">
											<a href="#">Yvette L. Fallon</a>
										</h6>
										<p class="card-text">
											October 7, 1952 - March 05, 2024
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section id="eco-funeral"
				class="s-py-55 s-pt-lg-95 s-pb-lg-100 s-pt-xl-145 s-pb-xl-150 ds s-parallax s-overlay text-center c-gutter-60 eco-funeral-section">
				<div class="container">
					<div class="row">
						<div class="col-12 col-lg-8 offset-lg-2">
							<p class="subtitle">today, tomorrow and beyond.</p>
							<h3 class="special-heading"><span class="color-main">Eco </span>Funeral</h3>
							<div class="divider-60 d-none d-lg-block"></div>
							<p>Cherubim Of Heaven is proud to offer green burials for those who are mindful of the environment.
								This unique option is the perfect way to leave behind an honorable legacy and a
								sustainable future for generations to come.</p>
							<div class="divider-40 d-none d-lg-block"></div>
							<a href="#" class="btn btn-maincolor mr-2">Shedule ceremony</a>
							<a href="#" class="btn btn-outline-maincolor">Learn More</a>
						</div>
					</div>
				</div>
			</section>

			<section id="blog" class="s-pt-55 s-pb-20 s-pt-lg-95 s-pb-lg-60 s-pt-xl-145 s-pb-xl-110 ls blog-section">
				<div class="container">
					<div class="col-12 text-center">
						<p class="subtitle">today, tomorrow and beyond.</p>
						<h3 class="special-heading"><span class="color-main">Latest </span>News</h3>
						<div class="divider-65 d-none d-lg-block"></div>
					</div>
					<div class="row c-mb-40">
						<div class="col-lg-6">
							<article
								class="vertical-item post type-post status-publish format-standard has-post-thumbnail">
								<div class="item-media post-thumbnail">
									<img src="images/blog/10.jpg" alt="">
									<div class="media-links">
										<a class="abs-link" title="" href="blog-single-right.php"></a>
									</div>
									<span class="cat-links">
										<span class="screen-reader-text">Categories</span>
										<a href="blog-right.php" rel="category tag">
											burial
										</a>
									</span>
								</div><!-- .post-thumbnail -->
								<div class="item-content ds ms">
									<div class="entry-meta">
										<span class="screen-reader-text">Posted on</span>
										<a href="blog-single-%40%40type.php" rel="bookmark">
											<time class="entry-date published updated"
												datetime="2024-03-11T15:15:12+00:00">13 Apr. 2024</time>
										</a>
									</div><!-- .entry-meta -->
									<header class="entry-header">
										<h6 class="entry-title">
											<a href="blog-single-%40%40type.php" rel="bookmark">
												Helping close a Friend in Grief Get Started with a Beautiful Template
											</a>
										</h6>
									</header><!-- .entry-header -->
									<div class="entry-content">
										<a href="#" class="btn-link read-more">Read More<i
												class="fa fa-angle-right"></i></a>
									</div><!-- .entry-content -->
								</div><!-- .item-content -->
							</article><!-- #post-## -->
						</div>
						<div class="col-lg-3">
							<article
								class="vertical-item post type-post status-publish format-standard has-post-thumbnail">
								<div class="item-media post-thumbnail">
									<img src="images/blog/11.jpg" alt="">
									<div class="media-links">
										<a class="abs-link" title="" href="blog-single-right.php"></a>
									</div>
									<span class="cat-links">
										<span class="screen-reader-text">Categories</span>
										<a href="blog-right.php" rel="category tag">
											funeral
										</a>
									</span>
								</div><!-- .post-thumbnail -->
								<div class="item-content ds ms">
									<div class="entry-meta">
										<span class="screen-reader-text">Posted on</span>
										<a href="blog-single-%40%40type.php" rel="bookmark">
											<time class="entry-date published updated"
												datetime="2024-03-11T15:15:12+00:00">13 Apr. 2024</time>
										</a>
									</div><!-- .entry-meta -->
									<header class="entry-header">
										<h6 class="entry-title">
											<a href="blog-single-%40%40type.php" rel="bookmark">
												Join us for a Healing Meditation Class
											</a>
										</h6>
									</header><!-- .entry-header -->
									<div class="entry-content">
										<a href="#" class="btn-link read-more">Read More<i
												class="fa fa-angle-right"></i></a>
									</div><!-- .entry-content -->
								</div><!-- .item-content -->
							</article><!-- #post-## -->
						</div>
						<div class="col-lg-3">
							<article
								class="vertical-item post type-post status-publish format-standard has-post-thumbnail">
								<div class="item-media post-thumbnail">
									<img src="images/blog/12.jpg" alt="">
									<div class="media-links">
										<a class="abs-link" title="" href="blog-single-right.php"></a>
									</div>
									<span class="cat-links">
										<span class="screen-reader-text">Categories</span>
										<a href="blog-right.php" rel="category tag">
											cremation
										</a>
									</span>
								</div><!-- .post-thumbnail -->
								<div class="item-content ds ms">
									<div class="entry-meta">
										<span class="screen-reader-text">Posted on</span>
										<a href="blog-single-%40%40type.php" rel="bookmark">
											<time class="entry-date published updated"
												datetime="2024-03-11T15:15:12+00:00">13 Apr. 2024</time>
										</a>
									</div><!-- .entry-meta -->
									<header class="entry-header">
										<h6 class="entry-title">
											<a href="blog-single-%40%40type.php" rel="bookmark">
												Join us for a Healing Meditation Class
											</a>
										</h6>
									</header><!-- .entry-header -->
									<div class="entry-content">
										<a href="#" class="btn-link read-more">Read More<i
												class="fa fa-angle-right"></i></a>
									</div><!-- .entry-content -->
								</div><!-- .item-content -->
							</article><!-- #post-## -->
						</div>
					</div>
				</div>
			</section>

			<section id="contact-us" class="ls ms page-map">
				<div class="row c-gutter-0 align-items-center">
					<div class="col-md-6 page_map">
						<div class="marker">
							<div class="marker-address">sydney, australia, Liverpool street, 66</div>
							<div class="marker-title">First Marker</div>
							<div class="marker-description">

								<ul class="list-unstyled">
									<li>
										<span class="icon-inline">
											<span class="icon-styled color-main">
												<i class="fa fa-map-marker"></i>
											</span>

											<span>
												Sydney, Australia, Liverpool street, 66
											</span>
										</span>
									</li>

									<li>
										<span class="icon-inline">
											<span class="icon-styled color-main">
												<i class="fa fa-phone"></i>
											</span>

											<span>
												1 (800) 123-45-67
											</span>
										</span>
									</li>
									<li>
										<span class="icon-inline">
											<span class="icon-styled color-main">
												<i class="fa fa-envelope"></i>
											</span>

											<span>
												<a href="#"
													class="__cf_email__"
													data-cfemail="0469656d6844617c65697468612a676b69">[email&#160;protected]</a>
											</span>
										</span>
									</li>
								</ul>
							</div>

							<img class="marker-icon" src="images/map_marker_icon.png" alt="">
						</div>
						<!-- .marker -->

					</div>
					<div class="col-md-6 text-center text-md-left animate" data-animation="moveFromRight">
						<div class="divider-55 d-none-d-lg-block"></div>
						<div class=" centered-content">
							<p class="subtitle">today, tomorrow and beyond.</p>
							<h3 class="special-heading"><span class="color-main">Contact </span>Us</h3>
							<div class="divider-60 d-none d-lg-block"></div>
							<h6 class="d-inline-block mt-0 mb-13">Email:</h6><span class=""> <a
									href="#"
									class="__cf_email__"
									data-cfemail="5e333b333b302a311e3b263f332e323b703d3133">[email&#160;protected]</a></span><br>
							<h6 class="d-inline-block mt-0 mb-13">Phone:</h6><span class=""> 1-800-123-45-67</span><br>
							<h6 class="d-inline-block mt-0">Hours:</h6><span class=""> Mon - Fr 9am-5pm</span>
							<div class="divider-30 d-none d-lg-block"></div>
							<form class="mt-20 contact-form small-form c-mb-10" method="post"
								action="#">
								<div class="row c-gutter-10">
									<div class="col-xl-6">
										<div class="form-group has-placeholder">
											<label for="name">Full Name <span class="required">*</span></label>
											<i class="ico-user"></i>
											<input type="text" aria-required="true" size="30" value="" name="name"
												id="name" class="form-control" placeholder="Full Name">
										</div>

									</div>

									<div class="col-xl-6">
										<div class="form-group has-placeholder">
											<label for="phone">Phone Number<span class="required">*</span></label>
											<i class="fa fa-phone"></i>
											<input type="text" aria-required="true" size="30" value="" name="phone"
												id="phone" class="form-control" placeholder="Phone Number">
										</div>
									</div>
									<div class="col-sm-12">
										<div class="form-group has-placeholder">
											<label for="email">Email address<span class="required">*</span></label>
											<i class="fa fa-envelope"></i>
											<input type="email" aria-required="true" size="30" value="" name="email"
												id="email" class="form-control" placeholder="Email Address">
										</div>
									</div>
									<div class="col-sm-12">
										<div class="form-group has-placeholder">
											<label for="message">Message</label>
											<i class="ico-pen"></i>
											<textarea aria-required="true" rows="6" cols="45" name="message"
												id="message" class="form-control" placeholder="Your Message"></textarea>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12 mt-20">
										<div class="form-group">
											<button type="submit" id="contact_form_submit" name="contact_submit"
												class="btn btn-maincolor">Submit
											</button>
										</div>
									</div>

								</div>
							</form>
						</div>
						<div class="divider-55 d-none-d-lg-block"></div>
					</div>
				</div>
			</section>

			<footer
				class="page_footer text-center text-md-left page_footer ds s-pt-55 s-pb-0 s-pt-lg-95 s-pb-lg-30 s-pt-xl-145 s-pb-xl-80 c-gutter-50">
				<div class="container">
					<div class="row">

						<div class="col-md-6 col-xl-3 animate" data-animation="fadeInUp">

							<div class="widget widget_text">
								<a href="index.php" class="logo">
									<img src="images/logo.png" alt="">
									<div class="d-flex flex-column">
										<h4 class="logo-text color-main">Cherubim Of Heaven</h4>
										<span class="logo-subtext">Funeral Service</span>
									</div>
								</a>
								<p>
									We do accept cremains from throughout the United States and the world. Many of our
									families come from the Phoenix area as well as various
								</p>
							</div>
						</div>

						<div class="col-md-6 col-xl-3 animate" data-animation="fadeInUp">
							<div class="widget widget_working_hours">
								<h3>Our Hours</h3>
								<ul class="list-bordered">

									<li class="row border-top-0">
										<div class="col-6">
											Weekdays
										</div>
										<div class="col-6 text-md-right">
											<span class="color-darkgrey">9:00 - 17:00</span>
										</div>
									</li>

									<li class="row">
										<div class="col-6">
											Saturday
										</div>
										<div class="col-6 text-md-right">
											<span class="color-darkgrey">9:00 - 17:00</span>
										</div>
									</li>

									<li class="row border-bottom-0">
										<div class="col-6">
											Sunday
										</div>
										<div class="col-6 text-md-right">
											<span class="color-darkgrey">Closed</span>
										</div>
									</li>

								</ul>
							</div>
						</div>

						<div class="col-md-6 col-xl-3 animate" data-animation="fadeInUp">
							<div class="widget widget_mailchimp">

								<h3 class="widget-title">Newsletter</h3>

								<p>
									Stay updated with recent news.
									<br>
									We promise not to spam!
								</p>

								<form class="signup" action="#">
									<label for="mailchimp_email">
										<span class="screen-reader-text">Subscribe:</span>
									</label>

									<input id="mailchimp_email" name="email" type="email"
										class="form-control mailchimp_email" placeholder="Your Email">

									<button type="submit" class="search-submit">
										<span class="screen-reader-text">Subscribe</span>
									</button>
									<div class="response"></div>
								</form>

							</div>
						</div>

						<div class="col-md-6 col-xl-3 animate" data-animation="fadeInUp">
							<div class="widget widget_icons_list">
								<h3>Contacts</h3>

								<div class="media side-icon-box">
									<div class="icon-styled color-main fs-14">
										<i class="ico-maps"></i>
									</div>
									<p class="media-body"> 808 Pickens Way<br> Cooper, TX 75432 </p>
								</div>
								<div class="media side-icon-box">
									<div class="icon-styled color-main fs-14">
										<i class="ico-phone"></i>
									</div>
									<p class="media-body">1-800-123-45-67</p>
								</div>
								<div class="media side-icon-box">
									<div class="icon-styled color-main fs-14">
										<i class="fa fa-envelope"></i>
									</div>
									<p class="media-body">
										<a
											href="#"><span
												class="__cf_email__"
												data-cfemail="8de0e8e0e8e3f9e2cde8f5ece0fde1e8a3eee2e0">[email&#160;protected]</span></a>
									</p>
								</div>

							</div>
						</div>

					</div>
				</div>
			</footer>

			<section class="page_copyright ls s-py-20">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-md-6 text-center text-md-left animate" data-animation="fadeInUp">
							<p>&copy; Cherubim Of Heaven <span class="copyright_year">2024</span> - All Rights Reserved</p>
						</div>
						<div class="col-md-6 text-center text-md-right animate" data-animation="fadeInUp">
							<span class="social-icons">
								<a href="#" class="fa fa-facebook" title="facebook"></a>
								<a href="#" class="fa fa-paper-plane fs-14" title="telegram"></a>
								<a href="#" class="fa fa-linkedin " title="linkedin"></a>
								<a href="#" class="fa fa-instagram" title="instagram"></a>
								<a href="#" class="fa fa-youtube-play" title="youtube-play"></a>
							</span>
						</div>
					</div>
				</div>
			</section>


		</div><!-- eof #box_wrapper -->
	</div><!-- eof #canvas -->


	<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
	<script src="js/compressed.js"></script>
	<script src="js/main.js"></script>

	<!-- Google Map Script -->
	<script type="text/javascript"
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC0pr5xCHpaTGv12l73IExOHDJisBP2FK4&amp;callback=initGoogleMap"></script>

</body>


<!-- Mirrored from html.modernwebtemplates.com/memento/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Nov 2024 06:46:56 GMT -->

</html>