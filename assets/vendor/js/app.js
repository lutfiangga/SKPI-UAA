import { showPassword } from "./showPassword.js";
import { openNav } from "./openNavbar.js";
import { toggleDropdown } from "./dropdown.js";
import { toggleProfileMenu } from "./toggleProfile.js";
import { regexEmail } from "./regex/email.js";
import { regexPassword } from "./regex/password.js";

// global initiate
window.openNav = openNav;
window.toggleDropdown = toggleDropdown;
window.toggleProfileMenu = toggleProfileMenu;
window.showPassword = showPassword;
window.regexEmail = regexEmail;
window.regexPassword = regexPassword;

document.addEventListener("DOMContentLoaded", function () {
	// inisiasi feather icons
	feather.replace();
});
