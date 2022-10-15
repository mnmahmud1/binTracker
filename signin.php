<?php
	
	if(isset($_COOKIE["signin"])) {
		header("Location: index.php");
	}
	
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>Sign In - BinTracker</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
		<link rel="stylesheet" href="dist/css/style.css" />
	</head>
	<body>
		<div class="preloader">
			<div class="loading">
				<img src="dist/img/load.svg" width="80" />
			</div>
		</div>

		<?php if(isset($_COOKIE["sign"]) && $_COOKIE["sign"] == "failed") : ?>
			<div aria-live="polite" aria-atomic="true" class="bg-dark position-relative bd-example-toasts">
				<div class="toast-container position-absolute top-0 end-0 p-3" id="toastPlacement">
					<div class="toast fade show">
						<div class="toast-header">
							<i class="fas fa-exclamation-circle me-2"></i>
							<strong class="me-auto">Attention!</strong>
							<small>Just Now</small>
							<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
						</div>
						<div class="toast-body">
							Wrong username or password!
						</div>
					</div>
				</div>
			</div>

		<?php elseif(isset($_COOKIE["reg"]) && $_COOKIE["reg"] == "success") :  ?>
			<div aria-live="polite" aria-atomic="true" class="bg-dark position-relative bd-example-toasts">
				<div class="toast-container position-absolute top-0 end-0 p-3" id="toastPlacement">
					<div class="toast fade show">
						<div class="toast-header">
							<i class="fas fa-info-circle me-2"></i>
							<strong class="me-auto">Attention!</strong>
							<small>Just Now</small>
							<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
						</div>
						<div class="toast-body">
							Successfully registered, sign in now!
						</div>
					</div>
				</div>
			</div>
		<?php endif ?>

		<div class="container">
			<div class="row justify-content-center">
				<div class="col-sm-8 col-md-4 col-lg-4">
					<div class="card shadow border-0 py-2 px-2 mt-5">
						<div class="card-body">
							<div class="text-center mb-4">
								<h4 class="fw-bold">Sign in to BinTracker</h4>
								<span class="tcgray">Sign in to start your session</span>
							</div>

							<form action="function.php" method="POST">
								<div class="mb-4">
									<label for="username" class="form-label fw-bolder tcgray">USERNAME</label>
									<input type="text" name="username" id="username" class="form-control p-3" placeholder="Type your username" maxlength="20" autofocus required />
								</div>
								<div class="mb-4">
									<div class="d-flex justify-content-between align-items-baseline">
										<label for="password" class="form-label fw-bolder tcgray">PASSWORD</label>
										<a href="forgot-password.php" class="text-decoration-none tcgray fs8" tabindex="1" hidden>Forgot Password?</a>
									</div>
									<input type="password" name="password" id="password" class="form-control p-3" placeholder="Type your password" required />
								</div>
								<div class="d-grid gap-2">
									<button type="submit" class="btn btn-primary p-3" name="signin">Sign in</button>
								</div>
								<p class="mt-3 text-center tcgray">Don't have account? <a href="signup.php" class="text-decoration-none">Sign Up</a></p>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		
		<!-- My JS Configuration -->
		<script src="dist/js/main.js"></script>
	</body>
</html>