<?php

	if(!isset($_COOKIE['signinAdmin'])){
		header('Location: signin.php');
	}
	
	require '../conn.php';

	$callRequests = mysqli_query($conn, "SELECT title, status, created_at FROM requests ORDER BY created_at DESC LIMIT 5");
	$callDevices = mysqli_query($conn, "SELECT code, created_at FROM devices");

	$calcAgency = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM users"));
	$calcDoneRequest = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM requests WHERE status = 1"));
	$calcUndoneRequest = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM requests WHERE status = 0"));


?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<meta name="description" content="" />
		<meta name="author" content="" />

		<title>Admin Overview | BinTracker</title>

		<!-- Custom fonts for this template-->
		<link href="../dist/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
		<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

		<!-- Kit font awesome -->
		<script src="https://kit.fontawesome.com/b676a664d2.js" crossorigin="anonymous"></script>

		<!-- Custom styles for this template-->
		<link href="../dist/css/sb-admin-2.min.css" rel="stylesheet" />

		<!-- Boootstrap v5.2 -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />

		<!-- My configuration css -->
		<link rel="stylesheet" href="../dist/css/style.css" />
	</head>

	<body id="page-top">

		<!-- Preloader -->
		<div class="preloader">
			<div class="loading">
				<img src="../dist/img/load.svg" width="80">
				<p>Loading</p>
			</div>
		</div>

		<?php if(isset($_COOKIE["updatePass"]) && $_COOKIE["updatePass"] == "failed") : ?>
			<div aria-live="polite" aria-atomic="true" class="bg-dark position-relative bd-example-toasts">
				<div class="toast-container position-absolute top-0 end-0 p-3" id="toastPlacement">
					<div class="toast fade show">
						<div class="toast-header">
							<i class="fas fa-info-circle"></i>
							<strong class="me-auto">Attention!</strong>
							<small>Just Now</small>
							<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
						</div>
						<div class="toast-body">
							<strong>Failed</strong> to update your password!
						</div>
					</div>
				</div>
			</div>
		<?php elseif(isset($_COOKIE["updatePass"]) && $_COOKIE["updatePass"] == "failedNotMatch") : ?>
			<div aria-live="polite" aria-atomic="true" class="bg-dark position-relative bd-example-toasts">
				<div class="toast-container position-absolute top-0 end-0 p-3" id="toastPlacement">
					<div class="toast fade show">
						<div class="toast-header">
							<i class="fas fa-info-circle"></i>
							<strong class="me-auto">Attention!</strong>
							<small>Just Now</small>
							<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
						</div>
						<div class="toast-body">
							<strong>Failed</strong> to update your password, Input password not match!
						</div>
					</div>
				</div>
			</div>
		<?php elseif(isset($_COOKIE["updatePass"]) && $_COOKIE["updatePass"] == "success") : ?>
			<div aria-live="polite" aria-atomic="true" class="bg-dark position-relative bd-example-toasts">
				<div class="toast-container position-absolute top-0 end-0 p-3" id="toastPlacement">
					<div class="toast fade show">
						<div class="toast-header">
							<i class="fas fa-info-circle"></i>
							<strong class="me-auto">Attention!</strong>
							<small>Just Now</small>
							<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
						</div>
						<div class="toast-body">
							<strong>Successfully</strong> update your password!
						</div>
					</div>
				</div>
			</div>
		<?php endif ?>

		<!-- Page Wrapper -->
		<div id="wrapper">
			<!-- Sidebar -->
			<ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">
				<!-- Sidebar - Brand -->
				<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
					<div class="sidebar-brand-icon rotate-n-15">
						<i class="fa-solid fa-b"></i>
					</div>
					<div class="sidebar-brand-text mx-3">BinTracker</div>
				</a>

				<!-- Nav Item  -->
				<li class="nav-item active">
					<a class="nav-link" href="index.php">
						<i class="fas fa-fw fa-tachometer-alt ml-3 mr-2"></i>
						<span>Overview</span></a
					>
				</li>

				<!-- Nav Item  -->
				<li class="nav-item">
					<a class="nav-link" href="agency.php">
						<i class="fa-solid fa-building ml-3 mr-2"></i>
						<span>Agency</span></a
					>
				</li>

				<!-- Nav Item  -->
				<li class="nav-item">
					<a class="nav-link" href="devices-production.php">
						<i class="fa-solid fa-hard-drive ml-3 mr-2"></i>
						<span>Devices Production</span></a
					>
				</li>

				<!-- Nav Item  -->
				<li class="nav-item">
					<a class="nav-link" href="requests.php">
						<i class="fa-solid fa-comments ml-3 mr-2"></i>
						<span>Requests</span></a
					>
				</li>

				<!-- Nav Item  -->
				<li class="nav-item">
					<a class="nav-link" href="" data-bs-toggle="modal" data-bs-target="#changePassword">
						<i class="fa-solid fa-key ml-3 mr-2"></i>
						<span>Change Password</span></a
					>
				</li>

				<!-- Divider -->
				<hr class="sidebar-divider d-none d-md-block mt-3 mb-3" />

				<!-- Nav Item  -->
				<li class="nav-item">
					<a class="nav-link" href="#" onclick="return alertModal('function.php?signout=1', 'Sign Out', 'If you sign out maybe any data cant be saved!')">
						<i class="fa-solid fa-right-from-bracket ml-3 mr-2"></i>
						<span>Sign Out</span>
					</a>
				</li>

				<!-- Divider -->
				<hr class="sidebar-divider d-none d-md-block mt-3 mb-3" />

				<!-- Sidebar Toggler (Sidebar) -->
				<div class="text-center d-none d-md-inline">
					<button class="rounded-circle border-0" id="sidebarToggle"></button>
				</div>
			</ul>
			<!-- End of Sidebar -->

			<!-- Content Wrapper -->
			<div id="content-wrapper" class="d-flex flex-column">
				<!-- Main Content -->
				<div id="content" class="px-2">
					<!-- Begin Page Content -->
					<div class="container-fluid mt-4">
						<!-- Page Heading -->
						<nav aria-label="breadcrumb" class="mb-4">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php">BinTracker</a></li>
								<li class="breadcrumb-item active" aria-current="page">Overview</li>
							</ol>
						</nav>
						<h1 class="h4 mb-4 fw-bold text-gray-800">Overview</h1>

						<div class="row">
							<!-- Agency -->
							<div class="col-sm-3 mb-2">
								<div class="card text-center">
									<div class="card-body">
										<div class="card-title">Agency</div>
										<h1 class="fw-bold"><?= $calcAgency ?></h1>
									</div>
								</div>
							</div>

							<!-- Devices Production -->
							<div class="col-sm-3 mb-2">
								<div class="card text-center">
									<div class="card-body">
										<div class="card-title">Devices Production</div>
										<h1 class="fw-bold"><?= mysqli_num_rows($callDevices) ?></h1>
									</div>
								</div>
							</div>

							<!-- Done Requests -->
							<div class="col-sm-3 mb-2">
								<div class="card text-center">
									<div class="card-body">
										<div class="card-title">Done Requests</div>
										<h1 class="fw-bold"><?= $calcDoneRequest ?></h1>
									</div>
								</div>
							</div>

							<!-- Undone Requests -->
							<div class="col-sm-3 mb-2">
								<div class="card text-center">
									<div class="card-body">
										<div class="card-title">Undone Requests</div>
										<h1 class="fw-bold"><?= $calcUndoneRequest ?></h1>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</div>
				<!-- End of Main Content -->

				<div id="content" class="mb-2 px-2">
					<div class="container-fluid">
						<div class="row">
							<div class="col-12">
								<div class="card">
									<div class="card-body">
										<canvas id="myChart" class="p-4" height="100"></canvas>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div id="content" class="px-2">
					<div class="container-fluid mb-3">
						<div class="row">
							<div class="col-sm-6">
								<div class="card mb-3">
									<div class="card-body">
										<div class="p-3 d-flex justify-content-between align-items-baseline">
											<h6 class="card-title fw-bold">
												Device List
												<br>
												<span class="fs8 tcgray">All</span>
											</h6>
											<button class="btn btn-link text-decoration-none fs8" onclick="window.location.href='devices-production.php'">View All</a>
										</div>

										<ul class="list-group list-group-flush">
											<?php foreach($callDevices as $device) : ?>
												<li class="list-group-item">
													<div class="d-flex justify-content-between">
														<span>Device ID<?= $device['code'] ?></span>
														<span class="fs8 tcgray"><?= date('Y-m-d g:i A', strtotime($device['created_at'])) ?></span>
													</div>
												</li>
											<?php endforeach ?>

											<?php $numDev = mysqli_num_rows($callDevices) ; $rows = 5 - $numDev; ?>
											<?php if($numDev < 5) : ?>
												<?php for($i=1;$i<=$rows;$i++) : ?>
												<li class="list-group-item">
													<div class="row justify-content-between align-items-baseline">
														<div class="col-7">
															<span>-</span>
														</div>
													</div>
												</li>
												<?php endfor ?>
											<?php endif ?>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="card mb-3">
									<div class="card-body">
										<div class="p-3 d-flex justify-content-between align-items-baseline">
											<h6 class="card-title fw-bold">
												Requests <br>
												<span class="fs8 tcgray">All</span>
											</h6>
											<button class="btn btn-link text-decoration-none fs8" onclick="window.location.href='requests.php'">View All</a>
										</div>
										
										<ul class="list-group list-group-flush">
											<?php foreach($callRequests as $request) : ?>
												<li class="list-group-item">
													<div class="row justify-content-between align-items-baseline">
														<div class="col-7">
															<span><?= $request['title'] ?></span>
														</div>
														<div class="col text-start">
															<span class="fs8 tcgray"><?= date('g:i A', strtotime($request['created_at']))?></span>
														</div>
														<div class="col text-end">
															<?php if($request['status'] == 1) : ?>
																<span class="badge rounded-pill text-bg-success px-3">DONE</span>
															<?php elseif($request['status'] == 0) : ?>
																<span class="badge rounded-pill text-bg-warning px-3">PENDING</span>
															<?php endif ?>
														</div>
													</div>
												</li>
											<?php endforeach ?>

											<?php $numReq = mysqli_num_rows($callRequests) ; $rows = 5 - $numReq; ?>
											<?php if($numReq < 5) : ?>
												<?php for($i=1;$i<=$rows;$i++) : ?>
												<li class="list-group-item">
													<div class="row justify-content-between align-items-baseline">
														<div class="col-7">
															<span>-</span>
														</div>
													</div>
												</li>
												<?php endfor ?>
											<?php endif ?>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Footer -->
				<footer class="sticky-footer bg-white">
					<div class="container my-auto">
						<div class="copyright text-center my-auto">
							<span
								>Copyright &copy; BinTracker
								<script>
									document.write(new Date().getFullYear());
								</script>
							</span>
						</div>
					</div>
				</footer>
				<!-- End of Footer -->
			</div>
			<!-- End of Content Wrapper -->
		</div>
		<!-- End of Page Wrapper -->

		<!-- Scroll to Top Button-->
		<a class="scroll-to-top rounded" href="#page-top">
			<i class="fas fa-angle-up"></i>
		</a>

		<!-- Modal Change Password Admin #1 -->
		<div class="modal fade" id="changePassword" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="changePasswordLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="changePasswordLabel">Update admin password</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<form action="function.php" method="post">
						<div class="modal-body">
							<div class="mb-3">
								<label for="oldPasswordAdmin" class="form-label fw-bolder text-gray-800">OLD PASSWORD</label>
								<input type="password" name="oldPasswordAdmin" id="oldPasswordAdmin" class="form-control p-3" placeholder="Enter old password" autofocus required />
							</div>
							<hr />
							<div class="mb-3">
								<label for="newPasswordAdmin" class="form-label fw-bolder text-gray-800">NEW PASSWORD</label>
								<input type="password" name="newPasswordAdmin" id="newPasswordAdmin" class="form-control p-3" placeholder="Enter new password" required />
							</div>
							<div class="mb-3">
								<label for="repeatPasswordAdmin" class="form-label fw-bolder text-gray-800">REPEAT PASSWORD</label>
								<input type="password" name="repeatPasswordAdmin" id="repeatPasswordAdmin" class="form-control p-3" placeholder="Repat new password" required />
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
							<button type="submit" name="updatePassAdmin" id="updatePassAdmin" class="btn btn-primary">Update Password</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<!-- Bootstrap core JavaScript-->
		<script src="../dist/vendor/jquery/jquery.min.js"></script>
		<script src="../dist/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

		<!-- Core plugin JavaScript-->
		<script src="../dist/vendor/jquery-easing/jquery.easing.min.js"></script>

		<!-- Custom scripts for all pages-->
		<script src="../dist/js/sb-admin-2.min.js"></script>

		<!-- Boootstrap v5.2 -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

		<!-- Chart.js -->
		<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

		<!-- CDN SweetAlert -->
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

		<!-- My JS Configuration -->
		<script src="../dist/js/main.js"></script>

		<script>
			const ctx = document.getElementById("myChart").getContext("2d");
			const myChart = new Chart(ctx, {
				data: {
					labels: ["Red", "Blue", "Yellow", "Green", "Purple"],
					datasets: [
						{
							type: "bar",
							label: "# of Votes",
							data: [12, 19, 3, 5, 2],
							backgroundColor: ["rgba(255, 99, 132, 0.2)", "rgba(54, 162, 235, 0.2)", "rgba(255, 206, 86, 0.2)", "rgba(75, 192, 192, 0.2)", "rgba(153, 102, 255, 0.2)", "rgba(255, 159, 64, 0.2)"],
							borderColor: ["rgba(255, 99, 132, 1)", "rgba(54, 162, 235, 1)", "rgba(255, 206, 86, 1)", "rgba(75, 192, 192, 1)", "rgba(153, 102, 255, 1)", "rgba(255, 159, 64, 1)"],
							borderWidth: 1,
						},
						{
							type: "line",
							label: "# of Votes",
							data: [12, 19, 3, 5, 2],
							backgroundColor: ["rgba(255, 99, 132, 0.2)", "rgba(54, 162, 235, 0.2)", "rgba(255, 206, 86, 0.2)", "rgba(75, 192, 192, 0.2)", "rgba(153, 102, 255, 0.2)", "rgba(255, 159, 64, 0.2)"],
							borderColor: ["rgba(255, 99, 132, 1)", "rgba(54, 162, 235, 1)", "rgba(255, 206, 86, 1)", "rgba(75, 192, 192, 1)", "rgba(153, 102, 255, 1)", "rgba(255, 159, 64, 1)"],
							borderWidth: 1,
						},
					],
				},
				options: {
					scales: {
						y: {
							beginAtZero: true,
						},
					},
				},
			});

			// Change password
			$(document).ready(function () {
				$("#updatePassAdmin").prop("disabled", true);

				$("#newPasswordAdmin, #repeatPasswordAdmin").keyup(function () {
					if ($("#newPasswordAdmin").val() == "" && $("#repeatPasswordAdmin").val() == "") {
						$(':input[type="submit"]').prop("disabled", true);
					} else if ($("#newPasswordAdmin").val() == $("#repeatPasswordAdmin").val()) {
						$(':input[type="submit"]').prop("disabled", false);
					} else {
						$("#updatePassAdmin").prop("disabled", true);
					}
				});
			});
		</script>
	</body>
</html>
