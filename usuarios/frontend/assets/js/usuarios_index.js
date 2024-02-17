$(document).ready(function () {
	// Destruir la tabla DataTable existente, si ya está inicializada
	if ($.fn.DataTable.isDataTable('#usuarios_data')) {
		$('#usuarios_data').DataTable().destroy();
	}

	// Inicializar la tabla DataTable
	var table = $('#usuarios_data').DataTable({
		responsive: true,
		ordering: false,
	});

	$('#usuarios_data tbody').on('click', 'tr td:first-child', function () {
		var tr = $(this).closest('tr');
		var row = table.row(tr);

		if (row.child.isShown()) {
			row.child.hide();
			tr.removeClass('shown');
			$(this).children()[0].src = "assets/images/plus-circle-fill.svg";
		} else {
			row.child(format(row.data())).show();
			tr.addClass('shown');
			$(this).children()[0].src = "assets/images/slash-circle-fill.svg";
		}
	});
	function format(data) {
		if (data != null || data != undefined) {
			return `
                <div class="details-content bg-light p-3">
                    <div class="row">
                        <div class="col">${data[6]}</div>
                        <div class="col">${data[7]}</div>
                	</div>
                </div> `;
		}
	}
});
