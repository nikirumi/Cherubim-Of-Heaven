<?php
// Include database connection
include('connect.php');

// Start the session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Start the session only if it's not already active
}

// Check if the user is logged in
if (!isset($_SESSION['client_id'])) {
    header("Location: shop-account-login.php");
    exit();
}

// Get the client_id from the session
$client_id = $_SESSION['client_id']; 

// Check if files are uploaded
if (isset($_FILES['files'])) {
    $files = $_FILES['files']; // Get the uploaded files

    // Loop through each uploaded file
    for ($i = 0; $i < count($files['name']); $i++) {
        $file_name = $files['name'][$i]; // Get the file name
        $file_tmp = $files['tmp_name'][$i]; // Get the temporary file location
        $file_size = $files['size'][$i]; // Get the file size
        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION)); // Get file extension

        // Check for upload errors
        if ($files['error'][$i] !== UPLOAD_ERR_OK) {
            echo "Error uploading file: " . $files['error'][$i];
            exit();
        }

        // Define allowed file types
        $allowed_types = ['jpg', 'jpeg', 'png', 'gif', 'mp4', 'mp3', 'wav', 'avi'];

        // Check if the file type is allowed
        if (in_array($file_type, $allowed_types)) {
            // Set the upload directory
            $upload_dir = 'uploads/';

            // Create a unique name for the file
            $new_file_name = uniqid() . '.' . $file_type;

            // Move the file from temp location to the upload directory
            if (move_uploaded_file($file_tmp, $upload_dir . $new_file_name)) {
                // File uploaded successfully, now insert info into the database
                $query = "INSERT INTO files (File_Name, Client_ID) VALUES ('$new_file_name', '$client_id')";

                if (mysqli_query($conn, $query)) {
                    echo "File uploaded and inserted into database successfully.";
                } else {
                    echo "Error inserting file into the database: " . mysqli_error($conn);
                }
            } else {
                echo "Error moving the file.";
            }
        } else {
            echo "Invalid file type. Only images, videos, and audio files are allowed.";
        }
    }
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
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/animations.css">
        <link rel="stylesheet" href="css/font-awesome.css">
        <link rel="stylesheet" href="css/main.css" class="color-switcher-link">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
        <style>
        /* General styling for gallery items */
        .vertical-item.item-gallery {
            margin-bottom: 30px;
            padding: 15px;
            border-radius: 8px;
            background-color: #f9f9f9;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Audio Item - Specific styling for audio elements */
        .audio-item .item-media audio {
            width: 100%; /* Ensures the audio player stretches fully within its container */
            background-color: #f1f1f1; /* Light background for the audio player */
            border: none;
            padding: 10px;
            border-radius: 8px; /* Rounded corners for better aesthetics */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Light shadow around the audio player */
        }

        /* Hover effect for the audio item */
        .audio-item:hover .item-media audio {
            opacity: 0.8;
            transition: opacity 0.3s ease-in-out;
        }

        /* Video Item - Specific styling for video elements */
        .video-item .item-media video {
            width: 100%; /* Ensures the video player stretches fully within its container */
            height: auto; /* Maintains aspect ratio */
            background-color: #000; /* Black background for the video area */
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Shadow around video element */
        }

        /* Hover effect for the video item */
        .video-item:hover .item-media video {
            opacity: 0.85;
            transition: opacity 0.3s ease-in-out;
        }

        /* Optional: Additional styles for better responsiveness */
        @media (max-width: 768px) {
            .col-xl-4, .col-sm-6 {
                width: 100%; /* Stacks items for smaller screens */
            }
        }

        </style>
    </head>


    <body>

        <div class="preloader">
            <div class="preloader_image"></div>
        </div>

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
                                    <h1 class="color-main">Time Capsule</h1>
                                    <ol class=" breadcrumb">
                                        
                                        <li class="breadcrumb-item">
                                            <a href="#">Cherubim of Heaven</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="index.php">Time Capsule</a>
                                        </li>
                                    </ol>
                                </div>
    
                            </div>
                        </div>
                    </section>
                </div>
                <!-- File Upload Section -->
<section class="ls ms s-pt-55 s-pb-55 s-pt-lg-95 s-pb-lg-100 s-pt-xl-145 s-pb-xl-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 mx-auto text-center">
                <p class="subtitle">Today, tomorrow, and beyond.</p>
                <h3 class="special-heading"><span class="color-main">Upload</span> Files</h3>
                <form class="upload-form mt-4" id="fileUploadForm" method="POST" enctype="multipart/form-data" action="upload.php">
                    <div class="form-group">
                        <label for="fileUpload">Choose Files (Images, Videos, Audio Only):</label>
                        <input type="file" id="fileUpload" name="files[]" class="form-control" accept="image/*,video/*,audio/*" multiple>
                    </div>
                    <input type="hidden" name="client_id" value="1"> <!-- Assuming client_id is 1, adjust accordingly -->
                    <button type="submit" class="btn btn-maincolor mt-3">Upload Files</button>
                </form>
            </div>
        </div>
    </div>
</section>


<!-- Images Gallery Section -->
<section class="ls s-pt-50 s-pb-30 s-pt-lg-90 s-pb-lg-70 s-pt-xl-140 s-pb-xl-120" style="margin-top: 50px; display: flex; flex-direction: column; align-items: center; height: auto;">
    <div class="container" style="display: flex; flex-wrap: wrap; justify-content: space-between;">
        <div class="row w-100">
            <div class="col-lg-12">
                <div class="row justify-content-center">
                    <div class="col-md-10 col-xl-7">
                        <div class="filters gallery-filters text-lg-right">
                            <a href="#" data-filter="*" class="active selected">All</a>
                            <a href="#" data-filter=".funeral">Images</a>
                            <a href="#" data-filter=".mortuary">Videos</a>
                            <a href="#" data-filter=".cremations">Audios</a>
                        </div>
                    </div>
                </div>
                <div class="row isotope-wrapper masonry-layout c-mb-30 c-gutter-30" data-filters=".gallery-filters">

    <?php
    // Start the session
    //session_start();
    include('connect.php');

    // Check if the user is logged in
    if (!isset($_SESSION['client_id'])) {
        echo "You must be logged in to view your files.";
        exit();
    }

    // Get the client_id from session
    $client_id = $_SESSION['client_id']; 

    // Query to get the files uploaded by the client
    $query = "SELECT * FROM files WHERE Client_ID = '$client_id'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        echo "Error fetching files: " . mysqli_error($conn);
        exit();
    }

    // Loop through the results and display the files
    while ($file = mysqli_fetch_assoc($result)) {
        $file_name = $file['File_Name'];
        $file_path = 'uploads/' . $file_name; // Path to the uploaded file
        $file_extension = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));

        // Display the file based on its type
        if (in_array($file_extension, ['jpg', 'jpeg', 'png', 'gif'])) {
            // Image
            echo '<div class="col-xl-4 col-sm-6 test funeral eco-funeral">';
            echo '<div class="vertical-item item-gallery text-center ds">';
            echo '<div class="item-media">';
            echo '<img src="' . $file_path . '" alt="Uploaded Image">';
            echo '<div class="media-links">';
            echo '<div class="links-wrap">';
            echo '<a class="link-zoom photoswipe-link" title="Zoom" href="' . $file_path . '"></a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        } elseif (in_array($file_extension, ['mp4', 'avi'])) {
            // Video
            echo '<div class="col-xl-4 col-sm-6 test mortuary eco-funeral video-item">';
            echo '<div class="vertical-item item-gallery text-center ds">';
            echo '<div class="item-media">';
            echo '<video src="' . $file_path . '" controls></video>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        } elseif (in_array($file_extension, ['mp3', 'wav', 'aac'])) {
            // Audio
            echo '<div class="col-xl-4 col-sm-6 test cremations eco-funeral audio-item">';
            echo '<div class="vertical-item item-gallery text-center ds">';
            echo '<div class="item-media">';
            echo '<audio src="' . $file_path . '" controls></audio>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    }
    ?>

</div>

            </div>
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

        <!-- Google Map Script -->
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC0pr5xCHpaTGv12l73IExOHDJisBP2FK4&amp;callback=initGoogleMap"></script>

    </body>
    </html>
