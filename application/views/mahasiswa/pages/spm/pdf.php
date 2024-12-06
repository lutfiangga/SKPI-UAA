<table class="w-full times-new-roman">
	<thead class="header-print">
		<tr>
			<td class="content-print">
				<header class="flex flex-row justify-between items-center">
					<img src="<?= base_url('assets/static/img/logouaa.png'); ?>" alt="Logo uaa"
						class="w-auto h-[2rem] sm:h-[3rem] md:h-20">
					<div class="flex flex-col items-end text-[#0B5E91]">
						<h1 class="font-bold text-end text-[0.7rem] sm:text-[0.8rem] md:text-sm">Jl. Brawijaya No.99,
							Yogyakarta 55183</h1>
						<p class="mt-1 text-end text-[0.8rem] sm:text-xs md:text-base">Telp. (0274) 4342288 Fax. (0274)
							4342269</p>
						<div class="flex flex-row gap-2 items-center mt-1 text-[0.6rem] md:text-xs text-end">
							<div class="flex flex-row items-center">
								<i data-feather="globe"
									class="p-0.5 md:p-1 bg-[#0B5E91] text-white w-[12px] h-[12px] sm:w-[16px] sm:h-[16px] md:w-[20px] md:h-[20px] rounded-lg"></i>
								<p class="ml-1">www.almaata.ac.id</p>
							</div>
							<div class="flex flex-row items-center">
								<i data-feather="mail"
									class="p-0.5 md:p-1 bg-[#0B5E91] text-white w-[12px] h-[12px] sm:w-[16px] sm:h-[16px] md:w-[20px] md:h-[20px] rounded-lg"></i>
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
						<p class="text-xl font-semibold">Skor Prestasi Mahasiswa (SPM)</p>
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
										<th
											class="px-6 border border-solid border-gray-400 py-3 text-sm uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-center">
											No</th>
										<th
											class="px-6 border border-solid border-gray-400 py-3 text-sm uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-center">
											Prestasi / Kegiatan</th>
										<th
											class="px-6 border border-solid border-gray-400 py-3 text-sm uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-center">
											Skor</th>
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
											<td colspan="3" class="text-center px-6 py-3 text-sm text-gray-500">
												N/A
											</td>
										</tr>
										<?php
									} else {
										foreach ($spm as $row) {
											if ($row['nim'] == $id_user) {
												if ($kategori != $row['kategori']) {
													$kategori = $row['kategori'];
													echo "<tr><td colspan='3' class='px-6 border border-solid border-gray-400 py-3 text-sm uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left'>{$row['kategori']}</td></tr>";
												}
										?>
												<tr>
													<th
														class="border-t-0 px-6 border-l-0 border-r-0 text-sm whitespace-nowrap p-4 text-center">
														<?= $no; ?></th>
													<td class="border-t-0 px-6 border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
														<?= $row['kegiatan'] ?></td>
													<td
														class="border-t-0 px-6 text-center border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
														<?= $row['poin'] ?></td>
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
										<th colspan="2"
											class="px-6 border border-solid border-gray-400 py-3 text-sm uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-center">
											Total Skor</th>
										<th
											class="px-6 border border-solid border-gray-400 py-3 text-sm border-l-0 border-r-0 whitespace-nowrap font-bold text-center">
											<?= (!empty($SpmPoin['spm_poin'])) ? $SpmPoin['spm_poin'] : 'N/A' ?>
										</th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
					<!-- end table prestasi -->

					<!-- table Pelanggaran Alma Ata Etiquette -->
					<div class="mt-8">
						<h3 class="text-xl font-semibold mb-4">Pelanggaran Alma Ata Etiquette</h3>
						<div class="overflow-x-auto">
							<table class="items-center bg-transparent w-full border-collapse">
								<thead>
									<tr>
										<th
											class="px-6 border border-solid border-gray-400 py-3 text-sm uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-center">
											No</th>
										<th
											class="px-6 border border-solid border-gray-400 py-3 text-sm uppercase border-l-0 border-r-0 whitespace-normal font-semibold text-center">
											Pelanggaran Alma Ata Etiquette</th>
										<th
											class="px-6 border border-solid border-gray-400 py-3 text-sm uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-center">
											Skor</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									$kategori = '';

									// Cek apakah $etiket kosong
									if (empty($etiquette)) {
									?>
										<tr>
											<td colspan="3" class="text-center px-6 py-3 text-sm text-gray-500">
												N/A
											</td>
										</tr>
										<?php
									} else {
										foreach ($etiquette as $row) {
											if ($row['nim'] == $this->session->userdata('id_user')) {
												if ($kategori != $row['jenis_pelanggaran']) {
													$kategori = $row['jenis_pelanggaran'];
													echo "<tr><td colspan='3' class='px-6 border border-solid border-gray-400 py-3 text-sm uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left'>{$row['jenis_pelanggaran']}</td></tr>";
												}
										?>
												<tr>
													<th class="border-t-0 px-6 border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
														<?= $no; ?></th>
													<td class="border-t-0 px-6 border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
														<?= $row['pelanggaran'] ?></td>
													<td
														class="border-t-0 px-6 text-center border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
														<?= $row['poin'] ?></td>
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
										<th colspan="2"
											class="px-6 border border-solid border-gray-400 py-3 text-sm uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-center">
											Total Skor</th>
										<th
											class="px-6 border border-solid border-gray-400 py-3 text-sm border-l-0 border-r-0 whitespace-nowrap font-bold text-center">
											<?= (!empty($etiquettePoin['etiquette_poin'])) ? $etiquettePoin['etiquette_poin'] : 'N/A' ?>
										</th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
					<!-- end table Pelanggaran Alma Ata Etiquette -->

					<div class="mt-4 w-full flex justify-between">
						<!-- skor akhir -->
						<div class="">
							<table class="w-full text-sm text-left border-collapse">
								<tr class="border-b border-gray-400">
									<th class="p-2 font-semibold text-gray-600">Total Skor SPM:</th>
									<td class="p-2 text-gray-800 text-base text-right"><?= $SpmPoin['spm_poin']; ?></td>
								</tr>
								<tr class="border-b border-gray-400">
									<th class="p-2 font-semibold text-gray-600">Total Skor Etiquette:</th>
									<td class="p-2 text-gray-800 text-base text-right"><?= $etiquettePoin['etiquette_poin']; ?></td>
								</tr>
								<tr class="bg-gray-100 border-b border-gray-400">
									<th class="p-2 font-semibold text-gray-600">Total Skor Akhir:</th>
									<td class="p-2 font-bold text-gray-900 text-base text-right"><?= $SpmPoin['spm_poin'] - $etiquettePoin['etiquette_poin']; ?></td>
								</tr>
							</table>
						</div>
						<!-- signature & stamp -->
						<div class="">
							<div class="relative max-w-64">
								<p>Mengetahui,</p>
								<p>Yogyakarta, <?= tanggal(date('Y-m-d')); ?></p>
								<p><strong>Direktur Kemahasiswaan</strong></p>
								<br><br><br><br>
								<hr class="border-b-1 border-black mt-2">
								<p class="capitalize text-center"><?= $direktur['nama']; ?></p>
								<?php if ($SpmPoin['spm_poin'] >= 25): ?>
									<div class="absolute right-0 bottom-6">
										<div class="relative w-[180px] h-auto">
											<img src="<?= base_url('assets/static/img/photos/kemahasiswaan/signature/' . $direktur['signature']) ?>"
												alt="Signature" class="absolute bottom-1 z-1">
											<img src="<?= base_url('assets/static/img/photos/kemahasiswaan/stamp/' . $direktur['stamp']) ?>"
												alt="stamp" class="absolute bottom-1 z-2  opacity-75">
										</div>
									</div>
								<?php endif; ?>
							</div>
						</div>
						<!-- end signature & stamp -->
					</div>

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
