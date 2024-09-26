export const regexEmail = () => {
	const emailInput = document.getElementById("email");
	const emailError = document.getElementById("emailError");

	emailInput.addEventListener("input", function () {
		const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

		if (emailRegex.test(emailInput.value)) {
			emailError.classList.add("hidden");
		} else {
			emailError.classList.remove("hidden");
		}
	});
};
