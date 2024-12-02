<?php 
	include("connect.php");

	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	$service_id = isset($_GET['id']) ? ($_GET['id']) : 0;										 	
					
	if ($service_id != 0) {
		// Prepare the SQL query to fetch related records for the transaction
		$stmt = $conn->prepare("SELECT t.Transaction_ID, t.Client_ID, t.Transaction_Date, t.Total_Amount, t.Payment_Method, t.Payment_Status, t.General_Address,
		                            c.Username, c.Fname, c.Lname, c.Contact_Number, c.Email_Address, c.Purok, c.Barangay, c.H_num, c.S_name,
		                            sp.Service_ID, sp.Start_Datetime, sp.End_Datetime, sp.Service_status, sp.Quantity,
		                            ms.Service_Name, ms.Service_Description, ms.Service_Price, ms.Service_Type
		                        FROM transaction t
		                        JOIN client c ON t.Client_ID = c.Client_ID
		                        JOIN service_progress sp ON t.Transaction_ID = sp.Transaction_ID
		                        JOIN MEMORIAL_SERVICES ms ON sp.Service_ID = ms.Service_ID
		                        WHERE t.Transaction_ID = ?");

		$stmt->bind_param("s", $service_id); 
		$stmt->execute();
		
		$result = $stmt->get_result();
		
		if ($result->num_rows > 0) {

			while ($row = $result->fetch_assoc()) {
				
				$totalAmount = (float)$row['Total_Amount'];
				$service_status = $row['Service_status'];
				$p_method = $row['Payment_Method'];

				$email = $row['Email_Address'];
				$phone = $row['Contact_Number'];
				$barangay = $row['Barangay'];
				$purok = $row['Purok'];
				$h_num = $row['H_num'];
				$s_name = $row['S_name'];

				
				$Transaction_Date = new DateTime($row['Transaction_Date']);
				$formatted_date = $Transaction_Date->format('d-m-Y'); 

				$transaction_data[] = array(
					'Service_Name' => $row['Service_Name'],
					'Service_Type' => $row['Service_Type'],
					'Service_Description' => $row['Service_Description'],
					'Number_of_Orders' => (int)$row['Quantity'],
					'Service_Price' => (float)$row['Service_Price']
				);

			}

			//var_dump($transaction_data);
			
			// echo "Transaction ID: " . $row['Transaction_ID'] . "<br>";
			// echo "Client ID: " . $row['Client_ID'] . "<br>";
			// echo "Client Name: " . $row['Fname'] . " " . $row['Lname'] . "<br>";
			// echo "Contact Number: " . $row['Contact_Number'] . "<br>";
			// echo "Email Address: " . $row['Email_Address'] . "<br>";
			// echo "Barangay: " . $row['Barangay'] . "<br>";
			// echo "Purok: " . $row['Purok'] . "<br>";
			// echo "House Number: " . $row['H_num'] . "<br>";
			// echo "Street Name: " . $row['S_name'] . "<br>";
			// echo "Transaction Date: " . $formatted_date . "<br>";
			// echo "Total Amount: " . $row['Total_Amount'] . "<br>";
			// echo "Payment Method: " . $row['Payment_Method'] . "<br>";
			// echo "Payment Status: " . $row['Payment_Status'] . "<br>";
			// echo "Retrieval Method: " . $row['Retrieval_Method'] . "<br>";
			// echo "General Address: " . $row['General_Address'] . "<br>";

			
			// echo "Service Name: " . $row['Service_Name'] . "<br>";
			// echo "Service Description: " . $row['Service_Description'] . "<br>";
			// echo "Service Price: " . $row['Service_Price'] . "<br>";
			// echo "Service Type: " . $row['Service_Type'] . "<br>";
			// echo "Service Status: " . $row['Service_status'] . "<br>";
			// echo "Service Start Date: " . $row['Start_Datetime'] . "<br>";
			// echo "Service End Date: " . $row['End_Datetime'] . "<br>";
			
		} 
		else {
			echo "No transaction found for this ID.";
		}
		
		
		$stmt->close();
	} else {
		echo "Invalid Service ID.";
	}
?>


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
								<h1 class="color-main">Shop Single Order</h1>
								<ol class=" breadcrumb">
									<li class="breadcrumb-item">
										<a href="index.php">Home</a>
									</li>
									<li class="breadcrumb-item">
										<a href="#">Shop</a>
									</li>

						
									<li class="breadcrumb-item active">
										Shop Single Order
									</li>
								</ol>
							</div>

						</div>
					</div>
				</section>
			</div>


			<section class="ls s-pt-55 s-pb-35 s-pt-lg-95 s-pb-lg-75 s-pt-xl-145 s-pb-xl-125">
				<div class="container">
					<div class="row">
						<main class="col-lg-12">
							<article id="post-1708" class="post-1708 page type-page status-publish hentry">
								<header class="entry-header mb-30">
									<h1 class="entry-title"> Order
										 <?php 																					 	
											 echo $service_id 
										 ?>
									<!--</h1> <span class="edit-link">
										<a class="post-edit-link" href="#">Edit<span class="screen-reader-text"> "My account"</span>
										</a>
									</span>-->
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
													<a href="shop-account-details.php">Account details</a>
												</li>
												<li>
													<a href="shop-account-addresses.php">Addresses</a>
												</li>
												<li class="is-active">
													<a href="shop-account-orders.php">Orders</a>
												</li>
												<li>
													<a href="shop-account-login.php">Logout</a>
												</li>
											</ul>
										</nav>


										<div class="woocommerce-MyAccount-content">
											<p>
												Order #<?php echo $service_id ?>
												was placed on <?php echo $formatted_date ?>
												 and is currently <?php echo $service_status; ?>.
											</p>


											<section class="woocommerce-order-details">

												<h6 class="woocommerce-order-details__title">Order details</h6>

												<table class="woocommerce-table woocommerce-table--order-details shop_table order_details">

													<thead>
														<tr>
															<th class="woocommerce-table__product-name product-name">Product</th>
															<th class="woocommerce-table__product-table product-total">Total</th>
														</tr>
													</thead>

													<tbody>
														
														<?php foreach ($transaction_data as $transaction): ?>

															<?php $mult = $transaction['Service_Price'] * $transaction['Number_of_Orders']; ?>

															<tr>
																<td class="woocommerce-table__product-name product-name">
																	<b>Name:</b> <?php echo htmlspecialchars($transaction['Service_Name']); ?><br>
																	<b>Type:</b> <?php echo htmlspecialchars($transaction['Service_Type']); ?><br>
																	<b>Description:</b> <?php echo htmlspecialchars($transaction['Service_Description']); ?><br>
																	<b>Quantity:</b> <?php echo $transaction['Number_of_Orders']; ?><br>
																</td>
																<td class="woocommerce-table__product-total product-total">
																	<span class="woocommerce-Price-amount amount">
																		<span class="woocommerce-Price-currencySymbol">₱</span><?php echo $mult; ?>
																	</span>
																</td>
															</tr>
														<?php endforeach; ?>

													</tbody>
													<tfoot>
														<tr>
															<th scope="row">Subtotal:</th>
															<td>
																<span class="woocommerce-Price-amount amount">
																	<span class="woocommerce-Price-currencySymbol"></span></span><?php echo "₱$totalAmount"; ?></span>
															</td>
														</tr>
														<tr>
															<th scope="row">Payment method:</th>
															<td><?php echo $p_method; ?></td>
														</tr>
														<tr>
															<th scope="row">Total:</th>
															<td>
																<span class="woocommerce-Price-amount amount">
																	<span class="woocommerce-Price-currencySymbol">₱</span><?php echo $totalAmount; ?>
																</span>
															</td>
														</tr>
													</tfoot>

												</table>

												<p class="order-again">
													<a href="shop-right.php" class="btn btn-maincolor"><span>View Catalog</span></a>
												</p>

												<section class="woocommerce-customer-details">

													<h6>Customer details</h6>

													<table class="woocommerce-table woocommerce-table--customer-details shop_table customer_details">


														<tbody>
															<tr>
																<th>Email:</th>
																<td><?php echo $email; ?></td>
															</tr>

															<tr>
																<th>Phone:</th>
																<td><?php echo $phone;  ?></td>
															</tr>


														</tbody>
													</table>

													<div class="mt-30">
														<h6 class="woocommerce-column__title">Billing address</h6>

														<address>
															<?php
															echo  $barangay . "<br>";
															echo  $purok . "<br>";
															echo  $h_num . "<br>";
															echo  $s_name . "<br>";														
															?>

															
														</address>
													</div>

												</section>

											</section>
										</div>
									</div>
								</div>
								<!-- .entry-content -->
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