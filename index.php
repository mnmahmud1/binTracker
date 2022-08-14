<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<meta name="description" content="" />
		<meta name="author" content="" />

		<title>Overview | BinTracker</title>

		<!-- Custom fonts for this template-->
		<link href="dist/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
		<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

		<!-- Kit font awesome -->
		<script src="https://kit.fontawesome.com/b676a664d2.js" crossorigin="anonymous"></script>

		<!-- Custom styles for this template-->
		<link href="dist/css/sb-admin-2.min.css" rel="stylesheet" />

		<!-- Boootstrap v5.2 -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />

		<!-- My configuration css -->
		<link rel="stylesheet" href="dist/css/style.css" />
	</head>

	<body id="page-top">

		<!-- Preloader -->
		<div class="preloader">
			<div class="loading">
				<img src="dist/img/load.svg" width="80">
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
				<li class="nav-item active">
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
				<li class="nav-item">
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
				<div id="content">

					<!-- Begin Page Content -->
					<div class="container-fluid mt-4">
						<!-- Page Heading -->
						<nav aria-label="breadcrumb" class="mb-4">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php">BinTracker</a></li>
								<li class="breadcrumb-item active" aria-current="page">Overview</li>
							</ol>
						</nav>
						<h1 class="h4 mb-4 fw-bold text-gray-800">Overview - Wisata Curug Ciherang Sukamakmur</h1>

						<div class="row">
							<!-- Devices -->
							<div class="col-sm-3 mb-2">
								<div class="card text-center">
									<div class="card-body">
										<div class="card-title">Devices</div>
										<h1 class="fw-bold">15</h1>
									</div>
								</div>
							</div>

							<!-- Trash Full -->
							<div class="col-sm-3 mb-2">
								<div class="card text-center">
									<div class="card-body">
										<div class="card-title">Trash Full</div>
										<h1 class="fw-bold">4</h1>
									</div>
								</div>
							</div>

							<!-- Need Maintenance -->
							<div class="col-sm-3 mb-2">
								<div class="card text-center">
									<div class="card-body">
										<div class="card-title">Maintenance</div>
										<h1 class="fw-bold">2</h1>
									</div>
								</div>
							</div>

							<!-- Lost Contact -->
							<div class="col-sm-3 mb-2">
								<div class="card text-center">
									<div class="card-body">
										<div class="card-title">Lost Contact</div>
										<h1 class="fw-bold">3</h1>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</div>
				<!-- End of Main Content -->

				<div class="content mb-2">
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

				<div class="content">
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
											<button class="btn btn-link text-decoration-none fs8" onclick="window.location.href='#'">View All</a>
										</div>

										<ul class="list-group list-group-flush">
											<li class="list-group-item">
												<div class="d-flex justify-content-between">
													<span>Device ID157AB3</span>
													<span class="fs8 tcgray">Registered at 23/05/22 04:32 PM</span>
												</div>
											</li>
											<li class="list-group-item">
												<div class="d-flex justify-content-between">
													<span>Device ID157AB3</span>
													<span class="fs8 tcgray">Registered at 23/05/22 04:32 PM</span>
												</div>
											</li>
											<li class="list-group-item">
												<div class="d-flex justify-content-between">
													<span>Device ID157AB3</span>
													<span class="fs8 tcgray">Registered at 23/05/22 04:32 PM</span>
												</div>
											</li>
											<li class="list-group-item">
												<div class="d-flex justify-content-between">
													<span>Device ID157AB3</span>
													<span class="fs8 tcgray">Registered at 23/05/22 04:32 PM</span>
												</div>
											</li>
											<li class="list-group-item">
												<div class="d-flex justify-content-between">
													<span>Device ID157AB3</span>
													<span class="fs8 tcgray">Registered at 23/05/22 04:32 PM</span>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="card mb-3">
									<div class="card-body">
										<div class="p-3 d-flex justify-content-between align-items-baseline">
											<h6 class="card-title fw-bold">
												History <br>
												<span class="fs8 tcgray">Today</span>
											</h6>
											<button class="btn btn-link text-decoration-none fs8" onclick="window.location.href='#'">View All</a>
										</div>
										
										<ul class="list-group list-group-flush">
											<li class="list-group-item">
												<div class="row justify-content-between align-items-baseline">
													<div class="col">
														<span>Device ID157AB3</span>
													</div>
													<div class="col text-start">
														<span class="fs8 tcgray">08:41 PM</span>
													</div>
													<div class="col text-end">
														<span class="badge rounded-pill text-bg-success px-3">30/100</span>
													</div>
												</div>
											</li>
											<li class="list-group-item">
												<div class="row justify-content-between align-items-baseline">
													<div class="col">
														<span>Device ID157AB3</span>
													</div>
													<div class="col text-start">
														<span class="fs8 tcgray">08:41 PM</span>
													</div>
													<div class="col text-end">
														<span class="badge rounded-pill text-bg-success px-3">30/100</span>
													</div>
												</div>
											</li>
											<li class="list-group-item">
												<div class="row justify-content-between align-items-baseline">
													<div class="col">
														<span>Device ID157AB3</span>
													</div>
													<div class="col text-start">
														<span class="fs8 tcgray">08:41 PM</span>
													</div>
													<div class="col text-end">
														<span class="badge rounded-pill text-bg-success px-3">30/100</span>
													</div>
												</div>
											</li>
											<li class="list-group-item">
												<div class="row justify-content-between align-items-baseline">
													<div class="col">
														<span>Device ID157AB3</span>
													</div>
													<div class="col text-start">
														<span class="fs8 tcgray">08:41 PM</span>
													</div>
													<div class="col text-end">
														<span class="badge rounded-pill text-bg-success px-3">30/100</span>
													</div>
												</div>
											</li>
											<li class="list-group-item">
												<div class="row justify-content-between align-items-baseline">
													<div class="col">
														<span>Device ID157AB3</span>
													</div>
													<div class="col text-start">
														<span class="fs8 tcgray">08:41 PM</span>
													</div>
													<div class="col text-end">
														<span class="badge rounded-pill text-bg-success px-3">30/100</span>
													</div>
												</div>
											</li>
											
											
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

		<!-- Bootstrap core JavaScript-->
		<script src="dist/vendor/jquery/jquery.min.js"></script>
		<script src="dist/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

		<!-- Core plugin JavaScript-->
		<script src="dist/vendor/jquery-easing/jquery.easing.min.js"></script>

		<!-- Custom scripts for all pages-->
		<script src="dist/js/sb-admin-2.min.js"></script>

		<!-- Boootstrap v5.2 -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

		<!-- Chart.js -->
		<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

		<!-- CDN SweetAlert -->
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

		<!-- My JS Configuration -->
		<script src="dist/js/main.js"></script>

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
		</script>
	</body>
</html>
