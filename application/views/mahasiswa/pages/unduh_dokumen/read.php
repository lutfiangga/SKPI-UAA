<section class="relative flex flex-col justify-between">
	<div class="flex flex-row justify-between items-center">
		<div class="flex flex-row justify-start items-center md:gap-4 gap-2">
			<h1 class="md:text-2xl sm:text-xl lg:text-3xl text-md font-bold text-blue-600 whitespace-nowrap capitalize">
				<span class="flex flex-row items-center gap-2">
					<p class="block">
						<?= $sub; ?>
					</p>
				</span>
			</h1>
			<div class="bg-blue-600 md:p-3 p-2 text-off-white rounded-lg">
				<i data-feather="file-text" class="w-4 h-4 sm:h-[20px] sm:w-[20px] md:h-[24px] md:w-[24px]"></i>
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
						<i data-feather="user" class="w-4 h-auto"></i>
						<span class="hidden md:block capitalize">
							<?= $role; ?>
						</span>
					</a>
				</li>
				<li>
					<a class="gap-2 flex items-center">
						<i data-feather="file-text" class="w-4 h-auto"></i>
						<span class="hidden md:block">
							Document
						</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="divider border-gray-600"></div>

	<!-- card -->
	<div class="container mx-auto ">
		<div class="grid grid-cols-1 md:grid-cols-2 gap-4">

			<!-- Dokumen SPM -->
			<div
				class="card bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300 transform hover:scale-105">
				<div class="h-64">
					<iframe id="spm" class="absolute inset-0 w-full h-full object-cover"
						src="<?= site_url('Mahasiswa/Spm_Mahasiswa/export_pdf'); ?>" frameborder="0"
						scrolling="no"></iframe>

					<!-- Enhanced Gradient Overlay -->
					<div class="absolute bottom-0 left-0 right-0 h-1/4 bg-white p-4 flex justify-between items-center">
						<!-- Document Title -->
						<div class="flex flex-col gap-0.5">
							<h2 class="text-blue-700 text-lg font-semibold">Dokumen SPM</h2>
							<?php if ($syaratSkor['syarat_skor'] >= ($skorSyaratWajib['skor'] ?? 9) && $SpmPoin['spm_poin'] >= $skorMinSpm['skor']): ?>
								<p class="text-xs text-gray-500"> Dokumen Anda sudah siap diunduh</p>
							<?php else: ?>
								<p class="text-xs text-gray-500">Skor anda masih kurang!</p>
							<?php endif; ?>
						</div>
						<div class="inline-flex justify-between gap-2">
							<a href="<?= base_url('Mahasiswa/Spm_Mahasiswa/export_pdf'); ?>" aria-label="Print Dokumen"
								class="flex border gap-1 text-blue-600 items-center space-x-2 bg-blue-100 hover:bg-blue-200 p-2 rounded-lg transition duration-200">
								<p class="hidden md:block">View</p>
								<i data-feather="eye" class="w-5 h-5"></i>
							</a>
							<!-- Print Button with Tooltip -->
							<?php if ($syaratSkor['syarat_skor'] >= ($skorSyaratWajib['skor'] ?? 9) && $SpmPoin['spm_poin'] >= $skorMinSpm['skor']): ?>
								<button id="print_spm" aria-label="Print Dokumen"
									class="flex border gap-1 text-orange-600 items-center space-x-2 bg-orange-100 hover:bg-orange-200 p-2 rounded-lg transition duration-200">
									<p class="hidden md:block">Print</p>
									<i data-feather="printer" class="w-5 h-5"></i>
								</button>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
			<!-- Dokumen SKPI -->
			<div
				class="card bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300 transform hover:scale-105">
				<div class="h-64">
					<iframe id="skpi" class="absolute inset-0 w-full h-full"
						src="<?= site_url('Mahasiswa/Skpi_Mahasiswa/export_pdf'); ?>" frameborder="0"
						scrolling="no"></iframe>

					<!-- Enhanced Gradient Overlay -->
					<div class="absolute bottom-0 left-0 right-0 h-1/4 bg-white p-4 flex justify-between items-center">
						<!-- Document Title -->
						<div class="flex flex-col gap-0.5">
							<h2 class="text-blue-700 text-lg font-semibold">Dokumen SKPI</h2>
							<?php if ($syaratSkor['syarat_skor'] >= ($skorSyaratWajib['skor'] ?? 9) && $SpmPoin['spm_poin'] >= $skorMinSpm['skor']): ?>
								<p class="text-xs text-gray-500"> Dokumen Anda sudah siap diunduh</p>
							<?php else: ?>
								<p class="text-xs text-gray-500">Skor anda masih kurang!</p>
							<?php endif; ?>
						</div>
						<div class="inline-flex justify-between gap-2">
							<a href="<?= base_url('Mahasiswa/Skpi_Mahasiswa/export_pdf'); ?>" aria-label="Print Dokumen"
								class="flex border gap-1 text-blue-600 items-center space-x-2 bg-blue-100 hover:bg-blue-200 p-2 rounded-lg transition duration-200">
								<p class="hidden md:block">View</p>
								<i data-feather="eye" class="w-5 h-5"></i>
							</a>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>

</section>
<script>
	$('#print_spm').click(function() {
		const iframe = document.querySelector('#spm');
		iframe.contentWindow.focus();
		iframe.contentWindow.print();
	});
	$('#print_skpi').click(function() {
		const iframe = document.querySelector('#skpi');
		iframe.contentWindow.focus();
		iframe.contentWindow.print();
	});
	
</script>
