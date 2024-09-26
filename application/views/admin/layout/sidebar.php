<!-- Sidebar -->
<aside class="sidebar bg-blue-600 mt-2 rounded-tr-[4rem] flex-shrink-0 fixed top-16 bottom-0 -left-64 lg:left-0 p-4 w-[250px] lg:w-[300px] overflow-y-auto text-center transition-all duration-300 z-40">
	<nav class="text-gray-800 text-xl relative">
		<ul class="mt-8 text-[#fafafa] mr-6">
			<!-- dashboard -->
			<li class="my-2">
				<a href="#" class="p-2.5 flex items-center focus:bg-[#fafafa] focus:text-blue-600 focus:ring-2 focus:ring-[#dadada] text-[#fafafa] rounded-full px-2 whitespace-nowrap lg:px-6 duration-300 hover:bg-[#fafafa]/30 hover:text-[#fafafa] font-semibold">
					<i data-feather="airplay"></i>
					<span class="text-[15px] ml-4">Dashboard</span>
				</a>
			</li>
			<!-- profile -->
			<li class="my-2">
				<a href="#" class="p-2.5 flex items-center focus:bg-[#fafafa] focus:text-blue-600 focus:ring-2 focus:ring-[#dadada] text-[#fafafa] rounded-full px-2 whitespace-nowrap lg:px-6 duration-300 hover:bg-[#fafafa]/30 hover:text-[#fafafa] font-semibold">
					<i data-feather="user"></i>
					<span class="text-[15px] ml-4">Profile</span>
				</a>
			</li>
			<hr class="my-4 border-[#fafafa]">
			<!-- data pengguna -->
			<li class="my-2">
				<button class="p-2.5 font-semibold mt-3 flex items-center rounded-full px-2 whitespace-nowrap lg:px-6 duration-300 hover:bg-[#fafafa]/30 hover:text-[#fafafa] focus:ring-2 focus:ring-[#dadada] focus:bg-[#fafafa] focus:text-blue-600 text-[#fafafa] w-full dropdown-toggle" onclick="toggleDropdown(this)" aria-expanded="false">
					<i data-feather="users"></i>
					<div class="flex justify-between w-full items-center">
						<span class="text-[15px] ml-4">Data Pengguna</span>
						<span class="text-sm transition-transform duration-300 dropdown">
							<i data-feather="chevron-down"></i>
						</span>
					</div>
				</button>
				<!-- Dropdown Menu -->
				<ul class="dropdown-content text-left text-sm rounded-full font-thin mt-2 w-4/5 mx-auto hidden" aria-label="Menu 1 Options">
					<!-- mahasiswa -->
					<li>
						<a href="#" class="block flex flex-row gap-2 items-center cursor-pointer p-2 hover:bg-[#fafafa]/30 hover:text-[#fafafa] focus:ring-2 focus:ring-[#dadada] focus:bg-[#fafafa] focus:text-blue-600 text-[#fafafa] rounded-full mt-1 font-semibold">
							<i data-feather="disc" class="mr-2"></i>
							Mahasiswa
						</a>
					</li>
					<!-- Prodi -->
					<li>
						<a href="#" class="block flex flex-row gap-2 items-center cursor-pointer p-2 hover:bg-[#fafafa]/30 hover:text-[#fafafa] focus:ring-2 focus:ring-[#dadada] focus:bg-[#fafafa] focus:text-blue-600 text-[#fafafa] rounded-full mt-1 font-semibold">
							<i data-feather="disc" class="mr-2"></i>
							Prodi
						</a>
					</li>
					<!-- Kemahasiswaan -->
					<li>
						<a href="#" class="block flex flex-row gap-2 items-center cursor-pointer p-2 hover:bg-[#fafafa]/30 hover:text-[#fafafa] focus:ring-2 focus:ring-[#dadada] focus:bg-[#fafafa] focus:text-blue-600 text-[#fafafa] rounded-full mt-1 font-semibold">
							<i data-feather="disc" class="mr-2"></i>
							Kemahasiswaan
						</a>
					</li>
					<!-- Akademik -->
					<li>
						<a href="#" class="block flex flex-row gap-2 items-center cursor-pointer p-2 hover:bg-[#fafafa]/30 hover:text-[#fafafa] focus:ring-2 focus:ring-[#dadada] focus:bg-[#fafafa] focus:text-blue-600 text-[#fafafa] rounded-full mt-1 font-semibold">
							<i data-feather="disc" class="mr-2"></i>
							Akademik
						</a>
					</li>

					<!-- Admin -->
					<li>
						<a href="#" class="block flex flex-row gap-2 items-center cursor-pointer p-2 hover:bg-[#fafafa]/30 hover:text-[#fafafa] focus:ring-2 focus:ring-[#dadada] focus:bg-[#fafafa] focus:text-blue-600 text-[#fafafa] rounded-full mt-1 font-semibold">
							<i data-feather="disc" class="mr-2"></i>
							Admin
						</a>
					</li>
				</ul>
			</li>

			<!-- Verifikasi SKPI -->
			<li class="my-2">
				<a href="#" class="p-2.5 flex items-center focus:bg-[#fafafa] focus:text-blue-600 focus:ring-2 focus:ring-[#dadada] text-[#fafafa] rounded-full px-2 whitespace-nowrap lg:px-6 duration-300 hover:bg-[#fafafa]/30 hover:text-[#fafafa] font-semibold">
					<i data-feather="check-circle"></i>
					<span class="text-[15px] ml-4">Verifikasi SKPI</span>
				</a>
			</li>
			<!-- SPM Mahasiswa -->
			<li class="my-2">
				<a href="#" class="p-2.5 flex items-center focus:bg-[#fafafa] focus:text-blue-600 focus:ring-2 focus:ring-[#dadada] text-[#fafafa] rounded-full px-2 whitespace-nowrap lg:px-6 duration-300 hover:bg-[#fafafa]/30 hover:text-[#fafafa] font-semibold">
					<i data-feather="award"></i>
					<span class="text-[15px] ml-4">SPM Mahasiswa</span>
				</a>
			</li>
		</ul>
	</nav>
</aside>
