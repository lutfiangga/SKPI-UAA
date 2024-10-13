<section class="relative flex flex-col justify-between">
	<div class="flex flex-row justify-between items-center">
		<div class="flex flex-row justify-start items-center md:gap-4 gap-2">
			<h1 class="md:text-2xl sm:text-xl lg:text-3xl text-md font-bold text-blue-600 whitespace-nowrap capitalize"><span class="flex flex-row items-center gap-2">
					<p class="block">
						<?= $sub; ?>
					</p>
				</span>
			</h1>
			<div class="bg-blue-600 md:p-3 p-2 text-off-white rounded-lg">
				<i data-feather="trello" class="w-4 h-4 sm:h-[20px] sm:w-[20px] md:h-[24px] md:w-[24px]"></i>
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
						<i data-feather="trello" class="w-4 h-auto"></i>
						<span class="hidden md:block">
							SKPI
						</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="divider border-gray-600"></div>

	<!-- card -->
	<section class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
		<!-- card -->
		<div class="flex flex-col col-span-1 text-blue-600">
			<div class="bg-off-white rounded-t-2xl flex flex-row p-4 w-5/6 items-center gap-4 header-card">
				<!-- <i data-feather="clock"></i> -->
				<div class="flex flex-col uppercase tracking-wide items-start">
					<!-- <p class="text-[0.6rem]">diunggah tanggal</p> -->
					<p class="text-sm font-semibold">Total Poin SPM</p>
				</div>
			</div>
			<a href="<?= site_url('Mahasiswa/Skpi_Mahasiswa/print'); ?>" class="bg-off-white rounded-b-2xl rounded-tr-2xl p-4">
				<div class="flex flex-row justify-between mx-2 items-center gap-2 hover:rounded-lg hover:bg-[#e7ecfb] cursor-pointer">
					<div>
						<div class="rounded-md text-off-white bg-blue-600 p-4">
							<i data-feather="award"></i>
						</div>
					</div>
					<p class="text-lg w-full whitespace-wrap font-bold"><?= $SpmPoin['total_poin'] ?> Poin</p>
				</div>
				<div class="flex flex-row gap-4 items-center mt-6 text-gray-500">
					<i data-feather="award"></i>
					<p class="truncate w-full ml-2 font-semibold">Total Poin SPM</p>
				</div>
			</a>
		</div>
		<!-- card -->
	</section>

</section>
