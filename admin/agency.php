<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<meta name="description" content="" />
		<meta name="author" content="" />

		<title>Admin Agency | BinTracker</title>

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
				<li class="nav-item active">
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
				<div id="content" class="px-2 mb-5">
					<!-- Begin Page Content -->
					<div class="container-fluid mt-4">
						<!-- Page Heading -->
						<nav aria-label="breadcrumb" class="mb-4">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php">BinTracker</a></li>
								<li class="breadcrumb-item active" aria-current="page">Agency</li>
							</ol>
						</nav>
						<h1 class="h4 mb-4 fw-bold text-gray-800">Agency</h1>

						<div class="row">
							<div class="col">
								<div class="card">
									<div class="card-body">
										<div class="row d-flex justify-content-between align-items-center mb-4">
											<div class="col text-start">
												<span class="h6 fw-bold text-gray-800"> Registered Agency List </span>
											</div>
											<div class="col text-end">
												<!-- BTN Modal Pair #1 -->
												<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
													Add New Agency
												</button>
											</div>
										</div>

										<table class="display" id="table-registered-agency">
											<thead>
												<tr>
													<th>#</th>
													<th>Name</th>
													<th>Adopted Devices</th>
													<th>Status</th>
													<th>Register Date</th>
													<th></th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>1</td>
													<td>Wisata Curug Ciherang Sukamakmur</td>
													<td>15</td>
													<td>
														<span class="badge rounded-pill text-bg-success px-3">ACTIVE</span>
													</td>
													<td class="tcgray">Registered at 23/05/22 04:32 PM</td>
													<td>
														<!-- Default dropend button -->
														<button type="button" class="btn btn-sm btn-white" data-bs-toggle="dropdown">
															<i class="fa-solid fa-ellipsis-vertical"></i>
														</button>
														<ul class="dropdown-menu">
															<!-- Dropdown menu links -->
															<li><a class="dropdown-item" href="details-agency.php">Details</a></li>
															<li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteAgency">Delete</button></li>
														</ul>
													</td>
												</tr>
												<tr>
													<td>2</td>
													<td>PT. Abadi Sejahtera Steel</td>
													<td>4</td>
													<td>
														<span class="badge rounded-pill text-bg-success px-3">ACTIVE</span>
													</td>
													<td class="tcgray">Registered at 23/05/22 04:32 PM</td>
													<td>
														<!-- Default dropend button -->
														<button type="button" class="btn btn-sm btn-white" data-bs-toggle="dropdown">
															<i class="fa-solid fa-ellipsis-vertical"></i>
														</button>
														<ul class="dropdown-menu">
															<!-- Dropdown menu links -->
															<li><a class="dropdown-item" href="details-agency.php">Details</a></li>
															<li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteAgency">Delete</button></li>
														</ul>
													</td>
												</tr>
												<tr>
													<td>3</td>
													<td>Kebun Raya Cibodas</td>
													<td>25</td>
													<td>
														<span class="badge rounded-pill text-bg-warning px-3">INACTIVE</span>
													</td>
													<td class="tcgray">Registered at 23/05/22 04:32 PM</td>
													<td>
														<!-- Default dropend button -->
														<button type="button" class="btn btn-sm btn-white" data-bs-toggle="dropdown">
															<i class="fa-solid fa-ellipsis-vertical"></i>
														</button>
														<ul class="dropdown-menu">
															<!-- Dropdown menu links -->
															<li><a class="dropdown-item" href="details-agency.php">Details</a></li>
															<li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteAgency">Delete</button></li>
														</ul>
													</td>
												</tr>
												<tr>
													<td>4</td>
													<td>Taman Satwa Ragunan</td>
													<td>14</td>
													<td>
														<span class="badge rounded-pill text-bg-success px-3">ACTIVE</span>
													</td>
													<td class="tcgray">Registered at 23/05/22 04:32 PM</td>
													<td>
														<!-- Default dropend button -->
														<button type="button" class="btn btn-sm btn-white" data-bs-toggle="dropdown">
															<i class="fa-solid fa-ellipsis-vertical"></i>
														</button>
														<ul class="dropdown-menu">
															<!-- Dropdown menu links -->
															<li><a class="dropdown-item" href="details-agency.php">Details</a></li>
															<li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteAgency">Delete</button></li>
														</ul>
													</td>
												</tr>
												<tr>
													<td>5</td>
													<td>Taman Safari Puncak Bogor</td>
													<td>32</td>
													<td>
														<span class="badge rounded-pill text-bg-success px-3">ACTIVE</span>
													</td>
													<td class="tcgray">Registered at 23/05/22 04:32 PM</td>
													<td>
														<!-- Default dropend button -->
														<button type="button" class="btn btn-sm btn-white" data-bs-toggle="dropdown">
															<i class="fa-solid fa-ellipsis-vertical"></i>
														</button>
														<ul class="dropdown-menu">
															<!-- Dropdown menu links -->
															<li><a class="dropdown-item" href="details-agency.php">Details</a></li>
															<li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteAgency">Delete</button></li>
														</ul>
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

		<!-- Modal Add Agency #1 -->
		<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="deleteAgencyLabel">Register New Agency</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<form action="#" method="POST">
						<div class="modal-body">
							<div class="mb-4">
								<label for="name" class="form-label fw-bolder tcgray">AGENCY NAME</label>
								<input type="text" name="name" id="name" class="form-control p-3" placeholder="Agency name" maxlength="30" autofocus required />
							</div>
							<div class="row">
								<div class="col-sm-6 mb-4">
									<label for="bussinesField" class="form-label fw-bolder tcgray">BUSSINES FIELD</label>
									<input type="text" name="bussinesField" id="bussinesField" class="form-control p-3" placeholder="Agency bussines field" required />
								</div>
								<div class="col-sm-6 mb-4">
									<label for="addresses" class="form-label fw-bolder tcgray">ADDRESSES</label>
									<input type="text" name="addresses" id="addresses" class="form-control p-3" placeholder="Agency addreses" required />
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6 mb-4">
									<label for="mail" class="form-label fw-bolder tcgray">EMAIL</label>
									<input type="email" name="mail" id="mail" class="form-control p-3" placeholder="Agency email" required />
								</div>
								<div class="col-sm-6 mb-4">
									<label for="phone" class="form-label fw-bolder tcgray">PHONE</label>
									<input type="tel" name="phone" id="phone" class="form-control p-3" placeholder="Agency phone" required />
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4 mb-4">
									<label for="username" class="form-label fw-bolder tcgray">USERNAME</label>
									<input type="text" name="username" id="username" class="form-control p-3" placeholder="Username" required />
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
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
							<button type="submit" name="regAgency" id="regAgency" class="btn btn-primary">Add Agency</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<!-- Modal Delete Agency #2 -->
		<div class="modal fade" id="deleteAgency" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteAgencyLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<form action="" method="post">
						<div class="modal-header">
							<h5 class="modal-title" id="deleteAgencyLabel">Are you absolutely sure?</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<p>Please type <span class="fw-bold" id="nameAgency">mnmahmud1/calcMath</span> to confirm.</p>
							<input type="text" name="typeAgency" id="typeAgency" class="form-control border-danger" placeholder="Enter your 6 digit device unique code" autofocus autocomplete="off" required />
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
							<button type="submit" name="deleteAgency" id="deleteAgency" class="btn btn-danger">Delete this agency</button>
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
			// Sign Up Function
			$(document).ready(function () {
				$(':input[type="submit"]').prop('disabled', true);

				$('#nameAgency, #typeAgency').keyup(function () {
					if ($('#nameAgency').text() == '' && $('#typeAgency').val() == '') {
						$(':input[type="submit"]').prop('disabled', true);
					} else if ($('#nameAgency').text() == $('#typeAgency').val()) {
						$(':input[type="submit"]').prop('disabled', false);
					} else {
						$(':input[type="submit"]').prop('disabled', true);
					}
				});
			});
		</script>
	</body>
</html>
