<!DOCTYPE html>
<html class="no-js">

<?php 

	include ("connect.php"); 
	include ("check_session.php");
	$conn->close();

	if (session_status() == PHP_SESSION_NONE) {
		session_start(); // Start the session only if it's not already active
	}
	
	// Check if client_id is set in the session
	if (isset($_SESSION['client_id'])) {
		$client_id = $_SESSION['client_id'];
	} else {
		//echo "No client logged in";
		//exit();
	}

?>

<head>
	<title>Cherubim Of Heaven - Multipurpose Funeral Service - Home</title>
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

	<style>

		.popup-overlay {
		display: none;
		position: fixed;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		background-color: rgba(0, 0, 0, 0.7);
		z-index: 9999;
		}

		.popup-content {
		background: #fff;
		padding: 20px;
		border-radius: 10px;
		width: 400px;
		height: 400px;
		max-width: 80%;
		margin: 100px auto;
		position: relative;
		text-align: center;
		}

		.close-btn {
		position: absolute;
		top: 10px;
		right: 15px;
		font-size: 20px;
		cursor: pointer;
		}

		#openPopup {
		padding: 10px 20px;
		background-color: #007bff;
		color: white;
		border: none;
		border-radius: 5px;
		cursor: pointer;
		}

		#openPopup:hover {
		background-color: #0056b3;
		}

		.hidden {
			display: none !important;
		}

	</style>


</head>

<body>

<div id="popup" class="popup-overlay" style="display: <?php echo (isset($_SESSION["loginSuccess"]) || isset($_SESSION["checkoutSuccess"]) || isset($_SESSION["isBooked"]) || isset($_SESSION["isSpace"])) ? 'block' : 'none'; ?>">
    <div class="popup-content">
        <span id="closePopup" class="close-btn">&times;</span>
            <?php 
                if (isset($_SESSION["loginSuccess"])) {
					echo "<h2>Hello, $username.</h2>";
                    echo "<p><br>Logged in successfully.</p>";
                    unset($_SESSION["loginSuccess"]);
                } 
				elseif (isset($_SESSION["checkoutSuccess"])) {
					echo "<h2>Thank you for you purchase!</h2>";
                    echo "<p><br>Checkout completed successfully.</p>";
                    unset($_SESSION["checkoutSuccess"]);
                }
				elseif (isset($_SESSION["isBooked"])) {
					echo "<h2>Thank you for you purchase!</h2>";
                    echo "<p><br>You have successfully booked a venue.</p>";
                    unset($_SESSION["isBooked"]);
                }
				elseif (isset($_SESSION["isSpace"])) {
					echo "<h2>Thank you for you purchase!</h2>";
                    echo "<p><br>You have successfully purchased a memorial space.</p>";
                    unset($_SESSION["isSpace"]);
                }
            ?>
        <!--<button id="closeButton">Okay</button>-->
    </div>
</div>


<script>
	document.addEventListener("DOMContentLoaded", function() {
		const popup = document.getElementById("popup");
		const closePopup = document.getElementById("closePopup");

		// Close popup when the close button is clicked
		closePopup.addEventListener("click", function() {
			popup.style.display = "none";
		});

		// Close the popup when clicking outside of the popup content
		window.addEventListener("click", function(event) {
			if (event.target === popup) {
				popup.style.display = "none";
			}
		});
	});
