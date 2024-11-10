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
						<i data-feather="server" class="w-4 h-auto rotate-90"></i>
						<span class="hidden md:block">
							University
						</span>
					</a>
				</li>
				<li>
					<a class="gap-2 flex items-center">
						<i data-feather="user" class="w-4 h-auto"></i>
						<span class="hidden md:block">

							<?= ucwords($active_menu); ?>
						</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="divider border-gray-600"></div>
	<!-- Alert success -->
	<?php if ($this->session->flashdata('create_success')): ?>
		<div role="alert" class="alert alert-success">
			<svg
				xmlns="http://www.w3.org/2000/svg"
				class="h-6 w-6 shrink-0 stroke-current"
				fill="none"
				viewBox="0 0 24 24">
				<path
					stroke-linecap="round"
					stroke-linejoin="round"
					stroke-width="2"
					d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
			</svg>
			<span> <?= $this->session->flashdata('create_success'); ?></span>
		</div>
	<?php endif; ?>
	<?php if ($this->session->flashdata('update_success')): ?>
		<div role="alert" class="alert alert-success">
			<svg
				xmlns="http://www.w3.org/2000/svg"
				class="h-6 w-6 shrink-0 stroke-current"
				fill="none"
				viewBox="0 0 24 24">
				<path
					stroke-linecap="round"
					stroke-linejoin="round"
					stroke-width="2"
					d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
			</svg>
			<span> <?= $this->session->flashdata('update_success'); ?></span>
		</div>
	<?php endif; ?>
	<!-- table data -->
	<section class="relative bg-[#fafafa] rounded-2xl lg:p-8 p-4 my-4">
		<!-- add user -->
		<a href="<?= site_url('Admin/Prodi/create'); ?>" class="btn max-w-[15rem] bg-blue-600 border-none text-[#fafafa] hover:bg-[#fafafa]/30 hover:text-blue-600 hover:border-2 hover:border-blue-600 hover:shadow-md mb-4 md:w-auto flex flex-row items-center">
			<div class="bg-[#faafa] md:p-3 p-2 rounded-lg">
				<i data-feather="plus-circle" class="w-4 h-4"></i>
			</div>
			Tambah Program Studi
		</a>

		<div class="overflow-x-auto">
			<table id="" class="min-w-full table-auto table-data">
				<thead class="bg-gray-100">
					<tr>
						<th class="p-2">No</th>
						<th class="p-2 whitespace-normal">Kode Program Studi</th>
						<th class="p-2 whitespace-normal">Program Studi</th>
						<th class="p-2 whitespace-normal">Kepala Program Studi</th>
						<th class="p-2 whitespace-normal">Fakultas</th>
						<th class="p-2 whitespace-normal">Akreditasi</th>
						<th class="p-2 whitespace-normal">Jenjang Lanjutan</th>
						<th class="p-2 whitespace-normal">Sistem Pembelajaran</th>
						<th class="p-2">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					// $mahasiswa yang diambil dari control function index
					foreach ($read as $row) { ?>
						<tr class="border-t">
							<td class="p-2"><?= $no; ?></td>
							<td class="p-2 whitespace-nowrap"><?= $row['id_prodi']; ?></td>
							<td class="p-2 whitespace-nowrap"><?= $row['tingkat_jenjang']; ?> <?= $row['prodi']; ?></td>
							<td class="p-2 whitespace-nowrap"><?= $row['nama']; ?></td>
							<td class="p-2 whitespace-nowrap"><?= $row['fakultas']; ?></td>
							<td class="p-2 whitespace-nowrap"><?= $row['akreditasi']; ?></td>
							<td class="p-2 whitespace-nowrap"><?= $row['jenjang_lanjutan']; ?></td>
							<td class="p-2 whitespace-nowrap"><?= $row['sistem_pembelajaran']; ?></td>
							<td class="p-2 flex flex-row items-center justify-center mt-2 gap-2">
								<a href="<?= site_url('Admin/Prodi/edit/' . $row['id_prodi']); ?>" class="bg-green-600 rounded-full p-2 text-[#fafafa] hover:px-4 flex items-center gap-2 group">
									<i data-feather="edit" class="w-4 h-auto"></i>
									<p class="hidden group-hover:block text-white transition-opacity duration-300">Edit</p>
								</a>
								<button type="button" onclick="openDeleteModal('<?= $row['id_prodi']; ?>')" class="bg-red-600 rounded-full p-2 text-[#fafafa] hover:px-4 flex items-center gap-2 group">
									<i data-feather="trash-2" class="w-4 h-auto"></i>
									<p class="hidden group-hover:block text-white transition-opacity duration-300">Hapus</p>
								</button>
							</td>
						</tr>

						<!-- Modal Hapus Prodi -->
						<dialog id="hapusProdi" class="modal overflow-hidden">
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
								<form method="post" action="<?= site_url('Admin/Prodi/delete/'); ?>">
									<?= csrf(); ?>
									<input id="id" type="text" name="id_prodi" hidden>
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
						<th class="p-2">No</th>
						<th class="p-2 whitespace-normal">Kode Program Studi</th>
						<th class="p-2 whitespace-normal">Program Studi</th>
						<th class="p-2 whitespace-normal">Kepala Program Studi</th>
						<th class="p-2 whitespace-normal">Fakultas</th>
						<th class="p-2 whitespace-normal">Akreditasi</th>
						<th class="p-2 whitespace-normal">Jenjang Lanjutan</th>
						<th class="p-2 whitespace-normal">Sistem Pembelajaran</th>
						<th class="p-2">Aksi</th>
					</tr>
				</tfoot>
			</table>
		</div>

	</section>

</section>
<script>
	const openDeleteModal = (id) => {
		document.getElementById('id').value = id;
		document.getElementById('hapusProdi').showModal();
	}
</script>
