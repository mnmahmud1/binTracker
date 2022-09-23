<?php

	if(!isset($_COOKIE["signin"])) {
		header("Location: signin.php");
	}

	require 'conn.php';
	
	$username = $_COOKIE["signin"];
	$checkName = mysqli_fetch_assoc(mysqli_query($conn, "SELECT name FROM users WHERE username = '$username'"));

	$callDevices = mysqli_query($conn, "SELECT devices.code, history.volume, devices.description, devices.created_at FROM history INNER JOIN devices ON devices.id = history.id_device WHERE history.id IN (SELECT MAX(id) FROM history GROUP BY id_device) AND history.id_user = (SELECT id FROM users WHERE username = '$username')");

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<meta name="description" content="" />
		<meta name="author" content="" />

		<title>Devices | BinTracker</title>

		<!-- Custom fonts for this template-->
		<link href="dist/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
		<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

		<!-- Kit font awesome -->
		<script src="https://kit.fontawesome.com/b676a664d2.js" crossorigin="anonymous"></script>

		<!-- Custom styles for this template-->
		<link href="dist/css/sb-admin-2.min.css" rel="stylesheet" />

		<!-- Boootstrap v5.2 -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />

		<!-- Datatables -->
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css" />

		<!-- My configuration css -->
		<link rel="stylesheet" href="dist/css/style.css" />
	</head>

	<body id="page-top">
		<!-- Preloader -->
		<div class="preloader">
			<div class="loading">
				<img src="dist/img/load.svg" width="80" />
				<p>Loading</p>
			</div>
		</div>

		<?php if(isset($_COOKIE["pairDevice"]) && $_COOKIE["pairDevice"] == "success") : ?>
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
							<strong>Successfully</strong> paired device!
						</div>
					</div>
				</div>
			</div>
		<?php elseif(isset($_COOKIE["pairDevice"]) && $_COOKIE["pairDevice"] == "failed") : ?>
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
							<strong>Failed</strong> paired device! or Not Found
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
				<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
					<div class="sidebar-brand-icon rotate-n-15">
						<i class="fa-solid fa-b"></i>
					</div>
					<div class="sidebar-brand-text mx-3">BinTracker</div>
				</a>

				<!-- Nav Item  -->
				<li class="nav-item">
					<a class="nav-link" href="index.php">
						<i class="fas fa-fw fa-tachometer-alt ml-3 mr-2"></i>
						<span>Overview</span></a
					>
				</li>

				<!-- Nav Item  -->
				<li class="nav-item">
					<a class="nav-link" href="mapping.php">
						<i class="fa-solid fa-map-location-dot ml-3 mr-2"></i>
						<span>Mapping</span></a
					>
				</li>

				<!-- Nav Item  -->
				<li class="nav-item active">
					<a class="nav-link" href="devices.php">
						<i class="fa-solid fa-hard-drive ml-3 mr-2"></i>
						<span>Devices</span></a
					>
				</li>

				<!-- Nav Item  -->
				<li class="nav-item">
					<a class="nav-link" href="history.php">
						<i class="fa-solid fa-clock-rotate-left ml-3 mr-2"></i>
						<span>History</span></a
					>
				</li>

				<!-- Nav Item  -->
				<li class="nav-item">
					<a class="nav-link" href="profiles.php">
						<i class="fa-solid fa-circle-user ml-3 mr-2"></i>
						<span>Profiles</span></a
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
				<div id="content">
					<!-- Begin Page Content -->
					<div class="container-fluid mt-4">
						<!-- Page Heading -->
						<nav aria-label="breadcrumb" class="mb-4">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php">BinTracker</a></li>
								<li class="breadcrumb-item active" aria-current="page">Devices</li>
							</ol>
						</nav>
						<h1 class="h4 mb-4 fw-bold text-gray-800">Devices - <?= $checkName['name'] ?></h1>

						<div class="row">
							<div class="col">
								<div class="card">
									<div class="card-body">
										<div class="row d-flex justify-content-between align-items-center mb-4">
											<div class="col text-start">
												<span class="h6 fw-bold text-gray-800"> Devices List </span>
											</div>
											<div class="col text-end">
												<!-- BTN Modal Pair #1 -->
												<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
													<i class="fa-solid fa-link"></i>
													Pair New Device
												</button>
											</div>
										</div>

										<table class="display" id="table-device">
											<thead>
												<tr>
													<th>#</th>
													<th>Device</th>
													<th>Status</th>
													<th>Description</th>
													<th>Registered at</th>
												</tr>
											</thead>
											<tbody>
												<?php $i=1; foreach ($callDevices as $device) : ?>
													<tr>
														<td><?= $i ?></td>
														<td>Device ID<span class="fw-bold"><?= $device['code'] ?></span></td>
														<td>
															<?php if($device['volume'] < 100 ) : ?>
																<span class="badge rounded-pill text-bg-success px-3"><?= $device['volume'] ?>/100</span>
															<?php elseif($device['volume'] == 100 ) : ?>
																<span class="badge rounded-pill text-bg-warning px-3">FULL</span>
															<?php endif ?>
														</td>
														<td><?= $device['description'] ?></td>
														<td class="tcgray"><?= date('Y-m-d g:i A', strtotime($device['created_at'])) ?></td>
													</tr>
												<?php $i++; endforeach ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</div>
				<!-- End of Main Content -->

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

		<!-- Modal Pair #1 -->
		<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<form action="function.php" method="post">
						<div class="modal-header">
							<h5 class="modal-title" id="staticBackdropLabel">Enter Unique Code</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<label for="code" class="form-label fw-bolder text-gray-800">Unique Code</label>
							<input type="text" name="code" id="code" class="form-control" maxlength="6" placeholder="Enter your 6 digit device unique code" autofocus required />
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-white" data-bs-dismiss="modal" tabindex="1">Close</button>
							<button type="submit" name="pairDevice" class="btn btn-primary">Pair</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<!-- Bootstrap core JavaScript-->
		<!-- <script src="vendor/jquery/jquery.min.js"></script> -->
		<script src="dist/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

		<!-- Jquery 3.6.0 -->
		<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

		<!-- Core plugin JavaScript-->
		<script src="dist/vendor/jquery-easing/jquery.easing.min.js"></script>

		<!-- Custom scripts for all pages-->
		<script src="dist/js/sb-admin-2.min.js"></script>

		<!-- Boootstrap v5.2 -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

		<!-- Datatables -->
		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>

		<!-- CDN SweetAlert -->
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

		<!-- My JS Configuration -->
		<script src="dist/js/main.js"></script>
	</body>
</html>
