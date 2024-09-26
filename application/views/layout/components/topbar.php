<!-- Top Navbar -->
<header class="navbar bg-[#fafafa] fixed top-0 w-full flex justify-between items-center p-4 text-gray-800 z-30">
	<div class="flex items-center text-blue-600">
		<button class="text-3xl lg:hidden" aria-label="Open Sidebar" onclick="openNav()">
			<i data-feather="menu" class="text-blue-600"></i>
		</button>
		<i data-feather="hard-drive" class="ml-4"></i>
		<span class="text-xl font-bold ml-4 whitespace-nowrap">SKPI UAA</span>
	</div>
	<div class="flex items-center gap-4">
		<!-- Notifications -->
		<button aria-label="Notifications">
			<i data-feather="bell" class="text-gray-800"></i>
		</button>
		<!-- Profile Dropdown -->
		<div class="relative">
			<button aria-label="Profile" onclick="toggleProfileMenu()" class="flex items-center space-x-2">
				<img src="https://via.placeholder.com/40" alt="Profile Picture" class="rounded-full w-10 h-10">
				<span class="text-gray-800">User</span>
				<span class="text-gray-800 transition-transform duration-300 dropwdown">
					<i data-feather="chevron-down"></i>
				</span>
			</button>
			<!-- Profile Menu -->
			<div id="profileMenu" class="hidden absolute right-0 mt-2 w-48 bg-[#fafafa] rounded-lg shadow-lg py-2  text-gray-900">
				<a href="#" class="block px-4 py-2 hover:bg-gray-200">Profile</a>
				<a href="#" class="block px-4 py-2 hover:bg-gray-200">Settings</a>
				<a href="#" class="block px-4 py-2 hover:bg-gray-200">Logout</a>
			</div>
		</div>
	</div>
</header>