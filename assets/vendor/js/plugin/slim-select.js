export const SlimSelectOption = () => {
	console.log("slim select loaded");
	let selectElements = document.querySelectorAll('select[data-search="true"]');
	selectElements.forEach(function (select) {
		new SlimSelect({
			select: select,
			searchText: "Tidak ditemukan",
			searchPlaceholder: "Cari...",
			searchFocus: true,
			allowDeselect: true,
		});
	});
};
export const GropSelectOption = () => {
	console.log("slim select loaded");
	let selectElements = document.querySelectorAll('select[group-search="true"]');

	selectElements.forEach(function (select) {
		new SlimSelect({
			select: select,
			searchText: "Tidak ditemukan",
			searchPlaceholder: "Cari...",
			searchFocus: true,
			allowDeselect: true,
			filter: function (option, query) {
				const queryLowerCase = query.toLowerCase();

				// Periksa apakah option atau optgroup berisi query
				if (option.text.toLowerCase().includes(queryLowerCase)) {
					return true; // Cocok pada teks option
				}

				// Periksa apakah optgroup berisi query
				const parentOptgroup = option.parentElement;
				if (
					parentOptgroup &&
					parentOptgroup.label.toLowerCase().includes(queryLowerCase)
				) {
					return true; // Cocok pada label optgroup
				}

				return false;
			},
		});
	});
};
