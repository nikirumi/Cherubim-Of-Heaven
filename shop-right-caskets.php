<!DOCTYPE html>
<html class="no-js">

<?php

	include("check_session.php");

	function displayAssoc($ID) {
		global $conn;
		
		$findGoods = "SELECT 
                 mg.MG_Service_ID, 
                 mg.Quantity, 
                 mg.Size, 
                 ms.Service_ID, 
                 ms.Service_Name, 
                 ms.Service_Description, 
                 ms.Service_Price, 
                 ms.Service_Type
              FROM MEMORIAL_GOODS mg
              JOIN MEMORIAL_SERVICES ms 
              ON mg.MG_Service_ID = ms.Service_ID
              WHERE mg.MG_Service_ID = ?"; // Filter by MG_Service_ID


		if ($stmt = $conn->prepare($findGoods)) {
            $stmt->bind_param("s", $ID); 
            $stmt->execute();
            $goodsResult = $stmt->get_result();

            if ($goodsResult->num_rows > 0) {
                
                return $goodsResult->fetch_assoc();

            } else {
                return null;
            }

            $stmt->close();
        } else {
            echo "Error preparing statement.<br>";
            return null;
        }

	}
	$rows = [];
	for ($i = 10; $i <= 18; $i++) {
		$ID = sprintf("S-%03d", $i); // Generate IDs from S-009 to S-018
		$rows[] = displayAssoc($ID); // Store each row in an array
	}

?>

<head>
	<title>Cherubim Of Heaven - Multipurpose Funeral Service HTML template</title>
	<meta charset="utf-8">
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

		.product-inner {
			height: 330px;
		}

	</style>


</head>

<body>
	<div class="preloader">
		<div class="preloader_image"></div>
	</div>

	<!-- search modal -->
	<div class="modal" tabindex="-1" role="dialog" aria-labelledby="search_modal" id="search_modal">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		<div class="widget widget_search">
			<form method="get" class="searchform search-form" action="#">
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
										<h4 class="logo-text color-main">Cherubim Of Heaven</h4>
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
								<h1 class="color-main">Catalog</h1>
								<ol class=" breadcrumb">
									<li class="breadcrumb-item">
										<a href="index.php">Home</a>
									</li>
									<li class="breadcrumb-item">
										<a href="#">Shop</a>
									</li>
									<li class="breadcrumb-item active">
										Catalog
									</li>
								</ol>
							</div>

						</div>
					</div>
				</section>
			</div>


			<section class="ls s-pt-60 s-pb-70 s-py-lg-100 s-py-xl-150">
				<div class="container">
					<div class="row">

						<main class="col-lg-8 col-xl-9">						
							<div class="columns-3">

							<ul class="products">
								<?php for ($i = 0; $i < count($rows); $i++): ?>

									<li class="product vertical-item content-padding">
										<div class="product-inner box-shadow">
											<img src="images/Caskets/<?php echo ($i + 1); ?>.jpg" alt="">

											<div class="media-links">
												<a class="abs-link" title="" href="shop-product-right.php?id='<?php echo urlencode($rows[$i]['Service_ID']); ?>'"></a>
											</div>
											<div class="item-content">
												<h2><?php echo $rows[$i]['Service_Name']; ?></h2>
												<span class="price">
													<del>
														<span>
															<span>PHP </span><span>₱ </span><?php echo number_format($rows[$i]['Service_Price']); ?>
														</span>
													</del>
												</span>
											</div>

											<div class="shop-btn">
												<a href="shop-product-right.php?id=<?php echo $rows[$i]['Service_ID'] ?>" class="add-to-card btn btn-maincolor">View</a>
											</div>
										</div>
									</li>
									<?php endfor; ?>

								</ul>
							</div>						

						</main>

						<aside class="col-lg-4 col-xl-3">
					
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

								<h5 class="widget-title">Most Purchased</h5>

								<ul class="product_list_widget">

									<li>
										<a href="shop-product-right.php?id='S-018'">
											<img src="images/Caskets/9.jpg" alt="">
											<span class="product-title"><?php echo ($rows[8]['Service_Name']); ?></span>
										</a>
										<div class="d-flex justify-content-between rating-product">
											<div class="star-rating">
												<span style="width:80%">Rated
													<strong class="rating">5.00 </strong>
													out of 5
												</span>
											</div>
											<!--<a href="#" class="remove" aria-label="Remove this item" data-product_id="73" data-product_sku=""><i class="fs-14 ico-trash color-main"></i></a>-->
											</div>
										<span class="woocommerce-Price-amount amount">
											<span class="woocommerce-Price-currencySymbol">₱</span><?php echo number_format($rows[8]['Service_Price']); ?>
										</span>
									</li>

									<li>
										<a href="shop-product-right.php?id='S-018'">
											<img src="images/Caskets/6.jpg" alt="">
											<span class="product-title"><?php echo ($rows[5]['Service_Name']); ?></span>
										</a>
										<div class="d-flex justify-content-between rating-product">
											<div class="star-rating">
												<span style="width:80%">Rated
													<strong class="rating">5.00 </strong>
													out of 5
												</span>
											</div>
											<!--<a href="#" class="remove" aria-label="Remove this item" data-product_id="73" data-product_sku=""><i class="fs-14 ico-trash color-main"></i></a>-->
											</div>
										<span class="woocommerce-Price-amount amount">
											<span class="woocommerce-Price-currencySymbol">₱</span><?php echo number_format($rows[5]['Service_Price']); ?>
										</span>
									</li>

							
								</ul>
							</div>


							<!-- <div class="widget woocommerce widget_price_filter">

								<h5 class="widget-title">Price Filter</h5>

								<form method="get" action="#">
									<div class="price_slider_wrapper">

										<div class="price_slider ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
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
							</div> -->


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


	<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="js/compressed.js"></script>
	<script src="js/main.js"></script>

</body>
</html>