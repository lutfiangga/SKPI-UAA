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

					<!-- table prestasi -->
					<div class="mt-8">
						<h3 class="text-xl font-semibold mb-4">Prestasi Mahasiswa</h3>
						<div class="overflow-x-auto">
							<table class="items-center bg-transparent w-full border-collapse">
								<thead>
									<tr>
										<th class="px-6 border border-solid border-gray-400 py-3 text-sm uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-center">No</th>
										<th class="px-6 border border-solid border-gray-400 py-3 text-sm uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-center">Konten / Ulasan</th>
										<th class="px-6 border border-solid border-gray-400 py-3 text-sm uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-center">Skor</th>
										<th class="px-6 border border-solid border-gray-400 py-3 text-sm uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-center">Verifikasi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									$kategori = '';

									// Cek apakah $spm kosong
									if (empty($spm)) {
									?>
										<tr>
											<td colspan="4" class="text-center px-6 py-3 text-sm text-gray-500">
												N/A
											</td>
										</tr>
										<?php
									} else {
										foreach ($spm as $row) {
											if ($row['nim'] == $this->session->userdata('id_user')) {
												if ($kategori != $row['kategori']) {
													$kategori = $row['kategori'];
													echo "<tr><td colspan='4' class=' px-6 border border-solid border-gray-400 py-3 text-sm uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left'>{$row['kategori']}</td></tr>";
												}
										?>
												<tr>
													<th class="border-t-0 px-6 border-l-0 border-r-0 text-sm whitespace-nowrap p-4 text-center"><?= $no; ?></th>
													<td class="border-t-0 px-6 border-l-0 border-r-0 text-sm whitespace-nowrap p-4"><?= $row['url'] ?></td>
													<td class="border-t-0 px-6 text-center border-l-0 border-r-0 text-sm whitespace-nowrap p-4"><?= $row['poin'] ?></td>
													<td class="border-t-0 px-6 text-center border-l-0 border-r-0 text-sm whitespace-nowrap p-4"><?= ($row['status'] != 'ditolak') ? 'Memenuhi' : 'Tidak Memenuhhi' ?></td>
												</tr>
									<?php
												$no++;
											}
										}
									}
									?>
								</tbody>
								<tfoot>
									<tr class="bg-gray-200/50">
										<th colspan="2" class="px-6 border border-solid border-gray-400 py-3 text-sm uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-center">Total Skor</th>
										<th class="px-6 border border-solid border-gray-400 py-3 text-sm border-l-0 border-r-0 whitespace-nowrap font-bold text-center"><?= (!empty($SpmPoin['total_poin'])) ? $SpmPoin['total_poin'] : 'N/A' ?></th>
										<th colspan="2" class="px-6 border border-solid border-gray-400 py-3 text-sm uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-center"><?= ($SpmPoin['total_poin'] >= 9) ? 'Memenuhi' : 'Tidak Memenuhhi' ?></th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
					<!-- end table prestasi -->


					<!-- signature & stamp -->
					<div class="mt-10 w-full flex justify-start">
						<div class="relative max-w-64">
							<p>Mengetahui,</p>
							<p>Yogyakarta, <?= tanggal(date('Y-m-d')); ?></p>
							<p><strong>Direktur Admisi</strong></p>
							<br><br><br><br>
							<hr class="border-b-1 border-black mt-2">
							<p class="capitalize text-center"><?= $direktur['nama']; ?></p>
							<?php if ($syaratSkor['total_poin'] >= 9): ?>
								<div class="absolute left-0 bottom-6">
									<div class="relative w-[180px] h-auto">
										<img src="<?= base_url('assets/static/img/photos/admisi/signature/' . $direktur['signature']) ?>" alt="Signature" class="absolute bottom-1 z-1">
										<img src="<?= base_url('assets/static/img/photos/admisi/stamp/' . $direktur['stamp']) ?>" alt="stamp" class="absolute bottom-1 z-2  opacity-75">
									</div>
								</div>
							<?php endif; ?>
						</div>
					</div>
					<!-- end signature & stamp -->

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
<script>
	window.print()
</script>
