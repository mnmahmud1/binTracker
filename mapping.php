<?php

	if(!isset($_COOKIE["signin"])) {
		header("Location: signin.php");
	}

	require 'conn.php';
	date_default_timezone_set("Asia/Jakarta");
	
	$username = $_COOKIE["signin"];
	$checkName = mysqli_fetch_assoc(mysqli_query($conn, "SELECT name FROM users WHERE username = '$username'"));

	$callDevices = mysqli_query($conn, "SELECT devices.code, history.volume, devices.description, history.created_at FROM history INNER JOIN devices ON devices.id = history.id_device WHERE history.id IN (SELECT MAX(id) FROM history GROUP BY id_device) AND history.id_user = (SELECT id FROM users WHERE username = '$username')");
	$callLocationDevice = mysqli_query($conn, "SELECT devices.code, devices.loc_lat, devices.loc_long FROM devices INNER JOIN history ON history.id_device = devices.id WHERE history.adopt IN (SELECT history.adopt FROM history GROUP BY history.id_user) AND history.id_user = (SELECT id FROM users WHERE username = '$username')");
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<meta name="description" content="" />
		<meta name="author" content="" />

		<title>Mapping | BinTracker</title>

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

		<!-- Leaflet Map JS -->
		<link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin="" />

		<!-- Leaflet Routing Machine -->
		<link rel="stylesheet" href="dist/js/leaflet-routing-machine.css" />

		<!-- My configuration css -->
		<link rel="stylesheet" href="dist/css/style.css" />

		<!-- Example Code Bootstrap 5.2 -->
		<link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">

		<!-- Boootstrap v5.2 -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
	</head>

	<body id="page-top">
		<!-- Preloader -->
		<div class="preloader">
			<div class="loading">
				<img src="dist/img/load.svg" width="80" />
				<p>Loading</p>
			</div>
		</div>

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
				<li class="nav-item active">
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
								<li class="breadcrumb-item active" aria-current="page">Mapping</li>
							</ol>
						</nav>
						<h1 class="h4 mb-4 fw-bold text-gray-800">Mapping - <?= $checkName['name'] ?></h1>

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
										<div class="row mb-4">
											<div class="col d-flex justify-content-between align-baseline">
												<span class="h6 fw-bold text-gray-800"> Devices List </span>
												<button type="button" class="btn btn-sm btn-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Reload Tracking" onclick="window.location.href = 'function.php?deleteCookieLoc=1'">
													<i class="fa-solid fa-rotate"></i>
												</button>
												<div class="form-check form-switch">
													<?php if($_COOKIE['autoRef'] == '1') : ?>
														<input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
													<?php else : ?>
														<input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked">
													<?php endif ?>
													<label class="form-check-label" for="flexSwitchCheckChecked">Auto Refresh</label>
												</div>
											</div>
										</div>

										<table class="display" id="table-device">
											<thead>
												<tr>
													<th>#</th>
													<th>Device</th>
													<th>Status</th>
													<th>Description</th>
													<th>Last Checked</th>
												</tr>
											</thead>
											<tbody>
												<?php $i=1; foreach ($callDevices as $device) : ?>
													<tr>
														<td><?= $i ?></td>
														<td>Device ID <span class="fw-bold"><?= $device['code'] ?></span> </td>
														<td>
															<?php
																$now_date = date('Y-m-d H:i:s'); // the current date
																$date1 = $device['created_at'];
																$timestamp1 = strtotime($date1);
																$timestamp2 = strtotime($now_date);
																$hour = floor($timestamp2 - $timestamp1)/(60*60);
															?>
															
															<?php if($hour >= 1) : ?>
																<span class="badge rounded-pill bg-danger px-3">MAINTENANCE</span>
															<?php endif ?>

															<?php if($device['volume'] < 75 ) : ?>
																<?php if($device['volume'] < 0 ) : ?>
																	<span class="badge rounded-pill text-bg-success px-3">0/100</span>
																<?php else : ?>
																	<span class="badge rounded-pill text-bg-success px-3"><?= $device['volume'] ?>/100</span>
																<?php endif ?>
															<?php elseif($device['volume'] >= 75 ) : ?>
																<span class="badge rounded-pill text-bg-warning px-3">FULL</span>
															<?php endif ?>
														</td>
														<td><?= $device['description'] ?></td>
														<td class="tcgray"><?= date('Y-m-d g:i A', strtotime($device['created_at'])) ?></td>
														<!-- <td>
															<button class="btn btn-sm btn-light" onclick="return alertModal('includes/php/functionInstance.php?logout=1', 'Delete', 'If you delete maybe any data cant be recovered!')">
																<i class="fa-solid fa-trash"></i>
															</button>
														</td> -->
													</tr>
												<?php $i++; $hour = 0; endforeach ?>
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
					<div class="modal-header">
						<h5 class="modal-title" id="staticBackdropLabel">Enter Unique Code</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<label for="code" class="form-label">Unique Code</label>
						<input type="text" name="code" id="code" class="form-control" style="text-transform: uppercase" maxlength="6" autofocus required />
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Submit</button>
					</div>
				</div>
			</div>
		</div>

		<!-- Bootstrap core JavaScript-->
		<!-- <script src="vendor/jquery/jquery.min.js"></script> -->
		<!-- <script src="dist/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

		<!-- Jquery 3.6.0 -->
		<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

		<!-- Core plugin JavaScript-->
		<script src="dist/vendor/jquery-easing/jquery.easing.min.js"></script>

		<!-- Custom scripts for all pages-->
		<!-- <script src="dist/js/sb-admin-2.min.js"></script> -->

		<!-- Datatables -->
		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>

		<!-- CDN SweetAlert -->
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

		<!-- Leaflet JS -->
		<script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>
		
		<!-- Leaflet Routing Machine -->
		<script src="dist/js/leaflet-routing-machine.js"></script>

		<!-- Jquery Cookie -->
		<script src="dist/js/jquery.cookie.js"></script>

		<!-- Local Script JS -->
		<script>

			<?php if(isset($_COOKIE["trackLat"]) AND isset($_COOKIE["trackLong"])) : ?>
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

					L.Routing.control({
                        waypoints: [L.latLng(position.coords.latitude, position.coords.longitude), L.latLng(<?= $_COOKIE["trackLat"] ?>, <?= $_COOKIE["trackLong"] ?>)],
                        routeWhileDragging: false,
                    }).addTo(map);

					<?php foreach($callLocationDevice as $location) : ?>
						var marker = L.marker([<?= $location["loc_lat"] ?> , <?= $location["loc_long"] ?> ]).addTo(map);
						marker.bindPopup("<?= 'Device ID' . $location["code"] ?>" + "<br> <a href=function.php?trackingNow=1&lat=" + <?= $location["loc_lat"] ?> + "&long=" + <?= $location["loc_long"] ?> + " class='btn btn-sm text-white mt-2 btn-success text-center'> Track Now </a> ").openPopup();
					<?php endforeach ?>
				}
			<?php else : ?>
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

					<?php foreach($callLocationDevice as $location) : ?>
						var marker = L.marker([<?= $location["loc_lat"] ?> , <?= $location["loc_long"] ?> ]).addTo(map);
						marker.bindPopup("<?= 'Device ID' . $location["code"] ?>" + "<br> <a href=function.php?trackingNow=1&lat=" + <?= $location["loc_lat"] ?> + "&long=" + <?= $location["loc_long"] ?> + " class='btn btn-sm text-white mt-2 btn-success text-center'> Track Now </a> ").openPopup();
					<?php endforeach ?>

					// create a custom icon
					var greenIcon = L.icon({
						iconUrl: "dist/img/icon.png",

						iconSize: [45, 52], // size of the icon
						iconAnchor: [22, 94], // point of the icon which will correspond to marker's location
						shadowAnchor: [4, 62], // the same for the shadow
						popupAnchor: [-3, -76], // point from which the popup should open relative to the iconAnchor
					});

					let markerMe = L.marker([position.coords.latitude, position.coords.longitude], { icon: greenIcon }).addTo(map);
					markerMe.bindPopup("Lokasi Anda").openPopup();
					
				}
			<?php endif ?>

			var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
			var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
				return new bootstrap.Tooltip(tooltipTriggerEl)
			})
			
			// Set switch button
			$("#flexSwitchCheckChecked").on('change', function() {
				if ($(this).is(':checked')) {
					$.cookie('autoRef', "1", { expires: 1, path: '/' });
				}
				else {
					$.cookie('autoRef', "0", { expires: 1, path: '/' });
				}
			});

			// Set interval auto refresh 20 detik
			setInterval(function() {
				if($.cookie('autoRef') == '1'){
					location.reload();
				}
			}, 20000);
		</script>

		<!-- My JS Configuration -->
		<script src="dist/js/main.js"></script>
	</body>
</html>
