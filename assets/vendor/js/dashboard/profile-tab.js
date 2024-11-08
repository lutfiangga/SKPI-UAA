export const profileTab = () => {
	const tabBiodata = document.querySelector(".tab-biodata");
	const tabPassword = document.querySelector(".tab-password");
	const contentBiodata = document.querySelector(".content-biodata");
	const contentPassword = document.querySelector(".content-password");

	tabBiodata.addEventListener("click", () => {
		contentBiodata.classList.remove("hidden");
		contentPassword.classList.add("hidden");
		tabBiodata.classList.add("border-blue-600", "text-blue-600");
		tabPassword.classList.remove("border-blue-600", "text-blue-600");
		tabPassword.classList.add("text-gray-600");
	});

	tabPassword.addEventListener("click", () => {
		contentBiodata.classList.add("hidden");
		contentPassword.classList.remove("hidden");
		tabPassword.classList.add("border-blue-600", "text-blue-600");
		tabBiodata.classList.remove("border-blue-600", "text-blue-600");
		tabBiodata.classList.add("text-gray-600");
	});
};
