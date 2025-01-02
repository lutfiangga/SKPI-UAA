<section class="relative flex flex-col justify-between">
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
	<div class="bg-[#fafafa] p-4 rounded-2xl font-tnr">
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
				<p class="font-semibold text-sm">Validasi Syarat Perlu</p>
				<p class="text-sm">Nomor : 592/A/SPM/ADMISI/UAA/VIII/2024 </p>
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
			<div class=" mt-4 sm:mt-6 md:mt-8 overflow-x-auto">
				<table class="table-auto bg-transparent w-full border-collapse">

					<?php
					$noKategori = 1;
					$currentKategori = null;

					foreach ($spm as $row):

						// Cek perubahan kategori
						if ($currentKategori !== $row['kategori']):
							$currentKategori = $row['kategori'];
					?>
							<!-- Row Kategori -->
							<tr class="bg-gray-100">
								<td colspan="5" class="px-6 border border-solid border-gray-400 py-3 text-sm uppercase border-l-0 border-r-0 font-semibold text-left">
									<?= $noKategori++ . '. ' . $currentKategori; ?>
								</td>
							</tr>
						<?php
							$noItem = 'a'; // Reset penomoran item untuk setiap kategori
						endif;
						?>
						<!-- Row Item -->
						<tr class="hover:bg-gray-100">
							<td class="px-6 border border-solid border-gray-400 py-3 text-sm border-l-0 border-r-0 font-semibold text-left">
								<?= $noItem++ . '. ' . tanggal($row['tanggal']); ?>
							</td>
							<td class="px-6 border border-solid border-gray-400 py-3 text-sm border-l-0 border-r-0 font-semibold text-left">
								<?php if (!empty($row['file'])) : ?>
									<?= renderViewButton('File', 'viewFile', $row['file']) ?>
								<?php endif; ?>
							</td>
							<td class="px-6 border border-solid border-gray-400 text-sm border-l-0 border-r-0 font-semibold text-left">
								<?php if (!empty($row['url'])) : ?>
									<?= renderLinkButton('Link', $row['url']) ?>
								<?php endif; ?>
							</td>
							<td class="px-6 border border-solid border-gray-400 text-sm border-l-0 border-r-0 font-semibold text-left">
								<?= renderStatus($row['status']) ?>
							</td>
							<td class="px-6 border border-solid border-gray-400 text-sm border-l-0 border-r-0 font-semibold text-left">
								<?= renderSpmActions($row['status'], ucwords($role) . '/Spm_Mahasiswa/accept/', $row['id_syarat_wajib'], '/' . $row['id_akun'], $row['keterangan']) ?>
							</td>
						</tr>

						<!-- Modal Decline SPM -->
						<dialog id="declineSPM" class="modal overflow-hidden font-sans">
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
								<form method="post" action="<?= site_url('Admisi/Spm_Mahasiswa/decline/' . $row['id_syarat_wajib']); ?>" enctype="multipart/form-data" role="form">
									<?= csrf(); ?>
									<input type="text" id="edit_id_syarat_wajib" name="id_syarat_wajib" hidden />

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

						<!-- Modal view file SPM -->
						<dialog id="fileSpm" class="modal overflow-hidden font-sans">
							<div class="modal-box bg-[#fafafa]">
								<form method="dialog">
									<button class="btn btn-sm btn-circle btn-ghost text-red-600 absolute right-2 top-2">✕</button>
								</form>
								<h3 class="text-lg font-bold text-blue-600 flex flex-row items-center">
									File SPM
									<div class="bg-blue-600 md:p-3 p-2 text-[#fafafa] rounded-lg ml-2 md:ml-4">
										<i data-feather="award" class="w-4 h-4"></i>
									</div>
								</h3>
								<div class="divider border-gray-400"></div>

								<a id="fileDownload" href="#" download class="flex -mt-2 md:-mt-4 justify-end items-center gap-2 p-2 text-blue-600 hover:text-gray-400 text-xs sm:text-sm md:text-base">
									<i data-feather="download-cloud" class="w-6 h-6"></i>
									<span class="font-medium">Download File</span>
								</a>

								<div class="mb-4 flex justify-center">
									<img id="file" src="#" alt="File SPM">
								</div>

								<div class="modal-action relative" style="z-index: 1000;">
									<button type="button" class="btn bg-red-600 border-none text-[#fafafa] hover:bg-orange-400 hover:text-[#fafafa] hover:border-2 hover:border-blue-600 hover:shadow-md mb-4" onclick="this.closest('dialog').close();">Close</button>
									<button type="submit" class="btn bg-blue-600 border-none text-[#fafafa] hover:bg-[#fafafa]/30 hover:text-blue-600 hover:border-2 hover:border-blue-600 hover:shadow-md mb-4">Submit</button>
								</div>

							</div>
						</dialog>
					<?php endforeach; ?>
					</tbody>
				</table>
			</div>
			<!-- End List SPM -->

			<div class="text-sm my-8">
				<p>Tembusan:</p>
				<ol class="list-decimal pl-5">
					<li>Direktur Pembelajaran</li>
					<li>Direktur Kemahasiswaan</li>
					<li>Dekan</li>
					<li>Kaprodi</li>
					<li>Mahasiswa ybs.</li>
				</ol>
			</div>

		</main>

		<footer class="print-footer bg-yellow-400 p-2">
			<p class="text-center text-white tracking-widest text-lg fotn-semibold">
				The University that never ends with its innovation
			</p>
		</footer>

	</div>

</section>
<script>
	// open decline edit
	const openDeclineModal = (id) => {
		document.getElementById('edit_id_syarat_wajib').value = id;
		document.getElementById('declineSPM').showModal();
	}
	const viewFile = (file) => {
		const basePath = '<?= base_url('assets/static/spm/img/syarat_wajib/') ?>';
		const fullPath = basePath + file;

		// console.log("Full Path: ", fullPath); // Menampilkan path lengkap
		const imgElement = document.getElementById('file');
		// console.log("Image Element Before Update: ", imgElement.src); // Debug: sebelum update

		// Perbarui src gambar
		imgElement.src = fullPath;
		// console.log("Image Element After Update: ", imgElement.src);
		// Debug: setelah update
		const fileDownload = document.getElementById('fileDownload');
		fileDownload.href = fullPath;
		// console.log("fileDownload Element Before Update: ", fileDownload.href); // Debug: sebelum update

		// Tampilkan modal
		document.getElementById('fileSpm').showModal();
	};
</script>
