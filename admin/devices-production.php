<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<meta name="description" content="" />
		<meta name="author" content="" />

		<title>Admin Devices Production | BinTracker</title>

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

		<!-- Leaflet Map JS -->
		<link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin="" />

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
				<li class="nav-item active">
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
				<div id="content" class="px-2 mb-5">
					<!-- Begin Page Content -->
					<div class="container-fluid mt-4">
						<!-- Page Heading -->
						<nav aria-label="breadcrumb" class="mb-4">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php">BinTracker</a></li>
								<li class="breadcrumb-item active" aria-current="page">Devices Production</li>
							</ol>
						</nav>
						<h1 class="h4 mb-4 fw-bold text-gray-800">Devices Production</h1>

						<div class="row">
							<!-- Devices -->
							<div class="col mb-2">
								<div class="card text-center">
									<div class="card-body">
										<div class="card-title">Devices</div>
										<h1 class="fw-bold">5</h1>
									</div>
								</div>
							</div>

							<!-- Need Maintenance -->
							<div class="col mb-2">
								<div class="card text-center">
									<div class="card-body">
										<div class="card-title">Need Maintenance</div>
										<h1 class="fw-bold">23</h1>
									</div>
								</div>
							</div>

							<!-- Lost Contact -->
							<div class="col mb-2">
								<div class="card text-center">
									<div class="card-body">
										<div class="card-title">Lost Contact</div>
										<h1 class="fw-bold">13</h1>
									</div>
								</div>
							</div>
						</div>

						<div class="row mb-3">
							<div class="col">
								<div class="card">
									<div class="card-body shadow" id="map"></div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col">
								<div class="card">
									<div class="card-body">
										<div class="row mb-4 justify-content-between align-items-baseline">
											<div class="col text-start">
												<span class="h6 fw-bold text-gray-800"> Devices List </span>
											</div>
											<div class="col text-end">
												<!-- Button trigger modal Connect Devices -->
												<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#connectDevice"><i class="fa-solid fa-link"></i> Connect Device</button>
											</div>
										</div>

										<table class="display" id="table-device">
											<thead>
												<tr>
													<th>#</th>
													<th>Device ID</th>
													<th>Status</th>
													<th>Age</th>
													<th>Adopted by</th>
													<th></th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>1</td>
													<td>
														Device ID1AE413 <br />
														<span class="tcgray fs8"> Registered at 23/05/22 04:32 PM</span>
													</td>
													<td>
														<span class="badge rounded-pill text-bg-success px-3">ACTIVE</span>
													</td>
													<td>1 Month 3 days</td>
													<td class="tcgray">Kebun Raya Cibodas</td>
													<td>
														<!-- Default dropend button -->
														<button type="button" class="btn btn-sm btn-white" data-bs-toggle="dropdown">
															<i class="fa-solid fa-ellipsis-vertical"></i>
														</button>
														<ul class="dropdown-menu">
															<!-- Dropdown menu links -->
															<li><a class="dropdown-item" href="device-production-details.php">Details</a></li>
															<li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#transferDevice">Transfer</button></li>
															<li><button class="dropdown-item" onclick="return alertModal('includes/php/functionInstance.php?logout=1', 'Disconnect', 'After disconnect this device must be readopting to use again!')">Disconnect</button></li>
														</ul>
													</td>
												</tr>
												<tr>
													<td>2</td>
													<td>
														Device ID1AE413 <br />
														<span class="tcgray fs8"> Registered at 23/05/22 04:32 PM</span>
													</td>
													<td>
														<span class="badge rounded-pill text-bg-success px-3">ACTIVE</span>
													</td>
													<td>2 Month 1 days</td>
													<td class="tcgray">Kebun Raya Cibodas</td>
													<td>
														<!-- Default dropend button -->
														<button type="button" class="btn btn-sm btn-white" data-bs-toggle="dropdown">
															<i class="fa-solid fa-ellipsis-vertical"></i>
														</button>
														<ul class="dropdown-menu">
															<!-- Dropdown menu links -->
															<li><a class="dropdown-item" href="device-production-details.php">Details</a></li>
															<li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#transferDevice">Transfer</button></li>
															<li><button class="dropdown-item" onclick="return alertModal('includes/php/functionInstance.php?logout=1', 'Disconnect', 'After disconnect this device must be readopting to use again!')">Disconnect</button></li>
														</ul>
													</td>
												</tr>
												<tr>
													<td>3</td>
													<td>
														Device ID1AE413 <br />
														<span class="tcgray fs8"> Registered at 23/05/22 04:32 PM</span>
													</td>
													<td>
														<span class="badge rounded-pill text-bg-secondary px-3">MAINTENANCE</span>
													</td>
													<td>23 days</td>
													<td class="tcgray">Wisata Curug Ciherang Sukamakmur</td>
													<td>
														<!-- Default dropend button -->
														<button type="button" class="btn btn-sm btn-white" data-bs-toggle="dropdown">
															<i class="fa-solid fa-ellipsis-vertical"></i>
														</button>
														<ul class="dropdown-menu">
															<!-- Dropdown menu links -->
															<li><a class="dropdown-item" href="device-production-details.php">Details</a></li>
															<li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#transferDevice">Transfer</button></li>
															<li><button class="dropdown-item" onclick="return alertModal('includes/php/functionInstance.php?logout=1', 'Disconnect', 'After disconnect this device must be readopting to use again!')">Disconnect</button></li>
														</ul>
													</td>
												</tr>
												<tr>
													<td>4</td>
													<td>
														Device ID1AE413 <br />
														<span class="tcgray fs8"> Registered at 23/05/22 04:32 PM</span>
													</td>
													<td>
														<span class="badge rounded-pill text-bg-danger px-3">LOST</span>
													</td>
													<td>14 days</td>
													<td class="tcgray">Taman Satwa Ragunan</td>
													<td>
														<!-- Default dropend button -->
														<button type="button" class="btn btn-sm btn-white" data-bs-toggle="dropdown">
															<i class="fa-solid fa-ellipsis-vertical"></i>
														</button>
														<ul class="dropdown-menu">
															<!-- Dropdown menu links -->
															<li><a class="dropdown-item" href="device-production-details.php">Details</a></li>
															<li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#transferDevice">Transfer</button></li>
															<li><button class="dropdown-item" onclick="return alertModal('includes/php/functionInstance.php?logout=1', 'Disconnect', 'After disconnect this device must be readopting to use again!')">Disconnect</button></li>
														</ul>
													</td>
												</tr>
												<tr>
													<td>5</td>
													<td>
														Device ID1AE413 <br />
														<span class="tcgray fs8"> Registered at 23/05/22 04:32 PM</span>
													</td>
													<td>
														<span class="badge rounded-pill text-bg-success px-3">ACTIVE</span>
													</td>
													<td>8 days</td>
													<td class="tcgray">Taman Safari Puncak Bogor</td>
													<td>
														<!-- Default dropend button -->
														<button type="button" class="btn btn-sm btn-white" data-bs-toggle="dropdown">
															<i class="fa-solid fa-ellipsis-vertical"></i>
														</button>
														<ul class="dropdown-menu">
															<!-- Dropdown menu links -->
															<li><a class="dropdown-item" href="device-production-details.php">Details</a></li>
															<li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#transferDevice">Transfer</button></li>
															<li><button class="dropdown-item" onclick="return alertModal('includes/php/functionInstance.php?logout=1', 'Disconnect', 'After disconnect this device must be readopting to use again!')">Disconnect</button></li>
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

		<!-- Modal Pair #1 -->
		<div class="modal fade" id="connectDevice" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="connectDeviceLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="connectDeviceLabel">Enter Unique Code</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<label for="code" class="form-label fw-bold text-gray-800">UNIQUE CODE</label>
						<input type="text" name="code" id="code" class="form-control" maxlength="6" placeholder="Enter your 6 digit device unique code" autofocus required />
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Connect</button>
					</div>
				</div>
			</div>
		</div>

		<!-- Modal Transfer Device #2 -->
		<div class="modal fade" id="transferDevice" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="transferDeviceLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<form action="" method="post">
						<div class="modal-header">
							<h5 class="modal-title" id="transferDeviceLabel">Transfer Device</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col">
									<label for="startAgency" class="form-label fw-bolder text-gray-800">From</label>
									<input type="text" name="startAgency" id="startAgency" class="form-control" value="Kebun Raya Cibodas" readonly />
								</div>
								<div class="col-1 d-flex align-items-center">
									<i class="fa-solid fa-arrow-right-long"></i>
								</div>
								<div class="col">
									<label for="endAgency" class="form-label fw-bolder text-gray-800">To</label>
									<input name="endAgency" id="endAgency" list="datalistAgency" class="form-select" placeholder="Live search agency" required />
									<datalist id="datalistAgency">
										<option value="Kebun Raya Cibodas"></option>
										<option value="PT. Artaboga Semesta"></option>
										<option value="Seattle"></option>
										<option value="Los Angeles"></option>
										<option value="Chicago"></option>
									</datalist>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
							<button type="submit" name="transferDevice" class="btn btn-primary">Transfer</button>
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

		<!-- Leaflet JS -->
		<script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>

		<!-- Local Script JS -->
		<script>
			window.onload = getLocation;

			// Get My Location
			function getLocation() {
				if (navigator.geolocation) {
					navigator.geolocation.getCurrentPosition(showPosition);
				} else {
					x.innerHTML = "Your browser is not Support!";
				}
			}

			function showPosition(position) {
				var map = L.map("map").setView([position.coords.latitude, position.coords.longitude], 13);

				L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
					maxZoom: 18,
					id: "mapbox/streets-v11",
				}).addTo(map);

				// create a custom icon
				var greenIcon = L.icon({
					iconUrl: "../dist/img/icon.png",

					iconSize: [45, 52], // size of the icon
					iconAnchor: [22, 94], // point of the icon which will correspond to marker's location
					shadowAnchor: [4, 62], // the same for the shadow
					popupAnchor: [-3, -76], // point from which the popup should open relative to the iconAnchor
				});

				let markerMe = L.marker([position.coords.latitude, position.coords.longitude], { icon: greenIcon }).addTo(map);
				markerMe.bindPopup("Lokasi Anda").openPopup();
			}
		</script>

		<!-- My JS Configuration -->
		<script src="../dist/js/main.js"></script>
	</body>
</html>
