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
	<!-- table data -->
	<section class="relative bg-[#fafafa] rounded-2xl lg:p-8 p-4 my-4">
		<!-- add user -->
		<a href="<?= site_url('Admin/User/Mahasiswa/create'); ?>" class="btn max-w-[15rem] bg-blue-600 border-none text-[#fafafa] hover:bg-[#fafafa]/30 hover:text-blue-600 hover:border-2 hover:border-blue-600 hover:shadow-md mb-4 md:w-auto flex flex-row items-center">
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
						<th class="px-4 py-2">Email</th>
						<th class="px-4 py-2 whitespace-normal">Tanggal Lahir</th>
						<th class="px-4 py-2 whitespace-normal">Tahun Masuk <br>- Tahun Lulus</th>
						<th class="px-4 py-2">Semester</th>
						<th class="px-4 py-2 whitespace-normal">Status Mahasiswa</th>
						<th class="px-4 py-2">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach ($mahasiswa as $row) { ?>
						<tr class="border-t">
							<td class="px-4 py-2"><?= $no; ?></td>
							<td class="px-4 py-2">
								<div class="flex flex-row gap-2 items-center">
									<div class="flex flex-col items-center justify-center">
										<p class="truncate w-full ml-2 font-semibold capitalize"><?= $row['nama'] ?></p>
										<p class="truncate w-full ml-2 text-[0.6rem] tracking-wide uppercase"><?= $row['tingkat_jenjang']; ?> <?= $row['prodi']; ?> - <?= $row['nim']; ?></p>
									</div>
								</div>
							</td>
							<td class="px-4 py-2 whitespace-nowrap"><?= $row['email']; ?></td>
							<td class="px-4 py-2 whitespace-nowrap"><?= $row['tgl_lahir']; ?></td>
							<td class="px-4 py-2 whitespace-normal">
								<?= $row['tahun_masuk']; ?><?= !empty($row['tahun_lulus']) ? ' - ' . $row['tahun_lulus'] : ''; ?>
							</td>
							<td class="px-4 py-2 whitespace-nowrap">Semester <?= $row['semester']; ?></td>
							<td class="px-4 py-2 whitespace-nowrap"><?= $row['status_mahasiswa']; ?></td>
							<td class="px-4 py-2 flex flex-row items-center justify-center mt-2 gap-2">
								<a href="<?= site_url('Admin/User/Mahasiswa/edit/' . $row['nim']) ?>" class="bg-green-600 rounded-full p-2 text-[#fafafa] hover:px-4 flex items-center gap-2 group">
									<i data-feather="edit" class="w-4 h-auto"></i>
								</a>
								<button type="button" onclick="openDeleteModal('<?= $row['nim']; ?>')" class="bg-red-600 rounded-full p-2 text-[#fafafa] hover:px-4 flex items-center gap-2 group">
									<i data-feather="trash-2" class="w-4 h-auto"></i>
								</button>
							</td>
						</tr>

						<!-- Modal Hapus Mhs -->
						<dialog id="hapusMhs" class="modal overflow-hidden">
							<div class="modal-box bg-[#fafafa]">
								<!-- Tombol close di sudut kanan atas -->
								<?= csrf(); ?>
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
								<form method="post" action="<?= site_url('Admin/User/Mahasiswa/delete/'); ?>">
									<?= csrf(); ?>
									<input id="nim" type="text" name="nim" value="<?= $row['nim']; ?>" hidden>
									<div class="modal-action relative" style="z-index: 1000;">
										<button type="button" class="btn bg-blue-600 border-none text-[#fafafa] hover:bg-[#fafafa]/30 hover:text-blue-600 hover:border-2 hover:border-blue-600 hover:shadow-md mb-4" onclick="this.closest('dialog').close();">Close</button>
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
						<th class="px-4 py-2">Email</th>
						<th class="px-4 py-2 whitespace-normal">Tanggal Lahir</th>
						<th class="px-4 py-2 whitespace-normal">Tahun Masuk <br>- Tahun Lulus</th>
						<th class="px-4 py-2">Semester</th>
						<th class="px-4 py-2 whitespace-normal">Status Mahasiswa</th>
						<th class="px-4 py-2">Aksi</th>
					</tr>
				</tfoot>
			</table>
		</div>

	</section>

</section>
<script>
	const openDeleteModal = (id) => {
		document.getElementById('nim').value = id;
		document.getElementById('hapusMhs').showModal();
	}
</script>
