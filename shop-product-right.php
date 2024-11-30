<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<?php

	session_start();
	include("connect.php");
	error_reporting(E_ALL);
    ini_set('display_errors', 1);
	//include("add-to-cart.php");

	// Get the product ID from the URL
	$product_id = isset($_GET['id']) ? ($_GET['id']) : 0;

	// Fetch product details from the database
	$stmt = $conn->prepare("SELECT Service_ID, Service_Name, Service_Price, Service_Description FROM memorial_services WHERE Service_ID = $product_id");
	//$stmt->bind_param("s", $product_id);
	$stmt->execute();
	$result = $stmt->get_result();

	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$service_id = $row['Service_ID'];
		$service_name = $row['Service_Name'];
		$service_price = $row['Service_Price'];
		$service_description = $row['Service_Description'];
	} 
	
	else {
		echo "Product not found.";
		exit();
	}

	$stmt->close();
	//$conn->close();

?>

<!-- Mirrored from html.modernwebtemplates.com/memento/shop-product-right.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Nov 2024 06:47:26 GMT -->
<head>
	<title>Memento - Multipurpose Funeral Service HTML template</title>
	<meta charset="utf-8">
	<!--[if IE]>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<![endif]-->
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="format-detection" content="telephone=no">

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/animations.css">
	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" href="css/main.css" class="color-switcher-link">
	<link rel="stylesheet" href="css/shop.css" class="color-switcher-link">
	<script src="js/vendor/modernizr-2.6.2.min.js"></script>

	<!--[if lt IE 9]>
		<script src="js/vendor/html5shiv.min.js"></script>
		<script src="js/vendor/respond.min.js"></script>
		<script src="js/vendor/jquery-1.12.4.min.js"></script>
	<![endif]-->

</head>

