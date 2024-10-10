
import { openNav } from "./dashboard/openNavbar.js";
import { toggleDropdown } from "./dashboard/dropdown.js";
import { toggleProfileMenu } from "./dashboard/toggleProfile.js";
import { requiredLabel } from "./form/requiredLabel.js";
import { fileUpload } from "./form/file-upload.js";
import { selectCustomDateRange } from "./form/select-custom-date-form.js";
import { profileTab } from "./dashboard/profile-tab.js";
import { slimSelect } from "./plugin/slim-select.js";

// global initiate
window.openNav = openNav;
window.toggleDropdown = toggleDropdown;
window.toggleProfileMenu = toggleProfileMenu;
window.requiredLabel = requiredLabel;
window.fileUpload = fileUpload;
window.selectCustomDateRange = selectCustomDateRange;
window.profileTab = profileTab;
window.slimSelect = slimSelect;

document.addEventListener("DOMContentLoaded", function () {
	// inisasi file upload
	document.querySelectorAll(".file-upload-container").forEach((container) => {
		fileUpload(container);
	});

	//inisiasi slim select
	slimSelect();

	// inisasi select custom date range
	selectCustomDateRange();

	// inisiasi required label
	requiredLabel();

	// inisiasi profile tab
	profileTab();
});
