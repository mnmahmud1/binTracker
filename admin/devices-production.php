<?php

	if(!isset($_COOKIE['signinAdmin'])){
		header('Location: signin.php');
	}

	require '../conn.php';
	date_default_timezone_set("Asia/Jakarta");

	$callDevices = mysqli_query($conn, "SELECT id, code, description, created_at FROM devices");
	$countDevices = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(id) AS value FROM devices"));
	$callAgency = mysqli_query($conn, "SELECT id, name FROM users");

	function calculateDays($value){
		$start  = date_create($value);
		$end    = date_create(); // Current time and date
		$dd   = date_diff( $start, $end );
		
		if($dd->y == 0){
			if($dd->m == 0){
				// Check
				$d = ($dd->d == 1 || $dd->d == 0) ? " day " : " days ";
				
				return $dd->d.$d;
			} else {
				// Check
				$d = ($dd->d == 1 || $dd->d == 0) ? " day " : " days ";
				$m = ($dd->m == 1 || $dd->m == 0) ? " month " : " months ";
				
				return $dd->m.$m.$dd->d.$d;
			}
		} else {
			// Check
			$d = ($dd->d == 1 || $dd->d == 0) ? " day " : " days ";
			$m = ($dd->m == 1 || $dd->m == 0) ? " month " : " months ";
			$y = ($dd->y == 1 || $dd->y == 0) ? " year " : " years ";
			return $dd->y.$y.$dd->m.$m.$dd->d.$d;
		}
	}
	
