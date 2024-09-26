import { showPassword } from "./showPassword.js";
import { openNav } from "./openNavbar.js";
import { toggleDropdown } from "./dropdown.js";
import { toggleProfileMenu } from "./toggleProfile.js";
import { regexEmail } from "./regex/email.js";
import { regexPassword } from "./regex/password.js";
import { filepond } from "./filepond.js";
import { requiredValidation } from "./regex/requiredValidation.js";
import { requiredLabel } from "./requiredLabel.js";

// global initiate
window.openNav = openNav;
window.toggleDropdown = toggleDropdown;
window.toggleProfileMenu = toggleProfileMenu;
window.showPassword = showPassword;
window.regexEmail = regexEmail;
window.regexPassword = regexPassword;
window.filepond = filepond;
window.requiredLabel = requiredLabel;
window.requiredValidation = requiredValidation;

document.addEventListener("DOMContentLoaded", function () {
	// inisiasi library filepond.js
	filepond();

	// inisiasi required label
	requiredLabel();

	// inisiasi feather icons
	feather.replace();
});
