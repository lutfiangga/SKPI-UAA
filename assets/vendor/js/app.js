import { showPassword } from "./form/showPassword.js";
import { openNav } from "./dashboard/openNavbar.js";
import { toggleDropdown } from "./dashboard/dropdown.js";
import { toggleProfileMenu } from "./dashboard/toggleProfile.js";
import { formValidation } from "./form/input-form-validation.js";
import { requiredLabel } from "./form/requiredLabel.js";
import { fileUpload } from "./form/file-upload.js";

// global initiate
window.openNav = openNav;
window.toggleDropdown = toggleDropdown;
window.toggleProfileMenu = toggleProfileMenu;
window.showPassword = showPassword;
window.requiredLabel = requiredLabel;
window.formValidation = formValidation;
window.fileUpload = fileUpload;

document.addEventListener("DOMContentLoaded", function () {
	// inisasi file upload
	document.querySelectorAll(".file-upload-container").forEach((container) => {
		fileUpload(container);
	});

	// inisiasi required label
	requiredLabel();

	// inisiasi feather icons
	feather.replace();
});
