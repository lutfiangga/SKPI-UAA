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

</section>
