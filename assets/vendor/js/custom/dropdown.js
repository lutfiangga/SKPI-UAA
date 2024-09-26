export const toggleDropdown = (element) => {
	const dropdownContent =
		element.parentElement.querySelector(".dropdown-content"); // Ambil konten dropdown
	const dropdownIcon = element.querySelector(".dropdown"); // Ambil ikon dropdown

	if (dropdownContent) {
		dropdownContent.classList.toggle("hidden");
		dropdownContent.classList.toggle("block");
		dropdownIcon.classList.toggle("rotate-180"); // Ganti rotasi ikon
	}

};
