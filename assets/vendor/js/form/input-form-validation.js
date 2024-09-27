export const formValidation = (element) => {
	let inputId = element.id;
	let inputValue = element.value;
	let isValid = true;

	// Switch case untuk menentukan regex validasi
	switch (inputId) {
		case "email":
			let emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/; // Regex untuk validasi email
			isValid = emailRegex.test(inputValue);
			break;
		case "password":
			let passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{6,}$/; // Regex untuk validasi password
			isValid = passwordRegex.test(inputValue);
			break;
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
	} else {
		errorElement.classList.add("hidden"); // Sembunyikan error jika valid
	}
};
