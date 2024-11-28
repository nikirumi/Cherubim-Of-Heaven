<!DOCTYPE html>
<html class="no-js">

<?php 

	include ("check_session.php"); 

	if (!$username) {
		header("Location: shop-account-login.php");
		exit();
	}

	if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
		header("Location: shop-right.php");
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
	<script>
        document.addEventListener("DOMContentLoaded", function () {
            const paymentMethods = document.querySelectorAll('input[name="payment_method"]');

            // Function to toggle payment box visibility
            function togglePaymentBox() {
                paymentMethods.forEach(method => {
                    const paymentBox = document.querySelector(`.payment_box.${method.id}`);
                    if (method.checked) {
                        paymentBox.style.display = "block";
                    } else {
                        paymentBox.style.display = "none";
                    }
                });
            }

            // Add change event listeners to each radio button
            paymentMethods.forEach(method => {
                method.addEventListener('change', togglePaymentBox);
            });

            // Initial call to set the correct display state on page load
            togglePaymentBox();
        });
    </script>

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
								<h1 class="color-main">Checkout</h1>
								<ol class=" breadcrumb">
									<li class="breadcrumb-item">
										<a href="index.php">Home</a>
									</li>
									<li class="breadcrumb-item">
										<a href="#">Shop</a>
									</li>
									<li class="breadcrumb-item active">
										Checkout
									</li>
								</ol>
							</div>

						</div>
					</div>
				</section>
			</div>


			<section class="ls s-pt-60 s-pb-55 s-pt-lg-100 s-pb-lg-80 s-pt-xl-150 s-pb-xl-130">
				<div class="container">
					<div class="row">
						<main class="col-lg-12">
							<div class="woocommerce-info">Returning customer? <a href="#" class="showlogin">Click here to login</a>
							</div>

							<form class="woocomerce-form woocommerce-form-login login" method="post" style="">


								<p>If you have shopped with us before, please enter your details in the boxes below. If you are a new customer,
									please proceed to the Billing &amp; Shipping section.</p>

								<p class="form-row form-row-first">
									<label for="username">Username or email <span class="required">*</span>
									</label>
									<input type="text" class="input-text" name="username" id="username">
								</p>
								<p class="form-row form-row-last">
									<label for="password">Password <span class="required">*</span>
									</label>
									<input class="input-text" type="password" name="password" id="password">
								</p>
								<div class="clear">

								</div>


								<p class="form-row">

									<input type="submit" class="button" name="login" value="Login">
									<label>
										<input name="rememberme" type="checkbox" id="rememberme" value="forever">
										<span>Remember me</span>
									</label>
								</p>
								<p class="lost_password">
									<a href="shop-account-password-reset.php">Lost your password?</a>
								</p>

								<div class="clear">

								</div>


							</form>

							<div class="woocommerce-info">Have a coupon? <a href="#" class="showcoupon">Click here to enter your code</a>
							</div>

							<form class="checkout_coupon" method="post" style="display: none;">

								<p class="form-row form-row-first">
									<input type="text" name="coupon_code" class="input-text" placeholder="Coupon code" id="coupon_code" value="">
								</p>

								<p class="form-row form-row-last">
									<input type="submit" class="button" name="apply_coupon" value="Apply coupon">
								</p>

								<div class="clear">

								</div>
							</form>

							<form name="checkout" method="post" class="checkout woocommerce-checkout" action="place-order.php" enctype="multipart/form-data">


								<div class="woocommerce-NoticeGroup woocommerce-NoticeGroup-checkout">
									<ul class="woocommerce-error">
										<li><strong>Billing First name</strong> is a required field.</li>
										<li><strong>Billing Last name</strong> is a required field.</li>
										<li>Please enter a valid postcode / ZIP.</li>
									</ul>
								</div>


								<div class="col2-set" id="customer_details">
									<div class="col-1">
										<div class="woocommerce-billing-fields">

											<?php
											
												$sql = "SELECT Fname, Lname, Barangay, Purok, H_num, S_name from CLIENT WHERE Username = ?";
												$stmt = $conn->prepare($sql);
												$stmt->bind_param("s", $username);
												$stmt->execute();
												$result = $stmt->get_result();

												if ($result->num_rows > 0) {
													
													$row = $result->fetch_assoc();
													$fname = $row['Fname'];
													$lname = $row['Lname'];
													$barangay = $row['Barangay'];
													$purok = $row['Purok'];
													$h_num = $row['H_num'];
													$s_name = $row['S_name'];

												}

												else {
													$barangay = "";
													$purok = "";
													$h_num = "";
													$s_name = "";
												}

												//stmt->close();
												
											?>

											<h5>General Address (Default, changeable)</h5>

											<div style = "margin-top: 50px;"class="woocommerce-billing-fields__field-wrapper">
												<p class="form-row form-row-first validate-required woocommerce-invalid woocommerce-invalid-required-field" id="billing_first_name_field" data-priority="10">
													<label for="billing_first_name" class="">First
														name <abbr class="required" title="required">*</abbr>
													</label>
													<input readonly tabindex="-1" type="text" class="input-text form-control" name="billing_first_name" id="billing_first_name" placeholder="First name" value="<?php echo htmlspecialchars($fname); ?>" autocomplete="given-name">
												</p>

												<p class="form-row form-row-last validate-required" id="billing_last_name_field" data-priority="20">
													<label for="billing_last_name" class="">Last name <abbr class="required" title="required">*</abbr>
													</label>
													<input readonly tabindex="-1" type="text" class="input-text form-control" name="billing_last_name" id="billing_last_name" placeholder="Last name" value="<?php echo htmlspecialchars($lname); ?>" autocomplete="family-name">
												</p>

												<p class="form-row form-row-wide address-field update_totals_on_change validate-required woocommerce-validated" id="billing_country_field" data-priority="40">
													<label for="billing_country" class="">Country
														<abbr class="required" title="required">*</abbr>
													</label>
													<select required name="billing_barangay" id="billing_barangay" class="country_to_state country_select  select2-hidden-accessible" autocomplete="country" tabindex="-1" aria-hidden="true">
															<option value="<?php echo htmlspecialchars($barangay ? $barangay : ''); ?>"><?php echo htmlspecialchars($barangay ? $barangay : 'Select a Barangay around Hagonoy, Bulacan...'); ?></option>
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

												<p class="form-row form-row-wide address-field validate-required" id="billing_address_1_field" data-priority="50">
													<label for="billing_address_1" class="">Purok
														<abbr class="required" title="required">*</abbr>
													</label>
													<input required type="text" class="input-text form-control" name="billing_purok" id="billing_purok" placeholder="Purok" value="<?php echo htmlspecialchars($purok ? $purok : ''); ?>" autocomplete="address-line1">
												</p>
												
												<p class="form-row form-row-wide address-field validate-required" id="billing_address_1_field" data-priority="50">
													<label for="billing_address_1" class="">House Number / Unit
														<abbr class="required" title="required">*</abbr>
													</label>
													<input required type="text" class="input-text form-control" name="billing_hnum" id="billing_hnum" placeholder="House Number / Unit" value="<?php echo htmlspecialchars($h_num ? $h_num : ''); ?>" autocomplete="address-line1">
												</p>

												<p class="form-row form-row-wide address-field validate-required" id="billing_address_1_field" data-priority="50">
													<label for="billing_address_1" class="">Street Name / Subdivision / Building
														<abbr class="required" title="required">*</abbr>
													</label>
													<input required type="text" class="input-text form-control" name="billing_sname" id="billing_sname" placeholder="Street Name / Subdivision / Building" value="<?php echo htmlspecialchars($s_name ? $s_name : ''); ?>" autocomplete="address-line1">
												</p>

											</div>

										</div>

									</div>

								</div>


								<h5 id="order_review_heading">Your order</h5>


								<div id="order_review" class="woocommerce-checkout-review-order">
									<table class="shop_table woocommerce-checkout-review-order-table">
										<thead>
											<tr>
												<th class="product-name">Product</th>
												<th class="product-total">Total</th>
											</tr>
										</thead>
										<tbody>

										<?php

										$subtotalAll = 0;
										foreach ($_SESSION['cart'] as $service_id => $item) {
																							
											if (isset($item['removed']) && $item['removed'] === true) {
												continue;
											}

											//$item['removed'] = false;

											$service_name = $item['name'];
											$service_price = $item['price'];
											$quantity = $item['quantity'];

											//$_SESSION['cart'][$service_id]['removed'] = false;

											$subtotal = $service_price * $quantity; // Calculate subtotal
											$subtotalAll += $subtotal; 

											$intValue = (int) preg_replace('/\D/', '', $service_id);
											$image_name = '';

											echo "
											<tr class='cart_item'>
												<td class='product-name'>
													$service_name&nbsp; <strong class='product-quantity'>× $quantity</strong>
												</td>
												<td class='product-total'>
													<span class='woocommerce-Price-amount amount'>
														<span class='woocommerce-Price-currencySymbol'>₱</span>$subtotal</span>
												</td>
											</tr>
											";

										}
						
										?>		

										</tbody>
										<tfoot>

											<tr class="cart-subtotal">
												<th>Subtotal</th>
												<td>
													<span class="woocommerce-Price-amount amount">
														<span class="woocommerce-Price-currencySymbol">₱</span><?php echo $subtotalAll; ?></span>
												</td>
											</tr>


											<tr class="order-total">
												<th>Total</th>
												<td>
													<strong>
													    <span class="woocommerce-Price-amount amount">
														<span class="woocommerce-Price-currencySymbol">₱</span><?php echo $subtotalAll; ?></span>
												    </strong>
												</td>
											</tr>


										</tfoot>
									</table>

									<div id="payment" class="woocommerce-checkout-payment">
										<ul class="wc_payment_methods payment_methods methods">
											<li class="wc_payment_method payment_method_cheque">
												<input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="Other" checked="checked" data-order_button_text="">

												<label for="payment_method_cheque">
													Other payment methods </label>
											</li>
											<li class="wc_payment_method payment_method_cod">
												<input id="payment_method_cod" type="radio" class="input-radio" name="payment_method" value="COD" data-order_button_text="">

												<label for="payment_method_cod">
													Cash on delivery </label>

												<div class="payment_box payment_method_cheque" style="display: none;">
													<p>Use other available payment methods.</p>
												</div>
												<div class="payment_box payment_method_cod" style="display: block;">
													<p>Pay with cash upon delivery.</p>
												</div>
											</li>
										</ul>
										<div class="form-row place-order">
											<noscript>
												Since your browser does not support JavaScript, or it is disabled, please ensure you click the
												&lt;em&gt;Update Totals&lt;/em&gt; button before placing your order. You may be charged more
												than the amount stated above if you fail to do so. &lt;br/&gt;&lt;input type="submit"
												class="button alt" name="woocommerce_checkout_update_totals" value="Update totals" /&gt;
											</noscript>

											<button type="submit" class="btn btn-outline-maincolor small-button" name="woocommerce_checkout_place_order">Place order</button>

										</div>
									</div>

								</div>


							</form>


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
										<a href="#"><span class="__cf_email__" data-cfemail="bbd6ded6ded5cfd4fbdec3dad6cbd7de95d8d4d6">[email&#160;protected]</span></a>
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