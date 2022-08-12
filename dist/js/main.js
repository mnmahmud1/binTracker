$(document).ready(function () {
	$(".preloader").fadeOut();
});

$(document).ready(function () {
	$("#table-device").DataTable();
});

// Autofocus on modal bootstrap
$(".modal").on("shown.bs.modal", function () {
	$(this).find("[autofocus]").focus();
});
