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
		<title>Forgot Password - BinTracker</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
		<link rel="stylesheet" href="dist/css/style.css" />
	</head>
	<body>
		<div class="preloader">
			<div class="loading">
				<img src="dist/img/load.svg" width="80" />
			</div>
		</div>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-sm-8 col-md-4 col-lg-4">
					<div class="card shadow border-0 py-2 px-2 mt-5">
						<div class="card-body">
							<div class="text-center mb-4">
								<h4 class="fw-bold">Forgot Password</h4>
								<span class="tcgray"
									>You forgot your password? Here you <br />
									can easily retrieve a new password.</span
								>
							</div>
							<form action="#" method="POST">
								<div class="mb-4">
									<label for="mail" class="form-label fw-bolder tcgray">EMAIL</label>
									<input type="text" name="mail" id="mail" class="form-control p-3" placeholder="Type your agency mail" maxlength="30" autofocus required />
								</div>
								<div class="d-grid gap-2">
									<button type="submit" class="btn btn-primary p-3" name="reqNewPass">Request new password</button>
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
	</body>
</html>
