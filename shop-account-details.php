<!DOCTYPE html>
<html class="no-js">

<?php 

	include ("check_session.php"); 

	$visibility = '';

	if ($username) {
		$visibility = 'visible';
	}

	else {
		$visibility = 'hidden';
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
		height: 300px;
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
								<h1 class="color-main">Account Details</h1>
								<ol class=" breadcrumb">
									<li class="breadcrumb-item">
										<a href="index.php">Home</a>
									</li>
									<li class="breadcrumb-item">
										<a href="#">Shop</a>
									</li>
									<li class="breadcrumb-item active">
										Account Details
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
									<h1 class="entry-title">Account details</h1>
								</header>
								<!-- .entry-header -->
								<div class="entry-content">
									<div class="woocommerce">
										<nav class="woocommerce-MyAccount-navigation p-60 hero-bg">
											<ul>
												<li>
													<a href="shop-account-dashboard.php">Dashboard</a>
												</li>
												<li class="is-active">
													<a href="shop-account-details.php">Account details</a>
												</li>
												<li>
													<a href="shop-account-addresses.php">Addresses</a>
												</li>
												<li>
													<a href="shop-account-orders.php">Orders</a>
												</li>
												<li>
													<a href="shop-account-login.php">Logout</a>
												</li>
											</ul>
										</nav>

										<?php
										
											$fname = "";
											$mname = "";
											$lname = "";
											$contact = "";
											$email = "";
											$password = "";

											if (!$username) {
												echo "
													<p>Please <a href = 'shop-account-login.php'>Sign in. </a>No account yet?<a href='registration.php'> Click here.</a>
													</p> ";
											}

											else {

												$getDetails = "SELECT Fname, Mname, Lname, Contact_Number, Email_Address, Password from CLIENT WHERE Username = ?";
												$stmt = $conn->prepare($getDetails);

												if ($stmt) {

													$stmt->bind_param("s", $username); 
													$stmt->execute();
													$result = $stmt->get_result();

													if ($result->num_rows > 0) {

														$details = $result->fetch_assoc();
											
														$fname = $details['Fname'];
														$mname = $details['Mname'];
														$lname = $details['Lname'];
														$contact = $details['Contact_Number'];
														$email = $details['Email_Address'];
														$password = $details['Password'];

														echo "<input hidden type='password' name='password_current_db' value='$password'>";

													} else {
														// No rows found
														echo "No records found.";
													}
											
													$stmt->close();
												}


											}

										?>
										
										<div class="woocommerce-MyAccount-content" style = "visibility:<?php echo $visibility; ?>">

											<form class="woocommerce-EditAccountForm edit-account" method="post" action="edit-acc-details.php">

												<div id="popup" class="popup-overlay">
													<div class="popup-content">
														<span id="closePopup" class="close-btn">&times;</span>
														<h2>Attention</h2>
														<p>This is a simple popup modal example.</p>
														<!--<button id="closeButton">Okay</button>-->
													</div>
												</div>

												<script>
													document.addEventListener("DOMContentLoaded", function () {
													document.getElementById("closePopup").addEventListener("click", function () {
														document.getElementById("popup").style.display = "none"; // Hide popup
													});

													/*document.getElementById("closeButton").addEventListener("click", function () {
														document.getElementById("popup").style.display = "none"; // Hide popup
													});*/

													window.addEventListener("click", function (event) {
														const popup = document.getElementById("popup");
														if (event.target === popup) {
															popup.style.display = "none"; 
														}
													});

													const form = document.querySelector(".woocommerce-EditAccountForm");
													form.addEventListener("submit", function (event) {
														const passwordCurrent = document.getElementById("password_current").value;
														const newPassword = document.getElementById("password_1").value;
														const confirmPassword = document.getElementById("password_2").value;

														if (passwordCurrent === "" || newPassword !== confirmPassword) {
															event.preventDefault();
															alert("Please fill out all fields correctly.");
															return;
														}

														fetch("verify-password.php", {
															method: "POST",
															body: new URLSearchParams({
																passwordCurrent: passwordCurrent,
															})
														})
														.then(response => response.json())
														.then(data => {
															if (data.success) {
																form.submit();
															} 
															else {
																document.getElementById("popup").style.display = "block"; 
																document.querySelector(".popup-content p").innerText = "Incorrect current password. Please try again.";
															}
														})
														.catch(error => {
															console.error("Error verifying password:", error);
															document.getElementById("popup").style.display = "block"; 
															document.querySelector(".popup-content p").innerText = "An error occurred while verifying the password. Please try again.";
														});
														event.preventDefault();
													});
												});
												</script>


												<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
													<label for="account_first_name">First name <span class="required">*</span>
													</label>
													<input readonly type="text" class="form-control woocommerce-Input woocommerce-Input--text input-text" name="account_first_name" id="account_first_name" value="<?php echo htmlspecialchars($fname); ?>" placeholder="First name">
												</p>
												<p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
													<label for="account_middle_name">Middle name <span class="required">*</span>
													</label>
													<input readonly type="text" class="form-control woocommerce-Input woocommerce-Input--text input-text" name="account_middle_name" id="account_middle_name" value="<?php echo htmlspecialchars($mname); ?>" placeholder="Middle name">
												</p>
												<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
													<label for="account_last_name">Last name <span class="required">*</span>
													</label>
													<input readonly type="text" class="form-control woocommerce-Input woocommerce-Input--text input-text" name="account_last_name" id="account_last_name" value="<?php echo htmlspecialchars($lname); ?>" placeholder="Last name">
												</p>
												<p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
													<label for="account_contact">Contact number <span class="required">*</span>
													</label>
													<input readonly type="text" class="form-control woocommerce-Input woocommerce-Input--text input-text" name="account_contact" id="account_contact" value="<?php echo htmlspecialchars($contact); ?>" placeholder="Contact number">
												</p>

												<div class="clear">

												</div>

												<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
													<label for="account_email">Email address <span class="required">*</span>
													</label>
													<input readonly type="email" class="form-control woocommerce-Input woocommerce-Input--email input-text" name="account_email" id="account_email" value="<?php echo htmlspecialchars($email); ?>" placeholder="E-mail address">
												</p>

												<fieldset class="account-edit">
													<legend>Password change</legend>

													<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
														<label for="password_current">Current password</label>
														<input type="password" class="form-control woocommerce-Input woocommerce-Input--password input-text" name="password_current" id="password_current" placeholder="Current password">
													</p>
													<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
														<label for="password_1">New password</label>
														<input type="password" class="form-control woocommerce-Input woocommerce-Input--password input-text" name="password_1" id="password_1" placeholder="New password">
													</p>
													<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
														<label for="password_2">Confirm new password</label>
														<input type="password" class="form-control woocommerce-Input woocommerce-Input--password input-text" name="password_2" id="password_2" placeholder="Confirm new password">
													</p>
												</fieldset>
												<div class="clear"></div>
												<div class="divider-20"></div>
												<p>
													<button type="submit" class="woocommerce-Button btn btn-maincolor" name="save_account_details"><span>Save Changes</span></button>
												</p>
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
										<a href=""><span class="__cf_email__" data-cfemail="b1dcd4dcd4dfc5def1d4c9d0dcc1ddd49fd2dedc">[email&#160;protected]</span></a>
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