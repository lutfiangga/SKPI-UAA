export const requiredValidation = (element) => {
	let inputId = element.id;
	let inputValue = element.value;
	let isValid = true;

	// Switch case untuk menentukan regex validasi
	switch (inputId) {
		case "name":
			let nameRegex = /^[a-zA-Z\s]{3,}$/; // Regex untuk validasi nama
			isValid = nameRegex.test(inputValue);
			break;
		case "phone":
			let phoneRegex = /^[0-9]{10,15}$/; // Regex untuk validasi nomor telepon
			isValid = phoneRegex.test(inputValue);
			break;
		default:
			isValid = true; // Default
	}

	// Tampilkan atau sembunyikan pesan error
	let errorElement = document.getElementById(inputId + "Error");
	if (!isValid) {
		errorElement.classList.remove("hidden"); // Tampilkan error jika tidak valid
		errorElement.textContent = "Input tidak valid"; // Tampilkan pesan error
	} else {
		errorElement.classList.add("hidden"); // Sembunyikan error jika valid
	}
};
