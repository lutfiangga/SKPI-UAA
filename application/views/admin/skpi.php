<section class="relative flex flex-col justify-between">
	<div class="flex flex-row justify-between items-center">
		<div class="flex flex-row justify-start items-center gap-4">
			<h1 class="md:text-3xl text-xl font-bold text-blue-600">Verifikasi SKPI</h1>
			<div class="bg-blue-600 md:p-3 p-2 text-[#fafafa] rounded-lg">
				<i data-feather="award" fill="currentColor" class="w-4 h-4 md:h-[24px] md:w-[24px]"></i>
			</div>
		</div>
		<div class="breadcrumbs text-sm justify-end text-blue-600">
			<ul>
				<li>
					<a>
						<svg
							xmlns="http://www.w3.org/2000/svg"
							fill="none"
							viewBox="0 0 24 24"
							class="h-4 w-4 stroke-current">
							<path
								stroke-linecap="round"
								stroke-linejoin="round"
								stroke-width="2"
								d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
						</svg>
						Application
					</a>
				</li>
				<li>
					<a>
						<svg
							xmlns="http://www.w3.org/2000/svg"
							fill="none"
							viewBox="0 0 24 24"
							class="h-4 w-4 stroke-current">
							<path
								stroke-linecap="round"
								stroke-linejoin="round"
								stroke-width="2"
								d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
						</svg>
						SKPI
					</a>
				</li>
				<li>
					<span class="inline-flex items-center gap-2">
						<svg
							xmlns="http://www.w3.org/2000/svg"
							fill="none"
							viewBox="0 0 24 24"
							class="h-4 w-4 stroke-current">
							<path
								stroke-linecap="round"
								stroke-linejoin="round"
								stroke-width="2"
								d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
						</svg>
						Verification
					</span>
				</li>
			</ul>
		</div>
	</div>
	<div class="divider border-gray-300"></div>

	<div class="w-full bg-[#fafafa] rounded-2xl p-4">
		<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
			<select name="" id="" class="p-2 select w-full select-bordered rounded-md bg-[#fafafa] focus:ring-inset focus:ring-blue-400 border border-gray-300">
				<option value="" selected disabled>Tanggal</option>
			</select>
			<select name="" id="" class="p-2 select w-full select-bordered rounded-md bg-[#fafafa] focus:ring-inset focus:ring-blue-400 border border-gray-300">
				<option value="" selected disabled>Kategori</option>
			</select>
			<button type="submit" class="btn bg-blue-600 border-none text-[#fafafa] hover:bg-[#fafafa]/30 hover:text-blue-600 hover:border-2 hover:border-blue-600 hover:border-inset w-full md:w-auto">Filter</button>
		</div>
	</div>

	<!-- table data -->
	<section class="relative bg-[#fafafa] rounded-2xl lg:p-8 p-4 my-4">
		<!-- add user -->
		<a href="<?= site_url('admin/user/create'); ?>" class="btn bg-blue-600 border-none text-[#fafafa] hover:bg-[#fafafa]/30 hover:text-blue-600 hover:border-2 hover:border-blue-600 hover:shadow-md mb-4 w-full md:w-auto">Tambah Pengguna</a>

		<div class="overflow-x-auto">
			<table class="min-w-full table-auto table-data">
				<thead class="bg-gray-100">
					<tr>
						<th class="px-4 py-2">No</th>
						<th class="px-4 py-2">Nama</th>
						<th class="px-4 py-2">Tanggal</th>
						<th class="px-4 py-2">File</th>
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
						<td class="px-4 py-2 whitespace-nowrap">07 Februari 2024</td>
						<td class="px-4 py-2">
							<a href="#" class="flex flex-row mx-2 p-2 items-center gap-2 hover:rounded-lg hover:bg-[#EEF0F6] cursor-pointer">
								<div>
									<div class="rounded-md text-[#fafafa] bg-blue-600 p-2">
										<i data-feather="file-text" class="w-6 h-auto"></i>
									</div>
								</div>
								<p class="text-sm max-w-full font-thin truncate whitespace-wrap">Lorem ipsum dolor sit.pdf</p>
							</a>

						</td>
						<td>
							<span class="flex items-center text-sm gap-2 text-green-600 hover:bg-[#EEF0F6] px-4 py-2 rounded-full">
								<i data-feather="check-circle" class="w-4 h-auto"></i>
								Verified
							</span>
						</td>
						<td class="px-4 py-2 flex flex-row items-center justify-center mt-2 gap-2">
							<a href="#" class="bg-green-600 rounded-full p-2 text-[#fafafa] hover:px-4 flex items-center gap-2 group">
								<i data-feather="check-circle" class="w-4 h-auto"></i>
								<p class="hidden group-hover:block text-white transition-opacity duration-300">Diterima</p>
							</a>
							<a href="#" class="bg-red-600 rounded-full p-2 text-[#fafafa] hover:px-4 flex items-center gap-2 group">
								<i data-feather="x-circle" class="w-4 h-auto"></i>
								<p class="hidden group-hover:block text-white transition-opacity duration-300">Ditolak</p>
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
						<td class="px-4 py-2 whitespace-nowrap">11 Februari 2024</td>
						<td class="px-4 py-2">
							<a href="#" class="flex flex-row mx-2 p-2 items-center gap-2 hover:rounded-lg hover:bg-[#EEF0F6] cursor-pointer">
								<div>
									<div class="rounded-md text-[#fafafa] bg-blue-600 p-2">
										<i data-feather="file-text" class="w-6 h-auto"></i>
									</div>
								</div>
								<p class="text-sm max-w-full font-thin truncate whitespace-wrap">Lorem ipsum dolor sit.pdf</p>
							</a>

						</td>
						<td>
							<span class="flex items-center text-sm gap-2 text-orange-600 hover:bg-[#EEF0F6] px-4 py-2 rounded-full">
								<i data-feather="alert-circle" class="w-4 h-auto"></i>
								Pending
							</span>
						</td>
						<td class="px-4 py-2 flex flex-row items-center justify-center mt-2 gap-2">
							<a href="#" class="bg-green-600 rounded-full p-2 text-[#fafafa] hover:px-4 flex items-center gap-2 group">
								<i data-feather="check-circle" class="w-4 h-auto"></i>
								<p class="hidden group-hover:block text-white transition-opacity duration-300">Diterima</p>
							</a>
							<a href="#" class="bg-red-600 rounded-full p-2 text-[#fafafa] hover:px-4 flex items-center gap-2 group">
								<i data-feather="x-circle" class="w-4 h-auto"></i>
								<p class="hidden group-hover:block text-white transition-opacity duration-300">Ditolak</p>
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
						<td class="px-4 py-2 whitespace-nowrap">11 Februari 2024</td>
						<td class="px-4 py-2">
							<a href="#" class="flex flex-row mx-2 p-2 items-center gap-2 hover:rounded-lg hover:bg-[#EEF0F6] cursor-pointer">
								<div>
									<div class="rounded-md text-[#fafafa] bg-blue-600 p-2">
										<i data-feather="file-text" class="w-6 h-auto"></i>
									</div>
								</div>
								<p class="text-sm max-w-full font-thin truncate whitespace-wrap">Lorem ipsum dolor sit.pdf</p>
							</a>

						</td>
						<td>
							<span class="flex items-center text-sm gap-2 text-red-600 hover:bg-[#EEF0F6] px-4 py-2 rounded-full">
								<i data-feather="x-circle" class="w-4 h-auto"></i>
								Unverified
							</span>
						</td>
						<td class="px-4 py-2 flex flex-row items-center justify-center mt-2 gap-2">
							<a href="#" class="bg-green-600 rounded-full p-2 text-[#fafafa] hover:px-4 flex items-center gap-2 group">
								<i data-feather="check-circle" class="w-4 h-auto"></i>
								<p class="hidden group-hover:block text-white transition-opacity duration-300">Diterima</p>
							</a>
							<a href="#" class="bg-red-600 rounded-full p-2 text-[#fafafa] hover:px-4 flex items-center gap-2 group">
								<i data-feather="x-circle" class="w-4 h-auto"></i>
								<p class="hidden group-hover:block text-white transition-opacity duration-300">Ditolak</p>
							</a>

						</td>
					</tr>
				</tbody>
				<tfoot class="bg-gray-100">
					<tr>
						<th class="px-4 py-2">No</th>
						<th class="px-4 py-2">Nama</th>
						<th class="px-4 py-2">Tanggal</th>
						<th class="px-4 py-2">File</th>
						<th class="px-4 py-2">Status</th>
						<th class="px-4 py-2">Aksi</th>
					</tr>
				</tfoot>
			</table>
		</div>
	</section>


</section>
