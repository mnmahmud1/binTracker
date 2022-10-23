<?php

	if(!isset($_COOKIE['signinAdmin'])){
		header('Location: signin.php');
	}

	if(!isset($_COOKIE['user'])){
		header('Location: agency.php');
	}

	require '../conn.php';
	date_default_timezone_set("Asia/Jakarta");
	
	$user = $_COOKIE['user'];
	$callDetailAgency = mysqli_query($conn, "SELECT name, bussines, address, tel, email, username FROM users WHERE id = $user");
	$DetailAgency = mysqli_fetch_assoc($callDetailAgency);

	$callRequests = mysqli_query($conn, "SELECT * FROM requests WHERE id_user = $user");

	$callDevices = mysqli_query($conn, "SELECT devices.id, devices.code, devices.created_at FROM history INNER JOIN devices ON devices.id = history.id_device WHERE history.adopt = $user");
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

		<title>Admin Details Agency | BinTracker</title>

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

		<?php if(isset($_COOKIE["updateProfil"]) && $_COOKIE["updateProfil"] == "success") : ?>
			<div aria-live="polite" aria-atomic="true" class="bg-dark position-relative bd-example-toasts">
				<div class="toast-container position-absolute top-0 end-0 p-3" id="toastPlacement">
					<div class="toast fade show">
						<div class="toast-header">
							<i class="fas fa-info-circle me-2"></i> 
							<strong class="me-auto">Attention!</strong>
							<small>Just Now</small>
							<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
						</div>
						<div class="toast-body">
							<strong>Successfully</strong> update profile.
						</div>
					</div>
				</div>
			</div>
		<?php elseif(isset($_COOKIE["updateProfil"]) && $_COOKIE["updateProfil"] == "failed") : ?>
			<div aria-live="polite" aria-atomic="true" class="bg-dark position-relative bd-example-toasts">
				<div class="toast-container position-absolute top-0 end-0 p-3" id="toastPlacement">
					<div class="toast fade show">
						<div class="toast-header">
							<i class="fas fa-info-circle me-2"></i> 
							<strong class="me-auto">Attention!</strong>
							<small>Just Now</small>
							<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
						</div>
						<div class="toast-body">
							<strong>Failed</strong> update profile.
						</div>
					</div>
				</div>
			</div>
		<?php endif ?>

		<?php if(isset($_COOKIE["updatePass"]) && $_COOKIE["updatePass"] == "failed") : ?>
			<div aria-live="polite" aria-atomic="true" class="bg-dark position-relative bd-example-toasts">
				<div class="toast-container position-absolute top-0 end-0 p-3" id="toastPlacement">
					<div class="toast fade show">
						<div class="toast-header">
							<i class="fas fa-info-circle me-2"></i> 
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
							<i class="fas fa-info-circle me-2"></i> 
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
							<i class="fas fa-info-circle me-2"></i> 
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

		<?php if(isset($_COOKIE["disconnectDevice"]) && $_COOKIE["disconnectDevice"] == "success") : ?>
			<div aria-live="polite" aria-atomic="true" class="bg-dark position-relative bd-example-toasts">
				<div class="toast-container position-absolute top-0 end-0 p-3" id="toastPlacement">
					<div class="toast fade show">
						<div class="toast-header">
							<i class="fas fa-info-circle me-2"></i> 
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
							<i class="fas fa-info-circle me-2"></i> 
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

		<?php if(isset($_COOKIE["transferDevice"]) && $_COOKIE["transferDevice"] == "success") : ?>
			<div aria-live="polite" aria-atomic="true" class="bg-dark position-relative bd-example-toasts">
				<div class="toast-container position-absolute top-0 end-0 p-3" id="toastPlacement">
					<div class="toast fade show">
						<div class="toast-header">
							<i class="fas fa-info-circle me-2"></i> 
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
							<i class="fas fa-info-circle me-2"></i> 
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
								<li class="breadcrumb-item"><a href="agency.php">Agency</a></li>
								<li class="breadcrumb-item active" aria-current="page">Details</li>
							</ol>
						</nav>
						<h1 class="h4 mb-4 fw-bold text-gray-800">Details - <?= $DetailAgency['name'] ?></h1>

						<div class="row">
							<div class="col">
								<div class="card mb-3">
									<div class="card-body">
										<div class="row d-flex justify-content-between align-items-center">
											<div class="col text-start">
												<p class="h6 fw-bold text-gray-800">Profiles Agency</p>
												<p class="tcgray">Update agency information</p>
											</div>
										</div>

										<form action="function.php" method="post">
											<div class="row mt-2">
												<div class="col">
													<div class="mb-4">
														<label for="name" class="form-label fw-bolder text-gray-800">AGENCY NAME</label>
														<input type="text" name="name" id="name" class="form-control" value="<?= $DetailAgency['name'] ?>" maxlength="100" required />
													</div>
													<div class="mb-4">
														<label for="bussines" class="form-label fw-bolder text-gray-800">BUSSINES FIELD</label>
														<input type="text" name="bussines" id="bussines" class="form-control" value="<?= $DetailAgency['bussines'] ?>" maxlength="50" required />
													</div>
												</div>
												<div class="col">
													<div class="mb-4">
														<label for="email" class="form-label fw-bolder text-gray-800">EMAIL</label>
														<input type="text" name="email" id="email" class="form-control" value="<?= $DetailAgency['email'] ?>" maxlength="100" required />
													</div>
													<div class="mb-4">
														<label for="tel" class="form-label fw-bolder text-gray-800">PHONE</label>
														<input type="text" name="tel" id="tel" class="form-control" value="<?= $DetailAgency['tel'] ?>" maxlength="13" required />
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col">
													<label for="address" class="form-label fw-bolder text-gray-800">ADDRESS</label>
													<textarea class="form-control py-4" name="address" id="address" required><?= $DetailAgency['address'] ?></textarea>
												</div>
											</div>
											<div class="row mt-3 text-end">
												<div class="col">
													<button type="submit" class="btn btn-primary" name="updateProfileAgency" id="updateProfileAgency">Update Profile</button>
												</div>
											</div>
										</form>

										<div class="row mt-5">
											<p class="tcgray">Agency Sign in information</p>
										</div>

										<form action="function.php" method="post">
											<div class="row mt-2 align-items-end mb-3 gap-3">
												<div class="col">
													<label for="username" class="form-label fw-bolder text-gray-800">USERNAME</label>
													<input type="text" name="username" id="username" class="form-control" value="<?= $DetailAgency['username'] ?>" maxlength="20" required />
												</div>
												<div class="col">
													<button type="submit" class="btn btn-primary me-3" name="updateUsernameAgency" id="updateUsernameAgency">Update Username</button>
													<!-- Button Trigger Modal -->
													<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updatePassword">Update Password</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col">
								<div class="card mb-3">
									<div class="card-body table-responsive">
										<div class="row d-flex justify-content-between align-items-center mb-4">
											<div class="col text-start">
												<span class="h6 fw-bold text-gray-800"> Requests From this Client </span>
											</div>
										</div>

										<table class="display" id="table-request" style="width: 100%">
											<thead>
												<tr>
													<th>#</th>
													<th style="width: 25%">Title</th>
													<th style="width: 35%">Problem/Request</th>
													<th>Reported at</th>
													<th>Response</th>
												</tr>
											</thead>
											<tbody>
												<?php $i=1; foreach ($callRequests as $request) : ?>
													<tr>
														<td><?= $i ?></td>
														<td>
															<?= $request['title'] ?><br />
															<span class="fs8 tcgray"><?= $DetailAgency['name'] ?></span>
														</td>
														<td class="text-break"><?= $request['message'] ?></td>
														<td class="tcgray"><?= date('Y-m-d g:i A', strtotime($request['created_at'])) ?></td>
														<td>
															<?php if($request['status'] == 1) : ?>
																<span class="badge rounded-pill text-bg-secondary px-3">DONE</span>
															<?php elseif($request['status'] == 0) : ?>
																<button class="btn btn-success badge rounded-pill text-bg-success px-3" onclick="return window.location.href='function.php?updateStatusRequest=1&id=<?= $request['id'] ?>'">DONE</button>
															<?php endif ?>
														</td>
													</tr>
												<?php $i++ ; endforeach ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col">
								<div class="card">
									<div class="card-body table-responsive">
										<div class="row mb-4 justify-content-between align-items-baseline">
											<div class="col text-start">
												<span class="h6 fw-bold text-gray-800"> Devices List </span>
											</div>
											<div class="col text-end">
												<!-- Button trigger modal Connect Devices -->
												<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#connectDevice"><i class="fa-solid fa-link"></i> Pair New Device</button>
											</div>
										</div>

										<table class="display" id="table-device">
											<thead>
												<tr>
													<th>#</th>
													<th>Device ID</th>
													<th>Status</th>
													<th>Age</th>
													<th></th>
												</tr>
											</thead>
											<tbody>
												<?php $i=1; foreach($callDevices as $device) : ?>
													<tr>
														<td><?= $i ?></td>
														<td>
															Device ID<?= $device['code'] ?> <br />
															<span class="tcgray fs8"> Registered at <?= date('Y-m-d g:i A', strtotime($device['created_at'])) ?></span>
														</td>
														<td>
															<?php
																$now_date = date('Y-m-d H:i:s'); // the current date
																$date1 = $device['created_at'];
																$timestamp1 = strtotime($date1);
																$timestamp2 = strtotime($now_date);
																$hour = floor($timestamp2 - $timestamp1)/(60*60);
															?>
															<?php if($hour < 1) : ?>
																<span class="badge rounded-pill text-bg-success px-3">ACTIVE</span>
															<?php elseif($hour >= 1) : ?>
																<span class="badge rounded-pill text-bg-danger px-3">MAINTENANCE</span>
															<?php endif ?>
														</td>
														<td><?= calculateDays(date('Y-m-d', strtotime($device['created_at']))) ?></td>
														<td>
															<!-- Default dropend button -->
															<button type="button" class="btn btn-sm btn-white" data-bs-toggle="dropdown">
																<i class="fa-solid fa-ellipsis-vertical"></i>
															</button>
															<ul class="dropdown-menu">
																<!-- Dropdown menu links -->
																<li><button class="dropdown-item" name="transferButton" id="transferButton" data-bs-toggle="modal" data-bs-target="#transferDevice" data-nameagency="<?= $DetailAgency['name'] ?>" data-idagency="<?= $user ?>" data-iddevice="<?= $device['id'] ?>">Transfer</button></li>
																<li><button class="dropdown-item" onclick="return alertModal('function.php?disconnectDevice=1&id=<?= $device['id'] ?>&page=details-agency.php', 'Disconnect', 'After disconnect this device must be readopting to use again!')">Disconnect</button></li>
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

		<!-- Modal Change Password #1 -->
		<div class="modal fade" id="updatePassword" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updatePasswordLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="updatePasswordLabel">Renew Password</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<form action="function.php" method="post">
						<div class="modal-body">
							<div class="mb-3">
								<label for="oldPassword" class="form-label fw-bolder text-gray-800">OLD PASSWORD</label>
								<input type="password" name="oldPassword" id="oldPassword" class="form-control p-3" placeholder="Enter old password" autofocus required />
							</div>
							<hr />
							<div class="mb-3">
								<label for="newPassword" class="form-label fw-bolder text-gray-800">NEW PASSWORD</label>
								<input type="password" name="newPassword" id="newPassword" class="form-control p-3" placeholder="Enter new password" required />
							</div>
							<div class="mb-3">
								<label for="repeatPassword" class="form-label fw-bolder text-gray-800">REPEAT PASSWORD</label>
								<input type="password" name="repeatPassword" id="repeatPassword" class="form-control p-3" placeholder="Repat new password" required />
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-white" data-bs-dismiss="modal" tabindex="1">Close</button>
							<button type="submit" name="updatePassAgency" id="updatePassAgency" class="btn btn-primary">Update Password</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<!-- Modal Pair #2 -->
		<div class="modal fade" id="connectDevice" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="connectDeviceLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<form action="" method="post">
						<div class="modal-header">
							<h5 class="modal-title" id="connectDeviceLabel">Enter Unique Code</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<label for="code" class="form-label fw-bolder text-gray-800">Unique Code</label>
							<input type="text" name="code" id="code" class="form-control" maxlength="6" placeholder="Enter your 6 digit device unique code" autofocus required />
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
							<button type="submit" name="pairDevice" class="btn btn-primary">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<!-- Modal Transfer Device #3 -->
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
									<input type="text" name="startAgency" id="startAgency" class="form-control" value="<?= $DetailAgency['name'] ?>" readonly />
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
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
							<button type="submit" name="transferDeviceDetailAgency" class="btn btn-primary">Transfer</button>
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
			// Set Cookie for detail transfer device
			function urlCookie(c_name, value, exdays) {
				var exdate = new Date();
				exdate.setDate(exdate.getDate() + exdays);
				var c_value = escape(value) + ((exdays == null) ? "" : "; expires=" + exdate.toUTCString());
				document.cookie = c_name + "=" + c_value;
			}

			// profiles Function
			$(document).ready(function () {
				$("#updatePass").prop("disabled", true);

				$("#newPassword, #repeatPassword").keyup(function () {
					if ($("#newPassword").val() == "" && $("#repeatPassword").val() == "") {
						$(':input[type="submit"]').prop("disabled", true);
					} else if ($("#newPassword").val() == $("#repeatPassword").val()) {
						$(':input[type="submit"]').prop("disabled", false);
					} else {
						$("#updatePass").prop("disabled", true);
					}
				});
			});

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
	</body>
</html>
