import { showPassword } from "./form/showPassword.js";
import { openNav } from "./dashboard/openNavbar.js";
import { toggleDropdown } from "./dashboard/dropdown.js";
import { toggleProfileMenu } from "./dashboard/toggleProfile.js";
import {
	formValidation,
	inputValidation,
	submitValidation,
} from "./form/input-form-validation.js";
import { requiredLabel } from "./form/requiredLabel.js";
import { fileUpload } from "./form/file-upload.js";
import { selectCustomDateRange } from "./form/select-custom-date-form.js";

// global initiate
window.openNav = openNav;
window.toggleDropdown = toggleDropdown;
window.toggleProfileMenu = toggleProfileMenu;
window.showPassword = showPassword;
window.requiredLabel = requiredLabel;
window.formValidation = formValidation;
window.fileUpload = fileUpload;
window.selectCustomDateRange = selectCustomDateRange;
window.inputValidation = inputValidation;
window.submitValidation = submitValidation;

document.addEventListener("DOMContentLoaded", function () {
	// inisasi file upload
	document.querySelectorAll(".file-upload-container").forEach((container) => {
		fileUpload(container);
	});

	// inisasi select custom date range
	selectCustomDateRange();

	// inisiasi form validation
	formValidation();

	// inisiasi required label
	requiredLabel();

	// inisiasi feather icons
	feather.replace();
});
