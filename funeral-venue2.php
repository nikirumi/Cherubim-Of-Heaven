<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<?php

	include("check_session.php");

    $sql = "SELECT service_id FROM memorial_services WHERE service_type = 'Funeral' LIMIT 1;";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $service_id = $row['service_id'];

        $sql = "SELECT Start_Datetime, End_Datetime FROM service_progress WHERE Service_status = 'On Going' AND Service_ID = ?";
        $stmt = $conn->prepare($sql);

        $stmt->bind_param("s", $service_id);  

        $stmt->execute();

        $result = $stmt->get_result();

        $disabledDates = array();
        while ($row = $result->fetch_assoc()) {
            $startDate = new DateTime($row['Start_Datetime']);
            $endDate = new DateTime($row['End_Datetime']);

            while ($startDate <= $endDate) {
                $disabledDates[] = $startDate->format('m/d/Y');
                $startDate->modify('+1 day');
            }
        }

        echo "<script> var disabledDates = " . json_encode($disabledDates) . ";</script>";

        $stmt->close();
    } 
    
    else {
        echo "No service found with the given type.";
    }
    
?>

<!-- Mirrored from html.modernwebtemplates.com/memento/shop-product-right.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Nov 2024 06:47:26 GMT -->
<head>
	<title>Cherubim of Heaven - Funeral Booking</title>
	<meta charset="utf-8">
	<!--[if IE]>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<![endif]-->
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="format-detection" content="telephone=no">

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/animations.css">
	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" href="css/main.css" class="color-switcher-link">
	<link rel="stylesheet" href="css/shop.css" class="color-switcher-link">
	<script src="js/vendor/modernizr-2.6.2.min.js"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .datepicker-container {
            margin-top: 20px;
        }
        #datepicker {
            padding: 10px;
            width: 100%;
            box-sizing: border-box;
            font-size: 16px;
        }
        .book-button {
            margin-top: 15px;
            background-color: #d3b675;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        .book-button:hover {
            background-color: #bfa35d;
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
								<h1 class="color-main">Funeral Venue 2</h1>
								<ol class=" breadcrumb">
									<li class="breadcrumb-item">
										<a href="index.php">Home</a>
									</li>
									<li class="breadcrumb-item">
										<a href="#">Shop</a>
									</li>
									<li class="breadcrumb-item active">
										Venue 2
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
										<div data-thumb="images/Funeral_Venues/v2.png">
											<a href="images/Funeral_Venues/v2.png">
												<img src="images/Funeral_Venues/v2.png" alt="" data-caption="" data-src="images/Funeral_Venues/v2.png" data-large_image="images/Funeral_Venues/v2.png" data-large_image_width="1000" data-large_image_height="1000">
											</a>
										</div>
										<div data-thumb="images/Funeral_Venues/v2.1.png">
											<a href="images/Funeral_Venues/v2.1.png">
												<img src="images/Funeral_Venues/v2.1.png" alt="" data-caption="" data-src="images/Funeral_Venues/v2.1.png" data-large_image="images/Funeral_Venues/v2.1.png" data-large_image_width="1000" data-large_image_height="1000">
											</a>
										</div>
										<div data-thumb="images/Funeral_Venues/v2.2.png">
											<a href="images/Funeral_Venues/v2.2.png">
												<img src="images/Funeral_Venues/v2.2.png" alt="" data-caption="" data-src="images/Funeral_Venues/v2.2.png" data-large_image="images/Funeral_Venues/v2.2.png" data-large_image_width="1000" data-large_image_height="1000">
											</a>
										</div>
										


									</figure>
								</div>

								<div class="summary entry-summary text-center text-md-left">
									<h6 class="product_title single_title">Venue 2</h6>
									<div class="star-rating">
										<span style="width:80%">Rated <strong class="rating">4</strong> out of 5</span>
									</div>
									<p><br>Cherubim of Heaven Memorial Park offers serene venues for funeral services and receptions, with seating for up to 80 guests, parking, and catering options. Whether at our tranquil park or a location of your choice, we ensure every detail is handled with care and dignity.</p>
									<span class="price">
													<span>₱ </span>25,000 / day
												</span>
									<div class="woocommerce-product-rating"></div>

									<form method="POST" action="book-venue.php" id="bookingForm" style="margin-top: -50px;">
										<div class="single_variation_wrap">
											<!--<div class="d-flex align-items-center">
												<span class="price">
													<span>₱ </span>25,000 / day
												</span>
											</div>-->

											<div class="datepicker-container" style="margin: 10px 0;">
												<label for="datepicker">Select Starting Date:</label>
												<input autocomplete="off" type="text" id="datepicker" name="booking_start_date" placeholder="Choose a start date" required>
											</div>

											<div class="datepicker-container" style="margin: 10px 0;">
												<label for="end_datepicker">Select End Date:</label>
												<input autocomplete="off" type="text" id="end_datepicker" name="booking_end_date" placeholder="Choose an end date" required>
											</div>

											<?php
											
												$sql = "SELECT service_id FROM memorial_services WHERE service_type = 'Funeral' LIMIT 1";

												$result = $conn->query($sql);

												if ($result->num_rows > 0) {
													$row = $result->fetch_assoc();
													$service_id = $row['service_id'];
													echo "<input type='hidden' name='service_id' id='' value = $service_id>";
												} 
												else {
													echo "No service found with the given type.";
												}

												$conn->close();

											?>					

											<button type="submit" class="single_add_to_cart_button btn alt btn-big btn-maincolor">
												<span>Book</span>
											</button>

										</div>
									</form>
									
								</div>

								<script>
									jQuery(document).ready(function($) {

										var disabledDates = <?php echo json_encode($disabledDates); ?>;

										$("#datepicker").datepicker({
											dateFormat: "mm/dd/yy",
											minDate: 0, 
											showAnim: "slideDown",
											beforeShowDay: function(date) {
												var string = $.datepicker.formatDate('mm/dd/yy', date);
												return [disabledDates.indexOf(string) == -1]; 
											},
											onSelect: function(selectedDate) {
												var selectedStartDate = $.datepicker.parseDate('mm/dd/yy', selectedDate);
												
												// Make end datepicker editable after selecting start date
												$("#end_datepicker").prop("readonly", false); 
												$("#end_datepicker").prop("disabled", false);
												$("#end_datepicker").datepicker("option", "minDate", selectedStartDate);
												updateEndDatePicker(selectedStartDate);
											}
										});

										$("#end_datepicker").datepicker({
											dateFormat: "mm/dd/yy",
											minDate: 0,
											showAnim: "slideDown",
											beforeShowDay: function(date) {
												var string = $.datepicker.formatDate('mm/dd/yy', date);
												return [disabledDates.indexOf(string) == -1];
											}
										});

										$("#end_datepicker").prop("disabled", true);  // Initially disabled
										$("#end_datepicker").prop("readonly", true);  // Make it non-typeable

										function updateEndDatePicker(startDate) {
											var endDatepicker = $("#end_datepicker");
											var maxBookingDuration = 6;  // Limit of 6 days
											var maxEndDate = new Date(startDate);
											maxEndDate.setDate(maxEndDate.getDate() + maxBookingDuration); 

											endDatepicker.datepicker("option", "maxDate", maxEndDate);

											endDatepicker.datepicker("option", "beforeShowDay", function(date) {
												var string = $.datepicker.formatDate('mm/dd/yy', date);
												if (disabledDates.indexOf(string) != -1 || date > maxEndDate) {
													return [false];  // Disable unavailable dates
												}
												return [true];  // Enable available dates
											});
										}
									});
								</script>

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
									<h6>Tranquil Venues for Cherished Memories</h6>
										<p>
										At Cherubim of Heaven Memorial Park, we offer serene and well-equipped venues for funeral services and receptions. Our peaceful memorial park provides seating for up to 80 guests, with ample parking and catering options to ensure a smooth and meaningful ceremony.
										</p>

										<p>Whether you choose to hold the service at our tranquil park or at another location of your preference, we are here to accommodate your needs and ensure every detail is handled with care and dignity. Contact us to learn more about our services and available options.</p>
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
																<p>The venue at Cherubim of Heaven Memorial Park provided a peaceful and comforting atmosphere for our memorial service. Truly serene and well-maintained.</p>
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
																<p>The facilities were excellent—modern amenities like multimedia presentations and live webcasting made it easy to share the service with loved ones who couldn’t attend in person.</p>
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
																<p>Everything was thoughtfully arranged, from the seating to the refreshments. The staff ensured the event was smooth and dignified. Highly recommended.</p>
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


								<!--<section class="up-sells upsells products">
									<div class="col-12 mb-60">
										<p class="subtitle text-center">today, tomorrow and beyond.</p>
										<h2 class="special-heading"><span class="color-main">Our Top </span>Sellers</h2>
									</div>
									<ul class="products">
										<li class="product vertical-item content-padding">
											<div class="product-inner box-shadow">
												<img src="images/Flowers/1.png" alt="">
												<div class="media-links">
													<a class="abs-link" title="" href="shop-product-right.php"></a>
												</div>
												<div class="item-content">
													<h2><br><br>Spirited Funeral</h2>
													<span class="price">
														<del>
															<span>
																<span>₱ </span>6,499
															</span>
														</del>
														<span>₱ </span>6,499
													</span>
												</div>
												<div class="shop-btn">
													<a href="#" class="add-to-card btn btn-maincolor">Add to cart</a>
												</div>
											</div>
										</li>
										<li class="product vertical-item content-padding">
											<div class="product-inner box-shadow">
												<img src="images/Flowers/2.png" alt="">
												<div class="media-links">
													<a class="abs-link" title="" href="shop-product-right.php"></a>
												</div>
												<div class="item-content">
													<h2><br><br><br>Infinity Funeral & Condolence Flowers</h2>
													<span class="price">
														<del>
															<span>
																<span>₱ </span>9,100
															</span>
														</del>
														<span>₱ </span>9,100
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
												<img src="images/Flowers/4.png" alt="">
												<div class="media-links">
													<a class="abs-link" title="" href="shop-product-right.php"></a>
												</div>
												<div class="item-content">
													<h2><br><br>Memory Lane</h2>
													<span class="price">
														<del>
															<span>
																<span>₱ </span>5,299
															</span>
														</del>
														<span>₱ </span>5,299
													</span>
												</div>
												<div class="shop-btn">
													<a href="#" class="add-to-card btn btn-maincolor">Add to cart</a>
												</div>
											</div>
										</li>
										<li class="product vertical-item content-padding">
											<div class="product-inner box-shadow">
												<img src="images/Flowers/5.png" alt="">
												<div class="media-links">
													<a class="abs-link" title="" href="shop-product-right.php"></a>
												</div>
												<div class="item-content">
													<h2><br>Forever Funeral & Condolence Flowers</h2>
													<span class="price">
														<del>
															<span>
																<span>₱ </span>6,999
															</span>
														</del>
														<span>₱ </span>6,999
													</span>
												</div>
												<div class="shop-btn">
													<a href="#" class="add-to-card btn btn-maincolor">Add to cart</a>
												</div>
											</div>
										</li>
										<li class="product vertical-item content-padding">
											<div class="product-inner box-shadow">
												<img src="images/Flowers/6.png" alt="">
												<div class="media-links">
													<a class="abs-link" title="" href="shop-product-right.php"></a>
												</div>
												<div class="item-content">
													<h2><br><br><br>Angel's Kiss</h2>
													<span class="price">
														<del>
															<span>
																<span>₱ </span>4,799
															</span>
														</del>
														<span>₱ </span>4,799
													</span>
												</div>
												<div class="shop-btn">
													<a href="#" class="add-to-card btn btn-maincolor">Add to cart</a>
												</div>
											</div>
										</li>
										<li class="product vertical-item content-padding">
											<div class="product-inner box-shadow">
												<img src="images/Flowers/7.png" alt="">
												<div class="media-links">
													<a class="abs-link" title="" href="shop-product-right.php"></a>
												</div>
												<div class="item-content">
													<h2><br><br>Rest In Peace Funeral & Condolence Flowers</h2>
													<span class="price">
														<del>
															<span>
																<span>₱ </span>6,839
															</span>
														</del>
														<span>₱ </span>6,839
													</span>
												</div>
												<div class="shop-btn">
													<a href="#" class="add-to-card btn btn-maincolor">Add to cart</a>
												</div>
											</div>
										</li>
										<li class="product vertical-item content-padding">
											<div class="product-inner box-shadow">
												<img src="images/Flowers/8.png" alt="">
												<div class="media-links">
													<a class="abs-link" title="" href="shop-product-right.php"></a>
												</div>
												<div class="item-content">
													<h2><br><br><br>Dearly Beloved</h2>
													<span class="price">
														<del>
															<span>
																<span>₱ </span>10,999
															</span>
														</del>
														<span>₱ </span>10,999
													</span>
												</div>
												<div class="shop-btn">
													<a href="#" class="add-to-card btn btn-maincolor">Add to cart</a>
												</div>
											</div>
										</li>
										<li class="product vertical-item content-padding">
											<div class="product-inner box-shadow">
												<img src="images/Flowers/9.png" alt="">
												<div class="media-links">
													<a class="abs-link" title="" href="shop-product-right.php"></a>
												</div>
												<div class="item-content">
													<h2><br><br><br>Purest Love Funeral & Condolence Flowers</h2>
													<span class="price">
														<del>
															<span>
																<span>₱ </span>2,899
															</span>
														</del>
														<span>₱ </span>2,899
													</span>
												</div>
												<div class="shop-btn">
													<a href="#" class="add-to-card btn btn-maincolor">Add to cart</a>
												</div>
											</div>
										</li>
									</ul>
								</section>-->
							</div>


						</main>

						<aside class="col-lg-5 col-xl-3">
							<!--<div class="bg-maincolor py-50 px-30 cs">
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
							</div>-->
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
							</div>


							<!--<div class="widget woocommerce widget_recently_viewed_products">

								<h5 class="widget-title">Viewed Products</h5>

								<ul class="product_list_widget">
									<li>
										<a href="shop-product-right.php">
											<img src="images/Flowers/1.png" alt="">
											<span class="product-title">Spirited Funeral</span>
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
											<span class="woocommerce-Price-currencySymbol">PHP</span>6,499
										</span>
									</li>
									<li>
										<a href="shop-product-right.php">
											<img src="images/Flowers/3.png" alt="">
											<span class="product-title">Scented Dreams</span>
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
												<span class="woocommerce-Price-currencySymbol">PHP</span>
												4,699
											</span>
										</del>
										
									</li>

									<li>
										<a href="shop-product-right.php">
											<img src="images/Flowers/9.png" alt="">
											<span class="product-title">Purest Love Funeral & Condolence Flowers</span>
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
												<span class="woocommerce-Price-currencySymbol">PHP </span>
												2,899
											</span>
										</del>
										
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
							</div>-->


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
							<p>&copy; Cherubim of Heaven <span class="copyright_year">2024</span> - All Rights Reserved</p>
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