<body>
	<!--[if lt IE 9]>
		<div class="bg-danger text-center">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/" class="color-main">upgrade your browser</a> to improve your experience.</div>
	<![endif]-->

	<div class="preloader">
		<div class="preloader_image"></div>
	</div>

	<!-- search modal -->
	<div class="modal" tabindex="-1" role="dialog" aria-labelledby="search_modal" id="search_modal">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		<div class="widget widget_search">
			<form method="get" class="searchform search-form" action="https://html.modernwebtemplates.com/">
				<div class="form-group">
					<input type="text" value="" name="search" class="form-control" placeholder="Search keyword" id="modal-search-input">
				</div>
				<button type="submit" class="btn">Search</button>
			</form>
		</div>
	</div>

	<!-- Unyson messages modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="messages_modal">
		<div class="fw-messages-wrap ls p-normal">
			<!-- Uncomment this UL with LI to show messages in modal popup to your user: -->
			<!--
		<ul class="list-unstyled">
			<li>Message To User</li>
		</ul>
		-->

		</div>
	</div><!-- eof .modal -->

	<!-- wrappers for visual page editor and boxed version of template -->
	<div id="canvas">
		<div id="box_wrapper">

			<!-- template sections -->

			<div class="header_absolute ds cover-background s-overlay">
				<!-- header with two Bootstrap columns - left for logo and right for navigation and includes (search, social icons, additional links and buttons etc -->
				<header class="page_header ds nav-narrow s-overlay">
					<div class="container-fluid">
						<div class="row align-items-center">
							<div class="col-xl-3 col-lg-4 col-md-5 col-11">
								<a href="index.php" class="logo">
									<img src="images/logo.png" alt="">
									<div class="d-flex flex-column">
										<h4 class="logo-text color-main">Memento</h4>
										<span class="logo-subtext">Funeral Service</span>
									</div>
								</a>
							</div>
							<div class="col-xl-9 col-lg-8 col-md-7 col-1">
								<div class="nav-wrap">

									<!-- main nav start -->
									<nav class="top-nav">
										<ul class="nav sf-menu">
											<li class="active">
												<a href="index-2.php">Home</a>
												<ul>
													<li>
														<a href="index-2.php">MultiPage</a>
													</li>
													<li>
														<a href="index_static.php">Static Intro</a>
													</li>
													<li>
														<a href="index_singlepage.php">Single Page</a>
													</li>
												</ul>
											</li>

											<li>
												<a href="home-blocks.php">Home Blocks</a>
											</li>
											<li>
												<a href="about.php">Pages</a>
												<ul>
													<li>
														<a href="about.php">About</a>
													</li>

													<li>
														<a href="services.php">Our Services</a>
														<ul>
															<li>
																<a href="services.php">Services 1</a>
															</li>
															<li>
																<a href="services2.php">Services 2</a>
															</li>
															<li>
																<a href="services3.php">Services 3</a>
															</li>
															<li>
																<a href="service-single.php">Single Service</a>
															</li>
														</ul>
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
													<!-- eof shop -->

													<!-- features -->
													<li>
														<a href="shortcodes_iconbox.php">Shortcodes</a>
														<ul>
															<li>
																<a href="shortcodes_typography.php">Typography</a>
															</li>
															<li>
																<a href="shortcodes_buttons.php">Buttons</a>
															</li>
															<li>
																<a href="shortcodes_iconbox.php">Icon Boxes</a>
															</li>
															<li>
																<a href="shortcodes_progress.php">Progress</a>
															</li>
															<li>
																<a href="shortcodes_tabs.php">Tabs &amp; Collapse</a>
															</li>
															<li>
																<a href="shortcodes_bootstrap.php">Bootstrap Elements</a>
															</li>
															<li>
																<a href="shortcodes_animation.php">Animation</a>
															</li>
															<li>
																<a href="shortcodes_icons.php">Template Icons</a>
															</li>
															<li>
																<a href="shortcodes_socialicons.php">Social Icons</a>
															</li>
														</ul>
													</li>
													<!-- eof shortcodes -->

													<li>
														<a href="shortcodes_widgets_default.php">Widgets</a>
														<ul>
															<li>
																<a href="shortcodes_widgets_in_columns.php">All Widgets</a>
															</li>
															<li>
																<a href="shortcodes_widgets_default.php">Default Widgets</a>
															</li>
															<li>
																<a href="shortcodes_widgets_shop.php">Shop Widgets</a>
															</li>
															<li>
																<a href="shortcodes_widgets_custom.php">Custom Widgets</a>
															</li>
														</ul>

													</li>


													<!-- events -->
													<li>
														<a href="events-left.php">Events</a>
														<ul>
															<li>
																<a href="events-left.php">Left Sidebar</a>
															</li>
															<li>
																<a href="events-right.php">Right Sidebar</a>
															</li>
															<li>
																<a href="events-full.php">Full Width</a>
															</li>
															<li>
																<a href="event-single-left.php">Single Event</a>
																<ul>
																	<li>
																		<a href="event-single-left.php">Left Sidebar</a>
																	</li>
																	<li>
																		<a href="event-single-right.php">Right Sidebar</a>
																	</li>
																	<li>
																		<a href="event-single-full.php">Full Width</a>
																	</li>
																</ul>
															</li>
														</ul>
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

													<li>
														<a href="about-founder.php">About Founder</a>
													</li>

													<!-- gallery -->
													<li>
														<a href="gallery-regular.php">Gallery</a>
														<ul>
															<!-- Gallery image only -->
															<li>
																<a href="gallery-regular.php">Gallery Regular</a>
																<ul>
																	<li>
																		<a href="gallery-regular-2-cols.php">2 columns</a>
																	</li>
																	<li>
																		<a href="gallery-regular.php">3 columns</a>
																	</li>
																	<li>
																		<a href="gallery-regular-4-cols-fullwidth.php">4 columns</a>
																	</li>

																</ul>
															</li>
															<li>
																<a href="gallery-regular-2.php">Gallery Regular 2</a>
															</li>
															<li>
																<a href="gallery-regular-3.php">Gallery Regular 3</a>
															</li>
															<!-- eof Gallery image only -->

															<!-- Gallery with title -->
															<li>
																<a href="gallery-title.php">Gallery Title</a>
																<ul>
																	<li>
																		<a href="gallery-title-2-cols.php">2 columns</a>
																	</li>
																	<li>
																		<a href="gallery-title.php">3 column</a>
																	</li>
																	<li>
																		<a href="gallery-title-4-cols-fullwidth.php">4 columns</a>
																	</li>
																</ul>
															</li>
															<!-- eof Gallery with title -->

															<!-- Gallery with excerpt -->
															<li>
																<a href="gallery-excerpt.php">Gallery Excerpt</a>
																<ul>
																	<li>
																		<a href="gallery-excerpt-2-cols.php">2 columns</a>
																	</li>
																	<li>
																		<a href="gallery-excerpt.php">3 column</a>
																	</li>
																	<li>
																		<a href="gallery-excerpt-4-cols-fullwidth.php">4 columns</a>
																	</li>
																</ul>
															</li>
															<!-- eof Gallery with excerpt -->


															<li>
																<a href="gallery-tiled.php">Tiled Gallery</a>
															</li>
															<!-- Gallery item -->

															<li>
																<a href="gallery-single.php">Gallery Single</a>
																<ul>
																	<li>
																		<a href="gallery-single.php">Gallery Single</a>
																	</li>
																	<li>
																		<a href="gallery-single2.php">Gallery Single 2</a>
																	</li>
																</ul>
															</li>
															<!-- eof Gallery item -->
														</ul>
													</li>
													<!-- eof Gallery -->
													<li>
														<a href="our-story.php">Our Story</a>
													</li>
													<li>
														<a href="careers.php">Careers</a>
													</li>

													<li>
														<a href="comingsoon.php">Comingsoon</a>
													</li>

													<li>
														<a href="faq.php">FAQ</a>
														<ul>
															<li>
																<a href="faq.php">FAQ</a>
															</li>
															<li>
																<a href="faq2.php">FAQ 2</a>
															</li>
														</ul>
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
												<ul>

													<li>
														<a href="blog-right.php">Right Sidebar</a>
													</li>
													<li>
														<a href="blog-left.php">Left Sidebar</a>
													</li>
													<li>
														<a href="blog-full.php">Without Sidebar</a>
													</li>
													<li>
														<a href="blog-grid.php">Blog Grid</a>
													</li>

													<li>
														<a href="blog-single-right.php">Post</a>
														<ul>
															<li>
																<a href="blog-single-right.php">Right Sidebar</a>
															</li>
															<li>
																<a href="blog-single-left.php">Left Sidebar</a>
															</li>
															<li>
																<a href="blog-single-full.php">No Sidebar</a>
															</li>
														</ul>
													</li>

													<li>
														<a href="blog-single-video-right.php">Video Post</a>
														<ul>
															<li>
																<a href="blog-single-video-right.php">Right Sidebar</a>
															</li>
															<li>
																<a href="blog-single-video-left.php">Left Sidebar</a>
															</li>
															<li>
																<a href="blog-single-video-full.php">No Sidebar</a>
															</li>
														</ul>
													</li>

												</ul>
											</li>
											<!-- eof blog -->

											<li>
												<a href="#">Features</a>
												<div class="mega-menu">
													<ul class="mega-menu-row">
														<li class="mega-menu-col">
															<a href="#">Headers</a>
															<ul>
																<li>
																	<a href="header1.php">Header Type 1</a>
																</li>
																<li>
																	<a href="header2.php">Header Type 2</a>
																</li>
																<li>
																	<a href="header3.php">Header Type 3</a>
																</li>
																<li>
																	<a href="header4.php">Header Type 4</a>
																</li>
																<li>
																	<a href="header5.php">Header Type 5</a>
																</li>
																<li>
																	<a href="header6.php">Header Type 6</a>
																</li>
															</ul>
														</li>
														<li class="mega-menu-col">
															<a href="#">Side Menus</a>
															<ul>
																<li>
																	<a href="header-side.php">Push Left</a>
																</li>
																<li>
																	<a href="header-side-right.php">Push Right</a>
																</li>
																<li>
																	<a href="header-side-slide.php">Slide Left</a>
																</li>
																<li>
																	<a href="header-side-slide-right.php">Slide Right</a>
																</li>
																<li>
																	<a href="header-side-sticked.php">Sticked Left</a>
																</li>
																<li>
																	<a href="header-side-sticked-right.php">Sticked Right</a>
																</li>
															</ul>
														</li>
														<li class="mega-menu-col">
															<a href="title1.php">Title Sections</a>
															<ul>
																<li>
																	<a href="title1.php">Title section 1</a>
																</li>
																<li>
																	<a href="title2.php">Title section 2</a>
																</li>
																<li>
																	<a href="title3.php">Title section 3</a>
																</li>
																<li>
																	<a href="title4.php">Title section 4</a>
																</li>
																<li>
																	<a href="title5.php">Title section 5</a>
																</li>
																<li>
																	<a href="title6.php">Title section 6</a>
																</li>
															</ul>
														</li>
														<li class="mega-menu-col">
															<a href="footer1.php#footer">Footers</a>
															<ul>
																<li>
																	<a href="footer1.php#footer">Footer Type 1</a>
																</li>
																<li>
																	<a href="footer2.php#footer">Footer Type 2</a>
																</li>
																<li>
																	<a href="footer3.php#footer">Footer Type 3</a>
																</li>
																<li>
																	<a href="footer4.php#footer">Footer Type 4</a>
																</li>
																<li>
																	<a href="footer5.php#footer">Footer Type 5</a>
																</li>
																<li>
																	<a href="footer6.php#footer">Footer Type 6</a>
																</li>
															</ul>
														</li>
														<li class="mega-menu-col">
															<a href="copyright1.php#copyright">Copyright</a>

															<ul>
																<li>
																	<a href="copyright1.php#copyright">Copyright 1</a>
																</li>
																<li>
																	<a href="copyright2.php#copyright">Copyright 2</a>
																</li>
																<li>
																	<a href="copyright3.php#copyright">Copyright 3</a>
																</li>
																<li>
																	<a href="copyright4.php#copyright">Copyright 4</a>
																</li>
																<li>
																	<a href="copyright5.php#copyright">Copyright 5</a>
																</li>
																<li>
																	<a href="copyright6.php#copyright">Copyright 6</a>
																</li>
															</ul>
														</li>

													</ul>
												</div> <!-- eof mega menu -->
											</li>
											<!-- eof features -->
											<!-- contacts -->
											<li>
												<a href="contact.php">Contacts</a>
												<ul>
													<li>
														<a href="contact.php">Contact 1</a>
													</li>
													<li>
														<a href="contact2.php">Contact 2</a>
													</li>
													<li>
														<a href="contact3.php">Contact 3</a>
													</li>
													<li>
														<a href="contact4.php">Contact 4</a>
													</li>
													<li>
														<a href="contact5.php">Contact 5</a>
													</li>
												</ul>
											</li>

											<!-- eof contacts -->
										</ul>


									</nav>
									<!-- eof main nav -->

									<!--hidding includes on small devices. They are duplicated in topline-->
									<ul class="top-includes d-none d-xl-block">
										<li>
											<i class="ico-phone color-main fs-14"></i> <span class="color-dark">1-800-123-45-67</span>
										</li>
									</ul>

								</div>
							</div>
						</div>
					</div>
					<!-- header toggler -->
					<span class="toggle_menu"><span></span></span>
				</header>

				<section class="page_title ds s-pt-120 s-pb-50 s-pt-lg-130 s-pb-lg-90 page_title s-parallax s-overlay">
					<div class="divider-55 d-none d-lg-block"></div>
					<div class="container">
						<div class="row">

							<div class="col-md-12 text-center text-lg-left">
								<h1 class="color-main">Shop Product Right Sidebar</h1>
								<ol class=" breadcrumb">
									<li class="breadcrumb-item">
										<a href="index.php">Home</a>
									</li>
									<li class="breadcrumb-item">
										<a href="#">Shop</a>
									</li>
									<li class="breadcrumb-item active">
										Shop Product Right Sidebar
									</li>
								</ol>
							</div>

						</div>
					</div>
				</section>
			</div>


			<section class="ls s-pt-60 s-pb-70 s-pt-lg-100 s-pb-lg-95 s-pt-xl-145 s-pb-xl-150 c-gutter-30">
				<div class="container">
					<div class="row">
						<main class="col-lg-7 col-xl-9">
							<div class="product">

								<div class="images" data-columns="5">
									<figure>
										
									<?php
									
									$img1 = "images/Flowers/1.png";
									$img2 = "images/Flowers/2.png";
									$img3 = "images/Flowers/3.png";
									$img4 = "images/Flowers/4.png";
									$img5 = "images/Flowers/5.png";


									if (strpos($service_name, 'Casket') !== false) {
										$img1 = "images/Caskets/1.jpg";
										$img2 = "images/Caskets/2.jpg";
										$img3 = "images/Caskets/3.jpg";
										$img4 = "images/Caskets/4.jpg";
										$img5 = "images/Caskets/5.jpg";
									} 
									
									elseif (strpos($service_name, 'Urn') !== false) {
										$img1 = "images/Urns/1.jpg";
										$img2 = "images/Urns/2.jpg";
										$img3 = "images/Urns/3.jpg";
										$img4 = "images/Urns/4.jpg";
										$img5 = "images/Urns/5.jpg";
									}

									echo "

										<div data-thumb='$img1'>
											<a href='$img1'>
												<img src='$img1' alt='' data-caption='' data-src='$img1' data-large_image='$img1' data-large_image_width='1000' data-large_image_height='1000'>
											</a>
										</div>
										<div data-thumb='$img2'>
											<a href='$img2'>
												<img src='$img2' alt='' data-caption='' data-src='$img2' data-large_image='$img2' data-large_image_width='1000' data-large_image_height='1000'>
											</a>
										</div>
										<div data-thumb='$img3'>
											<a href='$img3'>
												<img src='$img3' alt='' data-caption='' data-src='$img3' data-large_image='$img3' data-large_image_width='1000' data-large_image_height='1000'>
											</a>
										</div>
										<div data-thumb='$img4'>
											<a href='$img4'>
												<img src='$img4' alt='' data-caption='' data-src='$img4' data-large_image='$img4' data-large_image_width='1000' data-large_image_height='1000'>
											</a>
										</div>
										<div data-thumb='$img5'>
											<a href='$img5'>
												<img src='$img5' alt='' data-caption='' data-src='$img5' data-large_image='$img5' data-large_image_width='1000' data-large_image_height='1000'>
											</a>
										</div>

										";
										
										$conn->close();
									?>	


									</figure>
								</div>

								<div class="summary entry-summary text-center text-md-left">
									<h6 class="product_title single_title"><?php echo $service_name; ?></h6>
									<div class="star-rating">
										<span style="width:80%">Rated <strong class="rating">4</strong> out of 5</span>
									</div>
									<div class="woocommerce-product-rating">
										<!-- Your rating system here -->
									</div>

									<form method="POST" action="add-to-cart.php">
										<div class="single_variation_wrap">
											<div class="d-flex align-items-center">

												<div class="quantity single">
													<input type="button" value="+" class="plus">
													<i class="fa fa-angle-up" aria-hidden="true"></i>
													<input type="number" class="input-text qty text" step="1" min="1" max="1000" name="quantity" value="1" size="4">
													<input type="button" value="-" class="minus">
													<i class="fa fa-angle-down" aria-hidden="true"></i>
												</div>
												
												<span class="price">
													<span>₱ </span><?php echo $service_price; ?>
												</span>
											</div>

											<!-- Hidden input to pass the product name dynamically -->
											<input type="hidden" name="product_name" value="<?php echo $service_name; ?>">

											<button type="submit" class="single_add_to_cart_button btn alt btn-big btn-maincolor">
												<span>Add to cart</span>
											</button>
										</div>
									</form>
								</div>
								<!-- .summary -->


								<div class="woocommerce-tabs wc-tabs-wrapper">
									<h4 class="mb-25 text-center text-md-left">Description</h4>
									<ul class="tabs wc-tabs" role="tablist">
										<li class="description_tab" id="tab-title-description" role="tab" aria-controls="tab-description">
											<a href="#tab-description">Description</a>
										</li>
										<li class="reviews_tab" id="tab-title-reviews" role="tab" aria-controls="tab-reviews">
											<a href="#tab-reviews">Reviews</a>
										</li>
									</ul>

									<div class="panel wc-tab" id="tab-description" role="tabpanel" aria-labelledby="tab-title-description">
										<h6><?php echo $service_name; ?></h6>
										<p>At vero eos et accusam et justo duo dolores etea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo.</p>
										<p>Ermod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimat. Etiam ut bibendum leo, quis pulvinar orci. Phasellus nec eros purus. Sed consequat facilisis ligula. Nulla tristique erat mauris, et tristique nibh lacinia..</p>
									</div>
									<div class="panel wc-tab" id="tab-reviews" role="tabpanel" aria-labelledby="tab-title-reviews">
										<div id="reviews">
											<div id="comments">
												<ol class="commentlist">
													<li class="comment even thread-even depth-1" id="li-comment-34">

														<div id="comment-34" class="comment_container">

															<img alt="" src="images/team/comment-01.jpg">
															<div class="comment-text">

																<div class="star-rating">
																	<span style="width:80%">Rated <strong
	                                        class="rating">4</strong> out of 5</span>
																</div>
																<p class="meta">
																	<strong>James
											Koster</strong> <span>–</span>
																	<time datetime="2013-06-07T11:43:13+00:00">June 7, 2013</time>
																</p>

																<div class="description">
																	<p>Nice T-shirt, I got one in black. Goes with
																		anything!</p>
																</div>
															</div>
														</div>
													</li>
													<!-- #comment-## -->
													<li class="comment odd alt thread-odd thread-alt depth-1" id="li-comment-35">

														<div id="comment-35" class="comment_container">

															<img alt="" src="images/team/comment-02.jpg">
															<div class="comment-text">

																<div class="star-rating">
																	<span style="width:80%">Rated <strong
	                                        class="rating">4</strong> out of 5</span>
																</div>
																<p class="meta">
																	<strong>Cobus
											Bester</strong> <span>–</span>
																	<time datetime="2013-06-07T11:55:15+00:00">June 7, 2013</time>
																</p>

																<div class="description">
																	<p>Very comfortable shirt, and I love the graphic!</p>
																</div>
															</div>
														</div>
													</li>
													<!-- #comment-## -->
													<li class="comment even thread-even depth-1" id="li-comment-36">

														<div id="comment-36" class="comment_container">

															<img alt="" src="images/team/comment-03.jpg">
															<div class="comment-text">

																<div class="star-rating">
																	<span style="width:100%">Rated <strong
	                                        class="rating">5</strong> out of 5</span>
																</div>
																<p class="meta">
																	<strong>Stuart</strong>
																	<span>–</span>
																	<time datetime="2013-06-07T13:02:14+00:00">June 7, 2013</time>
																</p>

																<div class="description">
																	<p>Great T-shirt quality, Great Design and Great
																		Service.</p>
																</div>
															</div>
														</div>
													</li>
													<!-- #comment-## -->
												</ol>


											</div>


											<div id="review_form_wrapper">
												<div id="review_form">
													<div id="respond" class="comment-respond">
														<span id="reply-title" class="comment-reply-title">Add a review <small>
																<a rel="nofollow" id="cancel-comment-reply-link" href="#respond" style="display:none;">Cancel reply</a>
															</small>
														</span>
														<form action="https://html.modernwebtemplates.com/" method="post" id="commentform" class="comment-form" novalidate="">
															<p class="comment-notes">
																<span id="email-notes">Your email address will not be published.</span>
																Required fields are marked <span class="required">*</span>
															</p>
															<div class="comment-form-rating">
																<label>Your rating</label>
																<p class="stars">
																	<span>
																		<a class="star-1" href="#">1</a>
																		<a class="star-2" href="#">2</a>
																		<a class="star-3" href="#">3</a>
																		<a class="star-4" href="#">4</a>
																		<a class="star-5" href="#">5</a>
																	</span>
																</p>
															</div>
															<p class="comment-form-comment">
																<label for="comment">Your review <span class="required">*</span>
																</label>
																<textarea aria-required="true" rows="6" cols="45" name="comment" id="comment" class="form-control" placeholder="Your review "></textarea>
															</p>
															<p class="comment-form-author">
																<label for="author">Name <span class="required">*</span>
																</label>
																<input class="form-control" id="author" name="author" type="text" value="" size="30" aria-required="true" required="" placeholder="Full Name">
															</p>
															<p class="comment-form-email">
																<label for="email">Email <span class="required">*</span>
																</label> <input class="form-control" id="email" name="email" type="email" value="" size="30" aria-required="true" required="" placeholder="e-mail address">
															</p>
															<p class="form-submit">
																<button type="submit" id="submit" name="submit" class="btn btn-maincolor"><span>Submit</span></button>
															</p>
														</form>
													</div>
													<!-- #respond -->
												</div>
											</div>
											<div class="clear">
											</div>
										</div>
									</div>

								</div>


								<section class="up-sells upsells products">
									<div class="col-12 mb-60">
										<p class="subtitle text-center">today, tomorrow and beyond.</p>
										<h2 class="special-heading"><span class="color-main">Our Top </span>Sellers</h2>
									</div>
									<ul class="products">
										<li class="product vertical-item content-padding">
											<div class="product-inner box-shadow">
												<img src="images/shop/01.jpg" alt="">
												<div class="media-links">
													<a class="abs-link" title="" href="shop-product-right.php"></a>
												</div>
												<div class="item-content">
													<h2>Bouquet 25 red roses</h2>
													<span class="price">
														<del>
															<span>
																<span>₱ </span>34
															</span>
														</del>
														<span>₱ </span>55
													</span>
												</div>
												<div class="shop-btn">
													<a href="#" class="add-to-card btn btn-maincolor">Add to cart</a>
												</div>
											</div>
										</li>
										<li class="product vertical-item content-padding">
											<div class="product-inner box-shadow">
												<img src="images/shop/02.jpg" alt="">
												<div class="media-links">
													<a class="abs-link" title="" href="shop-product-right.php"></a>
												</div>
												<div class="item-content">
													<h2>Bouquet Romantic</h2>
													<span class="price">
														<del>
															<span>
																<span>₱ </span>34
															</span>
														</del>
														<span>₱ </span>55
													</span>
												</div>
												<div class="shop-btn">
													<a href="#" class="add-to-card btn btn-maincolor">Add to cart</a>
												</div>
											</div>
										</li>
										<li class="product vertical-item content-padding">
											<div class="product-inner box-shadow">
												<img src="images/shop/03.jpg" alt="">
												<div class="media-links">
													<a class="abs-link" title="" href="shop-product-right.php"></a>
												</div>
												<div class="item-content">
													<h2>51 multicolored tulips</h2>
													<span class="price">
														<del>
															<span>
																<span>₱ </span>34
															</span>
														</del>
														<span>₱ </span>55
													</span>
												</div>
												<div class="shop-btn">
													<a href="#" class="add-to-card btn btn-maincolor">Add to cart</a>
												</div>
											</div>
										</li>
										<li class="product vertical-item content-padding">
											<div class="product-inner box-shadow">
												<img src="images/shop/04.jpg" alt="">
												<div class="media-links">
													<a class="abs-link" title="" href="shop-product-right.php"></a>
												</div>
												<div class="item-content">
													<h2>Bouquet Spring</h2>
													<span class="price">
														<del>
															<span>
																<span>₱ </span>34
															</span>
														</del>
														<span>₱ </span>55
													</span>
												</div>
												<div class="shop-btn">
													<a href="#" class="add-to-card btn btn-maincolor">Add to cart</a>
												</div>
											</div>
										</li>
										<li class="product vertical-item content-padding">
											<div class="product-inner box-shadow">
												<img src="images/shop/05.jpg" alt="">
												<div class="media-links">
													<a class="abs-link" title="" href="shop-product-right.php"></a>
												</div>
												<div class="item-content">
													<h2>Bouquet "Charm"</h2>
													<span class="price">
														<del>
															<span>
																<span>₱ </span>34
															</span>
														</del>
														<span>₱ </span>55
													</span>
												</div>
												<div class="shop-btn">
													<a href="#" class="add-to-card btn btn-maincolor">Add to cart</a>
												</div>
											</div>
										</li>
										<li class="product vertical-item content-padding">
											<div class="product-inner box-shadow">
												<img src="images/shop/06.jpg" alt="">
												<div class="media-links">
													<a class="abs-link" title="" href="shop-product-right.php"></a>
												</div>
												<div class="item-content">
													<h2>Spring bouquet </h2>
													<span class="price">
														<del>
															<span>
																<span>₱ </span>34
															</span>
														</del>
														<span>₱ </span>55
													</span>
												</div>
												<div class="shop-btn">
													<a href="#" class="add-to-card btn btn-maincolor">Add to cart</a>
												</div>
											</div>
										</li>
										<li class="product vertical-item content-padding">
											<div class="product-inner box-shadow">
												<img src="images/shop/07.jpg" alt="">
												<div class="media-links">
													<a class="abs-link" title="" href="shop-product-right.php"></a>
												</div>
												<div class="item-content">
													<h2>Romantic bouquet</h2>
													<span class="price">
														<del>
															<span>
																<span>₱ </span>34
															</span>
														</del>
														<span>₱ </span>55
													</span>
												</div>
												<div class="shop-btn">
													<a href="#" class="add-to-card btn btn-maincolor">Add to cart</a>
												</div>
											</div>
										</li>
										<li class="product vertical-item content-padding">
											<div class="product-inner box-shadow">
												<img src="images/shop/08.jpg" alt="">
												<div class="media-links">
													<a class="abs-link" title="" href="shop-product-right.php"></a>
												</div>
												<div class="item-content">
													<h2>51 white and pink</h2>
													<span class="price">
														<del>
															<span>
																<span>₱ </span>34
															</span>
														</del>
														<span>₱ </span>55
													</span>
												</div>
												<div class="shop-btn">
													<a href="#" class="add-to-card btn btn-maincolor">Add to cart</a>
												</div>
											</div>
										</li>
										<li class="product vertical-item content-padding">
											<div class="product-inner box-shadow">
												<img src="images/shop/09.jpg" alt="">
												<div class="media-links">
													<a class="abs-link" title="" href="shop-product-right.php"></a>
												</div>
												<div class="item-content">
													<h2>Bouquet "Silver"</h2>
													<span class="price">
														<del>
															<span>
																<span>₱ </span>34
															</span>
														</del>
														<span>₱ </span>55
													</span>
												</div>
												<div class="shop-btn">
													<a href="#" class="add-to-card btn btn-maincolor">Add to cart</a>
												</div>
											</div>
										</li>
									</ul>
								</section>
							</div>


						</main>

						<aside class="col-lg-5 col-xl-3">
							<div class="bg-maincolor py-50 px-30 cs">
								<div class="widget widget_product_search">

									<h3 class="widget-title">Search</h3>

									<form role="search" class="woocommerce-product-search" action="https://html.modernwebtemplates.com/">

										<label class="screen-reader-text" for="woocommerce-product-search-field-widget">
											Search for:
										</label>

										<input type="search" id="woocommerce-product-search-field-widget" class="search-field" placeholder="Search" value="" name="search">
										<input type="submit" value="Search">
									</form>
								</div>
							</div>
							<div class="widget woocommerce widget_product_categories">
								<h5 class="widget-title">Categories</h5>
								<ul class="product-categories">
								<li class="cat-item cat-parent">
										<a href="shop-right.php" class="active">Memorial Products</a>
										<ul class="children">
											<li class="cat-item">
												<a href="shop-right.php"> Bouquet</a>
											</li>
											<li class="cat-item">
												<a href="shop-right-caskets.php">Caskets</a> 	
											</li>
											<li class="cat-item">
												<a href="shop-right-urns.php">Urns </a>
											</li>
										</ul>
									</li>

									<li class="cat-item cat-parent">
										 <a href="shop-right.php" class="active">Spaces</a> 
										<ul class="children">
											<li class="cat-item">
												<a href="shop-right-funeral.php">Funeral</a>
											</li>
											<li class="cat-item">
												<a href="shop-right-space.php">Memorial Space</a> 
											</li>
										</ul>
									</li>
								</ul>
							</div>


							<div class="widget woocommerce widget_recently_viewed_products">

								<h5 class="widget-title">Viewed Products</h5>

								<ul class="product_list_widget">
									<li>
										<a href="shop-product-right.php">
											<img src="images/shop/05.jpg" alt="">
											<span class="product-title">Bouquet "Charm"</span>
										</a>
										<div class="d-flex justify-content-between rating-product">
											<div class="star-rating">
												<span style="width:80%">Rated
													<strong class="rating">5.00 </strong>
													out of 5
												</span>
											</div>
											<a href="#" class="remove" aria-label="Remove this item" data-product_id="73" data-product_sku=""><i class="fs-14 ico-trash color-main"></i></a>
										</div>
										<span class="woocommerce-Price-amount amount">
											<span class="woocommerce-Price-currencySymbol">₱</span>34
										</span>
									</li>
									<li>
										<a href="shop-product-right.php">
											<img src="images/shop/08.jpg" alt="">
											<span class="product-title">51 white and pink</span>
										</a>
										<div class="d-flex justify-content-between rating-product">
											<div class="star-rating">
												<span style="width:80%">Rated
													<strong class="rating">5.00 </strong>
													out of 5
												</span>
											</div>
											<a href="#" class="remove" aria-label="Remove this item" data-product_id="73" data-product_sku=""><i class="fs-14 ico-trash color-main"></i></a>
										</div>
										<del>
											<span class="woocommerce-Price-amount amount">
												<span class="woocommerce-Price-currencySymbol">₱</span>
												55
											</span>
										</del>
										<span class="woocommerce-Price-amount amount">
											<span class="woocommerce-Price-currencySymbol">₱</span>
											34
										</span>
									</li>

									<li>
										<a href="shop-product-right.php">
											<img src="images/shop/01.jpg" alt="">
											<span class="product-title">Bouquet 25 red roses</span>
										</a>
										<div class="d-flex justify-content-between rating-product">
											<div class="star-rating">
												<span style="width:80%">Rated
													<strong class="rating">5.00 </strong>
													out of 5
												</span>
											</div>
											<a href="#" class="remove" aria-label="Remove this item" data-product_id="73" data-product_sku=""><i class="fs-14 ico-trash color-main"></i></a>
										</div>
										<del>
											<span class="woocommerce-Price-amount amount">
												<span class="woocommerce-Price-currencySymbol">₱</span>
												55
											</span>
										</del>
										<span class="woocommerce-Price-amount amount">
											<span class="woocommerce-Price-currencySymbol">₱</span>
											34
										</span>
									</li>
								</ul>
							</div>


							<div class="widget woocommerce widget_price_filter">

								<h5 class="widget-title">Price Filter</h5>

								<form method="get" action="https://html.modernwebtemplates.com/">
									<div class="price_slider_wrapper">

										<div class="price_slider ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" style="">
											<span class="from">₱20.00</span>
											<div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 14%; width: 65%;">
											</div>
											<span class="to">₱700.00</span>
											<span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 12%;">

											</span>
											<span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 80%;">

											</span>
										</div>
										<div class="price_slider_amount">

											<input type="text" id="min_price" name="min_price" value="" data-min="20" placeholder="Min price" style="display: none;">

											<input type="text" id="max_price" name="max_price" value="" data-max="30" placeholder="Max price" style="display: none;">

											<div class="clear"></div>
										</div>
									</div>
								</form>
							</div>


						</aside>
					</div>
				</div>
			</section>

			<footer class="page_footer text-center text-md-left page_footer ds s-pt-55 s-pb-0 s-pt-lg-95 s-pb-lg-30 s-pt-xl-145 s-pb-xl-80 c-gutter-50">
				<div class="container">
					<div class="row">

						<div class="col-md-6 col-xl-3 animate" data-animation="fadeInUp">

							<div class="widget widget_text">
								<a href="index.php" class="logo">
									<img src="images/logo.png" alt="">
									<div class="d-flex flex-column">
										<h4 class="logo-text color-main">Memento</h4>
										<span class="logo-subtext">Funeral Service</span>
									</div>
								</a>
								<p>
									We do accept cremains from throughout the United States and the world. Many of our families come from the Phoenix area as well as various
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

								<form class="signup" action="https://html.modernwebtemplates.com/">
									<label for="mailchimp_email">
										<span class="screen-reader-text">Subscribe:</span>
									</label>

									<input id="mailchimp_email" name="email" type="email" class="form-control mailchimp_email" placeholder="Your Email">

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
										<a href="https://html.modernwebtemplates.com/cdn-cgi/l/email-protection#a3cec6cec6cdd7cce3c6dbc2ced3cfc68dc0ccce"><span class="__cf_email__" data-cfemail="78151d151d160c17381d00191508141d561b1715">[email&#160;protected]</span></a>
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
							<p>&copy; Memento <span class="copyright_year">2019</span> - All Rights Reserved</p>
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


	<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="js/compressed.js"></script>
	<script src="js/main.js"></script>
	<script src="js/switcher.js"></script>

</body>


<!-- Mirrored from html.modernwebtemplates.com/memento/shop-product-right.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Nov 2024 06:47:32 GMT -->
</html>