</script>

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

												<!--<li>
													<a href="pricing.php">Pricing</a>
												</li>-->

												<!-- shop -->
												<li>
													<a href="shop-right.php">Shop</a>
													<ul>
														<li>
															<a href="shop-account-dashboard.php">Account</a>
															<ul>

																<li>
																	<a href="shop-account-dashboard.php">Dashboard</a>
																</li>
																<li>
																	<a href="shop-account-details.php">Account details</a>
																</li>
																<li>
																	<a href="shop-account-addresses.php">Addresses</a>
																</li>
																<li>
																	<a href="shop-account-orders.php">Orders</a>
																</li>
																<li>
																	<a href="shop-account-login.php">Login/Logout</a>
																</li>

															</ul>
														</li>
														<li>
															<a href="shop-right.php">Catalog</a>
														</li>
														<li>
															<a href="shop-cart.php">Cart</a>
														</li>

													</ul>
												</li>

												<!-- virutal-tour -->
												<li>
													<a href="virtual-tour.html">Virtual Tour</a>
												</li>
												<!-- eof virtual-tour -->

												<!-- events -->
												<li>
													<a href="events-full.php">Events</a>
												</li>
												<!-- eof events -->

												<!--<li>
													<a href="team.php">Team</a>
													<ul>
														<li>
															<a href="team.php">Team List</a>
														</li>
														<li>
															<a href="team-single.php">Team Member</a>
														</li>
													</ul>
												</li>-->

												<!-- gallery
												<li>
													<a href="gallery-regular.php">Gallery</a>
												</li>

												<li>
													<a href="comingsoon.php">Comingsoon</a>
												</li>
												-->

												<li>
													<a href="faq2.php">FAQ</a>
												</li>
												<!--<li>
													<a href="404.php">404</a>
												</li>-->

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

								<a href="time-capsule.php" class="d-none d-md-block btn btn-small btn-outline-maincolor mr-2">Time Capsule </a>
								
								<?php

								if ($username) {
									echo "
									<a href='shop-account-dashboard.php' >
										<img src='images/profile-icon.png' alt='User' style='width: 40px; height: 40px;'>
									</a>
									";
								}

								else {
									echo "
									<a href='shop-account-login.php' class='d-none d-md-block btn btn-small btn-maincolor'>Login</a>
									";
								}

								?>

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
													<p class="intro_before_featured_word">Today, Tomorrow and Beyond.
													</p>
												</div>
												<div class="intro_layer" data-animation="fadeInDown">
													<div class="d-inline-block">
														<h2 class="intro_featured_word">
															A<span class="color-main"> Beautiful</span> Place<br> to
															Remember
														</h2>
													</div>
												</div>

												<div class="intro_layer" data-animation="fadeInDown">
													<p class="intro_after_featured_word">Honoring each life with personalized care, because every <br>story is unique.
														 </p>
												</div>

												<div class="intro_layer slider-buttons" data-animation="fadeInDown">
													<a href="about.php" class="btn btn-big btn-maincolor">Learn More</a>
													<a href="contact.php" class="btn btn-big btn-outline-darkgrey">Contact Us</a>
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
													<p class="intro_before_featured_word">Today, Tomorrow and Beyond.
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
													<a href="about.php" class="btn btn-big btn-maincolor">Learn More</a>
													<a href="contact.php" class="btn btn-big btn-outline-darkgrey">Contact Us</a>
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
													<p class="intro_before_featured_word">Today, Tomorrow and Beyond.
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
													<a href="about.php" class="btn btn-big btn-maincolor">Learn More</a>
													<a href="contact.php" class="btn btn-big btn-outline-darkgrey">Contact Us</a>
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
							<p class="subtitle special-subtitle">Today, Tomorrow and Beyond.</p>
							<h3 class="special-heading"><span class="color-main">Experience </span>the Difference</h3>
							<div class="divider-55 d-none d-lg-block"></div>
							<p>Cherubim of Heaven Memorial Park, located in the serene town of San Pedro, Hagonoy, Bulacan, stands as a tranquil and dignified resting place for your loved ones.</p>

							<p>Dedicated to offering personalized memorial services since its establishment, Cherubim of Heaven provides a unique environment designed to honor and cherish life's most meaningful moments. Nestled in a peaceful location, the park is a place of solace and reflection, surrounded by natural beauty and a community-driven spirit.</p>

							<p>Whether today, tomorrow, or in the years to come, Cherubim of Heaven Memorial Park is here to help you create lasting memories and provide a sense of peace and comfort.</p>

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
							<p class="subtitle special-subtitle">Today, Tomorrow and Beyond.</p>
							<h3 class="special-heading"><span class="color-main">Enjoy </span> our quality<br> services
							</h3>
						</div>
						<div class="col-12 col-lg-6">
							<div class="divider-11 d-none d-lg-block"></div>
							<p>Over the years, Cherubim of Heaven Memorial Park has grown to provide a comprehensive range of memorial services, including burial plots, columbarium spaces, and beautifully designed venues for meaningful ceremonies.</p>

							<p>The park features well-maintained landscapes, serene spaces for reflection, and personalized memorial options tailored to honor loved ones in unique and heartfelt ways. Each service and space reflects a dedication to creating a dignified and peaceful environment, ensuring families have a place to celebrate life and cherish memories for generations to come.</p>

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
											<a href="service-single.php">Personalized Funeral Services</a>
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
											<a href="service-single.php">Comprehensive Memorial Options</a>
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
											<a href="service-single.php">One Platform for Seamless Planning</a>
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
											<a href="service-single.php">Digital Time Capsules</a>
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
											<a href="service-single.php">Virtual Park Tour</a>
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
											<a href="service-single.php">Honoring Legacies with Care and Compassion</a>
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
							<p class="subtitle">Today, Tomorrow and Beyond.</p>
							<h3 class="special-heading"><span class="color-main">Recent </span>Obituaries</h3>
							<div class="divider-60 d-none d-lg-block"></div>
							<div class="row c-gutter-0">
								<div class="col-12 col-md-10">
									<p>For those unfamiliar with Maria Santos, it may come as a heartfelt surprise to see a memorial adorned with flowers and a rosary.</p>

									<p>Known as a devoted mother and a pillar of her community, Maria’s life was a testament to love, faith, and service. Her memory continues to inspire and bring warmth to the hearts of those whose lives she touched.</p>
									<div class="text-center text-lg-left">
										<div class="divider-43 d-none d-lg-block"></div>
										<a href="contact.php" class="btn btn-maincolor">Contact Us</a>
										<span>or</span>
										<a href="about.php" class="btn-link">Learn More</a>
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
											<a href="#">Maria A. Santos</a>
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
											<a href="#">Juan S. Dela Cruz</a>
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
											<a href="#">Priscilla F. Santos</a>
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
							<p class="subtitle">Today, Tomorrow and Beyond.</p>
							<h3 class="special-heading"><span class="color-main">Memorial Services  </span>for a Lasting Legacy</h3>
							<div class="divider-60 d-none d-lg-block"></div>
							<p>Cherubim of Heaven Memorial Park is proud to offer services that honor not only the departed but also the values they cherished. With serene burial plots, thoughtfully designed columbarium spaces, and digital time capsules, we help families create meaningful tributes while fostering a legacy of remembrance for future generations.</p>
							<div class="divider-40 d-none d-lg-block"></div>
							<a href="shop-right-funeral.php" class="btn btn-maincolor mr-2">Shedule ceremony</a>
							<a href="about.php" class="btn btn-outline-maincolor">Learn More</a>
						</div>
					</div>
				</div>
			</section>

			<section id="blog" class="s-pt-55 s-pb-20 s-pt-lg-95 s-pb-lg-60 s-pt-xl-145 s-pb-xl-110 ls blog-section">
				<div class="container">
					<div class="col-12 text-center">
						<p class="subtitle">Today, Tomorrow and Beyond.</p>
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

			<section id="contact-us" class="ls ms page-map" style="margin: 0; height: 125vh;">
				<div class="row c-gutter-0 align-items-stretch" style="margin: 0; height: 100%;">
					<!-- Google Map Section -->
					<div class="col-md-6 page_map" style="padding: 0; height: 100%;">
					<div class="map-container">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3856.777019181071!2d120.75738387522401!3d14.837767485677233!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x339651b2e23997f1%3A0x1a749ea23a78ad29!2sCherubim%20Of%20Heaven%20Memorial%20Park%202024!5e0!3m2!1sen!2sph!4v1733194376253!5m2!1sen!2sph" 
						style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
						</iframe>
					</div>
					</div>
					<!-- Contact Form Section -->
					<div class="col-md-6 text-center text-md-left animate" data-animation="moveFromRight">
						<div class="divider-55 d-none-d-lg-block"></div>
						<div class="centered-content">
							<p class="subtitle">Today, Tomorrow and Beyond.</p>
							<h3 class="special-heading"><span class="color-main">Contact </span>Us</h3>
							<div class="divider-60 d-none d-lg-block"></div>
							<h6 class="d-inline-block mt-0 mb-13">Email:</h6><span class=""> <a href="#"
									class="__cf_email__" data-cfemail="5e333b333b302a311e3b263f332e323b703d3133">[email&#160;protected]</a></span><br>
							<h6 class="d-inline-block mt-0 mb-13">Phone:</h6><span class=""> (044) 762 4284</span><br>
							<h6 class="d-inline-block mt-0">Hours:</h6><span class=""> Mon - Fri 7:30am-5:30pm<br>
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSun 8:00am-6:00pm</span>
							<div class="divider-30 d-none d-lg-block"></div>

							<!-- Contact Form -->
							<form class="mt-20 contact-form small-form c-mb-10" method="post" action="#" style="margin: 0;">
								<div class="row c-gutter-10">
									<div class="col-xl-6">
										<div class="form-group has-placeholder">
											<label for="name">Full Name <span class="required">*</span></label>
											<i class="ico-user"></i>
											<input type="text" aria-required="true" size="30" value="" name="name" id="name" class="form-control" placeholder="Full Name">
										</div>
									</div>

									<div class="col-xl-6">
										<div class="form-group has-placeholder">
											<label for="phone">Phone Number<span class="required">*</span></label>
											<i class="fa fa-phone"></i>
											<input type="text" aria-required="true" size="30" value="" name="phone" id="phone" class="form-control" placeholder="Phone Number">
										</div>
									</div>
									<div class="col-sm-12">
										<div class="form-group has-placeholder">
											<label for="email">Email address<span class="required">*</span></label>
											<i class="fa fa-envelope"></i>
											<input type="email" aria-required="true" size="30" value="" name="email" id="email" class="form-control" placeholder="Email Address">
										</div>
									</div>
									<div class="col-sm-12">
										<div class="form-group has-placeholder">
											<label for="message">Message</label>
											<i class="ico-pen"></i>
											<textarea aria-required="true" rows="6" cols="45" name="message" id="message" class="form-control" placeholder="Your Message"></textarea>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12 mt-20">
										<div class="form-group">
											<button type="submit" id="contact_form_submit" name="contact_submit" class="btn btn-maincolor">Submit</button>
										</div>
									</div>
								</div>
							</form>
						</div>
						<div class="divider-55 d-none-d-lg-block"></div>
					</div>
				</div>
			</section>

			<style>
				.page_map {
					padding: 0;
					height: 100%; /* Full height of the screen */
					display: flex;
					flex-direction: row; /* Side by side on large screens */
				}

				.map-container {
					position: relative;
					width: 100%;
					height: 100%;
					display: flex;
				}

				.map-container iframe {
					position: absolute;
					top: 0;
					left: 0;
					width: 100%;
					height: 100%; /* Ensure iframe takes full height */
					border: none;
				}

				/* For smaller screens, adjust layout */
				@media (max-width: 768px) {
					.page_map {
						flex-direction: column; /* Stack map and contact form vertically */
						height: auto; /* Allow content to determine height */
					}

					.map-container {
						width: 100%; /* Full width for map */
						height: 50%; /* Map takes 50% of the container height */
					}

					.contact-form-container {
						width: 100%; /* Full width for contact form */
						padding: 20px;
						box-sizing: border-box; /* Ensure padding is included in width/height calculations */
						height: 50%; /* Contact form takes the remaining 50% */
						overflow: auto; /* Allow scrolling if content overflows */
						display: flex;
						flex-direction: column;
						justify-content: flex-start;
					}

					.map-container iframe {
						height: 100%; /* Ensure iframe takes full height */
					}

					/* Prevent form content from overflowing */
					.contact-form-container form {
						display: flex;
						flex-direction: column;
						justify-content: flex-start;
						overflow: auto; /* Enable scroll if form content overflows */
					}
				}

			</style>


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
									Our services are designed to accommodate diverse traditions and preferences, 
									ensuring a meaningful experience for everyone.
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
											<span class="color-darkgrey">7:30 - 17:30</span>
										</div>
									</li>

									<li class="row">
										<div class="col-6">
											Saturday
										</div>
										<div class="col-6 text-md-right">
											<span class="color-darkgrey">7:30 - 17:30</span>
										</div>
									</li>

									<li class="row border-bottom-0">
										<div class="col-6">
											Sunday
										</div>
										<div class="col-6 text-md-right">
											<span class="color-darkgrey">8:00 - 18:00</span>
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
									<p class="media-body"> Purok 4 San Pedro<br>Hagonoy, Bulacan, Philippines </p>
								</div>
								<div class="media side-icon-box">
									<div class="icon-styled color-main fs-14">
										<i class="ico-phone"></i>
									</div>
									<p class="media-body">(044) 762 4284</p>
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
	<!--<script type="text/javascript"
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC0pr5xCHpaTGv12l73IExOHDJisBP2FK4&amp;callback=initGoogleMap"></script>-->

</body>


<!-- Mirrored from html.modernwebtemplates.com/memento/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Nov 2024 06:46:56 GMT -->

</html>