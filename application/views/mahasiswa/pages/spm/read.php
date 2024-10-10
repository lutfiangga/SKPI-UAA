<section class="relative flex flex-col justify-between">
	<div class="flex flex-row justify-between items-center">
		<div class="flex flex-row justify-start items-center md:gap-4 gap-2">
			<h1 class="md:text-3xl text-xl font-bold text-blue-600 whitespace-nowrap"><?= $sub; ?></h1>
			<div class="bg-blue-600 md:p-3 p-2 text-[#fafafa] rounded-lg">
				<i data-feather="award" class="w-4 h-4 md:h-[24px] md:w-[24px]"></i>
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
		<a href="<?= site_url('Mahasiswa/Spm_Mahasiswa/create'); ?>" class="btn bg-blue-600 border-none text-[#fafafa] hover:bg-[#fafafa]/30 hover:text-blue-600 hover:border-2 hover:border-blue-600 hover:shadow-md mb-4 flex flex-row items-center w-fit">
			<div class="bg-[#faafa] md:p-3 p-2 rounded-lg">
				<i data-feather="upload-cloud" class="w-4 h-4"></i>
			</div>
			Upload SPM
		</a>

		<div class="overflow-x-auto">
			<table class="min-w-full table-auto table-data">
				<thead class="bg-gray-100">
					<tr>
						<th class="px-4 py-2">No</th>
						<th class="px-4 py-2">Mahasiswa</th>
						<th class="px-4 py-2">Kategori</th>
						<th class="px-4 py-2">Nama Kegiatan</th>
						<th class="px-4 py-2">Poin</th>
						<th class="px-4 py-2">Tanggal</th>
						<th class="px-4 py-2">Sertifikat</th>
						<th class="px-4 py-2">Link Kegiatan</th>
						<th class="px-4 py-2">Foto Kegiatan</th>
						<th class="px-4 py-2">Surat Tugas</th>
						<th class="px-4 py-2">Penyelenggara</th>
						<th class="px-4 py-2">Status</th>
						<th class="px-4 py-2">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php if (!empty($read)) {
						$no = 1;
						foreach ($read->result_array() as $row) {
							$img_user = $row['img_user'] ? 'assets/static/img/photos/' . strtolower($row['role']) . '/' . $row['img_user'] : 'assets/static/img/user.png';
					?>
							<tr class="border-t">
								<td class="px-4 py-2">
									<?= $no; ?>
								</td>
								<td class="px-4 py-2">
									<div class="flex flex-row gap-2 items-center">
										<img src="<?= base_url($img_user); ?>" alt="role" class="rounded-full w-8 h-8">
										<div class="flex flex-col items-center justify-center">
											<p class="truncate w-full ml-2 font-semibold"><?= $row['nama'] ?></p>
											<p class="truncate w-full ml-2 text-[0.6rem] tracking-wide uppercase"><?= $row['program_studi']; ?> - <?= $row['nim']; ?></p>
										</div>
									</div>
								</td>
								<td class="px-4 py-2 whitespace-nowrap"><?= $row['nama_kategori'] ?></td>
								<td class="px-4 py-2 whitespace-nowrap">
									<span class="flex items-center cursor-default text-sm gap-2 text-green-600 hover:bg-lavender-gray py-2 rounded-full">
										<i data-feather="check-circle" class="w-4 h-auto"></i>
										<?= $row['poin'] ?> Poin
									</span>
								</td>
								<td class="px-4 py-2 whitespace-nowrap"><?= $row['nama_kegiatan'] ?></td>
								<td class="px-4 py-2 whitespace-nowrap">
									<?= tanggal($row['tanggal_mulai']) ?>
									<?= isset($row['tanggal_selesai']) ? 's/d ' . tanggal($row['tanggal_selesai']) : '' ?>
								</td>

								<td class="px-4 py-2">
									<a href="<?= base_url('assets/static/spm/pdf/sertifikat/' . $row['sertifikat']); ?>" download class="flex flex-row p-2 items-center gap-2 hover:rounded-lg hover:bg-[#EEF0F6] cursor-pointer">
										<div>
											<div class="rounded-md text-[#fafafa] bg-blue-600 p-2">
												<i data-feather="file-text" class="w-6 h-auto"></i>
											</div>
										</div>
										<p class="text-sm max-w-full font-thin truncate whitespace-wrap"><?= $row['sertifikat']; ?></p>
									</a>
								</td>
								<td class="px-4 py-2">
									<a href="<?= $row['link_kegiatan']; ?>" target="_blank" class="flex flex-row p-2 items-center gap-2 hover:rounded-lg hover:bg-[#EEF0F6] cursor-pointer">
										<div>
											<div class="rounded-md text-[#fafafa] bg-blue-600 p-2">
												<i data-feather="link-2" class="w-6 h-auto"></i>
											</div>
										</div>
										<p class="text-sm max-w-full font-thin truncate whitespace-wrap"><?= $row['link_kegiatan']; ?></p>
									</a>
								</td>
								<td class="px-4 py-2">
									<a href="<?= base_url('assets/static/spm/img/foto_kegiatan/' . $row['foto_kegiatan']); ?>" download class="flex flex-row p-2 items-center gap-2 hover:rounded-lg hover:bg-[#EEF0F6] cursor-pointer">
										<div>
											<div class="rounded-md text-[#fafafa] bg-blue-600 p-2">
												<i data-feather="image" class="w-6 h-auto"></i>
											</div>
										</div>
										<p class="text-sm max-w-full font-thin truncate whitespace-wrap"><?= $row['foto_kegiatan']; ?></p>
									</a>
								</td>
								<td class="px-4 py-2">
									<a href="<?= base_url('assets/static/spm/pdf/surat_tugas/' . $row['surat_tugas']); ?>" download class="flex flex-row p-2 items-center gap-2 hover:rounded-lg hover:bg-[#EEF0F6] cursor-pointer">
										<div>
											<div class="rounded-md text-[#fafafa] bg-blue-600 p-2">
												<i data-feather="file-text" class="w-6 h-auto"></i>
											</div>
										</div>
										<p class="text-sm max-w-full font-thin truncate whitespace-wrap"><?= $row['surat_tugas']; ?></p>
									</a>
								</td>
								<td class="px-4 py-2 whitespace-nowrap"><?= $row['penyelenggara'] ?></td>
								<td>
									<?php if ($row['status'] == 'pending') : ?>
										<span class="flex items-center text-sm gap-2 text-orange-600 hover:bg-[#EEF0F6] px-4 py-2 rounded-full">
											<i data-feather="alert-circle" class="w-4 h-auto"></i>
											On Review
										</span>
									<?php elseif ($row['status'] == 'diterima') : ?>
										<span class="flex items-center text-sm gap-2 text-green-600 hover:bg-[#EEF0F6] px-4 py-2 rounded-full">
											<i data-feather="check-circle" class="w-4 h-auto"></i>
											Verified
										</span>
									<?php elseif ($row['status'] == 'ditolak') : ?>
										<span class="flex items-center text-sm gap-2 text-red-600 hover:bg-[#EEF0F6] px-4 py-2 rounded-full">
											<i data-feather="x-circle" class="w-4 h-auto"></i>
											Unverified
										</span>
									<?php endif; ?>
								</td>
								<td class="px-4 py-2 flex flex-row items-center mt-2 gap-2">
									<?php if ($row['status'] == 'pending'): ?>
										<a href="<?= site_url('Mahasiswa/Spm_Mahasiswa/edit/' . $row['id_spm']); ?>" class="bg-orange-600 rounded-full p-2 text-[#fafafa] hover:px-4 flex items-center gap-2 group">
											<i data-feather="edit" class="w-4 h-auto"></i>
											<p class="hidden group-hover:block text-white transition-opacity duration-300">Edit</p>
										</a>
										<button type="button" onclick="openDeleteModal(<?= $row['id_spm']; ?>)" class="bg-red-600 rounded-full p-2 text-[#fafafa] hover:px-4 flex items-center gap-2 group">
											<i data-feather="trash-2" class="w-4 h-auto"></i>
											<p class="hidden group-hover:block text-white transition-opacity duration-300">Hapus</p>
										</button>
									<?php else: ?>
										<p class="text-xs text-gray-400 mt-3">
											<?= (!empty(trim($row['keterangan']))) ? 'Keterangan: ' . $row['keterangan'] : 'No action needed'; ?>
										</p>
									<?php endif; ?>
								</td>
							</tr>
						<?php $no++;
						}
					} else { ?>
						<tr>
							<td colspan="6" class="text-center">Tidak ada data</td>
						</tr>
					<?php } ?>
				</tbody>
				<tfoot class="bg-gray-100">
					<tr>
						<th class="px-4 py-2">No</th>
						<th class="px-4 py-2">Mahasiswa</th>
						<th class="px-4 py-2">Kategori</th>
						<th class="px-4 py-2">Nama Kegiatan</th>
						<th class="px-4 py-2">Poin</th>
						<th class="px-4 py-2">Tanggal</th>
						<th class="px-4 py-2">Sertifikat</th>
						<th class="px-4 py-2">Link Kegiatan</th>
						<th class="px-4 py-2">Foto Kegiatan</th>
						<th class="px-4 py-2">Surat Tugas</th>
						<th class="px-4 py-2">Penyelenggara</th>
						<th class="px-4 py-2">Status</th>
						<th class="px-4 py-2">Aksi</th>
					</tr>
				</tfoot>
			</table>
		</div>

	</section>

	<!-- Modal Hapus Spm -->
	<dialog id="hapusSpm" class="modal overflow-hidden">
		<div class="modal-box bg-[#fafafa]">
			<!-- Tombol close di sudut kanan atas -->
			<form method="dialog">
				<button class="btn btn-sm btn-circle btn-ghost text-red-600 absolute right-2 top-2">✕</button>
			</form>
			<h3 class="text-lg font-bold text-red-600 flex flex-row items-center">
				Hapus SPM
				<div class="bg-red-600 md:p-3 p-2 text-[#fafafa] rounded-lg ml-2 md:ml-4">
					<i data-feather="trash-2" class="w-4 h-4"></i>
				</div>
			</h3>
			<div class="divider border-gray-400"></div>
			<p class="text-gray-700 mb-4">Apakah Anda yakin ingin menghapus SPM ini?</p>
			<form method="post" action="<?= site_url('Mahasiswa/Spm_Mahasiswa/delete'); ?>">
				<?= csrf(); ?>
				<input type="hidden" id="hapus_id_spm" name="id_spm" />
				<div class="modal-action relative" style="z-index: 1000;">
					<button type="button" class="btn bg-blue-600 border-none text-[#fafafa] hover:bg-[#fafafa]/30 hover:text-blue-600 hover:border-2 hover:border-blue-600 hover:shadow-md mb-4" onclick="this.closest('dialog').close();">Close</button>
					<button type="submit" class="btn bg-red-600 border-none text-[#fafafa] hover:bg-orange-400 hover:text-[#fafafa] hover:border-2 hover:border-blue-600 hover:shadow-md mb-4">Hapus</button>
				</div>
			</form>
		</div>
	</dialog>

</section>
<script>
	// delete spm
	const openDeleteModal = (id) => {
		document.getElementById('hapus_id_spm').value = id;
		document.getElementById('hapusSpm').showModal();
	}
</script>
