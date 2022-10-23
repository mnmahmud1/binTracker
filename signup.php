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
		<title>Sign Up - BinTracker</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
		<link rel="stylesheet" href="dist/css/style.css" />
	</head>
	<body>
		<div class="preloader">
			<div class="loading">
				<img src="dist/img/load.svg" width="80" />
			</div>
		</div>

		<?php if(isset($_COOKIE["reg"]) && $_COOKIE["reg"] == "failedUsername") : ?>
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
							<strong>Username were used on another users</strong>, please create your unique username!
						</div>
					</div>
				</div>
			</div>
		<?php elseif(isset($_COOKIE["reg"]) && $_COOKIE["reg"] == "failed") : ?>
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
							<strong>Failed</strong> to sign up new user!
						</div>
					</div>
				</div>
			</div>
		<?php endif ?>

		<div class="container">
			<div class="row justify-content-center">
				<div class="col-sm-8 col-md-6 col-lg-6">
					<div class="card shadow border-0 py-2 px-2 mt-5 mb-5">
						<div class="card-body">
							<div class="text-center mb-4">
								<h4 class="fw-bold">Sign Up to BinTracker</h4>
								<span class="tcgray">Enter your agency information below</span>
							</div>

							<form action="function.php" method="POST">
								<div class="mb-4">
									<label for="name" class="form-label fw-bolder tcgray">AGENCY NAME</label>
									<input type="text" name="name" id="name" class="form-control p-3" placeholder="Your agency name" maxlength="100" autofocus autocomplete="off" required />
								</div>
								<div class="row">
									<div class="col-sm-6 mb-4">
										<label for="bussines" class="form-label fw-bolder tcgray">BUSSINES FIELD</label>
										<input type="text" name="bussines" id="bussines" class="form-control p-3" placeholder="Your agency bussines field" maxlength="50" autocomplete="off" required />
									</div>
									<div class="col-sm-6 mb-4">
										<label for="address" class="form-label fw-bolder tcgray">ADDRESSES</label>
										<input type="text" name="address" id="address" class="form-control p-3" placeholder="Your agency addreses" autocomplete="off" required />
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6 mb-4">
										<label for="email" class="form-label fw-bolder tcgray">EMAIL</label>
										<input type="email" name="email" id="email" class="form-control p-3" placeholder="Your agency email" maxlength="100" autocomplete="off" required />
									</div>
									<div class="col-sm-6 mb-4">
										<label for="phone" class="form-label fw-bolder tcgray">PHONE</label>
										<input type="tel" name="tel" id="tel" class="form-control p-3" placeholder="Your agency phone" maxlength="13" autocomplete="off" required />
									</div>
								</div>
								<div class="row">
									<div class="col-sm-4 mb-4">
										<label for="username" class="form-label fw-bolder tcgray">USERNAME</label>
										<input type="text" name="username" id="username" class="form-control p-3" placeholder="Username" maxlength="20" autocomplete="off" required />
									</div>
									<div class="col-sm-4 mb-4">
										<label for="password" class="form-label fw-bolder tcgray">PASSWORD</label>
										<input type="password" name="password" id="password" class="form-control p-3" placeholder="password" required />
									</div>
									<div class="col-sm-4 mb-4">
										<label for="repassword" class="form-label fw-bolder tcgray">REPEAT PASSWORD</label>
										<input type="password" name="repassword" id="repassword" class="form-control p-3" placeholder="repeat password" required />
									</div>
								</div>
								<div class="d-grid gap-2">
									<button type="submit" class="btn btn-primary p-3" name="signup">Sign Up</button>
								</div>
								<p class="mt-3 text-center tcgray">Have an account? <a href="signin.php" class="text-decoration-none">Sign In</a></p>
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

		<script>
			// Sign Up Function
			$(document).ready(function () {
				$(':input[type="submit"]').prop("disabled", true);

				$("#password, #repassword").keyup(function () {
					if ($("#password").val() == "" && $("#repassword").val() == "") {
						$(':input[type="submit"]').prop("disabled", true);
					} else if ($("#password").val() == $("#repassword").val()) {
						$(':input[type="submit"]').prop("disabled", false);
					} else {
						$("#signup").prop("disabled", true);
					}
				});
			});
		</script>
	</body>
</html>
