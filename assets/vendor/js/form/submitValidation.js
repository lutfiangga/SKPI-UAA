export const submitValidation = (event) => {
	event.preventDefault(); 
	const inputs = document.querySelectorAll("input[required]");
	let allValid = true;

	inputs.forEach((input) => {
		const errorElement = document.getElementById(input.id + "Error");
		if (!input.value) {
			allValid = false; 
			input.classList.add("border-red-500"); // Set border 
			errorElement.classList.remove("hidden"); // Tampilkan pesan error
			errorElement.textContent = "This form is required"; // Set pesan error
		} else {
			input.classList.remove("border-red-500");
			errorElement.classList.add("hidden");
		}
	});

	if (allValid) {
		console.log("Form is valid and can be submitted");
	}
};
