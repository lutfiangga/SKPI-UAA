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
						<th class="p-2">Nama Mahasiswa</th>
						<th class="p-2 text-center">Keterangan</th>
						<th class="p-2">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php if (!empty($read)) {
						$no = 1;
						foreach ($read as $row) {
							$img_user = $row['img_user'] ? 'assets/static/img/photos/mahasiswa/' . $row['img_user'] : 'assets/static/img/user.png';
					?>
							<tr class="border-t">
								<td class="p-2">
									<?= $no; ?>
								</td>
								<td class="p-2">
									<div class="flex flex-row gap-2 items-center">
										<img src="<?= base_url($img_user); ?>" alt="role" class="rounded-full w-8 h-8">
										<div class="flex flex-col items-start justify-center">
											<div class="flex flex-wrap gap-2 text-left">
												<p class="text-xs md:text-sm font-semibold whitespace-normal capitalize">
													<?= $row['nama'] ?>
												</p>
												<?php if ($row['jumlah_pending'] != 0) : ?>
													<div class="flex items-center gap-2 animate-pulse text-xs md:text-sm text-orange-600 bg-orange-100 hover:bg-[#EEF0F6] py-1 px-3 rounded-full">
														<i data-feather="alert-circle" class="w-3 h-3"></i>
														<span class="text-xs">New</span>
													</div>
												<?php endif; ?>
											</div>
											<p class="truncate w-full text-left text-[0.6rem] tracking-wide uppercase">
												<?= $row['prodi']; ?> - <?= $row['nim']; ?>
											</p>
										</div>
									</div>

								</td>
								<td class="text-center">
									<?php if ($row['jumlah_pending'] != 0) : ?>

										<div class="inline-flex items-center text-sm gap-2 text-orange-600 bg-orange-100 hover:bg-[#EEF0F6] py-2 px-4 rounded-full cursor-help">
											<i data-feather="alert-circle" class="w-4 h-auto"></i>
											<?= $row['jumlah_pending'] . ' Berkas belum direview'; ?>
										</div>

									<?php else: ?>
										<p class="text-xs text-gray-400">
											No action needed
										</p>
									<?php endif; ?>
								</td>
								<td class="p-2 inline-flex justify-center text-center items-center gap-2">
									<a href="<?= site_url(ucwords($role) . '/Spm_Mahasiswa/detail/' . $row['id_akun']); ?>" class="bg-blue-600 mt-3 rounded-full py-2 text-[#fafafa] hover:scale-110 px-4 flex items-center gap-2 ">
										<i data-feather="eye" class="w-4 h-auto"></i>
										<p class=" text-white transition-opacity duration-300">Lihat</p>
									</a>

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
						<th class="p-2">No</th>
						<th class="p-2">Nama Mahasiswa</th>
						<th class="p-2 text-center">Keterangan</th>
						<th class="p-2">Aksi</th>
					</tr>
				</tfoot>
			</table>
		</div>
	</section>

</section>