<section class="relative flex flex-col justify-between">
	<div class="flex flex-row justify-between items-center">
		<div class="flex flex-row justify-start items-center md:gap-4 gap-2">
			<h1 class="md:text-2xl sm:text-xl lg:text-3xl text-md font-bold text-blue-600 whitespace-nowrap capitalize"><span class="flex flex-row items-center gap-2">
					<p class="block">
						<?= $sub; ?>
					</p>
					<p class="hidden md:block">
						<?= $role; ?>
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
							Dashboard
						</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="divider border-gray-600"></div>

	<!-- greeting -->
	<section class="relative mb-4 lg:mb-8 md:mb-6" id="greetings">
		<!-- Greetings -->
		<div class="bg-blue-600 w-full h-36 gap-4 md:gap-2 lg:gap-0 flex flex-col justify-center rounded-2xl p-4 text-off-white">
			<p class="flex gap-2 text-sm md:text-base">Haii, <span class="capitalize font-bold"><?= $nama; ?>!</span></p>
			<em class="text-xs md:text-sm whitespace-normal lg:max-w-[50%] w-full">Semangat Ya! Ayok selesaikan studimu dan pamerkan semua hasil usahamu.</em>
			<!-- close greeting -->
			<div class="absolute right-0 lg:-top-4 top-0 z-20 p-2">
				<button class="bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center"
					onclick="greetings.style.display='none'"><i data-feather="x" class=""></i></button>
			</div>
		</div>
		<!-- image greetings -->
		<div class="hidden lg:block lg:absolute right-0 bottom-0 z-10">
			<img src="<?= base_url('assets/static/img/har-uaa.png'); ?>" alt="role" class=" w-auto h-48">
		</div>
	</section>
	<!-- card -->
	<section class="grid grid-cols-2 md:grid-cols-3 gap-4">
		<!-- card skor spm virified -->
		<div class="bg-[#fafafa] flex items-center col-span-1 text-gray-800 shadow-md rounded-3xl border border-gray-200 hover:shadow-lg transition-shadow duration-300 ease-in-out p-6 space-x-6">
			<div class="flex items-center justify-center bg-blue-100 text-blue-600 w-16 h-16 rounded-full shadow-sm">
				<i data-feather="award" class="w-10 h-10"></i>
			</div>
			<div>
				<em class="block text-sm text-gray-500">SPM Terverifikasi</em>
				<p class="text-4xl font-extrabold">
					<?= $countAcc ?>
					<span class="text-sm font-medium text-gray-600">Berkas</span>
				</p>
			</div>
		</div>
		<!-- card -->

		<!-- card skor spm unvirified -->
		<div class="flex bg-[#fafafa] items-center col-span-1 text-gray-800 shadow-md rounded-3xl border border-gray-200 hover:shadow-lg transition-shadow duration-300 ease-in-out p-6 space-x-6">
			<div class="flex items-center justify-center bg-red-100 text-red-600 w-16 h-16 rounded-full shadow-sm">
				<i data-feather="x-circle" class="w-10 h-10"></i>
			</div>
			<div>
				<em class="block text-sm text-gray-500">SPM Tidak Terverifikasi</em>
				<p class="text-4xl font-extrabold">
					<?= $countDecl ?>
					<span class="text-sm font-medium text-gray-600">Berkas</span>
				</p>
			</div>
		</div>
		<!-- card -->

		<!-- card skor spm unvirified -->
		<div class="bg-[#fafafa] col-span-2 md:col-span-1 flex items-center  text-gray-800 shadow-md rounded-3xl border border-gray-200 hover:shadow-lg transition-shadow duration-300 ease-in-out p-6 space-x-6">
			<div class="flex items-center justify-center bg-orange-100 text-orange-600 w-16 h-16 rounded-full shadow-sm">
				<i data-feather="alert-circle" class="w-10 h-10"></i>
			</div>
			<div>
				<em class="block text-sm text-gray-500">SPM Belum Direview</em>
				<p class="text-4xl font-extrabold">
					<?= $countPend ?>
					<span class="text-sm font-medium text-gray-600">Berkas</span>
				</p>
			</div>
		</div>
		<!-- card -->
	</section>

</section>
