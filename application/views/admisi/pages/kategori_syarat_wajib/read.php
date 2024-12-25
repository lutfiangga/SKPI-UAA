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
	<!-- Alert success -->
	<!-- create -->
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
	<!-- update -->
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
	<!-- delete -->
	<?php if ($this->session->flashdata('delete_success')): ?>
		<div role="alert" class="alert alert-error">
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
			<span> <?= $this->session->flashdata('delete_error'); ?></span>
		</div>
	<?php endif; ?>
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
						<th class="px-4 py-2">No</th>
						<th class="px-4 py-2">Kategori</th>
						<th class="px-4 py-2">Poin</th>
						<th class="px-4 py-2">Tipe</th>
						<th class="px-4 py-2">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php if (!empty($read)) {
						$no = 1;
						foreach ($read->result_array() as $row) { ?>
							<tr class="border-t">
								<td class="px-4 py-2"><?= $no; ?></td>
								<td class="px-4 py-2 whitespace-normal"><?= $row['kategori'] ?></td>
								<td>
									<span class="flex items-center cursor-default text-sm gap-2 text-green-600 hover:bg-lavender-gray py-2 rounded-full">
										<i data-feather="check-circle" class="w-4 h-auto"></i>
										<?= $row['poin'] ?> Poin
									</span>
								</td>
								<td class="py-2 whitespace-nowrap">
									<?php if (trim($row['type']) == 'file'): ?>
										<div class="flex flex-row p-2 items-center gap-2 hover:rounded-lg hover:bg-[#EEF0F6]">
											<div>
												<div class="rounded-md text-[#fafafa] bg-blue-600 p-2">
													<i data-feather="file-text" class="w-6 h-auto"></i>
												</div>
											</div>
											<p class="text-sm max-w-full truncate whitespace-wrap capitalize"><?= $row['type']; ?></p>
										</div>
									<?php else: ?>
										<div class="flex flex-row p-2 items-center gap-2 hover:rounded-lg hover:bg-[#EEF0F6]">
											<div>
												<div class="rounded-md text-[#fafafa] bg-blue-600 p-2">
													<i data-feather="link-2" class="w-6 h-auto"></i>
												</div>
											</div>
											<p class="text-sm max-w-full truncate whitespace-wrap capitalize"><?= $row['type']; ?></p>
										</div>
									<?php endif; ?>
								</td>
								<td class="px-4 py-2 flex flex-row items-center mt-2 gap-2">
									<button class="rounded-full p-2 bg-orange-100 text-orange-600 hover:scale-125 hover:bg-orange-200 flex items-center gap-2"
										onclick="openEditModal('<?= $row['id_kategori_syarat_wajib']; ?>', '<?= $row['kategori']; ?>', <?= $row['poin']; ?>, '<?= $row['type']; ?>')">
										<i data-feather="edit" class="w-4 h-auto"></i>
									</button>

									<button class="rounded-full p-2 bg-red-100 text-red-600 hover:scale-125 hover:bg-red-200 flex items-center gap-2" onclick="openDeleteModal('<?= $row['id_kategori_syarat_wajib']; ?>')">
										<i data-feather="trash-2" class="w-4 h-auto"></i>
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
						<th class="px-4 py-2">No</th>
						<th class="px-4 py-2">Kategori</th>
						<th class="px-4 py-2">Poin</th>
						<th class="px-4 py-2">Tipe</th>
						<th class="px-4 py-2">Aksi</th>
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
			<form method="post" action="<?= site_url('Admisi/Kategori_Spm/save'); ?>" enctype="multipart/form-data" role="form">
				<?= csrf(); ?>
				<div>
					<div class="mb-4">
						<label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama Kategori:</label>
						<input type="text" id="name" name="kategori" required
							class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2"
							placeholder="Masukkan nama" />
					</div>

					<div class="mb-4">
						<label for="poin" class="block text-sm font-medium text-gray-700 mb-2">Poin:</label>
						<input type="number" id="poin" name="poin" required
							class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2"
							placeholder="Masukkan poin" />
					</div>

					<div class="mb-4">
						<label for="type" class="block text-sm font-medium text-gray-700 mb-2">Type:</label>
						<div class="flex gap-4" required>
							<div class="flex items-center">
								<input id="file" required name="type" type="radio" value="file" class="radio radio-primary" required />
								<label for="file" class="ml-2 block text-sm font-medium text-gray-700">File</label>
							</div>
							<div class="flex items-center">
								<input id="link" required name="type" type="radio" value="link" class="radio radio-primary" required />
								<label for="link" class="ml-2 block text-sm font-medium text-gray-700">Link</label>
							</div>
						</div>
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
			<form method="post" action="<?= site_url('Admisi/Kategori_Spm/update'); ?>" enctype="multipart/form-data" role="form">
				<?= csrf(); ?>
				<input type="hidden" id="edit_id_kategori_syarat_wajib" name="id_kategori_syarat_wajib" value="" />

				<div class="mb-4">
					<label for="edit_kategori" class="block text-sm font-medium text-gray-700 mb-2">Nama Kategori:</label>
					<input type="text" id="edit_kategori" name="kategori" required
						class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2"
						placeholder="Masukkan nama" />
				</div>

				<div class="mb-4">
					<label for="edit_poin" class="block text-sm font-medium text-gray-700 mb-2">Poin:</label>
					<input type="number" id="edit_poin" name="poin" required
						class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2"
						placeholder="Masukkan poin" />
				</div>

				<!-- Input radio button untuk Type -->
				<div class="mb-4">
					<label class="block text-sm font-medium text-gray-700 mb-2">Type:</label>
					<div class="flex gap-4">
						<div class="flex items-center">
							<input id="edit_file" required name="type" type="radio" value="file" class="radio radio-primary" />
							<label for="edit_file" class="ml-2 block text-sm font-medium text-gray-700">File</label>
						</div>
						<div class="flex items-center">
							<input id="edit_link" required name="type" type="radio" value="link" class="radio radio-primary" />
							<label for="edit_link" class="ml-2 block text-sm font-medium text-gray-700">Link</label>
						</div>
					</div>
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
			<form method="post" action="<?= site_url('Admisi/Kategori_Spm/delete'); ?>">
				<?= csrf(); ?>
				<input type="hidden" id="hapus_id_kategori_syarat_wajib" name="id_kategori_syarat_wajib" />
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
	const openEditModal = (id, kategori, poin, type) => {
		document.getElementById('edit_id_kategori_syarat_wajib').value = id;
		document.getElementById('edit_kategori').value = kategori;
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
		document.getElementById('hapus_id_kategori_syarat_wajib').value = id;
		document.getElementById('hapusKategori').showModal();
	}
</script>
