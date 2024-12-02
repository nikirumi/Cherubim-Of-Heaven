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
	$stmt = $conn->prepare("SELECT 
							s.Service_ID, 
							s.Service_Name, 
							s.Service_Price, 
							s.Service_Description, 
							g.Quantity 
							FROM memorial_services s
							JOIN Memorial_goods g ON s.Service_ID = g.MG_Service_ID 
							WHERE s.Service_ID = ?");

	$stmt->bind_param("s", $product_id); 
	$stmt->execute();
	$result = $stmt->get_result();

	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$service_id = $row['Service_ID'];
		$service_name = $row['Service_Name'];
		$service_price = $row['Service_Price'];
		$service_description = $row['Service_Description'];
		$quantity = $row['Quantity'];  // Now you have the Quantity value from Memorial_goods
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
	
	<title>Cherubim Of Heaven - Multipurpose Funeral Service - Products</title>
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
	<style>
		img {
			display: block;
			margin: 0 auto;
		}

		div[data-thumb] {
			text-align: center;
		}

		.product-inner {
			height: 330px;
		}

	</style>

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
										<h4 class="logo-text color-main">Cherubim of Heaven</h4>
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

									<!--hidding includes on small devices. They are duplicated in topline-->
									<ul class="top-includes d-none d-xl-block">
										<li>
											<i class="ico-phone color-main fs-14"></i> <span class="color-dark">(044) 762 4284</span>
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
								<h1 class="color-main">Product Info</h1>
								<ol class=" breadcrumb">
									<li class="breadcrumb-item">
										<a href="index.php">Home</a>
									</li>
									<li class="breadcrumb-item">
										<a href="#">Shop</a>
									</li>
									<li class="breadcrumb-item active">
										Product Info
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

										$keywords = ['flower', 'casket', 'urn'];
										$extractedKeyword = '';

										foreach ($keywords as $keyword) {
											if (stripos($service_name, $keyword) !== false) {
												$extractedKeyword = $keyword;
												break; // Stop once a match is found
											}
										}

										if ($extractedKeyword !== '') {

											$subQuery = "
												SELECT row_num, Service_ID, Service_Name
												FROM (
													SELECT 
														ROW_NUMBER() OVER (ORDER BY Service_ID) AS row_num, 
														Service_ID, 
														Service_Name
													FROM memorial_services
													WHERE Service_Name LIKE CONCAT('%', ?, '%')
												) AS subquery
												WHERE Service_ID = ?;
											";

											$stmtRow = $conn->prepare($subQuery);
											$stmtRow->bind_param("ss", $extractedKeyword, $service_id); 

											$stmtRow->execute();
											$rowResult = $stmtRow->get_result();

											$intValue = 0;
											//$image_name = '';

											if ($row = $rowResult->fetch_assoc()) {
												$intValue = $row['row_num'];
											} else {
												echo "No matching record found.";
											}

											$stmtRow->close();
										} else {
											echo "No recognized keyword found in service name.";
										}

										$imgBasePath = "images/Flowers/"; 
										$imageExtension = "png"; 

										if (strpos($service_name, 'Casket') !== false) {
											$imgBasePath = "images/Caskets/";
											$imageExtension = "jpg"; 
										} elseif (strpos($service_name, 'Urn') !== false) {
											$imgBasePath = "images/Urns/";
											$imageExtension = "jpg";
										}
										

										$img1 = $imgBasePath . $intValue . "." . $imageExtension;
										$img2 = $imgBasePath . ($intValue + 1) . "." . $imageExtension;
										$img3 = $imgBasePath . ($intValue + 2) . "." . $imageExtension;
										$img4 = $imgBasePath . ($intValue + 3) . "." . $imageExtension;
										$img5 = $imgBasePath . ($intValue + 4) . "." . $imageExtension;

									echo "

										<div data-thumb='$img1'>
											<a href='$img1'>
												<img src='$img1'  data-caption='' data-src='$img1' data-large_image='$img1' data-large_image_width='1000' data-large_image_height='1000'>
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
									<span class="price">
										<span>Stock: </span><?php echo $quantity; ?>
									</span>
									<div class="woocommerce-product-rating">
										<!-- Your rating system here -->
									</div>

									<form method="POST" action="add-to-cart.php">
										<div class="single_variation_wrap">
											<div class="d-flex align-items-center">

												<div class="quantity single">
													<input type="button" value="+" class="plus">
													<i class="fa fa-angle-up" aria-hidden="true"></i>
													<input type="number" class="input-text qty text" step="1" min="1" max="<?php echo $quantity; ?>" name="quantity" value="1" size="4">
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
							</div>

						</main>

						<aside class="col-lg-5 col-xl-3">
							
							<div class="widget woocommerce widget_product_categories">
								<h5 class="widget-title">Categories</h5>
								<ul class="product-categories">
								<li class="cat-item cat-parent">
										<a href="shop-right.php" class="active">Memorial Products</a>
										<ul class="children">
											<li class="cat-item">
												<a href="shop-right.php"> Flowers</a>
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
										 <a href="shop-right-funeral.php" class="active">Funeral</a> 
									</li>
									
									<li class="cat-item cat-parent">
										 <a href="shop-right-space.php" class="active">Memorial Space</a> 
									</li>
								</ul>
							</div>


							<div class="widget woocommerce widget_recently_viewed_products">

								
							</div>

						</aside>
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
							<p>&copy; Cherubim of Heaven <span class="copyright_year">2019</span> - All Rights Reserved</p>
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