<section class="relative flex flex-col justify-between">
	<div class="flex flex-row justify-between items-center">
		<div class="flex flex-row justify-start items-center md:gap-4 gap-2">
			<h1 class="md:text-3xl text-xl font-bold text-blue-600 whitespace-nowrap"><?= $sub; ?></h1>
			<div class="bg-blue-600 md:p-3 p-2 text-[#fafafa] rounded-lg">
				<i data-feather="award" fill="currentColor" class="w-4 h-4 md:h-[24px] md:w-[24px]"></i>
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

							Mahasiswa
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

		<div class="overflow-x-auto">
			<table class="min-w-full table-auto table-data">
				<thead class="bg-gray-100">
					<tr>
						<th class="p-2">No</th>
						<th class="p-2">Nama</th>
						<th class="p-2 whitespace-normal">Nama Kegiatan</th>
						<th class="p-2">Kategori</th>
						<th class="p-2">Poin</th>
						<th class="p-2">Tanggal</th>
						<th class="p-2">Sertifikat</th>
						<th class="p-2 whitespace-normal">Link Kegiatan</th>
						<th class="p-2 whitespace-normal">Foto Kegiatan</th>
						<th class="p-2 whitespace-normal">Surat Tugas</th>
						<th class="p-2 ">Penyelenggara</th>
						<th class="p-2 whitespace-normal">Tempat Kegiatan</th>
						<th class="p-2">Status</th>
						<th class="p-2">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php if (!empty($read)) {
						$no = 1;
						foreach ($read as $row) {
							$img_user = $row['img_user'] ? 'assets/static/img/photos/' . strtolower($row['role']) . '/' . $row['img_user'] : 'assets/static/img/user.png';
					?>
							<tr class="border-t">
								<td class="p-2">
									<?= $no; ?>
								</td>
								<td class="p-2">
									<div class="flex flex-row gap-2 items-center">
										<img src="<?= base_url($img_user); ?>" alt="role" class="rounded-full w-8 h-8">
										<div class="flex flex-col items-center justify-center">
											<p class="truncate w-full text-xs md:text-sm ml-2 font-semibold whitespace-normal"><?= $row['nama'] ?></p>
											<p class="truncate w-full ml-2 text-[0.6rem] tracking-wide uppercase whitespace-normal"><?= $row['prodi']; ?> - <?= $row['nim']; ?></p>
										</div>
									</div>
								</td>
								<td class="p-2 whitespace-normal"><?= $row['kegiatan'] ?></td>
								<td class="p-2 whitespace-normal"><?= $row['kategori'] ?></td>
								<td class="p-2 whitespace-nowrap">
									<span class="flex items-center cursor-default text-sm gap-2 text-green-600 hover:bg-lavender-gray py-2 rounded-full">
										<i data-feather="check-circle" class="w-4 h-auto"></i>
										<?= $row['poin'] ?> Poin
									</span>
								</td>
								<td class="p-2 whitespace-normal">
									<?= tanggal($row['tanggal_mulai']) ?>
									<?= isset($row['tanggal_selesai']) ? 's/d ' . tanggal($row['tanggal_selesai']) : '' ?>
								</td>

								<td class="p-2">
									<?php if (!empty($row['sertifikat'])) : ?>
										<a href="<?= base_url('assets/static/spm/pdf/sertifikat/' . $row['sertifikat']); ?>" download class="flex flex-row p-2 items-center gap-2 hover:rounded-lg hover:bg-[#EEF0F6] cursor-pointer">
											<div>
												<div class="rounded-md text-[#fafafa] bg-blue-600 p-2">
													<i data-feather="file-text" class="w-6 h-auto"></i>
												</div>
											</div>
											<p class="text-sm max-w-full font-thin truncate whitespace-normal"><?= $row['sertifikat']; ?></p>
										</a>
									<?php endif; ?>
								</td>
								<td class="p-2">
									<?php if (!empty($row['link_kegiatan'])) : ?>
										<a href="<?= $row['link_kegiatan']; ?>" target="_blank" class="flex flex-row p-2 items-center gap-2 hover:rounded-lg hover:bg-[#EEF0F6] cursor-pointer">
											<div>
												<div class="rounded-md text-[#fafafa] bg-blue-600 p-2">
													<i data-feather="link-2" class="w-6 h-auto"></i>
												</div>
											</div>
											<p class="text-sm max-w-full font-thin truncate whitespace-normal"><?= $row['link_kegiatan']; ?></p>
										</a>
									<?php endif; ?>
								</td>
								<td class="p-2">
									<?php if (!empty($row['foto_kegiatan'])) : ?>
										<a href="<?= base_url('assets/static/spm/img/foto_kegiatan/' . $row['foto_kegiatan']); ?>" download class="flex flex-row p-2 items-center gap-2 hover:rounded-lg hover:bg-[#EEF0F6] cursor-pointer">
											<div>
												<div class="rounded-md text-[#fafafa] bg-blue-600 p-2">
													<i data-feather="image" class="w-6 h-auto"></i>
												</div>
											</div>
											<p class="text-sm max-w-full font-thin truncate whitespace-normal"><?= $row['foto_kegiatan']; ?></p>
										</a>
									<?php endif; ?>
								</td>
								<td class="p-2">
									<?php if (!empty($row['surat_tugas'])) : ?>
										<a href="<?= base_url('assets/static/spm/pdf/surat_tugas/' . $row['surat_tugas']); ?>" download class="flex flex-row p-2 items-center gap-2 hover:rounded-lg hover:bg-[#EEF0F6] cursor-pointer">
											<div>
												<div class="rounded-md text-[#fafafa] bg-blue-600 p-2">
													<i data-feather="file-text" class="w-6 h-auto"></i>
												</div>
											</div>
											<p class="text-sm max-w-full font-thin truncate whitespace-normal"><?= $row['surat_tugas']; ?></p>
										</a>
									<?php endif; ?>
								</td>
								<td class="p-2 whitespace-normal"><?= $row['penyelenggara'] ?></td>
								<td class="p-2 whitespace-normal"><?= $row['tempat_kegiatan'] ?></td>
								<td>
									<?php if ($row['status'] == 'pending') : ?>
										<span class="flex items-center text-sm gap-2 text-orange-600 hover:bg-[#EEF0F6] p-2 rounded-full">
											<i data-feather="alert-circle" class="w-4 h-auto"></i>
											On Review
										</span>
									<?php elseif ($row['status'] == 'diterima') : ?>
										<span class="flex items-center text-sm gap-2 text-green-600 hover:bg-[#EEF0F6] p-2 rounded-full">
											<i data-feather="check-circle" class="w-4 h-auto"></i>
											Verified
										</span>
									<?php elseif ($row['status'] == 'ditolak') : ?>
										<span class="flex items-center text-sm gap-2 text-red-600 hover:bg-[#EEF0F6] p-2 rounded-full">
											<i data-feather="x-circle" class="w-4 h-auto"></i>
											Unverified
										</span>
									<?php endif; ?>
								</td>
								<td class="p-2 flex flex-row items-center mt-2 gap-2">
									<?php if ($row['status'] == 'pending'): ?>
										<a href="<?= site_url('Kemahasiswaan/Spm_Mahasiswa/accept/' . $row['id_spm']); ?>" class="bg-green-600 rounded-full p-2 text-[#fafafa] hover:px-4 flex items-center gap-2 group">
											<i data-feather="check-circle" class="w-4 h-auto"></i>
											<p class="hidden group-hover:block text-white transition-opacity duration-300">Diterima</p>
										</a>
										<button onclick="openDeclineModal('<?= $row['id_spm']; ?>')" class="bg-red-600 rounded-full p-2 text-[#fafafa] hover:px-4 flex items-center gap-2 group">
											<i data-feather="x-circle" class="w-4 h-auto"></i>
											<p class="hidden group-hover:block text-white transition-opacity duration-300">Ditolak</p>
										</button>
									<?php else: ?>
										<p class="text-xs text-gray-400 whitespace-normal">
											<?= (!empty(trim($row['keterangan']))) ? 'Keterangan: ' . $row['keterangan'] : 'No action needed'; ?>
										</p>
									<?php endif; ?>
								</td>
							</tr>

							<!-- Modal Decline SPM -->
							<dialog id="declineSPM" class="modal overflow-hidden">
								<div class="modal-box bg-[#fafafa]">
									<form method="dialog">
										<button class="btn btn-sm btn-circle btn-ghost text-red-600 absolute right-2 top-2">✕</button>
									</form>
									<h3 class="text-lg font-bold text-blue-600 flex flex-row items-center">
										Tolak SPM
										<div class="bg-blue-600 md:p-3 p-2 text-[#fafafa] rounded-lg ml-2 md:ml-4">
											<i data-feather="award" class="w-4 h-4"></i>
										</div>
									</h3>
									<div class="divider border-gray-400"></div>
									<form method="post" action="<?= site_url('Kemahasiswaan/Spm_Mahasiswa/decline/' . $row['id_spm']); ?>" enctype="multipart/form-data" role="form">
										<?= csrf(); ?>
										<input type="text" id="edit_id_spm" name="id_spm" hidden />

										<div class="mb-4">
											<label for="keterangan" class="block text-sm font-medium text-gray-700 mb-2">Keterangan:</label>
											<textarea type="text" rows="4" id="keterangan" name="keterangan" required
												class="mt-1 block bg-[#fafafa] w-full border text-gray-800 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2"
												placeholder="Tulis Keterangan"></textarea>
										</div>

										<div class="modal-action relative" style="z-index: 1000;">
											<button type="button" class="btn bg-red-600 border-none text-[#fafafa] hover:bg-orange-400 hover:text-[#fafafa] hover:border-2 hover:border-blue-600 hover:shadow-md mb-4" onclick="this.closest('dialog').close();">Close</button>
											<button type="submit" class="btn bg-blue-600 border-none text-[#fafafa] hover:bg-[#fafafa]/30 hover:text-blue-600 hover:border-2 hover:border-blue-600 hover:shadow-md mb-4">Submit</button>
										</div>
									</form>
								</div>
							</dialog>

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
						<th class="p-2">No</th>
						<th class="p-2">Nama</th>
						<th class="p-2 whitespace-normal">Nama Kegiatan</th>
						<th class="p-2">Kategori</th>
						<th class="p-2">Poin</th>
						<th class="p-2">Tanggal</th>
						<th class="p-2">Sertifikat</th>
						<th class="p-2 whitespace-normal">Link Kegiatan</th>
						<th class="p-2 whitespace-normal">Foto Kegiatan</th>
						<th class="p-2 whitespace-normal">Surat Tugas</th>
						<th class="p-2 ">Penyelenggara</th>
						<th class="p-2 whitespace-normal">Tempat Kegiatan</th>
						<th class="p-2">Status</th>
						<th class="p-2">Aksi</th>
					</tr>
				</tfoot>
			</table>
		</div>
	</section>


</section>

<script>
	// open decline modal
	const openDeclineModal = (id) => {
		document.getElementById('edit_id_spm').value = id;
		document.getElementById('declineSPM').showModal();
	}
</script>
