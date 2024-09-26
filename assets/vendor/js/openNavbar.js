// sidebar
export const openNav = () => {
	const sidebar = document.querySelector(".sidebar");
	if (sidebar) {
		sidebar.classList.toggle("-left-64");
	} else {
		console.log("Sidebar element not found");
	}
};

