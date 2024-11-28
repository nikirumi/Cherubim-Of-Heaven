<!DOCTYPE html>
<html class="no-js">
	
<?php 

	  include("check_session.php");
	  include("connect.php");

	  error_reporting(E_ALL);
      ini_set('display_errors', 1);

	  ob_start();

	  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_cart'])) {
		if (isset($_POST['quantity'])) {

			foreach ($_POST['quantity'] as $service_id => $new_quantity) {
				$new_quantity = intval($new_quantity); 
	
				if ($new_quantity > 0) {
					$_SESSION['cart'][$service_id]['quantity'] = $new_quantity;
				} 
				
				else {
					unset($_SESSION['cart'][$service_id]);
				}
			}

		}

		foreach ($_SESSION['cart'] as $service_id => $item) {
			if (isset($item['removed']) && $item['removed'] === true) {
				unset($_SESSION['cart'][$service_id]);
			}
		}
		
		header("Location: shop-cart.php");
		exit();

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
								<h1 class="color-main">Shopping Cart</h1>
								<ol class=" breadcrumb">
									<li class="breadcrumb-item">
										<a href="index.php">Home</a>
									</li>
									<li class="breadcrumb-item">
										<a href="#">Shop</a>
									</li>
									<li class="breadcrumb-item active">
										Shopping Cart
									</li>
								</ol>
							</div>

						</div>
					</div>
				</section>
			</div>


			<section class="ls s-pt-60 s-pb-55 s-pt-lg-100 s-pb-lg-95 s-pt-xl-150 s-pb-xl-145">
				<div class="container">
					<div class="row">
						<main class="col-lg-12">
							<div class="woocommerce-message">
								"Premium quality" removed. <a href="#">Undo?</a>
							</div>

							<form class="woocommerce-cart-form" action="#" method="post">

								<table class="shop_table shop_table_responsive cart">
									<thead>
										<tr>
											<th class="product-remove">&nbsp;</th>
											<th class="product-thumbnail">&nbsp;</th>
											<th class="product-name">Product</th>
											<th class="product-price">Price</th>
											<th class="product-quantity product">Quantity</th>
											<th class="product-subtotal">Total</th>
										</tr>
									</thead>
									<tbody>

										<tr class="cart_item">

											<td class="product-remove">
												<a href="#" class="remove" aria-label="Remove this item" data-product_id="73" data-product_sku=""><i class="fs-14 ico-trash color-main"></i></a>
											</td>

											<td class="product-thumbnail">
												<a href="shop-product-right.php">
													<img width="180" height="180" src="images/shop/01.jpg" class="" alt="">
												</a>
											</td>

											<td class="product-name" data-title="Product">
												<a href="shop-product-right.php">Premium Quality</a>
											</td>

											<td class="product-price" data-title="Price">
												<span class="amount">
													<span>$</span>12.00
												</span>
											</td>

											<td class="product-quantity product" data-title="Quantity">
												<div class="quantity">
													<input type="button" value="+" class="plus">
													<i class="fa fa-angle-up" aria-hidden="true"></i>
													<input type="number" class="input-text qty text" step="1" min="1" max="1000" name="quantity" value="1" title="Qty" size="4">
													<input type="button" value="-" class="minus">
													<i class="fa fa-angle-down" aria-hidden="true"></i>
												</div>
											</td>

											<td class="product-subtotal" data-title="Total">
												<span class="amount">
													<span>$</span>12.00
												</span>
											</td>
										</tr>
										<tr class="cart_item">

											<td class="product-remove">
												<a href="#" class="remove" aria-label="Remove this item" data-product_id="76" data-product_sku=""><i class="fs-14 ico-trash color-main"></i></a>
											</td>

											<td class="product-thumbnail">
												<a href="shop-product-right.php">
													<img width="180" height="180" src="images/shop/02.jpg" class="" alt="">
												</a>
											</td>

											<td class="product-name" data-title="Product">
												<a href="shop-product-right.php">Woo Ninja</a>
											</td>

											<td class="product-price" data-title="Price">
												<span class="amount">
													<span>$</span>15.00
												</span>
											</td>

											<td class="product-quantity product" data-title="Quantity">
												<div class="quantity">
													<input type="button" value="+" class="plus">
													<i class="fa fa-angle-up" aria-hidden="true"></i>
													<input type="number" class="input-text qty text" step="1" min="1" max="1000" name="quantity" value="1" title="Qty" size="4">
													<input type="button" value="-" class="minus">
													<i class="fa fa-angle-down" aria-hidden="true"></i>
												</div>
											</td>

											<td class="product-subtotal" data-title="Total">
												<span class="amount">
													<span>$</span>15.00
												</span>
											</td>
										</tr>
										<tr class="cart_item">

											<td class="product-remove">
												<a href="#" class="remove" aria-label="Remove this item" data-product_id="90" data-product_sku=""><i class="fs-14 ico-trash color-main"></i></a>
											</td>

											<td class="product-thumbnail">
												<a href="shop-product-right.php">
													<img width="180" height="180" src="images/shop/03.jpg" class="" alt="">
												</a>
											</td>

											<td class="product-name" data-title="Product">
												<a href="shop-product-right.php">Woo Album #3</a>
											</td>

											<td class="product-price" data-title="Price">
												<span class="amount">
													<span>$</span>9.00
												</span>
											</td>

											<td class="product-quantity product" data-title="Quantity">
												<div class="quantity">
													<input type="button" value="+" class="plus">
													<i class="fa fa-angle-up" aria-hidden="true"></i>
													<input type="number" class="input-text qty text" step="1" min="1" max="1000" name="quantity" value="1" title="Qty" size="4">
													<input type="button" value="-" class="minus">
													<i class="fa fa-angle-down" aria-hidden="true"></i>
												</div>
											</td>

											<td class="product-subtotal" data-title="Total">
												<span class="amount">
													<span>$</span>18.00
												</span>
											</td>
										</tr>

										<?php

											// Check if the cart is not empty
											if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
												foreach ($_SESSION['cart'] as $service_id => $item) {
													$service_name = $item['name'];
													$service_price = $item['price'];
													$quantity = $item['quantity'];
													$subtotal = $service_price * $quantity; // Calculate subtotal

													$intValue = (int) preg_replace('/\D/', '', $service_id);
													$image_name = '';

													if ($intValue < 10) {
														$image_name = "0" . $intValue;
													}

													else {
														$image_name = $intValue;
													}


													// Display each cart item in a table row
													?>
													
													<tr class="cart_item">
														<td class="product-remove">
															<a href="remove_item.php?service_id=<?php echo $service_id; ?>" class="remove" aria-label="Remove this item">
																<i class="fs-14 ico-trash color-main"></i>
															</a>
														</td>

														<td class="product-thumbnail">
															<a href="shop-product-right.php">
																<img width="180" height="180" src="images/shop/<?php echo $image_name?>.jpg" class="" alt="<?php echo $service_name; ?>">
															</a>
														</td>

														<td class="product-name" data-title="Product">
															<a href="shop-product-right.php"><?php echo $service_name; ?></a>
														</td>

														<td class="product-price" data-title="Price">
															<span class="amount">
																<span>$</span><?php echo number_format($service_price, 2); ?>
															</span>
														</td>

														<td class="product-quantity product" data-title="Quantity">
															<div class="quantity">
																<input type="button" value="+" class="plus">
																<i class="fa fa-angle-up" aria-hidden="true"></i>
																<input type="number" class="input-text qty text" step="1" min="1" max="1000" name="quantity" value="<?php echo $quantity; ?>" title="Qty" size="4">
																<input type="button" value="-" class="minus">
																<i class="fa fa-angle-down" aria-hidden="true"></i>
															</div>
														</td>

														<td class="product-subtotal" data-title="Total">
															<span class="amount">
																<span>$</span><?php echo number_format($subtotal, 2); ?>
															</span>
														</td>
													</tr>

													<?php
												}
											} else {
												echo "<tr><td colspan='6'>Your cart is empty.</td></tr>";
											}
											?>

										<tr>
											<td colspan="6" class="actions">

												<div class="coupon">
													<label for="coupon_code">Coupon:</label>
													<input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="Coupon code">
													<button type="submit" class="btn btn-small btn-maincolor" name="apply_coupon">Apply coupon</button>
												</div>
												<button type="submit" class="btn btn-small btn-outline-maincolor" name="update_cart">Update cart</button>
											</td>
										</tr>

									</tbody>
								</table>
							</form>


							<div class="cart-collaterals">
								<div class="cross-sells">
									<p class="subtitle text-center">today, tomorrow and beyond.</p>
									<h3 class="special-heading"><span class="color-main">Best </span>Sellers</h3>
									<div class="divider-55 d-none d-lg-block"></div>

									<ul class="products">
										<li class="product vertical-item content-padding">
											<div class="product-inner box-shadow">
												<img src="images/shop/01.jpg" alt="">
												<div class="media-links">
													<a class="abs-link" title="" href="shop-product-%40%40type.php"></a>
												</div>
												<div class="item-content">
													<h2>Bouquet 25 red roses</h2>
													<span class="price">
														<del>
															<span>
																<span>$ </span>34
															</span>
														</del>
														<span>$ </span>55
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
													<a class="abs-link" title="" href="shop-product-%40%40type.php"></a>
												</div>
												<div class="item-content">
													<h2>Bouquet Romantic</h2>
													<span class="price">
														<del>
															<span>
																<span>$ </span>34
															</span>
														</del>
														<span>$ </span>55
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
													<a class="abs-link" title="" href="shop-product-%40%40type.php"></a>
												</div>
												<div class="item-content">
													<h2>51 multicolored tulips</h2>
													<span class="price">
														<del>
															<span>
																<span>$ </span>34
															</span>
														</del>
														<span>$ </span>55
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
													<a class="abs-link" title="" href="shop-product-%40%40type.php"></a>
												</div>
												<div class="item-content">
													<h2>Bouquet Spring</h2>
													<span class="price">
														<del>
															<span>
																<span>$ </span>34
															</span>
														</del>
														<span>$ </span>55
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
													<a class="abs-link" title="" href="shop-product-%40%40type.php"></a>
												</div>
												<div class="item-content">
													<h2>Bouquet "Charm"</h2>
													<span class="price">
														<del>
															<span>
																<span>$ </span>34
															</span>
														</del>
														<span>$ </span>55
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
													<a class="abs-link" title="" href="shop-product-%40%40type.php"></a>
												</div>
												<div class="item-content">
													<h2>Spring bouquet </h2>
													<span class="price">
														<del>
															<span>
																<span>$ </span>34
															</span>
														</del>
														<span>$ </span>55
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
													<a class="abs-link" title="" href="shop-product-%40%40type.php"></a>
												</div>
												<div class="item-content">
													<h2>Romantic bouquet</h2>
													<span class="price">
														<del>
															<span>
																<span>$ </span>34
															</span>
														</del>
														<span>$ </span>55
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
													<a class="abs-link" title="" href="shop-product-%40%40type.php"></a>
												</div>
												<div class="item-content">
													<h2>51 white and pink</h2>
													<span class="price">
														<del>
															<span>
																<span>$ </span>34
															</span>
														</del>
														<span>$ </span>55
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
													<a class="abs-link" title="" href="shop-product-%40%40type.php"></a>
												</div>
												<div class="item-content">
													<h2>Bouquet "Silver"</h2>
													<span class="price">
														<del>
															<span>
																<span>$ </span>34
															</span>
														</del>
														<span>$ </span>55
													</span>
												</div>
												<div class="shop-btn">
													<a href="#" class="add-to-card btn btn-maincolor">Add to cart</a>
												</div>
											</div>
										</li>
									</ul>

								</div>

								<div class="cart_totals ">


									<h5>Cart totals</h5>

									<table class="shop_table shop_table_responsive">

										<tbody>
											<tr class="cart-subtotal">
												<th>Subtotal</th>
												<td data-title="Subtotal">
													<span class="amount">
														<span>$</span>45.00
													</span>
												</td>
											</tr>


											<tr class="order-total">
												<th>Total</th>
												<td data-title="Total">
													<strong>
                        <span class="amount">
                            <span>$</span>45.00
                        </span>
                    </strong>
												</td>
											</tr>


										</tbody>
									</table>

									<div class="wc-proceed-to-checkout">
										<a href="shop-checkout.php" class="checkout-button alt wc-forward btn btn-maincolor">Proceed to checkout</a>
									</div>


								</div>
							</div>


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
										<a href="#"><span class="__cf_email__" data-cfemail="e5888088808b918aa5809d8488958980cb868a88">[email&#160;protected]</span></a>
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

</body>\
</html>