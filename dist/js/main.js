$(document).ready(function () {
	$(".preloader").fadeOut();
});

$(document).ready(function () {
	$("#table-device").DataTable();
});

$(document).ready(function () {
	$("#table-history").DataTable({
		order: [[0, "desc"]],
	});
});

$(document).ready(function () {
	$("#table-request").DataTable();
});

$(document).ready(function () {
	$("#table-adoption-history").DataTable();
});

$(document).ready(function () {
	$("#table-history-checking").DataTable();
});

$(document).ready(function () {
	$("#table-registered-agency").DataTable();
});

// Autofocus on modal bootstrap
$(".modal").on("shown.bs.modal", function () {
	$(this).find("[autofocus]").focus();
});

// Sweet Alert Special Me
function alertModal(page, button = "Delete", msg = "Once deleted, you will not be able to recover this imaginary file!") {
	swal({
		title: "Are you sure?",
		text: msg,
		icon: "warning",
		buttons: ["Cancel", button],
		dangerMode: true,
	}).then(willDelete => {
		if (willDelete) {
			swal("Successfull", {
				title: button + " has successfully",
				icon: "success",
				buttons: false,
			});
			window.location.href = page;
		}
	});
}

// Device Unique Code Uppercase
$(function () {
	$("#code").keyup(function () {
		this.value = this.value.toLocaleUpperCase();
	});
});

$(document).ready(function () {
	$(".toast").delay(5000).fadeOut();
});