?>

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

		<?php if(isset($_COOKIE["connectDevice"]) && $_COOKIE["connectDevice"] == "success") : ?>
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
							<strong>Successfully</strong> connect device!
						</div>
					</div>
				</div>
			</div>
		<?php elseif(isset($_COOKIE["connectDevice"]) && $_COOKIE["connectDevice"] == "failed") : ?>
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
							<strong>Failed</strong> connect device!
						</div>
					</div>
				</div>
			</div>
		<?php elseif(isset($_COOKIE["connectDevice"]) && $_COOKIE["connectDevice"] == "failedCode") : ?>
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
						<strong>Code were used on another device</strong>, please create unique code!
						</div>
					</div>
				</div>
			</div>
		<?php endif ?>

		<?php if(isset($_COOKIE["transferDevice"]) && $_COOKIE["transferDevice"] == "success") : ?>
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
							<strong>Successfully</strong> transfer device!
						</div>
					</div>
				</div>
			</div>
		<?php elseif(isset($_COOKIE["transferDevice"]) && $_COOKIE["transferDevice"] == "failed") : ?>
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
							<strong>Failed</strong> transfer device!
						</div>
					</div>
				</div>
			</div>
		<?php endif ?>

		<?php if(isset($_COOKIE["deleteDevice"]) && $_COOKIE["deleteDevice"] == "success") : ?>
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
							<strong>Successfully</strong> delete device!
						</div>
					</div>
				</div>
			</div>
		<?php elseif(isset($_COOKIE["deleteDevice"]) && $_COOKIE["deleteDevice"] == "failed") : ?>
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
							<strong>Failed</strong> delete device!
						</div>
					</div>
				</div>
			</div>
		<?php endif ?>

		<?php if(isset($_COOKIE["disconnectDevice"]) && $_COOKIE["disconnectDevice"] == "success") : ?>
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
							<strong>Successfully</strong> disconnect device!
						</div>
					</div>
				</div>
			</div>
		<?php elseif(isset($_COOKIE["disconnectDevice"]) && $_COOKIE["disconnectDevice"] == "failed") : ?>
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
							<strong>Failed</strong> disconnect device!
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
								<li class="breadcrumb-item active" aria-current="page">Devices Production</li>
							</ol>
						</nav>
						<h1 class="h4 mb-4 fw-bold text-gray-800">Devices Production</h1>

						<div class="row mb-2">
							<!-- Devices -->
							<div class="col mb-2">
								<div class="card text-center">
									<div class="card-body">
										<div class="card-title">Devices</div>
										<h1 class="fw-bold"><?= $countDevices['value'] ?></h1>
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
												<br>
												<span class="fs8 tcgray">All</span>
											</div>
											<div class="col text-end">
												<!-- Button trigger modal Connect Devices -->
												<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#connectDevice"><i class="fa-solid fa-link"></i> Connect Device</button>
											</div>
										</div>

										<!-- <span class="badge rounded-pill text-bg-success px-3">ACTIVE</span>
										<span class="badge rounded-pill text-bg-secondary px-3">MAINTENANCE</span>
										<span class="badge rounded-pill text-bg-danger px-3">LOST</span> -->

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
												<?php $i=1; foreach ($callDevices as $device) : ?>
													<?php
														$deviceID = $device['id'];
														$checkAdopted = mysqli_query($conn, "SELECT users.name, users.id FROM history INNER JOIN users ON history.id_user=users.id WHERE history.id_device = $deviceID ORDER BY history.id DESC LIMIT 1");
														$checkAdoptedDevice = mysqli_fetch_assoc($checkAdopted);
													?>
													<tr>
														<td><?= $i ?></td>
														<td>
															Device ID<?= $device['code'] ?> <br />
															<span class="tcgray fs8"> Registered at <?= date('Y-m-d g:i A', strtotime($device['created_at']))?></span>
														</td>
														<td>
															<?php if(mysqli_num_rows($checkAdopted ) > 0) : ?>
																<span class="badge rounded-pill text-bg-success px-3">ACTIVE</span>
																<?php else : ?>
																	<span class="badge rounded-pill text-bg-warning px-3">CHECKING</span>
															<?php endif ?>
														</td>
														<td><?= calculateDays(date('Y-m-d', strtotime($device['created_at']))) ?></td>
														<?php if(isset($checkAdoptedDevice['name'])) : ?>
															<td class="tcgray"><?= $checkAdoptedDevice['name'] ?></td>
														<?php else : ?>
															<td class="tcgray">Not Adopted</td>
														<?php endif ?>
														<td>
															<!-- Default dropend button -->
															<button type="button" class="btn btn-sm btn-white" data-bs-toggle="dropdown">
																<i class="fa-solid fa-ellipsis-vertical"></i>
															</button>
															<ul class="dropdown-menu">
																<!-- Dropdown menu links -->
																<?php if(isset($checkAdoptedDevice['name'])) : ?>
																	<li><button class="dropdown-item" onclick="urlCookieTo('deviceDetails', '<?= $deviceID ?>', 1)">Details</button></li>
																	<li><button class="dropdown-item" name="transferButton" id="transferButton" data-bs-toggle="modal" data-bs-target="#transferDevice" data-nameagency="<?= $checkAdoptedDevice['name'] ?>" data-idagency="<?= $checkAdoptedDevice['id'] ?>" data-iddevice="<?= $deviceID ?>">Transfer</button></li>
																	<li><button class="dropdown-item" onclick="return alertModal('function.php?disconnectDevice=1&id=<?= $deviceID ?>&page=device-production.php', 'Disconnect', 'After disconnect this device must be readopting to use again!')">Disconnect</button></li>
																<?php else : ?>
																	<li><button class="dropdown-item" onclick="return alertModal('function.php?deleteDevice=1&id=<?= $deviceID ?>', 'Delete', 'After delete this device must be readopting to use again!')">Delete</button></li>
																<?php endif ?>
															</ul>
														</td>
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
		<div class="modal fade" id="connectDevice" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="connectDeviceLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<form action="function.php" method="post">
						<div class="modal-header">
							<h5 class="modal-title" id="connectDeviceLabel">Enter Unique Code</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<div class="mb-3">
								<label for="code" class="form-label fw-bolder text-gray-800">Unique Code</label>
								<input type="text" name="code" id="code" class="form-control" maxlength="6" placeholder="Enter your 6 digit device unique code" autofocus required />
							</div>
							<div class="mb-3">
								<label for="description" class="form-label">Description</label>
								<textarea name="description" id="description" class="form-control" placeholder="Perangkat ada di dekat minimarket" required></textarea>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
							<button type="submit" name="connectDevice" class="btn btn-primary">Connect</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<!-- Modal Transfer Device #2 -->
		<div class="modal fade" id="transferDevice" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="transferDeviceLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<form action="function.php" method="post">
						<div class="modal-header">
							<h5 class="modal-title" id="transferDeviceLabel">Transfer Device</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col">
									<label for="startAgency" class="form-label fw-bolder text-gray-800">From</label>
									<input type="text" name="startAgency" id="startAgency" class="form-control" readonly />
								</div>
								<div class="col-1 d-flex align-items-center">
									<i class="fa-solid fa-arrow-right-long"></i>
								</div>
								<div class="col">
									<label for="endAgency" class="form-label fw-bolder text-gray-800">To</label>
									<select name="endAgency" id="endAgency" class="form-select" required>
										<option value="">Select</option>
										<?php foreach($callAgency as $agency) : ?>
											<option value="<?= $agency['id'] ?>"><?= $agency['name'] ?></option>
										<?php endforeach ?>
									</select>
									<!-- </datalist> -->
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
		
		<script>
			// Set Cookie for detail transfer device
			function urlCookie(c_name, value, exdays) {
				var exdate = new Date();
				exdate.setDate(exdate.getDate() + exdays);
				var c_value = escape(value) + ((exdays == null) ? "" : "; expires=" + exdate.toUTCString());
				document.cookie = c_name + "=" + c_value;
			}

			// / Set Cookie details device with direct location
			function urlCookieTo(c_name, value, exdays) {
				var exdate = new Date();
				exdate.setDate(exdate.getDate() + exdays);
				var c_value = escape(value) + ((exdays == null) ? "" : "; expires=" + exdate.toUTCString());
				document.cookie = c_name + "=" + c_value;
				window.location.href = 'device-production-details.php';
			}

			// Fix 1 modal for transferDevice
			$(document).on('click','#transferButton', function(e) {
                let name = $(this).data('nameagency');
				let id = $(this).data('idagency');
				let deviceID = $(this).data('iddevice');

                $('#startAgency').val(name);

				urlCookie('agencyIDStart', id, 1);
				urlCookie('deviceID', deviceID, 1);

				// function getCookie(name) {
				// 	const value = `; ${document.cookie}`;
				// 	const parts = value.split(`; ${name}=`);
				// 	if (parts.length === 2) return parts.pop().split(';').shift();
				// }

				// let idCookie = getCookie('agencyIDStart');
				// Fix for show hidden option elements from hidden before(rais)
				$("#endAgency").children('option').show();
				$("#endAgency option[value="+ id +"]").hide();
            });

		</script>

		<!-- My JS Configuration -->
		<script src="../dist/js/main.js"></script>
	</body>
</html>
