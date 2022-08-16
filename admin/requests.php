<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<meta name="description" content="" />
		<meta name="author" content="" />

		<title>Admin Requests | BinTracker</title>

		<!-- Custom fonts for this template-->
		<link href="../dist/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
		<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

		<!-- Kit font awesome -->
		<script src="https://kit.fontawesome.com/b676a664d2.js" crossorigin="anonymous"></script>

		<!-- Custom styles for this template-->
		<link href="../dist/css/sb-admin-2.min.css" rel="stylesheet" />

		<!-- Boootstrap v5.2 -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />

		<!-- Datatables -->
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css" />

		<!-- My configuration css -->
		<link rel="stylesheet" href="../dist/css/style.css" />
	</head>

	<body id="page-top">
		<!-- Preloader -->
		<div class="preloader">
			<div class="loading">
				<img src="../dist/img/load.svg" width="80" />
				<p>Loading</p>
			</div>
		</div>

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
				<li class="nav-item">
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
				<li class="nav-item active">
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
					<a class="nav-link" href="#" onclick="return alertModal('includes/php/functionInstance.php?logout=1', 'Sign Out', 'If you sign out maybe any data cant be saved!')">
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
				<div id="content" class="px-2 mb-5">
					<!-- Begin Page Content -->
					<div class="container-fluid mt-4">
						<!-- Page Heading -->
						<nav aria-label="breadcrumb" class="mb-4">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php">BinTracker</a></li>
								<li class="breadcrumb-item active" aria-current="page">Requests</li>
							</ol>
						</nav>
						<h1 class="h4 mb-4 fw-bold text-gray-800">Requests</h1>

						<div class="row">
							<div class="col">
								<div class="card">
									<div class="card-body table-responsive">
										<div class="row d-flex justify-content-between align-items-center mb-4">
											<div class="col text-start">
												<span class="h6 fw-bold text-gray-800"> Requests From Client </span>
											</div>
										</div>

										<table class="display" id="table-request" style="width: 100%">
											<thead>
												<tr>
													<th>#</th>
													<th style="width: 25%">Title</th>
													<th style="width: 35%">Problem/Request</th>
													<th>Time</th>
													<th>Response</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>1</td>
													<td>
														Update our email address <br />
														<span class="fs8 tcgray"> Wisata Curug Ciherang Sukamakmur </span>
													</td>
													<td class="text-break">cscurugciherang@gmail.com to cs1curugciherang@gmail.com</td>
													<td class="tcgray">Reported at 23/05/22 04:32 PM</td>
													<td>
														<button class="btn btn-success badge rounded-pill text-bg-success px-3" onclick="return window.location.href='#'">DONE</button>
													</td>
												</tr>
												<tr>
													<td>2</td>
													<td>
														Update our address <br />
														<span class="fs8 tcgray"> Wisata Curug Ciherang Sukamakmur </span>
													</td>
													<td class="text-break">Sirnajaya, Wargajaya, Kec. Sukamakmur, Kabupaten Bogor, Jawa Barat 16830 to Sirnajaya, War...</td>
													<td class="tcgray">Reported at 23/05/22 04:32 PM</td>
													<td>
														<button class="btn btn-success badge rounded-pill text-bg-success px-3" onclick="return window.location.href='#'">DONE</button>
													</td>
												</tr>
												<tr>
													<td>3</td>
													<td>
														BUG : mail address login <br />
														<span class="fs8 tcgray"> Kebun Raya Cibodas </span>
													</td>
													<td class="text-break">Bug dibagian tracker bin tong sampah</td>
													<td class="tcgray">Reported at 23/05/22 04:32 PM</td>
													<td>
														<span class="badge rounded-pill text-bg-secondary px-3">DONE</span>
													</td>
												</tr>
												<tr>
													<td>4</td>
													<td>
														Update our Agency Name <br />
														<span class="fs8 tcgray"> PT. Abadi Sejahtera Stel </span>
													</td>
													<td class="text-wrap">PT. Abadi Sejahtera Stel to PT. Abadi Sejahtera Steel</td>
													<td class="tcgray">Reported at 23/05/22 04:32 PM</td>
													<td>
														<span class="badge rounded-pill text-bg-secondary px-3">DONE</span>
													</td>
												</tr>
												<tr>
													<td>5</td>
													<td>
														Update our username <br />
														<span class="fs8 tcgray"> Taman Satwa Ragunan </span>
													</td>
													<td class="text-wrap">ragunansatwa to csragunansatwa</td>
													<td class="tcgray">Reported at 23/05/22 04:32 PM</td>
													<td>
														<span class="badge rounded-pill text-bg-secondary px-3">DONE</span>
													</td>
												</tr>
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

		<!-- Modal Change Password Admin #1 -->
		<div class="modal fade" id="changePassword" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="changePasswordLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="changePasswordLabel">Update admin password</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<form action="" method="post">
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
		<!-- <script src="vendor/jquery/jquery.min.js"></script> -->
		<script src="../dist/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

		<!-- Jquery 3.6.0 -->
		<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

		<!-- Core plugin JavaScript-->
		<script src="../dist/vendor/jquery-easing/jquery.easing.min.js"></script>

		<!-- Custom scripts for all pages-->
		<script src="../dist/js/sb-admin-2.min.js"></script>

		<!-- Boootstrap v5.2 -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

		<!-- Datatables -->
		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>

		<!-- CDN SweetAlert -->
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

		<!-- My JS Configuration -->
		<script src="../dist/js/main.js"></script>

		<script>
			// Change password Admin
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
