<?php session_start() ;
include('connect.php');
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Fonts -->
	<link rel="dns-prefetch" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

	<link rel="stylesheet" href="style.css">

	<link rel="icon" href="Favicon.png">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="format-detection" content="telephone=no">

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/animations.css">
	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" href="css/main.css" class="color-switcher-link">
	<link rel="stylesheet" href="css/shop.css" class="color-switcher-link">
	<script src="js/vendor/modernizr-2.6.2.min.js"></script>
	<title>Cherubim Of Heaven - Password Reset</title>
</head>

<body>

	<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
		<div class="container">
			<section class="ls s-pt-55 s-pb-10 s-py-lg-95 s-py-xl-145 choose-us-section text-center text-lg-left">

			</section>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
				aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
		</div>
	</nav>

	<main class="login-form">
		<section class="ls s-pt-55 s-pb-35 s-pt-lg-95 s-pb-lg-80 s-pt-xl-145 s-pb-xl-130">
    <div class="container">
        <div class="row">
            <main class="col-lg-12">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <p class="subtitle text-center">today, tomorrow and beyond.</p>
                            <h3 class="special-heading"><span class="color-main">Password </span>Reset</h3>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <!-- Form for password reset -->
                <form method="post" class="woocommerce-ResetPassword lost_reset_password text-center" action="change_pass.php">
                    <p>Create a new password. Please enter your new password below:</p>

                    <!-- New Password Field -->
                    <p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first mt-20">
                        <label for="new_password">New Password</label>
                        <input
                            class="form-control text-center woocommerce-Input woocommerce-Input--text input-text"
                            type="password" name="new_password" id="new_password" placeholder="Enter new password">
                    </p>

                    <!-- Confirm Password Field -->
                    <p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first mt-20">
                        <label for="confirm_password">Confirm Password</label>
                        <input
                            class="form-control text-center woocommerce-Input woocommerce-Input--text input-text"
                            type="password" name="confirm_password" id="confirm_password" placeholder="Confirm your password">
                    </p>

                    <!-- Hidden Token Field -->
                    <input type="hidden" name="token" value="<?php echo isset($_GET['token']) ? $_GET['token'] : ''; ?>" />

                    <!-- Show/Hide Password Toggle -->
                    <div class="form-row mt-20">
                        <label for="show_password" class="form-check-label">
                            <input type="checkbox" id="show_password" class="form-check-input"> Show Password
                        </label>
                    </div>

                    <div class="clear"></div>

                    <div class="divider-20"></div>
                    <p class="woocommerce-form-row form-row">
                        <button type="submit" class="woocommerce-Button btn btn-maincolor" name="save_account_details">Create Password</button>
                    </p>

                </form>
            </main>
        </div>
    </div>
</section>



		<!-- JavaScript for Show/Hide Password -->
		<script>
			document.getElementById('show_password').addEventListener('change', function () {
				var passwordField = document.getElementById('new_password');
				var confirmPasswordField = document.getElementById('confirm_password');

				if (this.checked) {
					passwordField.type = 'text';
					confirmPasswordField.type = 'text';
				} else {
					passwordField.type = 'password';
					confirmPasswordField.type = 'password';
				}
			});
		</script>
	</main>
</body>

</html>

<script>
    const toggle = document.getElementById('togglePassword');
    const password = document.getElementById('password');

    toggle.addEventListener('click', function () {
        if (password.type === "password") {
            password.type = 'text';
        } else {
            password.type = 'password';
        }
        this.classList.toggle('bi-eye');
    });
</script>

