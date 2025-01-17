<!-- Top Navbar -->
<header class="navbar bg-off-white fixed top-0 w-full flex justify-between items-center p-4 text-gray-800 z-30">
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
			<button aria-label="Profile" onclick="toggleProfileMenu()" class="flex flex-row gap-2 items-center space-x-2">
				<span class="text-gray-800 truncate hidden md:block capitalize"><?= $nama; ?></span>
				<div class="avatar">
					<div class="ring-primary w-10 rounded-full ring ring-offset-2">
						<img src="<?= base_url($foto) ?>" alt="Profile Picture" />
					</div>
				</div>
			</button>
			<!-- Profile Menu -->
			<div id="profileMenu" class="hidden absolute right-0 mt-2 w-48 bg-off-white rounded-lg shadow-lg py-2  text-gray-900">
				<a href="<?= site_url(ucwords($role) . '/Myprofile'); ?>" class="block px-4 py-2 hover:bg-gray-200">Profile</a>
				<a href="#logout" class="block px-4 py-2 hover:bg-gray-200">Logout</a>
			</div>
		</div>
	</div>
</header>
