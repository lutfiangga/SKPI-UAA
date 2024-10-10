export const inputValidation = (element) => {
	const regexPatterns = {
		email: /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/, // email regex
		password: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{6,}$/, // password regex
		"new-password": /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{6,}$/,
		"confirm-password": /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{6,}$/,
		username: /^[a-zA-Z\s]{3,}$/, // username regex
		name: /^[a-zA-Z\s]{3,}$/, // name regex
		phone: /^[0-9]{10,15}$/, // phone regex
		url: /^(https?:\/\/)?([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,}(:\d+)?(\/.*)?$/, // url regex
	};

	const inputId = element.id;
	const isValid = regexPatterns[inputId]
		? regexPatterns[inputId].test(element.value)
		: true;

	const errorElement = document.getElementById(inputId + "Error");
	errorElement.classList.toggle("hidden", isValid);

	// Check confirm password
	if (inputId === "confirm-password" || inputId === "new-password") {
		const newPassword = document.querySelector(
			"input[name='new_password']"
		).value;
		const confirmPassword = document.querySelector(
			"input[name='confirm_password']"
		).value;

		const confirmPasswordErrorElement = document.getElementById(
			"confirm-passwordError"
		);

		if (newPassword && confirmPassword && newPassword !== confirmPassword) {
			confirmPasswordErrorElement.classList.remove("hidden"); // munculkan error jika confirm password dan new password tidak sama
		} else {
			confirmPasswordErrorElement.classList.add("hidden"); // sembunyikan error jika confirm password dan new password sama
		}
	}
};

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
	// Cegah form di-submit secara default
	event.preventDefault();

	// Ambil semua input yang diperlukan
	const inputs = form.querySelectorAll("input[required]");
	let allValid = true;

	// Loop untuk mengecek setiap input
	inputs.forEach((input) => {
		const errorElement = document.getElementById(input.id + "Error");

		// Jika input kosong, tampilkan pesan error dan tambahkan border merah
		if (!input.value.trim()) {
			allValid = false;
			input.classList.add("border border-red-500"); // Set border merah
			errorElement.classList.remove("hidden"); // Tampilkan pesan error
			errorElement.textContent = "This field is required"; // Pesan error
		} else {
			// Jika valid, hapus border merah dan sembunyikan pesan error
			input.classList.remove("border border-red-500");
			errorElement.classList.add("hidden");
		}
	});

	// Jika semua input valid, submit form
	if (allValid) {
		form.submit(); // Submit form hanya jika semua input valid
	} else {
		console.log("Form contains errors. Fix them before submitting.");
	}
};
