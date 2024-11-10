$(document).ready(function () {
	function updateFeatherIcons() {
		if (typeof feather !== "undefined" && feather.replace) {
			feather.replace();
			console.log("Feather icons initializing");
		} else {
			console.warn("feather.replace(): can't load.");
		}
	}

	// Inisialisasi DataTable dengan export button
	if (!$.fn.DataTable.isDataTable("table.table-data")) {
		$("table.table-data")
			.DataTable({
				responsive: true,
				autoWidth: true,
				select: true,
				searching: true,
				paging: true,
				pagingType: "full",
				language: {
					searchPlaceholder: "Cari...",
					lengthMenu: "_MENU_ Data per halaman",
					info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
					infoEmpty: "Tidak ada data tersedia",
					infoFiltered: "(filtered from _MAX_ Total data)",
				},
				lengthMenu: [
					[5, 10, 25, 50, 100, 200, -1],
					[5, 10, 25, 50, 100, 200, "All"],
				],
				dom:
					"<'flex justify-between items-center mb-4 w-full text-gray-700'<'flex items-center w-2/3 sm:w-3/4 text-xs sm:text-sm'l><'flex items-center space-x-2'fB>>" +
					"<'w-full text-gray-700'tr>" +
					"<'flex justify-between items-center my-4 w-full text-gray-700'<'flex items-center space-x-2 text-xs sm:text-sm'l><'flex items-center text-xs sm:text-sm'i><'flex items-center'p>>",
				buttons: [
					{
						extend: "collection",
						text: "Export",
						className: "ring-1 ring-inset ring-gray-300",
						buttons: [
							{ extend: "copy", text: "Copy to Clipboard" },
							{ extend: "csvHtml5", text: "Export as CSV" },
							{ extend: "excelHtml5", text: "Export as Excel" },
						],
					},
				],
			})
			.on("init.dt draw.dt", function () {
				setTimeout(updateFeatherIcons, 50);
			});
	}

	// Inisialisasi DataTable tanpa tombol ekspor
	if (!$.fn.DataTable.isDataTable("table.table-info")) {
		$("table.table-info")
			.DataTable({
				responsive: true,
				autoWidth: true,
				select: true,
				searching: true,
				paging: true,
				pagingType: "full",
				language: {
					searchPlaceholder: "Cari...",
					lengthMenu: "_MENU_ Data per halaman",
					info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
					infoEmpty: "Tidak ada data tersedia",
					infoFiltered: "(filtered from _MAX_ Total data)",
				},
				lengthMenu: [
					[5, 10, 25, 50, 100, 200, -1],
					[5, 10, 25, 50, 100, 200, "All"],
				],
				dom:
					"<'flex justify-between items-center mb-4 w-full text-gray-700'<'flex items-center w-2/3 sm:w-3/4 text-xs sm:text-sm'l><'flex items-center space-x-2'f>>" +
					"<'w-full text-gray-700'tr>" +
					"<'flex justify-between items-center my-4 w-full text-gray-700'<'flex items-center space-x-2 text-xs sm:text-sm'l><'flex items-center text-xs sm:text-sm'i><'flex items-center'p>>",
			})
			.on("init.dt draw.dt", function () {
				setTimeout(updateFeatherIcons, 50);
			});
	}
});
