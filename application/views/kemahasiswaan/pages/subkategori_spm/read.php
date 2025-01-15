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
							Subkategori
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
	<div class="w-full bg-[#fafafa] rounded-2xl p-4">
		<form action="<?= site_url(ucwords($role) . '/Subkategori_Spm'); ?>" method="get" class="w-full flex flex-col md:flex-row justify-between gap-4">
			<div class="flex items-center w-full gap-2 sm:gap-3 md:gap-4">
				<label for="kategori" class="text-gray-800 font-semibold mb-1">Kategori:</label>
				<select
					id="kategori"
					name="kategori"
					class="w-full p-2 rounded-md bg-[#fafafa] border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:outline-none select-bordered"
					data-search="true">
					<option value="" selected disabled>--Kategori--</option>
					<?php foreach ($listKategori as $r) { ?>
						<option value="<?= $r['id_kategori_spm'] ?>" <?= ($r['id_kategori_spm'] == $kategori) ? 'selected' : '' ?>><?= $r['kategori']; ?></option>
					<?php } ?>
				</select>
				<!-- Filter Button -->
				<button
					type="submit"
					class="w-full text-center inline-flex justify-center items-center md:w-auto px-6 py-3 gap-2 rounded-md bg-blue-100 text-blue-600 font-semibold hover:bg-blue-200 focus:ring-2 focus:ring-blue-400 focus:outline-none">
					<i data-feather="filter" fill="currentColor"></i><span>Filter</span>
				</button>
			</div>

		</form>
	</div>
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
			<span> <?= $this->session->flashdata('delete_success'); ?></span>
		</div>
	<?php endif; ?>
	<!-- table data -->
	<section class="relative bg-[#fafafa] rounded-2xl lg:p-8 p-4 my-4">
		<!-- add user -->
		<a href="<?= site_url(ucwords($role) . '/Subkategori_Spm/create'); ?>" class="btn bg-blue-600 border-none text-[#fafafa] hover:bg-[#fafafa]/30 hover:text-blue-600 hover:border-2 hover:border-blue-600 hover:shadow-md mb-4 w-full md:w-auto flex flex-row items-center max-w-xs">
			<div class="bg-[#faafa] md:p-3 p-2 rounded-lg">
				<i data-feather="paperclip" class="w-4 h-4"></i>
			</div>
			Tambah Subkategori
		</a>

		<div class="overflow-x-auto">
			<table id="" class="min-w-full table-auto table-data">
				<thead class="bg-gray-100">
					<tr>
						<th class="p-2">No</th>
						<th class="p-2">Subkategori</th>
						<th class="p-2">Kategori</th>
						<th class="p-2">Poin</th>
						<th class="p-2">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php if (!empty($read)) {
						$no = 1;
						foreach ($read as $row) { ?>
							<tr class="border-t">
								<td class="p-2"><?= $no; ?></td>
								<td class="p-2"><?= $row['subkategori'] ?></td>
								<td class="p-2"><?= $row['kategori'] ?></td>
								<td>
									<span class="flex items-center cursor-default text-sm gap-2 text-green-600 hover:bg-lavender-gray py-2 rounded-full">
										<i data-feather="check-circle" class="w-4 h-auto"></i>
										<?= $row['poin'] ?> Poin
									</span>
								</td>
								<td class="p-2 flex flex-row items-center mt-2 gap-2">
									<a href="<?= site_url(ucwords($role) . '/Subkategori_Spm/edit/' . $row['id_subkategori_spm']); ?>" class="rounded-full p-2 bg-orange-100 text-orange-600 hover:scale-125 hover:bg-orange-200 flex items-center gap-2">
										<i data-feather="edit" class="w-4 h-auto"></i>
									</a>

									<button class="rounded-full p-2 bg-red-100 text-red-600 hover:scale-125 hover:bg-red-200 flex items-center gap-2" onclick="openDeleteModal('<?= $row['id_subkategori_spm']; ?>')">
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
						<th class="p-2">No</th>
						<th class="p-2">Subkategori</th>
						<th class="p-2">Kategori</th>
						<th class="p-2">Poin</th>
						<th class="p-2">Aksi</th>
					</tr>
				</tfoot>
			</table>
		</div>

	</section>

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
			<form method="post" action="<?= site_url('Kemahasiswaan/Subkategori_Spm/delete'); ?>">
				<?= csrf(); ?>
				<input type="hidden" id="hapus_id_subkategori_spm" name="id_subkategori_spm" />
				<div class="modal-action relative" style="z-index: 1000;">
					<button type="button" class="btn bg-blue-600 border-none text-[#fafafa] hover:bg-[#fafafa]/30 hover:text-blue-600 hover:border-2 hover:border-blue-600 hover:shadow-md mb-4" onclick="this.closest('dialog').close();">Close</button>
					<button type="submit" class="btn bg-red-600 border-none text-[#fafafa] hover:bg-orange-400 hover:text-[#fafafa] hover:border-2 hover:border-blue-600 hover:shadow-md mb-4">Hapus</button>
				</div>
			</form>
		</div>
	</dialog>

</section>
<script>
	// delete kategori
	const openDeleteModal = (id) => {
		document.getElementById('hapus_id_subkategori_spm').value = id;
		document.getElementById('hapusKategori').showModal();
	}
</script>
