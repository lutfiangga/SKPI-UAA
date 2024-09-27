const modals = document.querySelectorAll(".custom-datepicker"); // for modal
const actionButton = document.querySelectorAll(".action-btn"); // for submit button
const optionSelect = document.querySelectorAll(".date-select"); // select option form
const closeModal = document.querySelectorAll(".close-modal"); // close modal
const newOption = document.querySelectorAll(".date-range"); //  generate new option on select

modals.forEach((modal, index) => {
	// Inisialisasi flatpickr
	flatpickr(modal.querySelector('input[name="start_date"]'), {
		dateFormat: "d-m-Y",
		appendTo: modal,
	});

	flatpickr(modal.querySelector('input[name="end_date"]'), {
		dateFormat: "d-m-Y",
		appendTo: modal,
	});
});

// onSubmit
actionButton.forEach((saveButton, index) => {
	saveButton.addEventListener("click", () => {
		const modal = modals[index];
		const startDate = modal.querySelector('input[name="start_date"]').value;
		const endDate = modal.querySelector('input[name="end_date"]').value;

		// Validasi rentang tanggal
		if (startDate && endDate) {
			const startDateObj = new Date(startDate.split("-").reverse().join("-"));
			const endDateObj = new Date(endDate.split("-").reverse().join("-"));

			if (startDateObj > endDateObj) {
				alert("Tanggal mulai tidak boleh lebih besar dari tanggal akhir.");
				return;
			}

			// Update teks di opsi custom-range
			const customRangeOption = newOption[index];
			customRangeOption.hidden = false;
			customRangeOption.value = "custom-range";
			customRangeOption.text = `${startDate} - ${endDate}`;
			customRangeOption.selected = true;

			// Tetap pastikan opsi "Custom" tersedia untuk diubah lagi
			optionSelect[index].value = "custom-range";

			// Tutup modal setelah simpan
			modal.close();
		} else {
			alert("Silakan pilih rentang tanggal.");
		}
	});
});

// open modal
optionSelect.forEach((dateSelect, index) => {
	dateSelect.addEventListener("change", () => {
		if (dateSelect.value === "custom") {
			modals[index].showModal();
		}
	});
});

// close modal
closeModal.forEach((closeButton, index) => {
	closeButton.addEventListener("click", () => {
		modals[index].close();
	});
});
