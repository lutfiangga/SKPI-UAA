export const showPassword = () => {
	const togglePassword = document.getElementById("togglePassword");
	const passwordInput = document.getElementById("password");
	const iconShow = document.getElementById("iconShow");
	const iconHide = document.getElementById("iconHide");

	// Cek jika event listener sudah ditambahkan
	if (!togglePassword.dataset.listenerAdded) {
		togglePassword.dataset.listenerAdded = "true"; // Tandai bahwa listener sudah ditambahkan

		// Toggle function
		const toggle = () => {
			const type =
				passwordInput.getAttribute("type") === "password" ? "text" : "password";
			passwordInput.setAttribute("type", type);

			// Ubah ikon
			if (type === "text") {
				iconShow.classList.add("hidden");
				iconHide.classList.remove("hidden");
			} else {
				iconShow.classList.remove("hidden");
				iconHide.classList.add("hidden");
			}
		};

		// Assign click event directly
		togglePassword.addEventListener("click", toggle);
	}
};
