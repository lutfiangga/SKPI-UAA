<aside
	class="sidebar bg-blue-600 mt-2 rounded-tr-[4rem] flex-shrink-0 fixed top-16 bottom-0 -left-64 lg:left-0 p-4 w-[250px] lg:w-[300px] overflow-y-auto text-center transition-all duration-300 z-40">
	<nav class="text-gray-800 text-xl relative">
		<ul class="mt-8 text-[#fafafa] mr-6">
			<!-- dashboard -->
			<li class="my-2">
				<a href="<?= site_url(ucwords($role) . '/Dashboard'); ?>"
					class="p-2.5 flex items-center rounded-full px-2 whitespace-nowrap lg:px-6 duration-300 hover:bg-[#fafafa]/30 hover:text-[#fafafa] font-semibold <?= ($active_menu === 'home') ? 'bg-[#fafafa] text-blue-600 ring-2 ring-[#dadada]' : ''; ?>">
					<i data-feather="airplay"></i>
					<span class="text-[15px] ml-4">Dashboard</span>
				</a>
			</li>
			<!-- profile -->
			<li class="my-2">
				<a href="<?= site_url(ucwords($role) . '/Myprofile'); ?>"
					class="p-2.5 flex items-center rounded-full px-2 lg:px-6 duration-300 hover:bg-[#fafafa]/30 hover:text-[#fafafa] font-semibold <?= ($active_menu === 'myprofile') ? 'bg-[#fafafa] text-blue-600 ring-2 ring-[#dadada]' : ''; ?>">
					<i data-feather="user"></i>
					<span class="text-[15px] ml-4">Profile</span>
				</a>
			</li>
			<!-- Dir Kemahasiswaan -->
			<li class="my-2 <?= ($role != 'kemahasiswaan') ? 'hidden' : 'block'; ?>">
				<a href="<?= site_url(($role !== 'admisi' ? ucfirst($role) . '/Dir_Kemahasiswaan' : ucfirst($role) . '/Dir_Admisi')); ?>"
					class="p-2.5 flex items-center rounded-full px-2 lg:px-6 duration-300 hover:bg-[#fafafa]/30 hover:text-[#fafafa] font-semibold <?= ($active_menu === 'direktur') ? 'bg-[#fafafa] text-blue-600 ring-2 ring-[#dadada]' : ''; ?>">
					<i data-feather="smile"></i>
					<span class="text-[15px] text-left ml-4">Direktur
						<?= $role !== 'admisi' ? 'Kemahasiswaan' : 'Admisi'; ?></span>
				</a>

			</li>
			<hr class="my-4 border-[#fafafa]">
			<!-- data pengguna -->
			<li class="my-2 <?= ($role != 'admin') ? 'hidden' : 'block'; ?>">
				<button
					class="p-2.5 font-semibold mt-3 flex items-center rounded-full px-2 whitespace-nowrap lg:px-6 duration-300 hover:bg-[#fafafa]/30 hover:text-[#fafafa] focus:ring-2 focus:ring-[#dadada] focus:bg-[#fafafa] focus:text-blue-600 text-[#fafafa] w-full dropdown-toggle"
					onclick="toggleDropdown(this)" aria-expanded="false">
					<i data-feather="users"></i>
					<div class="flex justify-between w-full items-center">
						<span class="text-[15px] ml-4">Data Pengguna</span>
						<span class="text-sm transition-transform duration-300 dropdown">
							<i data-feather="chevron-down"></i>
						</span>
					</div>
				</button>
				<!-- Dropdown Menu -->
				<ul class="dropdown-content text-left text-sm rounded-full font-thin mt-2 w-4/5 mx-auto hidden"
					aria-label="Menu 1 Options">
					<!-- mahasiswa -->
					<li>
						<a href="<?= site_url('Admin/User/Mahasiswa'); ?>"
							class="p-2.5 flex items-center rounded-full whitespace-nowrap duration-300 hover:bg-[#fafafa]/30 hover:text-[#fafafa] font-semibold <?= ($active_menu === 'usr_mhs') ? 'bg-[#fafafa] text-blue-600 px-2 ring-2 ring-[#dadada]' : ''; ?>">
							<i data-feather="disc" class="mr-2"></i>
							Mahasiswa
						</a>
					</li>
					<li>
						<a href="<?= site_url('Admin/User/Staff'); ?>"
							class=" p-2.5 flex items-center rounded-full whitespace-nowrap duration-300 hover:bg-[#fafafa]/30 hover:text-[#fafafa] font-semibold <?= ($active_menu === 'usr_staff') ? 'bg-[#fafafa] text-blue-600  px-2 ring-2 ring-[#dadada]' : ''; ?>">
							<i data-feather="disc" class="mr-2"></i>
							Staff
						</a>
					</li>

				</ul>
			</li>

			<!-- akun pengguna -->
			<li class="my-2 <?= ($role != 'admin') ? 'hidden' : 'block'; ?>">
				<button
					class="p-2.5 font-semibold mt-3 flex items-center rounded-full px-2 whitespace-nowrap lg:px-6 duration-300 hover:bg-[#fafafa]/30 hover:text-[#fafafa] focus:ring-2 focus:ring-[#dadada] focus:bg-[#fafafa] focus:text-blue-600 text-[#fafafa] w-full dropdown-toggle"
					onclick="toggleDropdown(this)" aria-expanded="false">
					<i data-feather="key"></i>
					<div class="flex justify-between w-full items-center">
						<span class="text-[15px] ml-4">Akun Pengguna</span>
						<span class="text-sm transition-transform duration-300 dropdown">
							<i data-feather="chevron-down"></i>
						</span>
					</div>
				</button>
				<!-- Dropdown Menu -->
				<ul class="dropdown-content text-left text-sm rounded-full font-thin mt-2 w-4/5 mx-auto hidden space-y-2"
					aria-label="Akun Pengguna">
					<!-- Admin -->
					<li>
						<a href="<?= site_url('Admin/Account/Admin'); ?>"
							class="p-2.5 flex items-center rounded-full whitespace-nowrap duration-300 hover:bg-[#fafafa]/30 hover:text-[#fafafa] font-semibold <?= ($active_menu === 'admin') ? 'bg-[#fafafa] text-blue-600 px-2  ring-2 ring-[#dadada]' : ''; ?>">
							<i data-feather="disc" class="mr-2"></i>
							Admin
						</a>
					</li>
					<!-- Admisi -->
					<li>
						<a href="<?= site_url('Admin/Account/Admisi'); ?>"
							class="p-2.5 flex items-center rounded-full whitespace-nowrap duration-300 hover:bg-[#fafafa]/30 hover:text-[#fafafa] font-semibold <?= ($active_menu === 'admisi') ? 'bg-[#fafafa] text-blue-600 px-2  ring-2 ring-[#dadada]' : ''; ?>">
							<i data-feather="disc" class="mr-2"></i>
							Admisi
						</a>
					</li>
					<!-- Prodi -->
					<li>
						<a href="<?= site_url('Admin/Account/Prodi'); ?>"
							class="p-2.5 flex items-center rounded-full whitespace-nowrap duration-300 hover:bg-[#fafafa]/30 hover:text-[#fafafa] font-semibold <?= ($active_menu === 'prodi') ? 'bg-[#fafafa] text-blue-600 px-2  ring-2 ring-[#dadada]' : ''; ?>">
							<i data-feather="disc" class="mr-2"></i>
							Prodi
						</a>
					</li>
					<!-- Kemahasiswaan -->
					<li>
						<a href="<?= site_url('Admin/Account/Kemahasiswaan'); ?>"
							class="p-2.5 flex items-center rounded-full whitespace-nowrap duration-300 hover:bg-[#fafafa]/30 hover:text-[#fafafa] font-semibold <?= ($active_menu === 'kemahasiswaan') ? 'bg-[#fafafa] text-blue-600 px-2  ring-2 ring-[#dadada]' : ''; ?>">
							<i data-feather="disc" class="mr-2"></i>
							Kemahasiswaan
						</a>
					</li>
					<!-- Etiquette -->
					<li>
						<a href="<?= site_url('Admin/Account/Etiquette'); ?>"
							class="p-2.5 flex items-center rounded-full whitespace-nowrap duration-300 hover:bg-[#fafafa]/30 hover:text-[#fafafa] font-semibold <?= ($active_menu === 'etiquette') ? 'bg-[#fafafa] text-blue-600 px-2  ring-2 ring-[#dadada]' : ''; ?>">
							<i data-feather="disc" class="mr-2"></i>
							Etiquette
						</a>
					</li>

					<!-- mahasiswa -->
					<li>
						<a href="<?= site_url('Admin/Account/Mahasiswa'); ?>"
							class="p-2.5 flex items-center rounded-full whitespace-nowrap duration-300 hover:bg-[#fafafa]/30 hover:text-[#fafafa] font-semibold <?= ($active_menu === 'mahasiswa') ? 'bg-[#fafafa] text-blue-600 px-2  ring-2 ring-[#dadada]' : ''; ?>">
							<i data-feather="disc" class="mr-2"></i>
							Mahasiswa
						</a>
					</li>

				</ul>
			</li>

			<!-- Data SKPI Mhs -->
			<li class="my-2 <?= $role != 'admin' ? 'hidden' : 'block'; ?>">
				<a href="<?= site_url('Admin/Skpi_Mahasiswa'); ?>" class="p-2.5 flex items-center text-left  <?= ($active_menu === 'skpi') ? 'bg-[#fafafa] text-blue-600  ring-2 ring-[#dadada]' : ''; ?>  rounded-full px-2 whitespace-wrap lg:px-6 duration-300 hover:bg-[#fafafa]/30 hover:text-[#fafafa] font-semibold">
					<i data-feather="archive"></i>
					<span class="text-[15px] ml-4">SKPI Mahasiswa</span>
				</a>
			</li>

			<!-- Data Fakultas -->
			<li class="my-2 <?= $role != 'admin' ? 'hidden' : 'block'; ?>">
				<a href="<?= site_url('Admin/Fakultas'); ?>" class="p-2.5 flex items-center text-left  <?= ($active_menu === 'fakultas') ? 'bg-[#fafafa] text-blue-600  ring-2 ring-[#dadada]' : ''; ?>  rounded-full px-2 whitespace-wrap lg:px-6 duration-300 hover:bg-[#fafafa]/30 hover:text-[#fafafa] font-semibold">
					<i data-feather="layout"></i>
					<span class="text-[15px] ml-4">Fakultas</span>
				</a>
			</li>
			<!-- Data Prodi -->
			<li class="my-2 <?= $role != 'admin' ? 'hidden' : 'block'; ?>">
				<a href="<?= site_url('Admin/Prodi'); ?>" class="p-2.5 flex items-center text-left  <?= ($active_menu === 'program_studi') ? 'bg-[#fafafa] text-blue-600  ring-2 ring-[#dadada]' : ''; ?>  rounded-full px-2 whitespace-wrap lg:px-6 duration-300 hover:bg-[#fafafa]/30 hover:text-[#fafafa] font-semibold">
					<i data-feather="briefcase"></i>
					<span class="text-[15px] ml-4">Program Studi</span>
				</a>
			</li>
			<!-- Data akreditasi -->
			<li class="my-2 <?= $role != 'admin' ? 'hidden' : 'block'; ?>">
				<a href="<?= site_url('Admin/Akreditasi'); ?>" class="p-2.5 flex items-center text-left  <?= ($active_menu === 'akreditasi') ? 'bg-[#fafafa] text-blue-600  ring-2 ring-[#dadada]' : ''; ?>  rounded-full px-2 whitespace-wrap lg:px-6 duration-300 hover:bg-[#fafafa]/30 hover:text-[#fafafa] font-semibold">
					<i data-feather="award"></i>
					<span class="text-[15px] ml-4">List Akreditasi</span>
				</a>
			</li>
			<!-- Data jenjang -->
			<li class="my-2 <?= $role != 'admin' ? 'hidden' : 'block'; ?>">
				<a href="<?= site_url('Admin/Jenjang'); ?>" class="p-2.5 flex items-center text-left  <?= ($active_menu === 'jenjang') ? 'bg-[#fafafa] text-blue-600  ring-2 ring-[#dadada]' : ''; ?>  rounded-full px-2 whitespace-wrap lg:px-6 duration-300 hover:bg-[#fafafa]/30 hover:text-[#fafafa] font-semibold">
					<i data-feather="activity"></i>
					<span class="text-[15px] ml-4">List Jenjang</span>
				</a>
			</li>
			<!-- Kategori CPL -->
			<li class="my-2 <?= $role != 'prodi' ? 'hidden' : 'block'; ?>">
				<a href="<?= site_url('Prodi/Kategori_Cpl'); ?>"
					class="p-2.5 flex items-center text-left  <?= ($active_menu === 'kategori_cpl') ? 'bg-[#fafafa] text-blue-600  ring-2 ring-[#dadada]' : ''; ?>  rounded-full px-2 whitespace-wrap lg:px-6 duration-300 hover:bg-[#fafafa]/30 hover:text-[#fafafa] font-semibold">
					<i data-feather="paperclip"></i>
					<span class="text-[15px] ml-4">Kategori CPL</span>
				</a>
			</li>
			<!-- Item CPL -->
			<li class="my-2 <?= $role != 'prodi' ? 'hidden' : 'block'; ?>">
				<a href="<?= site_url('Prodi/Item_Cpl'); ?>"
					class="p-2.5 flex items-center text-left  <?= ($active_menu === 'item_cpl') ? 'bg-[#fafafa] text-blue-600  ring-2 ring-[#dadada]' : ''; ?>  rounded-full px-2 whitespace-wrap lg:px-6 duration-300 hover:bg-[#fafafa]/30 hover:text-[#fafafa] font-semibold">
					<i data-feather="activity"></i>
					<span class="text-[15px] ml-4">Item CPL</span>
				</a>
			</li>
			<!-- Data CPL -->
			<li class="my-2 <?= $role != 'prodi' ? 'hidden' : 'block'; ?>">
				<a href="<?= site_url('Prodi/Cpl_skpi'); ?>"
					class="p-2.5 flex items-center text-left  <?= ($active_menu === 'cpl') ? 'bg-[#fafafa] text-blue-600  ring-2 ring-[#dadada]' : ''; ?>  rounded-full px-2 whitespace-wrap lg:px-6 duration-300 hover:bg-[#fafafa]/30 hover:text-[#fafafa] font-semibold">
					<i data-feather="award"></i>
					<span class="text-[15px] ml-4">CPL SKPI</span>
				</a>
			</li>
			<!-- Skor Minimum SPM  -->
			<li class="my-2 <?= ($role != 'admisi' && $role != 'kemahasiswaan') ? 'hidden' : 'block'; ?>">
				<a href="<?= site_url(ucwords($role) . '/Skor_Minimum_Spm'); ?>"
					class="p-2.5 flex items-center text-left  <?= ($active_menu === 'skor_spm') ? 'bg-[#fafafa] text-blue-600  ring-2 ring-[#dadada]' : ''; ?> rounded-full px-2 whitespace-wrap lg:px-6 duration-300 hover:bg-[#fafafa]/30 hover:text-[#fafafa] font-semibold">
					<i data-feather="crosshair"></i>
					<span class="text-[15px] ml-4 flex gap-1">Skor Minimum SPM </span>
				</a>
			</li>
			<!-- Periode SPM  -->
			<li class="my-2 <?= ($role != 'kemahasiswaan') ? 'hidden' : 'block'; ?>">
				<a href="<?= site_url(ucwords($role) . '/Periode_Spm'); ?>"
					class="p-2.5 flex items-center text-left  <?= ($active_menu === 'periode_spm') ? 'bg-[#fafafa] text-blue-600  ring-2 ring-[#dadada]' : ''; ?> rounded-full px-2 whitespace-wrap lg:px-6 duration-300 hover:bg-[#fafafa]/30 hover:text-[#fafafa] font-semibold">
					<i data-feather="clock"></i>
					<span class="text-[15px] ml-4 flex gap-1">Periode SPM </span>
				</a>
			</li>
			<!-- Kategori SPM  -->
			<li class="my-2 <?= ($role != 'admisi' && $role != 'kemahasiswaan') ? 'hidden' : 'block'; ?>">
				<a href="<?= site_url(ucwords($role) . '/Kategori_Spm'); ?>"
					class="p-2.5 flex items-center text-left  <?= ($active_menu === 'kategori_spm') ? 'bg-[#fafafa] text-blue-600  ring-2 ring-[#dadada]' : ''; ?> rounded-full px-2 whitespace-wrap lg:px-6 duration-300 hover:bg-[#fafafa]/30 hover:text-[#fafafa] font-semibold">
					<i data-feather="box"></i>
					<span class="text-[15px] ml-4 flex gap-1">Kategori SPM </span>
				</a>
			</li>
			<!-- Subkategori SPM  -->
			<li class="my-2 <?= ($role != 'kemahasiswaan') ? 'hidden' : 'block'; ?>">
				<a href="<?= site_url(ucwords($role) . '/Subkategori_Spm'); ?>"
					class="p-2.5 flex items-center text-left  <?= ($active_menu === 'subkategori_spm') ? 'bg-[#fafafa] text-blue-600  ring-2 ring-[#dadada]' : ''; ?> rounded-full px-2 whitespace-wrap lg:px-6 duration-300 hover:bg-[#fafafa]/30 hover:text-[#fafafa] font-semibold">
					<i data-feather="paperclip"></i>
					<span class="text-[15px] ml-4 flex gap-1">Subkategori SPM </span>
				</a>
			</li>

			<!-- SPM Mahasiswa -->
			<li
				class="my-2 <?= ($role != 'admin' && $role != 'etiquette' && $role != 'prodi') ? 'block' : 'hidden'; ?>">
				<a href="<?= site_url(ucwords($role) . '/Spm_Mahasiswa'); ?>"
					class="p-2.5 flex items-center text-left  <?= ($active_menu === 'spm_mhs') ? 'bg-[#fafafa] text-blue-600  ring-2 ring-[#dadada]' : ''; ?>  rounded-full px-2 whitespace-wrap lg:px-6 duration-300 hover:bg-[#fafafa]/30 hover:text-[#fafafa] font-semibold">
					<i data-feather="award"></i>
					<span class="text-[15px] ml-4 flex gap-1">SPM Mahasiswa</span>
				</a>
			</li>

			<!-- Syarat Wajib -->
			<li class="my-2 <?= ($role != 'mahasiswa') ? 'hidden' : 'block'; ?>">
				<a href="<?= site_url('Mahasiswa/Syarat_wajib'); ?>"
					class="p-2.5 flex items-center text-left  <?= ($active_menu === 'syarat_wajib') ? 'bg-[#fafafa] text-blue-600  ring-2 ring-[#dadada]' : ''; ?> rounded-full px-2 whitespace-wrap lg:px-6 duration-300 hover:bg-[#fafafa]/30 hover:text-[#fafafa] font-semibold">
					<i data-feather="check-circle"></i>
					<span class="text-[15px] ml-4">Syarat Wajib</span>
				</a>
			</li>

			<!-- Etiquette Mahasiswa -->
			<li class="my-2 <?= ($role != 'etiquette' && $role != 'mahasiswa') ? 'hidden' : 'block'; ?>">
				<a href="<?= site_url(ucwords($role) . '/Etiquette_Mahasiswa'); ?>"
					class="p-2.5 flex items-center text-left  <?= ($active_menu === 'etiquette_mhs') ? 'bg-[#fafafa] text-blue-600  ring-2 ring-[#dadada]' : ''; ?> rounded-full px-2 whitespace-wrap lg:px-6 duration-300 hover:bg-[#fafafa]/30 hover:text-[#fafafa] font-semibold">
					<i data-feather="activity"></i>
					<span class="text-[15px] ml-4">Etiquette Mahasiswa</span>
				</a>
			</li>
			<!-- Dokumen Unduhan -->
			<li class="my-2 <?= $role != 'mahasiswa' ? 'hidden' : 'block'; ?>">
				<a href="<?= site_url('Mahasiswa/Unduh_Dokumen'); ?>"
					class="p-2.5 flex items-center text-left  <?= ($active_menu === 'dokumen') ? 'bg-[#fafafa] text-blue-600  ring-2 ring-[#dadada]' : ''; ?>  rounded-full px-2 whitespace-wrap lg:px-6 duration-300 hover:bg-[#fafafa]/30 hover:text-[#fafafa] font-semibold">
					<i data-feather="file-text"></i>
					<span class="text-[15px] ml-4">Unduh Dokumen</span>
				</a>
			</li>

			<!-- Logout -->
			<li class="my-2">
				<a href="#logout"
					class="p-2.5 flex items-center focus:bg-[#fafafa] focus:text-blue-600 focus:ring-2 focus:ring-[#dadada] text-[#fafafa] rounded-full px-2 whitespace-nowrap lg:px-6 duration-300 hover:bg-[#fafafa]/30 hover:text-[#fafafa] font-semibold">
					<i data-feather="log-out"></i>
					<span class="text-[15px] ml-4">Logout</span>
				</a>
			</li>
		</ul>
	</nav>
</aside>

<!-- modal logout -->
<div class="modal" role="dialog" id="logout">
	<div class="modal-box bg-[#fafafa] text-blue-600">
		<h3 class="text-lg font-bold">Yakin ingin keluar?</h3>
		<p class="py-4">Semua data session kamu akan dihapus, jika kamu keluar!</p>
		<div class="modal-action">
			<a href="#"
				class="btn bg-red-600 border-none text-[#fafafa] hover:bg-orange-400 hover:text-[#fafafa] hover:border-2 hover:border-blue-600 hover:shadow-md">Tidak</a>
			<a href="<?= site_url('Auth/logout'); ?>"
				class="btn bg-blue-600 border-none text-[#fafafa] hover:bg-[#fafafa]/30 hover:text-blue-600 hover:border-2 hover:border-blue-600 hover:shadow-md">Ya</a>
		</div>
	</div>
</div>
