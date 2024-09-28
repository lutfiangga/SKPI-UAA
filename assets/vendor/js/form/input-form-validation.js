export const inputValidation = (element) => {
	let inputId = element.id;
	let inputValue = element.value;
	let isValid = true;

	
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
// Function to enable/disable submit buttons based on form input values

export const formValidation = () => {
	const checkInputs = (form) => {
		const submitButton = form.querySelector('button[type="submit"]');
		const inputs = form.querySelectorAll("input[required]");

		let allFilled = true;
		inputs.forEach((input) => {
			if (!input.value.trim()) {
				allFilled = false;
			}
		});
		submitButton.disabled = !allFilled;
	};

	// Get all forms with method POST
	const forms = document.querySelectorAll('form[method="post"]');

	forms.forEach((form) => {
		// Get all required inputs within the form and add event listeners
		const inputs = form.querySelectorAll("input[required]");
		inputs.forEach((input) => {
			input.addEventListener("input", () => checkInputs(form));
		});

		// Initial check in case inputs are pre-filled
		checkInputs(form);
	});
};

export const submitValidation = (event) => {
	event.preventDefault(); // Cegah form di-submit

	// Ambil semua input yang diperlukan
	const inputs = document.querySelectorAll("input[required]");
	let allValid = true;

	inputs.forEach((input) => {
		const errorElement = document.getElementById(input.id + "Error");

		// Jika input kosong, tampilkan pesan error dan tambahkan border merah
		if (!input.value.trim()) {
			allValid = false;
			input.classList.add("border-red-500"); // Set border menjadi merah
			errorElement.classList.remove("hidden"); // Tampilkan pesan error
			errorElement.textContent = "This field is required"; // Set pesan error
		} else {
			// Jika valid, hapus border merah dan sembunyikan pesan error
			input.classList.remove("border-red-500");
			errorElement.classList.add("hidden");
		}
	});

	if (allValid) {
		// Jika semua input valid, form dapat di-submit
		console.log("Form is valid and can be submitted");
		event.target.submit(); // Submit form
	}
};

