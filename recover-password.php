<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>Recover Password - BinTracker</title>
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
								<h4 class="fw-bold">Recover Password</h4>
								<span class="tcgray">You are only one step a way from your new password, recover your password now</span>
							</div>
							<form action="#" method="POST">
								<div class="mb-4">
									<label for="password" class="form-label fw-bolder tcgray">PASSWORD</label>
									<input type="password" name="password" id="password" class="form-control p-3" placeholder="Password" maxlength="30" autofocus required />
								</div>
								<div class="mb-4">
									<label for="repassword" class="form-label fw-bolder tcgray">CONFIRM PASSWORD</label>
									<input type="password" name="repassword" id="repassword" class="form-control p-3" placeholder="Corfirm password" maxlength="30" autofocus required />
								</div>
								<div class="d-grid gap-2">
									<button type="submit" class="btn btn-primary p-3" name="changePass">Change password</button>
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
			$(document).ready(function () {
				$(':input[type="submit"]').prop("disabled", true);

				$("#password, #repassword").keyup(function () {
					if ($("#password").val() == "" && $("#repassword").val() == "") {
						$(':input[type="submit"]').prop("disabled", true);
					} else if ($("#password").val() == $("#repassword").val()) {
						$(':input[type="submit"]').prop("disabled", false);
					} else {
						$("#changePass").prop("disabled", true);
					}
				});
			});
		</script>
	</body>
</html>
