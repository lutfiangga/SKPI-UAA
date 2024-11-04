export const SlimSelectOption = () =>{

	let selectElements = document.querySelectorAll('select[data-search="true"]');
	selectElements.forEach(function(select) {
		new SlimSelect({
			select: select,
			searchText: 'Tidak ditemukan',
			searchPlaceholder: 'Cari...',
			searchFocus: true,
			allowDeselect: true
		});
	});
	
}
