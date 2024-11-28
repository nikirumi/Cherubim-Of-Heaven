<!DOCTYPE html>
<html class="no-js">

<?php

	include("check_session.php");

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		
		$barangay = htmlspecialchars(trim($_POST['shipping_barangay']));
		$purok = htmlspecialchars(trim($_POST['shipping_purok']));
		$unit = htmlspecialchars(trim($_POST['shipping_unit']));
		$street = htmlspecialchars(trim($_POST['shipping_street']));

		//$stmt = $conn->prepare("INSERT INTO CLIENT (Barangay, Purok, H_num, S_name) VALUES (?, ?, ?, ?) WHERE Username = '$username'");
		$stmt = $conn->prepare("UPDATE CLIENT SET Barangay = ?, Purok = ?, H_num = ?, S_name = ? WHERE Username = ?");
		$stmt->bind_param("sssss", $barangay, $purok, $unit, $street, $username);

		if ($stmt->execute()) {
			//echo "New record created successfully!";
			header("Location: shop-account-addresses.php");
		} 
		
		else {
			echo "Error: " . $stmt->error;
		}

		stmt->close();

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
								<h1 class="color-main">Shop - Edit Address</h1>
								<ol class=" breadcrumb">
									<li class="breadcrumb-item">
										<a href="index.php">Home</a>
									</li>
									<li class="breadcrumb-item">
										<a href="#">Shop</a>
									</li>
									<li class="breadcrumb-item active">
										Shop - Edit Address
									</li>
								</ol>
							</div>

						</div>
					</div>
				</section>
			</div>

			<section class="ls s-py-55 s-pt-lg-95 s-pb-lg-100 s-pt-xl-145 s-pb-xl-150">
				<div class="container">
					<div class="row">
						<main class="col-lg-12">
							<article>
								<header class="entry-header mb-30">
									<h1 class="entry-title">Addresses</h1>
									<span class="edit-link">
										<a class="post-edit-link" href="#">
											Edit
											<span class="screen-reader-text">"My account"</span>
										</a>
									</span>
								</header>
								<!-- .entry-header -->
								<div class="entry-content">
									<div class="woocommerce">
										<nav class="woocommerce-MyAccount-navigation hero-bg box-shadow p-60">
											<ul>
												<li>
													<a href="shop-account-dashboard.php">Dashboard</a>
												</li>
												<li>
													<a href="shop-account-orders.php">Orders</a>
												</li>
												<li>
													<a href="shop-account-downloads.php">Downloads</a>
												</li>
												<li class="is-active">
													<a href="shop-account-addresses.php">Addresses</a>
												</li>
												<li>
													<a href="shop-account-details.php">Account details</a>
												</li>
												<li>
													<a href="shop-account-login.php">Logout</a>
												</li>
											</ul>
										</nav>


										<div class="woocommerce-MyAccount-content">
											<form method = "POST">
												<h6>General Address</h6>
												<div class="woocommerce-address-fields">
													<div class="woocommerce-address-fields__field-wrapper">
														<!--<p class="form-row form-row-first validate-required" id="shipping_first_name_field" data-priority="10">
															<label for="shipping_first_name" class="">First name
																<abbr class="required" title="required">*</abbr>
															</label>
															<input type="text" class="input-text form-control" name="shipping_first_name" id="shipping_first_name" placeholder="First name" value="" autocomplete="given-name" autofocus="autofocus">
														</p>
														<p class="form-row form-row-last validate-required" id="shipping_last_name_field" data-priority="20">
															<label for="shipping_last_name" class="">Last name
																<abbr class="required" title="required">*</abbr>
															</label>
															<input type="text" class="input-text form-control" name="shipping_last_name" id="shipping_last_name" placeholder="Last name" value="" autocomplete="family-name">
														</p>
														<p class="form-row form-row-wide" id="shipping_company_field" data-priority="30">
															<label for="shipping_company" class="">Company name</label>
															<input type="text" class="input-text form-control" name="shipping_company" id="shipping_company" placeholder="Company name" value="" autocomplete="organization">
														</p>-->
														<p class="form-row form-row-wide address-field update_totals_on_change validate-required" id="shipping_barangay_field" data-priority="40">
															<label for="shipping_barangay" class="">Barangay
																<abbr class="required" title="required">*</abbr>
															</label>
															<select name="shipping_barangay" id="shipping_barangay_dropdown" class="country_to_state country_select  select2-hidden-accessible" autocomplete="country" tabindex="-1" aria-hidden="true">
															<option value="">Select a barangay around Hagonoy, Bulacan...</option>
															<option value="Abulalas">Abulalas</option>
															<option value="Balagtas">Balagtas</option>
															<option value="Carillo">Carillo</option>
															<option value="Calizon">Calizon</option>
															<option value="Daang Bakal">Daang Bakal</option>
															<option value="Iba">Iba</option>
															<option value="Mercado">Mercado</option>
															<option value="Pugad">Pugad</option>
															<option value="Palapat">Palapat</option>
															<option value="Pantay">Pantay</option>
															<option value="San Agustin">San Agustin</option>
															<option value="San Juan">San Juan</option>
															<option value="San Miguel">San Miguel</option>
															<option value="San Pascual">San Pascual</option>
															<option value="San Roque">San Roque</option>
															<option value="San Sebastian">San Sebastian</option>
															<option value="Santa Cruz">Santa Cruz</option>
															<option value="Santo Niño">Santo Niño</option>
															<option value="Sapalibutad">Sapalibutad</option>
															<option value="Tampok">Tampok</option>
															<option value="Tibaguin">Tibaguin</option>
															<option value="Santiago">Santiago</option>
															<option value="Sagrada Familia">Sagrada Familia</option>
															</select>

														</p>
														
														<p class="form-row form-row-wide address-field validate-required" id="shipping_address_1_field" data-priority="50">
															<label for="shipping_purok" class="">Purok
																<abbr class="required" title="required">*</abbr>
															</label>
															<input type="text" class="input-text form-control" name="shipping_purok" id="shipping_purok_field" placeholder="Purok" value="" autocomplete="address-line1">
														</p>

														<!--<p class="form-row form-row-wide address-field" id="shipping_address_2_field" data-priority="60">
															<input type="text" class="input-text form-control" name="shipping_address_2" id="shipping_address_2" placeholder="Apartment, suite, unit etc. (optional)" value="" autocomplete="address-line2">
														</p>-->

														<p class="form-row form-row-wide address-field validate-required" id="shipping_unit_field" data-priority="70" data-o_class="form-row form-row-wide address-field validate-required">
															<label for="shipping_unit" class="">House Number / Unit
																<abbr class="required" title="required">*</abbr>
															</label>
															<input type="text" class="input-text form-control" name="shipping_unit" id="shipping_unit_field" placeholder="House Number / Unit" value="" autocomplete="address-level2">
														</p>

														<p class="form-row form-row-wide address-field validate-state validate-required" id="shipping_street_field" data-priority="80" data-o_class="form-row form-row-wide address-field validate-required validate-state">
															<label for="shipping_street" class="">Street Name / Subdivision / Building
																<abbr class="required" title="required">*</abbr>
															</label>
															<input type="text" class="input-text form-control" value="" placeholder="Street Name / Subdivision / Building" name="shipping_street" id="shipping_street_field" autocomplete="address-level1">
														</p>

														<!--<p class="form-row form-row-wide address-field validate-postcode validate-required" id="shipping_postcode_field" data-priority="90" data-o_class="form-row form-row-wide address-field validate-required validate-postcode">
															<label for="shipping_postcode" class="">Postcode / ZIP
																<abbr class="required" title="required">*</abbr>
															</label>
															<input type="text" class="input-text form-control" name="shipping_postcode" id="shipping_postcode" placeholder="Postcode / ZIP" value="" autocomplete="postal-code">
														</p>-->

													</div>

													<div class="divider-40"></div>
													<p>
														<button type="submit" class="woocommerce-Button btn btn-maincolor" name="save_address"><span>Save address</span></button>
													</p>
												</div>

											</form>


										</div>
									</div>
								</div>
								<!-- .entry-content -->
							</article>

						</main>
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
										<a href="#"><span class="__cf_email__" data-cfemail="a6cbc3cbc3c8d2c9e6c3dec7cbd6cac388c5c9cb">[email&#160;protected]</span></a>
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
							<p>&copy; Cherubim Of Heaven <span class="copyright_year">2019</span> - All Rights Reserved</p>
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