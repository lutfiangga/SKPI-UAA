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
						<i data-feather="activity" class="w-4 h-auto"></i>
						<span class="hidden md:block">
							Content
						</span>
					</a>
				</li>
				<li>
					<a class="gap-2 flex items-center">
						<i data-feather="award" class="w-4 h-auto"></i>
						<span class="hidden md:block">
							CPL SKPI
						</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="divider border-gray-600"></div>
	<div class="mb-4">
		<a class="text-blue-600 font-bold inline-flex justify-between items-center gap-2" href="<?= site_url(ucwords($role) . '/Cpl_skpi'); ?>">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left">
				<path d="M205 34.8c11.5 5.1 19 16.6 19 29.2l0 64 112 0c97.2 0 176 78.8 176 176c0 113.3-81.5 163.9-100.2 174.1c-2.5 1.4-5.3 1.9-8.1 1.9c-10.9 0-19.7-8.9-19.7-19.7c0-7.5 4.3-14.4 9.8-19.5c9.4-8.8 22.2-26.4 22.2-56.7c0-53-43-96-96-96l-96 0 0 64c0 12.6-7.4 24.1-19 29.2s-25 3-34.4-5.4l-160-144C3.9 225.7 0 217.1 0 208s3.9-17.7 10.6-23.8l160-144c9.4-8.5 22.9-10.6 34.4-5.4z" />
			</svg>
			Kembali
		</a>
	</div>
	<div class="bg-[#fafafa] p-4 rounded-2xl">
		<table class="w-full times-new-roman">
			<thead class="header-print">
				<tr>
					<td class="content-print">
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
						<hr class="border-t-2 border-gray-400 my-2">
					</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="content-print">
						<main class="container mx-auto p-3 md:p-6 text-black print-content">
							<!-- title -->
							<div class="text-center">
								<h2 class="text-xl font-semibold uppercase">DATA CPL</h2>
								<p class="font-semibold text-xl">Capaian Pembelajaran Lulusan Prodi</p>
							</div>
							<!-- end title -->

							<!-- data prodi -->
							<div class="mt-4">
								<p class="capitalize"><strong>Program Studi:</strong> <?= $prodi['tingkat_jenjang'] . ' ' . $prodi['prodi']; ?></p>
								<p class="capitalize"><strong>Fakultas:</strong> <?= $prodi['fakultas']; ?></p>
								<p class="capitalize"><strong>Akreditasi:</strong> <?= $prodi['akreditasi']; ?></p>
							</div>
							<!-- end data prodi -->

							<!-- table cpl -->
							<div class="mt-8">
								<table class="items-center bg-transparent w-full border-collapse">
									<thead>
										<tr>
											<th colspan="2" class="px-6 border border-solid border-gray-400 py-3 text-sm uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-center">CPL</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$noKategori = 1;
										$currentKategori = null;

										foreach ($detail as $row):

											// Cek perubahan kategori
											if ($currentKategori !== $row['kategori']):
												$currentKategori = $row['kategori'];
										?>
												<!-- Row Kategori -->
												<tr class="bg-gray-100">
													<td colspan="2" class="px-6 border border-solid border-gray-400 py-3 text-sm uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
														<?= $noKategori++ . '. ' . $currentKategori; ?>
													</td>
												</tr>
											<?php
												$noItem = 'a'; // Reset penomoran item untuk setiap kategori
											endif;
											?>
											<!-- Row Item -->
											<tr class="hover:bg-gray-100">
												<td class="px-6 border border-solid border-gray-400 py-3 text-sm border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"><?= $noItem++ . '. ' . $row['konten']; ?></td>
												<td class="px-6 border border-solid border-gray-400 py-3 text-sm border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
													<!-- Button Edit -->
													<div class="flex justify-end gap-2">
														<a href="<?= site_url('Prodi/Item_Cpl/edit/' . $row['id_cpl']); ?>" class="rounded-full p-2 bg-orange-100 text-orange-600 hover:scale-125 hover:bg-orange-200 flex items-center gap-2">
															<i data-feather="edit" class="w-4 h-auto"></i>
														</a>
														<!-- Button Delete -->
														<button class="rounded-full p-2 bg-red-100 text-red-600 hover:scale-125 hover:bg-red-200 flex items-center gap-2"
															onclick="openDeleteModal('<?= $row['id_cpl']; ?>')">
															<i data-feather="trash-2" class="w-4 h-auto"></i>
														</button>
													</div>
												</td>
											</tr>

										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
							<!-- end table cpl -->

							<div class="text-sm my-8">
								<p>Tembusan:</p>
								<ol class="list-decimal pl-5">
									<li>Direktur Pembelajaran</li>
									<li>Direktur Kemahasiswaan</li>
									<li>Dekan</li>
									<li>Kaprodi</li>
								</ol>
							</div>

						</main>
					</td>
				</tr>
			</tbody>
			<tfoot class="footer-print great-vibes">
				<tr>
					<td class="content-print">
						<footer class="print-footer bg-yellow-400 p-2">
							<p class="text-center text-white tracking-widest text-lg fotn-semibold">
								The University that never ends with its innovation
							</p>
						</footer>
					</td>
				</tr>
			</tfoot>
		</table>
	</div>

	<!-- Modal Hapus -->
	<dialog id="hapusCPL" class="modal overflow-hidden">
		<div class="modal-box bg-[#fafafa]">
			<!-- Tombol close di sudut kanan atas -->
			<form method="dialog">
				<button class="btn btn-sm btn-circle btn-ghost text-red-600 absolute right-2 top-2">✕</button>
			</form>
			<h3 class="text-lg font-bold text-red-600 flex flex-row items-center">
				Hapus CPL
				<div class="bg-red-600 md:p-3 p-2 text-[#fafafa] rounded-lg ml-2 md:ml-4">
					<i data-feather="trash-2" class="w-4 h-4"></i>
				</div>
			</h3>
			<div class="divider border-gray-400"></div>
			<p class="text-gray-700 mb-4">Apakah Anda yakin ingin menghapus CPL ini?</p>
			<form method="post" action="<?= site_url('Prodi/Item_Cpl/delete'); ?>">
				<?= csrf(); ?>
				<input type="hidden" id="hapus_id_cpl" name="id_cpl" />
				<div class="modal-action relative" style="z-index: 1000;">
					<button type="button" class="btn bg-blue-600 border-none text-[#fafafa] hover:bg-[#fafafa]/30 hover:text-blue-600 hover:border-2 hover:border-blue-600 hover:shadow-md mb-4" onclick="this.closest('dialog').close();">Close</button>
					<button type="submit" class="btn bg-red-600 border-none text-[#fafafa] hover:bg-orange-400 hover:text-[#fafafa] hover:border-2 hover:border-blue-600 hover:shadow-md mb-4">Hapus</button>
				</div>
			</form>
		</div>
	</dialog>
</section>

<script>
	// Function to open delete modal and set data
	function openDeleteModal(id_cpl) {
		document.getElementById('hapus_id_cpl').value = id_cpl;
		document.getElementById('hapusCPL').showModal();
	}
</script>
