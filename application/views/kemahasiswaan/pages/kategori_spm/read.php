<section class="relative flex flex-col justify-between">
	<div class="flex flex-row justify-between items-center">
		<div class="flex flex-row justify-start items-center md:gap-4 gap-2">
			<h1 class="md:text-3xl text-xl font-bold text-blue-600 whitespace-nowrap"><?= $sub; ?></h1>
			<div class="bg-blue-600 md:p-3 p-2 text-[#fafafa] rounded-lg">
				<i data-feather="paperclip" class="w-4 h-4 md:h-[24px] md:w-[24px]"></i>
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
						<i data-feather="paperclip" class="w-4 h-auto"></i>
						<span class="hidden md:block">
							Kategori
						</span>
					</a>
				</li>
				<li>
					<a class="gap-2 flex items-center">
						<i data-feather="award" class="w-4 h-auto"></i>
						<span class="hidden md:block">
							SPM
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
		<button class="btn bg-blue-600 border-none text-[#fafafa] hover:bg-[#fafafa]/30 hover:text-blue-600 hover:border-2 hover:border-blue-600 hover:shadow-md mb-4 w-full md:w-auto flex flex-row items-center" onclick="addkategori.showModal()">
			<div class="bg-[#faafa] md:p-3 p-2 rounded-lg">
				<i data-feather="paperclip" class="w-4 h-4"></i>
			</div>
			Tambah Kategori
		</button>

		<div class="overflow-x-auto">
			<table id="" class="min-w-full table-auto table-data">
				<thead class="bg-gray-100">
					<tr>
						<th class="p-2">No</th>
						<th class="p-2">Kategori</th>
						<th class="p-2">Poin</th>
						<th class="p-2">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php if (!empty($read)) {
						$no = 1;
						foreach ($read->result_array() as $row) { ?>
							<tr class="border-t">
								<td class="p-2"><?= $no; ?></td>
								<td class="p-2 whitespace-normal"><?= $row['nama_kategori'] ?></td>
								<td>
									<span class="flex items-center cursor-default text-sm gap-2 text-green-600 hover:bg-lavender-gray py-2 rounded-full">
										<i data-feather="check-circle" class="w-4 h-auto"></i>
										<?= $row['poin'] ?> Poin
									</span>
								</td>
								<td class="p-2 flex flex-row items-center mt-2 gap-2">
									<button class="bg-green-600 rounded-full p-2 text-[#fafafa] hover:px-4 flex items-center gap-2 group"
										onclick="openEditModal(<?= $row['id_kategori']; ?>, '<?= $row['nama_kategori']; ?>', '<?= $row['poin']; ?>')">
										<i data-feather="edit" class="w-4 h-auto"></i>
										<p class="hidden group-hover:block text-white transition-opacity duration-300">Edit</p>
									</button>

									<button class="bg-red-600 rounded-full p-2 text-[#fafafa] hover:px-4 flex items-center gap-2 group" onclick="openDeleteModal(<?= $row['id_kategori']; ?>)">
										<i data-feather="trash-2" class="w-4 h-auto"></i>
										<p class="hidden group-hover:block text-white transition-opacity duration-300">Hapus</p>
									</button>

								</td>
							</tr>
						<?php $no++;
						}
					} else { ?>
						<tr>
							<td colspan="4" class="text-center">Tidak ada data</td>
						</tr>
					<?php } ?>
				</tbody>
				<tfoot class="bg-gray-100">
					<tr>
						<th class="p-2">No</th>
						<th class="p-2">Kategori</th>
						<th class="p-2">Poin</th>
						<th class="p-2">Aksi</th>
					</tr>
				</tfoot>
			</table>
		</div>

	</section>

	<!-- modal add Kategori -->
	<dialog id="addkategori" class="modal overflow-hidden">
		<div class="modal-box bg-[#fafafa]">
			<!-- Tombol close di sudut kanan atas -->
			<form method="dialog">
				<button class="btn btn-sm btn-circle btn-ghost text-red-600 absolute right-2 top-2">✕</button>
			</form>
			<h3 class="text-lg font-bold text-blue-600 flex flex-row items-center">
				Tambah Kategori
				<div class="bg-blue-600 md:p-3 p-2 text-[#fafafa] rounded-lg ml-2 md:ml-4">
					<i data-feather="paperclip" class="w-4 h-4"></i>
				</div>
			</h3>
			<div class="divider border-gray-400"></div>
			<form method="post" action="<?= site_url('Kemahasiswaan/Kategori_SPM_Mahasiswa/save'); ?>" enctype="multipart/form-data" role="form">
				<?= csrf(); ?>
				<div>
					<div class="mb-4">
						<label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama Kategori:</label>
						<input type="text" id="name" name="nama_kategori" required
							class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2"
							placeholder="Masukkan nama" />
					</div>

					<div class="mb-4">
						<label for="poin" class="block text-sm font-medium text-gray-700 mb-2">Poin:</label>
						<input type="number" id="poin" name="poin" required
							class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2"
							placeholder="Masukkan poin" />
					</div>

					<div class="divider border-gray-400"></div>
					<div class="modal-action relative" style="z-index: 1000;">
						<button type="button" class="btn bg-red-600 border-none text-[#fafafa] hover:bg-orange-400 hover:text-[#fafafa] hover:border-2 hover:border-blue-600 hover:shadow-md mb-4" onclick="this.closest('dialog').close();">Close</button>
						<button type="submit" class="btn disabled:text-gray-400 disabled:cursor-not-allowed bg-blue-600 border-none text-[#fafafa] hover:bg-[#fafafa]/30 hover:text-blue-600 hover:border-2 hover:border-blue-600 hover:shadow-md mb-4">Submit</button>
					</div>
			</form>
		</div>
	</dialog>

	<!-- Modal edit Kategori -->
	<dialog id="editKategori" class="modal overflow-hidden">
		<div class="modal-box bg-[#fafafa]">
			<form method="dialog">
				<button class="btn btn-sm btn-circle btn-ghost text-red-600 absolute right-2 top-2">✕</button>
			</form>
			<h3 class="text-lg font-bold text-blue-600 flex flex-row items-center">
				Edit Kategori
				<div class="bg-blue-600 md:p-3 p-2 text-[#fafafa] rounded-lg ml-2 md:ml-4">
					<i data-feather="paperclip" class="w-4 h-4"></i>
				</div>
			</h3>
			<div class="divider border-gray-400"></div>
			<form method="post" action="<?= site_url('Kemahasiswaan/Kategori_SPM_Mahasiswa/update'); ?>" enctype="multipart/form-data" role="form">
				<?= csrf(); ?>
				<input type="hidden" id="edit_id_kategori" name="id_kategori" value="" />

				<div class="mb-4">
					<label for="edit_name" class="block text-sm font-medium text-gray-700 mb-2">Nama Kategori:</label>
					<input type="text" id="edit_name" name="nama_kategori" required
						class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2"
						placeholder="Masukkan nama" />
				</div>

				<div class="mb-4">
					<label for="edit_poin" class="block text-sm font-medium text-gray-700 mb-2">Poin:</label>
					<input type="number" id="edit_poin" name="poin" required
						class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2"
						placeholder="Masukkan poin" />
				</div>

				<div class="modal-action relative" style="z-index: 1000;">
					<button type="button" class="btn bg-red-600 border-none text-[#fafafa] hover:bg-orange-400 hover:text-[#fafafa] hover:border-2 hover:border-blue-600 hover:shadow-md mb-4" onclick="this.closest('dialog').close();">Close</button>
					<button type="submit" class="btn bg-blue-600 border-none text-[#fafafa] hover:bg-[#fafafa]/30 hover:text-blue-600 hover:border-2 hover:border-blue-600 hover:shadow-md mb-4">Update</button>
				</div>
			</form>
		</div>
	</dialog>

	<!-- Modal Hapus Kategori -->
	<dialog id="hapusKategori" class="modal overflow-hidden">
		<div class="modal-box bg-[#fafafa]">
			<!-- Tombol close di sudut kanan atas -->
			<form method="dialog">
				<button class="btn btn-sm btn-circle btn-ghost text-red-600 absolute right-2 top-2">✕</button>
			</form>
			<h3 class="text-lg font-bold text-red-600 flex flex-row items-center">
				Hapus Kategori
				<div class="bg-red-600 md:p-3 p-2 text-[#fafafa] rounded-lg ml-2 md:ml-4">
					<i data-feather="trash-2" class="w-4 h-4"></i>
				</div>
			</h3>
			<div class="divider border-gray-400"></div>
			<p class="text-gray-700 mb-4">Apakah Anda yakin ingin menghapus kategori ini?</p>
			<form method="post" action="<?= site_url('Kemahasiswaan/Kategori_SPM_Mahasiswa/delete'); ?>">
				<?= csrf(); ?>
				<input type="hidden" id="hapus_id_kategori" name="id_kategori" />
				<div class="modal-action relative" style="z-index: 1000;">
					<button type="button" class="btn bg-blue-600 border-none text-[#fafafa] hover:bg-[#fafafa]/30 hover:text-blue-600 hover:border-2 hover:border-blue-600 hover:shadow-md mb-4" onclick="this.closest('dialog').close();">Close</button>
					<button type="submit" class="btn bg-red-600 border-none text-[#fafafa] hover:bg-orange-400 hover:text-[#fafafa] hover:border-2 hover:border-blue-600 hover:shadow-md mb-4">Hapus</button>
				</div>
			</form>
		</div>
	</dialog>

</section>
<script>
	// open modal edit
	const openEditModal = (id, nama_kategori, poin, type) => {
		document.getElementById('edit_id_kategori').value = id;
		document.getElementById('edit_name').value = nama_kategori;
		document.getElementById('edit_poin').value = poin;

		// Set radio button berdasarkan type
		if (type === 'file') {
			document.getElementById('edit_file').checked = true;
		} else if (type === 'link') {
			document.getElementById('edit_link').checked = true;
		}

		document.getElementById('editKategori').showModal();
	}


	// delete kategori
	const openDeleteModal = (id) => {
		document.getElementById('hapus_id_kategori').value = id;
		document.getElementById('hapusKategori').showModal();
	}
</script>