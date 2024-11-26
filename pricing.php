<!DOCTYPE html>
<html class="no-js">
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
	<script src="js/vendor/modernizr-2.6.2.min.js"></script>

</head>
	<?php
		$curl = curl_init();

		curl_setopt_array($curl, [
			CURLOPT_URL => "https://api.paymongo.com/v1/links",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => json_encode([
				'data' => [
					'attributes' => [
						'amount' => 10000,
						'description' => 'pay',
						'remarks' => 'gcash'
					]
				]
			]),
			CURLOPT_HTTPHEADER => [
				"accept: application/json",
				"authorization: Basic c2tfdGVzdF8xa2ZZanYxcHpuUldaSldDWXZ6UEp2Qlg6",
				"content-type: application/json"
			],
		]);

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			// Decode the response JSON and extract the payment link
			$responseData = json_decode($response, true);
			$paymentLink = $responseData['data']['attributes']['checkout_url'] ?? '#'; // Get the checkout_url
		}
	?>

	<script>
		// Pass the PHP payment link to JavaScript
		const paymentLink = "<?php echo $paymentLink; ?>"; // PHP variable embedded in JavaScript

		// Function to open the payment link
		function openPaymentLink() {
			if (paymentLink !== '#') { // Check if payment link is available
				window.open(paymentLink, '_blank'); // Open the link in a new tab
			} else {
				alert('Payment link not available.');
			}
		}
	</script>

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
								<h1 class="color-main">Pricing</h1>
								<ol class=" breadcrumb">
									<li class="breadcrumb-item">
										<a href="index.php">Home</a>
									</li>
									<li class="breadcrumb-item">
										<a href="#">Pages</a>
									</li>
									<li class="breadcrumb-item active">
										Pricing
									</li>
								</ol>
							</div>

						</div>
					</div>
				</section>
			</div>


			<section class="ls s-pt-60 s-pb-20 s-pt-lg-100 s-pb-lg-90 s-pt-xl-150 s-pb-xl-140 c-gutter-60">
				<div class="container">
					<div class="row">
						<div class="col-lg-4">
							<div class="pricing-plan box-shadow">
								<div class="plan-name ">
									<h5>
										Basic
									</h5>
								</div>
								<div class="price-wrap color-darkgrey">
									<h6>
										<span class="plan-sign">$</span>
										<span class="plan-price">35</span>
									</h6>
								</div>
								<div class="plan-description letter-spacing">
									Per month
								</div>
								<div class="plan-features">
									<ul class="list-bordered">
										<li>Director Services</li>
										<li>Cremation Process</li>
										<li>Dressing & Cosmetizing</li>
										<li>Transportation Ship</li>
									</ul>
								</div>
								<div class="plan-button">
									<a href="#" onclick="openPaymentLink()" class="btn btn-maincolor">Get Started</a>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="pricing-plan bg-maincolor2 box-shadow">
								<div class="plan-name ">
									<h5>
										Gold
									</h5>
								</div>
								<div class="price-wrap color-darkgrey">
									<h6>
										<span class="plan-sign">$</span>
										<span class="plan-price">55</span>
									</h6>
								</div>
								<div class="plan-description letter-spacing">
									Per month
								</div>
								<div class="plan-features">
									<ul class="list-bordered">
										<li>Director Services</li>
										<li>Cremation Process</li>
										<li>Dressing & Cosmetizing</li>
										<li>Transportation Ship</li>
									</ul>
								</div>
								<div class="plan-button">
									<a href="#" onclick="openPaymentLink()" class="btn btn-maincolor">Get Started</a>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="pricing-plan box-shadow">
								<div class="plan-name ">
									<h5>
										Premium
									</h5>
								</div>
								<div class="price-wrap color-darkgrey">
									<h6>
										<span class="plan-sign">$</span>
										<span class="plan-price">99</span>
									</h6>
								</div>
								<div class="plan-description letter-spacing">
									Per month
								</div>
								<div class="plan-features">
									<ul class="list-bordered">
										<li>Director Services</li>
										<li>Cremation Process</li>
										<li>Dressing & Cosmetizing</li>
										<li>Transportation Ship</li>
									</ul>
								</div>
								<div class="plan-button">
									<a href="#" onclick="openPaymentLink()" class="btn btn-maincolor">Get Started</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="ls s-pt-0 s-pb-60 s-pb-lg-100 s-pb-lg-150">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div class="divider-3"></div>
							<p class="subtitle letter-spacing text-center">today, tomorrow and beyond.</p>
							<h3 class="special-heading"><span class="color-main">Have You</span> A Question?</h3>
							<div class="divider-65 d-none d-lg-block"></div>
							<div class="row">
								<div class="col-lg-6">
									<div class="accordion" id="accordion01" role="tablist">
										<div class="card">
											<div class="card-header" role="tab" id="collapse01_header">
												<h6>
													<a data-toggle="collapse" href="#collapse01" aria-expanded="true" aria-controls="collapse01">
														Do you have a delivery service?
													</a>
												</h6>
											</div>

											<div id="collapse01" class="collapse show" role="tabpanel" aria-labelledby="collapse01_header" data-parent="#accordion01">
												<div class="card-body hero-bg">
													<p>
														Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
													</p>
												</div>
											</div>
										</div>

										<div class="card">
											<div class="card-header" role="tab" id="collapse02_header">
												<h6>
													<a class="collapsed" data-toggle="collapse" href="#collapse02" aria-expanded="false" aria-controls="collapse02">
														What are the payment options at Cherubim Of Heaven?
													</a>
												</h6>
											</div>
											<div id="collapse02" class="collapse" role="tabpanel" aria-labelledby="collapse02_header" data-parent="#accordion01">
												<div class="card-body hero-bg">
													<p>
														Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
													</p>
												</div>
											</div>
										</div>

										<div class="card">
											<div class="card-header" role="tab" id="collapse03_header">
												<h6>
													<a class="collapsed" data-toggle="collapse" href="#collapse03" aria-expanded="false" aria-controls="collapse03">
														When are you open? Are you open on holidays?
													</a>
												</h6>
											</div>
											<div id="collapse03" class="collapse" role="tabpanel" aria-labelledby="collapse03_header" data-parent="#accordion01">
												<div class="card-body hero-bg">
													<p>
														Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
													</p>
												</div>
											</div>
										</div>
										<div class="card">
											<div class="card-header" role="tab" id="collapse04_header">
												<h6>
													<a class="collapsed" data-toggle="collapse" href="#collapse04" aria-expanded="false" aria-controls="collapse04">
														What if a part is missing in the package?
													</a>
												</h6>
											</div>
											<div id="collapse04" class="collapse" role="tabpanel" aria-labelledby="collapse04_header" data-parent="#accordion01">
												<div class="card-body hero-bg">
													<p>
														Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
													</p>
												</div>
											</div>
										</div>
										<div class="card">
											<div class="card-header" role="tab" id="collapse05_header">
												<h6>
													<a class="collapsed" data-toggle="collapse" href="#collapse05" aria-expanded="false" aria-controls="collapse05">
														What is the Cherubim Of Heaven Return Policy?
													</a>
												</h6>
											</div>
											<div id="collapse05" class="collapse" role="tabpanel" aria-labelledby="collapse05_header" data-parent="#accordion01">
												<div class="card-body hero-bg">
													<p>
														Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
													</p>
												</div>
											</div>
										</div>
									</div>
									<!-- collapse -->
								</div>
								<div class="col-lg-6">
									<div class="divider-40 d-block d-lg-none"></div>
									<div class="accordion" id="accordion02" role="tablist">

										<div class="card">
											<div class="card-header" role="tab" id="collapse06_header">
												<h6>
													<a class="collapsed" data-toggle="collapse" href="#collapse06" aria-expanded="false" aria-controls="collapse06">
														Lorem ipsum dolor sit amet?
													</a>
												</h6>
											</div>
											<div id="collapse06" class="collapse" role="tabpanel" aria-labelledby="collapse06_header" data-parent="#accordion02">
												<div class="card-body hero-bg">
													<p>
														Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
													</p>
												</div>
											</div>
										</div>
										<div class="card">
											<div class="card-header" role="tab" id="collapse07_header">
												<h6>
													<a class="collapsed" data-toggle="collapse" href="#collapse07" aria-expanded="false" aria-controls="collapse07">
														Consectetur adipiscing elit donec?
													</a>
												</h6>
											</div>
											<div id="collapse07" class="collapse" role="tabpanel" aria-labelledby="collapse07_header" data-parent="#accordion02">
												<div class="card-body hero-bg">
													<p>
														Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
													</p>
												</div>
											</div>
										</div>
										<div class="card">
											<div class="card-header" role="tab" id="collapse08_header">
												<h6>
													<a class="collapsed" data-toggle="collapse" href="#collapse08" aria-expanded="false" aria-controls="collapse08">
														Convallis placerat enim, ac bibendum?
													</a>
												</h6>
											</div>
											<div id="collapse08" class="collapse" role="tabpanel" aria-labelledby="collapse08_header" data-parent="#accordion02">
												<div class="card-body hero-bg">
													<p>
														Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
													</p>
												</div>
											</div>
										</div>
										<div class="card">
											<div class="card-header" role="tab" id="collapse09_header">
												<h6>
													<a class="collapsed" data-toggle="collapse" href="#collapse09" aria-expanded="false" aria-controls="collapse09">
														Suspendisse vitae pulvinar ligula maecenas?
													</a>
												</h6>
											</div>
											<div id="collapse09" class="collapse" role="tabpanel" aria-labelledby="collapse09_header" data-parent="#accordion02">
												<div class="card-body hero-bg">
													<p>
														Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
													</p>le-origin coffee shoreditch et.
												</div>
											</div>
										</div>
										<div class="card">
											<div class="card-header" role="tab" id="collapse10_header">
												<h6>
													<a class="collapsed" data-toggle="collapse" href="#collapse10" aria-expanded="false" aria-controls="collapse10">
														Ut ac elit eget tortor gravida id nulla?
													</a>
												</h6>
											</div>
											<div id="collapse10" class="collapse" role="tabpanel" aria-labelledby="collapse10_header" data-parent="#accordion02">
												<div class="card-body hero-bg">
													<p>
														Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
													</p>
												</div>
											</div>
										</div>
									</div>
									<!-- collapse -->
								</div>
							</div>
						</div>
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
										<h4 class="logo-text color-main">Cherubim Of Heaven</h4>
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

								<form class="signup" action="#">
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
										<a href="#"><span class="__cf_email__" data-cfemail="0e636b636b607a614e6b766f637e626b206d6163">[email&#160;protected]</span></a>
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