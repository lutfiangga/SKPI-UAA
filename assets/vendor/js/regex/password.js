export const regexPassword = () => {
	const passwordInput = document.getElementById("password");
	const passwordError = document.getElementById("passwordError");

	passwordInput.addEventListener("input", function () {
		// Regex untuk validasi password
		const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{6,}$/;

		if (passwordRegex.test(passwordInput.value)) {
			passwordError.classList.add("hidden");
		} else {
			passwordError.classList.remove("hidden");
		}
	});
};
