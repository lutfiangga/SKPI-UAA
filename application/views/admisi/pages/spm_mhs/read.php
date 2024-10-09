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
						<th class="px-4 py-2">No</th>
						<th class="px-4 py-2">Nama</th>
						<th class="px-4 py-2">Tanggal</th>
						<th class="px-4 py-2">File</th>
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
								<td class="px-4 py-2 whitespace-nowrap"><?= tanggal($row['tanggal']) ?></td>
								<td class="px-4 py-2">
									<?php if (trim($row['type']) == 'file'): ?>
										<a href="<?= base_url('assets/static/pdf/spm/' . $row['url']); ?>" download class="flex flex-row mx-2 p-2 items-center gap-2 hover:rounded-lg hover:bg-[#EEF0F6] cursor-pointer">
											<div>
												<div class="rounded-md text-[#fafafa] bg-blue-600 p-2">
													<i data-feather="file-text" class="w-6 h-auto"></i>
												</div>
											</div>
											<p class="text-sm max-w-full font-thin truncate whitespace-wrap"><?= $row['url']; ?></p>
										</a>
									<?php else: ?>
										<a href="<?= $row['url']; ?>" class="flex flex-row mx-2 p-2 items-center gap-2 hover:rounded-lg hover:bg-[#EEF0F6] cursor-pointer">
											<div>
												<div class="rounded-md text-[#fafafa] bg-blue-600 p-2">
													<i data-feather="link-2" class="w-6 h-auto"></i>
												</div>
											</div>
											<p class="text-sm max-w-full font-thin truncate whitespace-wrap"><?= $row['url']; ?></p>
										</a>
									<?php endif; ?>
								</td>
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
										<a href="<?= site_url('Admisi/Spm_Mahasiswa/accept/' . $row['id_syarat_wajib']); ?>" class="bg-green-600 rounded-full p-2 text-[#fafafa] hover:px-4 flex items-center gap-2 group">
											<i data-feather="check-circle" class="w-4 h-auto"></i>
											<p class="hidden group-hover:block text-white transition-opacity duration-300">Diterima</p>
										</a>
										<a href="<?= site_url('Admisi/Spm_Mahasiswa/decline/' . $row['id_syarat_wajib']); ?>" class="bg-red-600 rounded-full p-2 text-[#fafafa] hover:px-4 flex items-center gap-2 group">
											<i data-feather="x-circle" class="w-4 h-auto"></i>
											<p class="hidden group-hover:block text-white transition-opacity duration-300">Ditolak</p>
										</a>
									<?php else: ?>
										<p class="text-xs text-gray-400 mt-3">No action needed</p>
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
						<th class="px-4 py-2">Nama</th>
						<th class="px-4 py-2">Tanggal</th>
						<th class="px-4 py-2">File</th>
						<th class="px-4 py-2">Status</th>
						<th class="px-4 py-2">Aksi</th>
					</tr>
				</tfoot>
			</table>
		</div>
	</section>

</section>
