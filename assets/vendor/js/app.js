import { showPassword } from "./custom/showPassword.js";
import { openNav } from "./custom/openNavbar.js";
import { toggleDropdown } from "./custom/dropdown.js";
import { toggleProfileMenu } from "./custom/toggleProfile.js";

// Menyediakan fungsi ke jendela global
window.openNav = openNav;
window.toggleDropdown = toggleDropdown;
window.toggleProfileMenu = toggleProfileMenu;
window.showPassword = showPassword;

document.addEventListener("DOMContentLoaded", function () {
	// showPassword();
	feather.replace();
});
