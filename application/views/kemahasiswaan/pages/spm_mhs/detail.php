<section class="relative flex flex-col justify-between font-tnr">
	<div class="flex flex-row justify-between items-center">
		<div class="flex flex-row justify-start items-center md:gap-4 gap-2">
			<h1 class="md:text-3xl text-xl font-bold text-blue-600 whitespace-nowrap"><?= $sub; ?></h1>
			<div class="bg-blue-600 md:p-3 p-2 text-[#fafafa] rounded-lg">
				<i data-feather="activity" class="w-4 h-4 md:h-[24px] md:w-[24px]"></i>
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
	<div class="mb-4">
		<a class="text-blue-600 font-bold inline-flex justify-between items-center gap-2" href="<?= site_url(ucwords($role) . '/Spm_Mahasiswa'); ?>">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left">
				<path d="M205 34.8c11.5 5.1 19 16.6 19 29.2l0 64 112 0c97.2 0 176 78.8 176 176c0 113.3-81.5 163.9-100.2 174.1c-2.5 1.4-5.3 1.9-8.1 1.9c-10.9 0-19.7-8.9-19.7-19.7c0-7.5 4.3-14.4 9.8-19.5c9.4-8.8 22.2-26.4 22.2-56.7c0-53-43-96-96-96l-96 0 0 64c0 12.6-7.4 24.1-19 29.2s-25 3-34.4-5.4l-160-144C3.9 225.7 0 217.1 0 208s3.9-17.7 10.6-23.8l160-144c9.4-8.5 22.9-10.6 34.4-5.4z" />
			</svg>
			Kembali
		</a>
	</div>
	<div class="bg-[#fafafa] p-4 rounded-2xl">
		<header class="flex flex-row justify-between items-center">
			<img src="<?= base_url('assets/static/img/logouaa.png'); ?>" alt="Logo uaa" class="w-auto h-[2rem] sm:h-[3rem] md:h-20">
			<div class="flex flex-col items-end text-[#0B5E91]">
				<h1 class="font-bold text-end text-[0.7rem] sm:text-[0.8rem] md:text-sm">Jl. Brawijaya No.99, Yogyakarta 55183</h1>
				<p class="mt-1 text-end text-[0.8rem] sm:text-xs md:text-base">Telp. (0274) 4342288 Fax. (0274) 4342269</p>
				<div class="flex flex-row gap-2 items-center mt-1 text-[0.6rem] md:text-xs text-end">
					<div class="flex flex-row items-center">
						<i data-feather="globe" class="p-0.5 md:p-1 bg-[#0B5E91] text-white w-[12px] h-[12px] sm:w-[16px] sm:h-[16px] md:w-[20px] md:h-[20px] rounded-lg"></i>
						<p class="ml-1">www.almaata.ac.id</p>
					</div>
					<div class="flex flex-row items-center">
						<i data-feather="mail" class="p-0.5 md:p-1 bg-[#0B5E91] text-white w-[12px] h-[12px] sm:w-[16px] sm:h-[16px] md:w-[20px] md:h-[20px] rounded-lg"></i>
						<p class="ml-1">uaa@almaata.ac.id</p>
					</div>
				</div>
			</div>
		</header>
		<main class="container mx-auto p-3 md:p-6 text-black print-content">
			<!-- title -->
			<div class="text-center">
				<h2 class="text-xl font-semibold uppercase">Formulir Pelaporan</h2>
				<p class="font-semibold text-xl">Skor Prestasi Mahasiswa (SPM)</p>
			</div>
			<!-- end title -->

			<!-- data mahasiswa -->
			<div class="mt-4">
				<p class="capitalize"><strong>Nama:</strong> <?= $mhs['nama']; ?></p>
				<p><strong>NIM:</strong> <?= $mhs['nim']; ?></p>
				<p class="capitalize"><strong>Program Studi:</strong> <?= $mhs['prodi']; ?></p>
				<p class="capitalize"><strong>Fakultas:</strong> <?= $mhs['fakultas']; ?></p>
			</div>
			<!-- end data mahasiswa -->

			<!-- List SPM -->
			<div class="container mx-auto py-4 sm:py-6 md:py-8">
				<?php
				$noKategori = 1;
				$currentKategori = null;
				$currentSubKategori = null;

				foreach ($spm as $row) {
					// Check for category change
					if ($currentKategori !== $row['kategori']) {
						// Close previous sub-category and category group if exists
						if ($currentSubKategori !== null) {
							echo '</div>'; // Close previous sub-category container
						}
						if ($currentKategori !== null) {
							echo '</div>'; // Close previous category container
						}

						$currentKategori = $row['kategori'];
						$currentSubKategori = null;
						$noSubKategori = 'A';
				?>
						<div class="bg-gray-100 p-4 rounded-lg mb-4">
							<h3 class="text-lg font-bold text-gray-800 mb-3">
								<?= $noKategori++ . '. ' . $currentKategori ?>
							</h3>
						<?php
					}

					// Check for sub-category change
					if ($currentSubKategori !== $row['subkategori']) {
						// Close previous sub-category group if exists
						if ($currentSubKategori !== null) {
							echo '</div>'; // Close previous sub-category container
						}

						$currentSubKategori = $row['subkategori'];
						?>
							<div class="bg-white/70 p-3 rounded-md mb-3">
								<h4 class="text-md font-semibold text-gray-700 mb-2">
									<?= $noSubKategori++ . '. ' . $currentSubKategori ?>
								</h4>
							<?php
						}
							?>
							<div class="bg-white shadow-md rounded-lg p-6 mb-4">
								<div class="grid md:grid-cols-2 gap-4">
									<div>
										<h4 class="font-bold text-blue-600 mb-2">Detail Kegiatan</h4>
										<p><strong>Tanggal:</strong>
											<?= tanggal($row['tanggal_mulai']) .
												(!empty($row['tanggal_selesai']) ? ' - ' . tanggal($row['tanggal_selesai']) : '') ?>
										</p>
										<p class="capitalize"><strong>Penyelenggara:</strong> <?= $row['penyelenggara'] ?? 'N/A' ?></p>
										<p class="capitalize"><strong>Tempat:</strong> <?= $row['tempat_kegiatan'] ?? 'N/A' ?></p>
									</div>

									<div class="text-blue-600 text-xs sm:text-sm md:text-base">
										<h4 class="font-bold mb-2">Dokumen Terkait</h4>
										<div class="space-y-2 grid grid-cols-2">
											<?php if (!empty($row['sertifikat'])): ?>
												<div class="flex items-center">
													<i data-feather="disc" width="20" height="20" class="md:mr-2"></i>
													<?= renderViewButton('Sertifikat', 'viewSertf', $row['sertifikat']) ?>
												</div>
											<?php endif; ?>
											<?php if (!empty($row['surat_tugas'])): ?>
												<div class="flex items-center">
													<i data-feather="disc" width="20" height="20" class="md:mr-2"></i>
													<?= renderViewButton('Surat Tugas', 'viewSuratTugas', $row['surat_tugas']) ?>
												</div>
											<?php endif; ?>
											<?php if (!empty($row['foto_kegiatan'])): ?>
												<div class="flex items-center">
													<i data-feather="disc" width="20" height="20" class="md:mr-2"></i>
													<?= renderViewButton('Foto Kegiatan', 'viewFotoKegiatan', $row['foto_kegiatan']) ?>
												</div>
											<?php endif; ?>

											<?php if (!empty($row['link_kegiatan'])): ?>
												<div class="flex items-center">
													<i data-feather="link" width="20" height="20" class="md:mr-2"></i>
													<?= renderLink('Link Kegiatan', $row['link_kegiatan']) ?>
												</div>
											<?php endif; ?>
										</div>
									</div>
								</div>

								<div class="mt-4 flex justify-between items-center border-t pt-4">
									<div>
										<strong>Status:</strong>
										<?= renderStatus($row['status']) ?>
									</div>
									<div class="flex flex-col">
										<strong>Aksi:</strong>
										<div class="flex flex-col sm:flex-row">
											<?= renderSpmActions($row['status'], ucwords($role) . '/Spm_Mahasiswa/accept/', $row['id_spm'], '/' . $row['id_akun'], $row['keterangan']) ?>
										</div>
									</div>
								</div>
							</div>

							<!-- Modal Decline SPM -->
							<dialog id="declineSPM" class="modal overflow-hidden">
								<div class="modal-box bg-[#fafafa] font-sans">
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
									<form method="post" action="<?= site_url('Kemahasiswaan/Spm_Mahasiswa/decline/' . $row['id_spm'] . '/' . $row['id_akun']); ?>" enctype="multipart/form-data" role="form">
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

						<?php
					}

					// Close the last sub-category and category containers
					if ($currentSubKategori !== null) {
						echo '</div>'; // Close last sub-category
					}
					if ($currentKategori !== null) {
						echo '</div>'; // Close last category
					}
						?>

							</div>
							<!-- End List SPM -->

							<div class="text-sm my-8">
								<p>Tembusan:</p>
								<ol class="list-decimal pl-5">
									<li>Direktur Kemahasiswaan</li>
									<li>Dekan</li>
									<li>Kaprodi</li>
									<li>Kour. Kemahasiswaan</li>
									<li>Mahasiswa ybs.</li>
								</ol>
							</div>

							<dialog id="sertfSpm" class="modal overflow-hidden font-sans">
								<div class="modal-box bg-[#fafafa]">
									<form method="dialog">
										<button class="btn btn-sm btn-circle btn-ghost text-red-600 absolute right-2 top-2">✕</button>
									</form>
									<h3 class="text-lg font-bold text-blue-600 flex flex-row items-center">
										Sertifikat
										<div class="bg-blue-600 md:p-3 p-2 text-[#fafafa] rounded-lg ml-2 md:ml-4">
											<i data-feather="award" class="w-4 h-4"></i>
										</div>
										<a id="fileDownload" href="#" download class="flex ml-2 sm:ml-3 md:ml-4 justify-end items-center gap-2 p-2 text-blue-600 hover:text-gray-400 text-xs sm:text-sm md:text-base">
											<i data-feather="download-cloud" class="w-6 h-6"></i>
											<span class="font-medium">Download Sertifikat</span>
										</a>
									</h3>
									<div class="divider border-gray-400"></div>

									<div class="mb-4 flex justify-center">
										<iframe id="sertf" src="#" class="w-full min-h-80 h-auto" frameborder="0"></iframe>
									</div>

									<div class="modal-action relative" style="z-index: 1000;">
										<button type="button" class="btn bg-red-600 border-none text-[#fafafa] hover:bg-orange-400 hover:text-[#fafafa] hover:border-2 hover:border-blue-600 hover:shadow-md mb-4" onclick="this.closest('dialog').close();">Close</button>
										<button type="submit" class="btn bg-blue-600 border-none text-[#fafafa] hover:bg-[#fafafa]/30 hover:text-blue-600 hover:border-2 hover:border-blue-600 hover:shadow-md mb-4">Submit</button>
									</div>

								</div>
							</dialog>
							<dialog id="fotoKegiatan" class="modal overflow-hidden font-sans">
								<div class="modal-box bg-[#fafafa]">
									<form method="dialog">
										<button class="btn btn-sm btn-circle btn-ghost text-red-600 absolute right-2 top-2">✕</button>
									</form>
									<h3 class="text-lg font-bold text-blue-600 flex flex-row items-center">
										Foto Kegiatan
										<div class="bg-blue-600 md:p-3 p-2 text-[#fafafa] rounded-lg ml-2 md:ml-4">
											<i data-feather="award" class="w-4 h-4"></i>
										</div>
										<a id="fotoDownload" href="#" download class="flex ml-2 sm:ml-3 md:ml-4 justify-end items-center gap-2 p-2 text-blue-600 hover:text-gray-400 text-xs sm:text-sm md:text-base">
											<i data-feather="download-cloud" class="w-6 h-6"></i>
											<span class="font-medium">Download Foto Kegiatan</span>
										</a>
									</h3>
									<div class="divider border-gray-400"></div>

									<div class="mb-4 flex justify-center">
										<iframe id="foto" src="#" class="w-full min-h-80 h-auto" frameborder="0"></iframe>
									</div>

									<div class="modal-action relative" style="z-index: 1000;">
										<button type="button" class="btn bg-red-600 border-none text-[#fafafa] hover:bg-orange-400 hover:text-[#fafafa] hover:border-2 hover:border-blue-600 hover:shadow-md mb-4" onclick="this.closest('dialog').close();">Close</button>
										<button type="submit" class="btn bg-blue-600 border-none text-[#fafafa] hover:bg-[#fafafa]/30 hover:text-blue-600 hover:border-2 hover:border-blue-600 hover:shadow-md mb-4">Submit</button>
									</div>

								</div>
							</dialog>
							<dialog id="suratTugas" class="modal overflow-hidden font-sans">
								<div class="modal-box bg-[#fafafa]">
									<form method="dialog">
										<button class="btn btn-sm btn-circle btn-ghost text-red-600 absolute right-2 top-2">✕</button>
									</form>
									<h3 class="text-lg font-bold text-blue-600 flex flex-row items-center">
										Surat Tugas
										<div class="bg-blue-600 md:p-3 p-2 text-[#fafafa] rounded-lg ml-2 md:ml-4">
											<i data-feather="award" class="w-4 h-4"></i>
										</div>
										<a id="suratDownload" href="#" download class="flex ml-2 sm:ml-3 md:ml-4 justify-end items-center gap-2 p-2 text-blue-600 hover:text-gray-400 text-xs sm:text-sm md:text-base">
											<i data-feather="download-cloud" class="w-6 h-6"></i>
											<span class="font-medium">Download Surat Tugas</span>
										</a>
									</h3>
									<div class="divider border-gray-400"></div>

									<div class="mb-4 flex justify-center">
										<iframe id="surat" src="#" class="w-full min-h-80 h-auto" frameborder="0"></iframe>
									</div>

									<div class="modal-action relative" style="z-index: 1000;">
										<button type="button" class="btn bg-red-600 border-none text-[#fafafa] hover:bg-orange-400 hover:text-[#fafafa] hover:border-2 hover:border-blue-600 hover:shadow-md mb-4" onclick="this.closest('dialog').close();">Close</button>
										<button type="submit" class="btn bg-blue-600 border-none text-[#fafafa] hover:bg-[#fafafa]/30 hover:text-blue-600 hover:border-2 hover:border-blue-600 hover:shadow-md mb-4">Submit</button>
									</div>

								</div>
							</dialog>

		</main>
		<footer class="print-footer bg-yellow-400 p-2 font-footer-pdf">
			<p class="text-center text-white tracking-widest text-base">
				The University that never ends with its innovation
			</p>
		</footer>
	</div>

</section>
<script>
	// open decline edit
	const openDeclineModal = (id) => {
		document.getElementById('edit_id_spm').value = id;
		document.getElementById('declineSPM').showModal();
	}
	const createFileViewer = (basePath, modalId, iframeId, downloadId) => {
		return (file) => {
			const fullPath = `${basePath}${file}`;

			const iframe = document.getElementById(iframeId);
			iframe.src = fullPath;

			const fileDownload = document.getElementById(downloadId);
			fileDownload.href = fullPath;

			document.getElementById(modalId).showModal();
		};
	};

	const viewSertf = createFileViewer(
		'<?= base_url('assets/static/spm/pdf/sertifikat/') ?>',
		'sertfSpm',
		'sertf',
		'fileDownload'
	);

	const viewSuratTugas = createFileViewer(
		'<?= base_url('assets/static/spm/pdf/surat_tugas/') ?>',
		'suratTugas',
		'surat',
		'suratDownload'
	);

	const viewFotoKegiatan = createFileViewer(
		'<?= base_url('assets/static/spm/pdf/foto_kegiatan/') ?>',
		'fotoKegiatan',
		'foto',
		'fotoDownload'
	);
</script>
