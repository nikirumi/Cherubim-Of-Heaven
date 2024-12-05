<!DOCTYPE html>
<html class="no-js">

<?php 

	include("check_session.php"); 
	
	$clientID = '';
	
	if ($username) {
		$findClient = "SELECT Client_ID FROM client WHERE Username = ? LIMIT 1";
		$stmt = $conn->prepare($findClient);
		$stmt->bind_param("s", $username);
		$stmt->execute();
		$clientResult = $stmt->get_result();
		$stmt->close();

		if ($clientResult->num_rows > 0) {
			$row = $clientResult->fetch_assoc(); 
			$clientID = $row['Client_ID'];											
		}	
	}

?>

<head>
	<title>Cherubim Of Heaven - Multipurpose Funeral Service - Account</title>
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
																	<a href="logout.php">Login/Logout</a>
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
								<h1 class="color-main">Shop Orders</h1>
								<ol class=" breadcrumb">
									<li class="breadcrumb-item">
										<a href="index.php">Home</a>
									</li>
									<li class="breadcrumb-item">
										<a href="#">Shop</a>
									</li>
									<li class="breadcrumb-item active">
										Shop Orders
									</li>
								</ol>
							</div>

						</div>
					</div>
				</section>
			</div>


			<section class="ls s-pt-55 s-pb-50 s-pt-lg-95 s-pb-lg-100 s-pt-xl-145 s-pb-xl-150">
				<div class="container">
					<div class="row">
						<main class="col-lg-12">
							<article id="post-1708" class="post-1708 page type-page status-publish hentry">
								<header class="entry-header mb-30">
									<h1 class="entry-title">Orders</h1> <span class="edit-link">
										<!--<a class="post-edit-link" href="#">Edit<span class="screen-reader-text"> "My account"</span></a></span>-->
								</header><!-- .entry-header -->
								<div class="entry-content">
									<div class="woocommerce">
										<nav class="woocommerce-MyAccount-navigation hero-bg box-shadow p-60">
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
												<li class="is-active">
													<a href="shop-account-orders.php">Orders</a>
												</li>
												<li>
													<a href="logout.php">Logout</a>
												</li>
											</ul>
										</nav>


										<div class="woocommerce-MyAccount-content">

										<?php

											if (!empty($clientID)) {
												$findTrans = "SELECT Transaction_ID, Transaction_Date, Payment_Status, Total_Amount FROM transaction WHERE Client_ID = ?";
												$stmt = $conn->prepare($findTrans);

												if ($stmt) {
													$stmt->bind_param("s", $clientID);
													$stmt->execute();
													$transResult = $stmt->get_result();
													$stmt->close();

													// Check if any transactions were found
													if ($transResult->num_rows > 0) {
														// Display the table headers
														echo "
														<table class='woocommerce-orders-table woocommerce-MyAccount-orders shop_table shop_table_responsive my_account_orders account-orders-table'>
															<thead>
																<tr>
																	<th style='text-align: center; vertical-align: middle;' class='woocommerce-orders-table__header woocommerce-orders-table__header-order-number'><span class='nobr'>Order</span></th>
																	<th style='text-align: center; vertical-align: middle;' class='woocommerce-orders-table__header woocommerce-orders-table__header-order-date'><span class='nobr'>Date</span></th>
																	<th style='text-align: center; vertical-align: middle;' class='woocommerce-orders-table__header woocommerce-orders-table__header-order-status'><span class='nobr'>Status</span></th>
																	<th style='text-align: center; vertical-align: middle;' class='woocommerce-orders-table__header woocommerce-orders-table__header-order-total'><span class='nobr'>Total</span></th>
																	<th style='text-align: center; vertical-align: middle;' class='woocommerce-orders-table__header woocommerce-orders-table__header-order-actions text-center'><span class='nobr'>Actions</span></th>
																</tr>
															</thead>
															<tbody>";

														// Loop through each transaction result and display it in the table
														while ($row = $transResult->fetch_assoc()) {
															$transID = $row['Transaction_ID'];
															$transactionDate = $row['Transaction_Date'];
															$paymentStatus = $row['Payment_Status'];
															$totalAmount = $row['Total_Amount'];

															// Format the transaction date to remove the time
															$formattedDate = date("F j, Y", strtotime($transactionDate));  // Example: March 6, 2024

															// Output the transaction row
															echo "
															<tr class='woocommerce-orders-table__row woocommerce-orders-table__row--status-processing order'>
																<td style='text-align: center; vertical-align: middle;' class='woocommerce-orders-table__cell woocommerce-orders-table__cell-order-number' data-title='Order'>
																	<a href='shop-account-order-single.php'>#$transID</a>
																</td>
																<td style='text-align: center; vertical-align: middle;' class='woocommerce-orders-table__cell woocommerce-orders-table__cell-order-date' data-title='Date'>
																	<time datetime='" . date("Y-m-d", strtotime($transactionDate)) . "'>$formattedDate</time>
																</td>
																<td style='text-align: center; vertical-align: middle;' lass='woocommerce-orders-table__cell woocommerce-orders-table__cell-order-status' data-title='Status'>
																	$paymentStatus
																</td>
																<td style='text-align: center; vertical-align: middle;' class='woocommerce-orders-table__cell woocommerce-orders-table__cell-order-total' data-title='Total'>
																	<span class='woocommerce-Price-amount amount'><span class='woocommerce-Price-currencySymbol'>₱</span>$totalAmount</span>
																</td>
																<td style='text-align: center; vertical-align: middle;' class='woocommerce-orders-table__cell woocommerce-orders-table__cell-order-actions with-btn' data-title='Actions'>
																	<a style='margin-left: -50px' href='shop-account-order-single.php?id=$transID' class='woocommerce-button btn btn-maincolor view'>View</a>
																</td>
															</tr>";
														}

														// Close the table
														echo "
															</tbody>
														</table>";

													} else {
														echo "
														<div class='woocommerce-message woocommerce-message--info woocommerce-Message woocommerce-Message--info woocommerce-info'>
															<a class='woocommerce-Button btn btn-maincolor' href='shop-right.php'>Go Shop</a>
															No transactions found.
														</div>";
													}
												} else {
													echo "Error preparing statement.";
												}
											} else {
												echo "
												<div class='woocommerce-message woocommerce-message--info woocommerce-Message woocommerce-Message--info woocommerce-info'>
													<a class='woocommerce-Button btn btn-maincolor' href='shop-account-login.php'>Sign In</a>
													No account signed in.
												</div>";
											}
											?>

										</div>
									</div>
								</div><!-- .entry-content -->
							</article>

						</main>
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