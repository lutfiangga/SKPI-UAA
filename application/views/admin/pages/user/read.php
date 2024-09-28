<section class="relative flex flex-col justify-between">
	<div class="flex flex-row justify-between items-center">
		<div class="flex flex-row justify-start items-center md:gap-4 gap-2">
			<h1 class="md:text-3xl text-xl font-bold text-blue-600 whitespace-nowrap"><?= $sub; ?></h1>
			<div class="bg-blue-600 md:p-3 p-2 text-[#fafafa] rounded-lg">
				<i data-feather="users" fill="currentColor" class="w-4 h-4 md:h-[24px] md:w-[24px]"></i>
			</div>
		</div>
		<div class="breadcrumbs text-sm justify-end text-blue-600">
			<ul>
				<li>
					<a class="gap-2 flex items-center">
						<i data-feather="airplay" class="w-4 h-auto"></i>
						<span class="hidden md:block">

							Application
						</span>
					</a>
				</li>
				<li>
					<a class="gap-2 flex items-center">
						<i data-feather="users" class="w-4 h-auto"></i>
						<span class="hidden md:block">

							Users
						</span>
					</a>
				</li>
				<li>
					<a class="gap-2 flex items-center">
						<i data-feather="user" class="w-4 h-auto"></i>
						<span class="hidden md:block">

							Mahasiswa
						</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="divider border-gray-600"></div>

	<div>

		<div class="w-full bg-[#fafafa] rounded-2xl p-4">
			<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
				<select name="date" class="p-2 select w-full select-bordered rounded-md bg-[#fafafa] focus:ring-inset focus:ring-blue-400 border border-gray-300 date-select" onchange="changeOption(this)">
					<option value="" selected disabled>Tanggal</option>
					<option value="1-week-ago">1 Minggu yang lalu</option>
					<option value="2-weeks-ago">2 Minggu yang lalu</option>
					<option value="1-month-ago">1 Bulan yang lalu</option>
					<option value="2-months-ago">2 Bulan yang lalu</option>
					<option value="3-months-ago">3 Bulan yang lalu</option>
					<option value="6-months-ago">6 Bulan yang lalu</option>
					<option value="1-year-ago">1 Tahun yang lalu</option>
					<option value="custom">Custom</option>
					<option class="date-range" value="custom-range" hidden></option> <!-- Opsi untuk rentang tanggal yang dipilih -->
				</select>
				<select name="category" class="p-2 select w-full select-bordered rounded-md bg-[#fafafa] focus:ring-inset focus:ring-blue-400 border border-gray-300 js-category-select">
					<option value="" selected disabled>Kategori</option>
				</select>
				<button type="submit" class="btn bg-blue-600 border-none text-[#fafafa] hover:bg-[#fafafa]/30 hover:text-blue-600 hover:border-blue-600 w-full md:w-auto">Filter</button>
			</div>
		</div>

		<!-- Modal untuk Custom Date Range -->
		<dialog class="modal custom-datepicker">
			<div class="modal-box">
				<form method="dialog">
					<button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
				</form>
				<h3 class="text-lg font-bold mb-4">Pilih Rentang Tanggal</h3>
				<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
					<input type="text" name="start_date" class="flatpickr p-2 w-full rounded-md bg-[#fafafa] focus:ring-inset focus:ring-blue-400 border border-gray-300" placeholder="Start Date">
					<input type="text" name="end_date" class="flatpickr p-2 w-full rounded-md bg-[#fafafa] focus:ring-inset focus:ring-blue-400 border border-gray-300" placeholder="End Date">
				</div>
				<div class="modal-action mt-4">
					<button class="btn btn-blue action-btn">Simpan</button>
				</div>
			</div>
		</dialog>
	</div>

	<!-- table data -->
	<section class="relative bg-[#fafafa] rounded-2xl lg:p-8 p-4 my-4">
		<!-- add user -->
		<button class="btn bg-blue-600 border-none text-[#fafafa] hover:bg-[#fafafa]/30 hover:text-blue-600 hover:border-2 hover:border-blue-600 hover:shadow-md mb-4 w-full md:w-auto flex flex-row items-center" onclick="addUser.showModal()">
			<div class="bg-[#faafa] md:p-3 p-2 rounded-lg">
				<i data-feather="user-plus" fill="currentColor" class="w-4 h-4"></i>
			</div>
			Tambah Pengguna
		</button>

		<div class="overflow-x-auto">
			<table id="" class="min-w-full table-auto table-data">
				<thead class="bg-gray-100">
					<tr>
						<th class="px-4 py-2">No</th>
						<th class="px-4 py-2">Nama</th>
						<th class="px-4 py-2">Email</th>
						<th class="px-4 py-2">Status</th>
						<th class="px-4 py-2">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<tr class="border-t">
						<td class="px-4 py-2">2</td>
						<td class="px-4 py-2">
							<div class="flex flex-row gap-2 items-center">
								<img src="https://via.placeholder.com/40" alt="role" class="rounded-full w-8 h-8">
								<div class="flex flex-col items-center justify-center">
									<p class="truncate w-full ml-2 font-semibold">Mahasiswa aktif tahun ajaran 2020</p>
									<p class="truncate w-full ml-2 text-[0.6rem] tracking-wide uppercase">sistem informasi - 32132112</p>
								</div>
							</div>
						</td>
						<td class="px-4 py-2 whitespace-nowrap">almaata@almaata.ac.id</td>
						<td>
							<span class="flex items-center justify-center cursor-default text-sm gap-2 text-green-600 hover:bg-[#EEF0F6] py-2 rounded-full">
								<i data-feather="check-circle" class="w-4 h-auto"></i>
								Active
							</span>
						</td>
						<td class="px-4 py-2 flex flex-row items-center justify-center mt-2 gap-2">
							<a href="#" class="bg-green-600 rounded-full p-2 text-[#fafafa] hover:px-4 flex items-center gap-2 group">
								<i data-feather="edit" class="w-4 h-auto"></i>
								<p class="hidden group-hover:block text-white transition-opacity duration-300">Edit</p>
							</a>
							<a href="#" class="bg-red-600 rounded-full p-2 text-[#fafafa] hover:px-4 flex items-center gap-2 group">
								<i data-feather="trash-2" class="w-4 h-auto"></i>
								<p class="hidden group-hover:block text-white transition-opacity duration-300">Hapus</p>
							</a>

						</td>
					</tr>
					<tr class="border-t">
						<td class="px-4 py-2">1</td>
						<td class="px-4 py-2">
							<div class="flex flex-row gap-2 items-center">
								<img src="https://via.placeholder.com/40" alt="role" class="rounded-full w-8 h-8">
								<div class="flex flex-col items-center justify-center">
									<p class="truncate w-full ml-2 font-semibold">Mahasiswa aktif tahun ajaran 2020</p>
									<p class="truncate w-full ml-2 text-[0.6rem] tracking-wide uppercase">sistem informasi - 32132112</p>
								</div>
							</div>
						</td>
						<td class="px-4 py-2 whitespace-nowrap">almaata@almaata.ac.id</td>
						<td>
							<span class="flex items-center justify-center cursor-default text-sm gap-2 text-red-600 hover:bg-[#EEF0F6] py-2 rounded-full">
								<i data-feather="x-circle" class="w-4 h-auto"></i>
								Inactive
							</span>
						</td>
						<td class="px-4 py-2 flex flex-row items-center justify-center mt-2 gap-2">
							<a href="#" class="bg-green-600 rounded-full p-2 text-[#fafafa] hover:px-4 flex items-center gap-2 group">
								<i data-feather="edit" class="w-4 h-auto"></i>
								<p class="hidden group-hover:block text-white transition-opacity duration-300">Edit</p>
							</a>
							<a href="#" class="bg-red-600 rounded-full p-2 text-[#fafafa] hover:px-4 flex items-center gap-2 group">
								<i data-feather="trash-2" class="w-4 h-auto"></i>
								<p class="hidden group-hover:block text-white transition-opacity duration-300">Hapus</p>
							</a>

						</td>
					</tr>
				</tbody>
				<tfoot class="bg-gray-100">
					<tr>
						<th class="px-4 py-2">No</th>
						<th class="px-4 py-2">Nama</th>
						<th class="px-4 py-2">Email</th>
						<th class="px-4 py-2">Status</th>
						<th class="px-4 py-2">Aksi</th>
					</tr>
				</tfoot>
			</table>
		</div>

	</section>

	<!-- modal add user -->
	<dialog id="addUser" class="modal overflow-hidden">
		<div class="modal-box bg-[#fafafa]">
			<!-- Tombol close di sudut kanan atas -->
			<form method="dialog">
				<button class="btn btn-sm btn-circle btn-ghost text-red-600 absolute right-2 top-2">✕</button>
			</form>
			<h3 class="text-lg font-bold text-blue-600 flex flex-row items-center">
				Tambah Pengguna
				<div class="bg-blue-600 md:p-3 p-2 text-[#fafafa] rounded-lg ml-2 md:ml-4">
					<i data-feather="user-plus" fill="currentColor" class="w-4 h-4"></i>
				</div>
			</h3>
			<div class="divider border-gray-400"></div>
			<form method="post" action="<?= site_url('Admin/User/do_upload'); ?>" enctype="multipart/form-data" role="form">
				<div>
					<div class="mb-4">
						<label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama:</label>
						<input type="text" id="name" name="name" required oninput="inputValidation(this)"
							class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2"
							placeholder="Masukkan nama" />
						<p id="nameError" class="text-red-500 mt-2 text-sm hidden">Nama harus minimal 3 karakter dan hanya mengandung huruf.</p>
					</div>

					<div class="mb-4">
						<label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email:</label>
						<input type="email" id="email" name="email" required oninput="inputValidation(this)"
							class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2"
							placeholder="Masukkan email" />
						<p id="emailError" class="text-red-500 text-sm mt-2 hidden">Format email tidak valid.</p>
					</div>

					<div class="mb-4">
						<label for="role" class="block text-sm font-medium text-gray-700">Role</label>
						<select id="role" name="role" required
							class="mt-1 selectize block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2 bg-[#fafafa] text-gray-600 block">
							<option value="" selected disabled>Pilih role</option>
							<option value="admin">Admin</option>
							<option value="user">User</option>
							<option value="editor">Editor</option>
						</select>
					</div>
					<div class="mb-4">
						<label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password:</label>
						<div class="flex flex-row w-full mt-1">
							<input type="password" id="password" name="password" required oninput="inputValidation(this)"
								class="block w-full border border-gray-300 rounded-l-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2 pr-10"
								placeholder="Masukkan password" />
							<button type="button" id="togglePassword" class="flex items-center p-2 bg-blue-600 rounded-r-md text-white hover:bg-blue-500 focus:outline-none" onclick="showPassword()">
								<i id="iconShow" data-feather="eye" class="h-4 w-4"></i>
								<i id="iconHide" data-feather="eye-off" class="h-4 w-4 hidden"></i>
							</button>
						</div>
						<p id="passwordError" class="text-red-500 text-sm mt-2 hidden">Password harus memiliki minimal 6 karakter, mengandung huruf besar, huruf kecil, dan angka.</p>
					</div>

					<div class="mb-4">
						<label for="file" class="block text-sm font-medium text-gray-700 mb-2">Upload File:</label>
						<div class="relative file-upload-container">
							<div class="bg-white drop-zone relative cursor-pointer transition-all text-center p-8 border-2 border-blue-400 rounded-lg max-w-md w-full shadow-lg">

								<div class="border-2 border-dashed border-gray-400 rounded-lg p-4 mb-4 transition hover:border-indigo-500">
									<p class="text-gray-600">
										<i class="fas fa-cloud-upload-alt"></i> Drag & Drop atau Klik untuk Upload File
									</p>
								</div>

								<input id="file" type="file" class="file-input hidden" />

								<div class="relative mt-4">
									<div class="progress-bar text-sm bg-green-500 h-5 rounded transition-all duration-300" style="width: 0%"></div>
									<div class="progress-text text-sm absolute left-1/2 transform -translate-x-1/2 text-gray-800" style="display: none">0%</div>
								</div>

							</div>
							<!-- file preview -->
							<div class="file-preview ">
								<div class="flex justify-between items-center p-2 mt-2 rounded-xl bg-[#EEF0F6]">
									<div class="file-name text-blue-600 text-sm truncate max-w-xs p-2"></div>
									<button type="button" class="clear-btn btn bg-red-600 border-none text-[#fafafa] hover:bg-orange-400 hover:border-2 hover:border-blue-600 hover:shadow-md hidden text-sm">
										<span class="flex flex-row gap-2 items-center">
											<i data-feather="trash-2" class="w-4 h-auto"></i> Hapus
										</span>
									</button>
								</div>
								<div class="preview-container"></div>
							</div>

							<div class="modal hidden">
								<span class="close-modal text-white text-3xl cursor-pointer absolute top-4 right-4">&times;</span>
								<img class="modal-content max-w-80% max-h-80%" />
							</div>
						</div>

					</div>

				</div>
				<div class="divider border-gray-400"></div>
				<div class="modal-action relative" style="z-index: 1000;">
					<button type="submit" class="btn disabled:text-gray-400 disabled:cursor-not-allowed bg-blue-600 border-none text-[#fafafa] hover:bg-[#fafafa]/30 hover:text-blue-600 hover:border-2 hover:border-blue-600 hover:shadow-md mb-4">Submit</button>
					<button type="button" class="btn bg-red-600 border-none text-[#fafafa] hover:bg-orange-400 hover:text-[#fafafa] hover:border-2 hover:border-blue-600 hover:shadow-md mb-4" onclick="this.closest('dialog').close();">Close</button>
				</div>
			</form>
		</div>
	</dialog>

</section>
