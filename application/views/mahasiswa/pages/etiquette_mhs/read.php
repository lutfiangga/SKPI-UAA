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
						<i data-feather="activity" class="w-4 h-auto"></i>
						<span class="hidden md:block">

							Eticket
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
			<table class="min-w-full table-auto table-info">
				<thead class="bg-gray-100">
					<tr>
						<th class="p-2">No</th>
						<th class="p-2">Pelanggaran</th>
						<th class="p-2">Jenis Pelanggaran</th>
						<th class="p-2">Bukti</th>
						<th class="p-2">Poin</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach ($read as $row) {
						if ($row['nim'] == $this->session->userdata('id_user')) {
					?>
							<tr class="border-t">
								<td class="p-2">
									<?= $no; ?>
								</td>
								<td class="p-2 whitespace-normal"><?= $row['pelanggaran'] ?></td>
								<td class="p-2 whitespace-nowrap"><?= $row['jenis_pelanggaran'] ?></td>
								<td class="p-2">
									<?php if (!empty($row['bukti'])) : ?>
										<a href="<?= base_url('assets/static/eticket/' . $row['bukti']); ?>" download class="flex flex-row p-2 items-center gap-2 hover:rounded-lg hover:bg-[#EEF0F6] cursor-pointer">
											<div>
												<div class="rounded-md text-[#fafafa] bg-blue-600 p-2">
													<i data-feather="image" class="w-6 h-auto"></i>
												</div>
											</div>
											<p class="text-sm max-w-full font-thin truncate whitespace-normal w-full"><?= $row['bukti']; ?></p>
										</a>
									<?php endif; ?>
								</td>
								<td class="p-2 whitespace-nowrap">
									<span class="flex items-center cursor-default text-sm gap-2 text-green-600 hover:bg-lavender-gray py-2 rounded-full">
										<i data-feather="check-circle" class="w-4 h-auto"></i>
										<?= $row['poin'] ?> Poin
									</span>
								</td>
							</tr>
					<?php
							$no++;
						}
					}
					?>
				</tbody>
				<tfoot class="bg-gray-100">
					<tr>
						<th class="p-2">No</th>
						<th class="p-2">Pelanggaran</th>
						<th class="p-2">Jenis Pelanggaran</th>
						<th class="p-2">Bukti</th>
						<th class="p-2">Poin</th>
					</tr>
				</tfoot>
			</table>
		</div>
	</section>

</section>
