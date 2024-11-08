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
		<a href="<?= site_url('Admin/User/Staff/create'); ?>" class="btn max-w-[15rem] bg-blue-600 border-none text-[#fafafa] hover:bg-[#fafafa]/30 hover:text-blue-600 hover:border-2 hover:border-blue-600 hover:shadow-md mb-4 md:w-auto flex flex-row items-center">
			<div class="bg-[#faafa] md:p-3 p-2 rounded-lg">
				<i data-feather="user-plus" fill="currentColor" class="w-4 h-4"></i>
			</div>
			Tambah Mahasiswa
		</a>

		<div class="overflow-x-auto">
			<table id="" class="min-w-full table-auto table-data">
				<thead class="bg-gray-100">
					<tr>
						<th class="px-4 py-2">No</th>
						<th class="px-4 py-2">Nama</th>
						<th class="px-4 py-2">Jenis Kelamin</th>
						<th class="px-4 py-2">Email</th>
						<th class="px-4 py-2">No Hp</th>
						<th class="px-4 py-2 whitespace-normal">Jabatan</th>
						<th class="px-4 py-2">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach ($read as $row) { ?>
						<tr class="border-t">
							<td class="px-4 py-2"><?= $no; ?></td>
							<td class="px-4 py-2">
								<div class="flex flex-row gap-2 items-center">
									<div class="flex flex-col items-center justify-center">
										<p class="truncate w-full ml-2 font-semibold capitalize"><?= $row['nama'] ?></p>
										<p class="truncate w-full ml-2 text-[0.6rem] tracking-wide uppercase"><?= $row['id_staff']; ?></p>
									</div>
								</div>
							</td>
							<td class="px-4 py-2 whitespace-nowrap"><?= $row['jenis_kelamin']; ?></td>
							<td class="px-4 py-2 whitespace-nowrap"><?= $row['email']; ?></td>
							<td class="px-4 py-2 whitespace-nowrap"><?= $row['phone']; ?></td>
							<td class="px-4 py-2 whitespace-normal"><?= $row['jabatan']; ?></td>
							<td class="px-4 py-2 flex flex-row items-center justify-center mt-2 gap-2">
								<a href="<?= site_url('Admin/User/Staff/edit/' . $row['id_staff']) ?>" class="bg-green-600 rounded-full p-2 text-[#fafafa] hover:px-4 flex items-center gap-2 group">
									<i data-feather="edit" class="w-4 h-auto"></i>
								</a>
								<button type="button" onclick="openDeleteModal('<?= $row['id_staff']; ?>')" class="bg-red-600 rounded-full p-2 text-[#fafafa] hover:px-4 flex items-center gap-2 group">
									<i data-feather="trash-2" class="w-4 h-auto"></i>
								</button>
							</td>
						</tr>

						<!-- Modal Hapus Staff -->
						<dialog id="hapusStaff" class="modal overflow-hidden">
							<div class="modal-box bg-[#fafafa]">
								<!-- Tombol close di sudut kanan atas -->
								<form method="dialog">
									<button class="btn btn-sm btn-circle btn-ghost text-red-600 absolute right-2 top-2">✕</button>
								</form>
								<h3 class="text-lg font-bold text-red-600 flex flex-row items-center">
									Hapus Data
									<div class="bg-red-600 md:p-3 p-2 text-[#fafafa] rounded-lg ml-2 md:ml-4">
										<i data-feather="trash-2" class="w-4 h-4"></i>
									</div>
								</h3>
								<div class="divider border-gray-400"></div>
								<p class="text-gray-700 mb-4">Apakah Anda yakin ingin menghapus Data ini?</p>
								<form method="post" action="<?= site_url('Admin/User/Staff/delete/'); ?>">
									<?= csrf(); ?>
									<input id="staff_id" type="text" name="id_staff" value="<?= $row['id_staff']; ?>" hidden>
									<div class="modal-action relative" style="z-index: 1000;">
										<button type="button" class="btn bg-blue-600 border-none text-[#fafafa] hover:bg-[#fafafa]/30 hover:text-blue-600 hover:border-2 hover:border-blue-600 hover:shadow-md mb-4" onclick="document.getElementById('hapusStaff').close();">Close</button>
										<button type="submit" class="btn bg-red-600 border-none text-[#fafafa] hover:bg-orange-400 hover:text-[#fafafa] hover:border-2 hover:border-blue-600 hover:shadow-md mb-4">Hapus</button>
									</div>
								</form>
							</div>
						</dialog>
					<?php
						$no++;
					}
					?>
				</tbody>
				<tfoot class="bg-gray-100">
					<tr>
						<th class="px-4 py-2">No</th>
						<th class="px-4 py-2">Nama</th>
						<th class="px-4 py-2">Jenis Kelamin</th>
						<th class="px-4 py-2">Email</th>
						<th class="px-4 py-2">No Hp</th>
						<th class="px-4 py-2 whitespace-normal">Jabatan</th>
						<th class="px-4 py-2">Aksi</th>
					</tr>
				</tfoot>
			</table>
		</div>

	</section>

</section>
<script>
	const openDeleteModal = (id) => {
		document.getElementById('staff_id').value = id;
		document.getElementById('hapusStaff').showModal();
	}
</script>
