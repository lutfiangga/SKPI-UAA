export const requiredLabel = () => {
	const labels = document.querySelectorAll("label");
	labels.forEach((label) => {
		const inputId = label.getAttribute("for"); // Ambil ID dari label
		const inputElement = document.getElementById(inputId); // Dapatkan elemen input berdasarkan ID

		if (inputElement && inputElement.hasAttribute("required")) {
			const required = document.createElement("span");
			required.textContent = "*"; // Set teks untuk bintang
			required.classList.add("text-red-500");
			label.appendChild(required); // Tambahkan bintang ke dalam label
		}
	});
};
