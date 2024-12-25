<section class="relative flex flex-col justify-between">
	<div class="flex flex-row justify-between items-center">
		<div class="flex flex-row justify-start items-center md:gap-4 gap-2">
			<h1 class="md:text-3xl text-xl font-bold text-blue-600 whitespace-nowrap"><?= $sub; ?></h1>
			<div class="bg-blue-600 md:p-3 p-2 text-[#fafafa] rounded-lg">
				<i data-feather="users" fill="currentColor" class="w-4 h-4 md:h-[24px] md:w-[24px]"></i>
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

							SKPI
						</span>
					</a>
				</li>
				<li>
					<a class="gap-2 flex items-center">
						<i data-feather="user" class="w-4 h-auto"></i>
						<span class="hidden md:block">

							Mahasiswa
						</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="divider border-gray-600"></div>
	<div class="w-full bg-[#fafafa] rounded-2xl p-4">
		<form action="<?= site_url(ucwords($role) . '/Skpi_Mahasiswa'); ?>" method="get" class="w-full flex flex-col md:flex-row justify-between gap-4">
			<div class="flex flex-col md:flex-row items-start md:items-center gap-4 w-full">
				<div class="flex flex-col w-full md:w-1/3">
					<label for="tahun_masuk" class="text-gray-800 font-semibold mb-1">Tahun Masuk:</label>
					<input type="number" inputmode="numeric" id="tahun_masuk" name="tahun_masuk" value="<?= $tahun_masuk; ?>"
						class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2"
						placeholder="Masukkan tahun masuk" />
				</div>

				<div class="flex flex-col w-full md:w-1/3">
					<label for="tahun_lulus" class="text-gray-800 font-semibold mb-1">Tahun Lulus:</label>
					<input type="number" inputmode="numeric" id="tahun_lulus" name="tahun_lulus" value="<?= $tahun_lulus; ?>"
						class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2"
						placeholder="Masukkan tahun lulus" />
				</div>

				<div class="flex flex-col w-full md:w-1/3">
					<label for="prodi" class="text-gray-800 font-semibold mb-1">Program Studi:</label>
					<select
						id="prodi"
						name="id_prodi"
						class="w-full p-2 rounded-md bg-[#fafafa] border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:outline-none select-bordered"
						data-search="true">
						<option value="" selected disabled>--Program Studi--</option>
						<?php foreach ($listProdi as $r) { ?>
							<option value="<?= $r['id_prodi'] ?>" <?= ($r['id_prodi'] == $prodi) ? 'selected' : '' ?>><?= $r['id_prodi'] . ' | ' . $r['prodi']; ?></option>
						<?php } ?>
					</select>
				</div>
			</div>

			<!-- Filter Button -->
			<div class="mt-2 md:mt-5">
				<button
					type="submit"
					class="w-full text-center inline-flex justify-center items-center md:w-auto px-6 py-3 gap-2 rounded-md bg-blue-100 text-blue-600 font-semibold hover:bg-blue-200 focus:ring-2 focus:ring-blue-400 focus:outline-none">
					<i data-feather="filter" fill="currentColor"></i><span>Filter</span>
				</button>
			</div>
		</form>
	</div>

	<!-- table data -->
	<section class="relative bg-[#fafafa] rounded-2xl lg:p-8 p-4 my-4">

		<div class="overflow-x-auto">
			<table id="" class="min-w-full table-auto table-data">
				<thead class="bg-gray-100">
					<tr>
						<th class="p-2">No</th>
						<th class="p-2">Nama</th>
						<th class="p-2">Tahun Masuk <br>- Tahun Lulus</th>
						<th class="p-2">Semester</th>
						<th class="p-2">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach ($read as $row) {
						$mhs_folder = 'assets/static/img/photos/staff/mahasiswa/';
						$default_image = 'assets/static/img/user.png';

						$img_user = !empty($row['img_user']) && file_exists($mhs_folder . $row['img_user']) ? $mhs_folder . $row['img_user'] : $default_image;
					?>
						<tr class="border-t">
							<td class="p-2"><?= $no; ?></td>
							<td class="p-2">
								<div class="flex flex-row gap-2 items-center">
									<img src="<?= base_url($img_user); ?>" alt="<?= $row['nama']; ?>" class="rounded-full w-8 h-8">
									<div class="flex flex-col items-center justify-center">
										<p class="truncate w-full ml-2 font-semibold capitalize"><?= $row['nama'] ?></p>
										<p class="truncate w-full ml-2 text-[0.6rem] tracking-wide uppercase"><?= $row['prodi']; ?> - <?= $row['nim']; ?></p>
									</div>
								</div>
							</td>
							<td class="p-2 whitespace-normal">
								<?= $row['tahun_masuk']; ?><?= !empty($row['tahun_lulus']) ? ' - ' . $row['tahun_lulus'] : ''; ?>
							</td>
							<td class="p-2 whitespace-nowrap">Semester <?= $row['semester']; ?></td>
							<td class="p-2 flex flex-row items-center justify-center mt-2 gap-2">
								<a href="<?= site_url('Admin/Skpi_Mahasiswa/detail/' . $row['nim'] . '/' . $row['id_akun']) ?>" class="bg-blue-100 rounded-full p-2 hover:scale-125 hover:bg-blue-200 text-blue-600 flex items-center gap-2 group">
									<i data-feather="eye" class="w-4 h-auto"></i>
								</a>
								<a href="<?= site_url(ucwords($role) . '/Skpi_Mahasiswa/pdf/' . $row['nim'] . '/' . $row['id_akun']) ?>" aria-label="Print Dokumen"
									class="flex border gap-1 text-orange-600 items-center space-x-2 bg-orange-100 hover:bg-orange-200 p-2 rounded-lg transition duration-200">
									<i data-feather="file-text" class="w-5 h-5"></i>
									<p class="font-semibold hidden md:block">PDF</p>
								</a>
							</td>
						</tr>

					<?php
						$no++;
					}
					?>
				</tbody>
				<tfoot class="bg-gray-100">
					<tr>
						<th class="p-2">No</th>
						<th class="p-2">Nama</th>
						<th class="p-2">Tahun Masuk <br>- Tahun Lulus</th>
						<th class="p-2">Semester</th>
						<th class="p-2">Aksi</th>
					</tr>
				</tfoot>
			</table>
		</div>

	</section>

</section>
