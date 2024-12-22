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
					<?= $SpmPoin['spm_poin'] ?>
					<span class="text-sm font-medium text-gray-600">Poin</span>
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
					<?= $declinedSpm['spm_poin'] ?>
					<span class="text-sm font-medium text-gray-600">Poin</span>
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
				<em class="block text-sm text-gray-500">Alma ata Etiquette</em>
				<p class="text-4xl font-extrabold">
					<?= $etiquettePoin['etiquette_poin'] ?>
					<span class="text-sm font-medium text-gray-600">Poin</span>
				</p>
			</div>
		</div>
		<!-- card -->
	</section>

	<section class="my-4">
		<div class="bg-[#fafafa] flex flex-col md:flex-row justify-between md:items-center  text-gray-800 shadow-md rounded-3xl border border-gray-200 hover:shadow-lg transition-shadow duration-300 ease-in-out p-6 space-x-6">
			<div class="w-full flex flex-col md:flex-row justify-between md:w-1/2 p-4 rounded-2xl text-gray-800">
				<div class="flex flex-col justify-between mx-auto gap-4 w-full md:w-2/3">
					<h2 class="text-lg font-semibold">SPM Overview</h2>
					<p class="text-xs text-gray-600">
						Overview laporan unggah SPM yang sudah diverifikasi.
					</p>

					<div class="flex flex-col justify-center gap-4">
						<?php foreach ($spmMhs as $row) : ?>
							<div class="flex flex-row items-center gap-2">
								<!-- Circle Icon -->
								<div id="circle-<?= $row['kategori']; ?>" class="bg-circle mr-1 rounded-full h-4 w-4 flex items-center justify-center"></div>

								<!-- Kategori -->
								<p class="text-base capitalize font-medium">
									Kategori: <?= $row['kategori']; ?> <span class="font-bold"><?= $row['total_poin']; ?> Poin</span>
								</p>
							</div>
						<?php endforeach; ?>
					</div>
				</div>

			</div>
			<!-- Polar chart -->
			<div class="w-full md:w-1/2 max-h-48 flex items-center justify-center">
				<div id="no-graph" class="text-red" style="display: none;">Tidak ada grafik</div>
				<canvas id="myChart" class="w-full h-full"></canvas>
			</div>

		</div>
	</section>

</section>
<script>
	function resetText() {
		const textElement = document.getElementById('download-text');
		textElement.textContent = 'Download SKPI';
		textElement.href = 'download-skpi.pdf';
		isSPM = false;
	}

	function toggleDownload() {
		const textElement = document.getElementById('download-text');
		const currentText = textElement.textContent;


		if (currentText === 'Download SKPI') {
			textElement.textContent = 'Download SPM';
			textElement.href = 'download-spm.pdf';
		} else {
			textElement.textContent = 'Download SKPI';
			textElement.href = 'download-skpi.pdf';
		}
	}

	function resetText() {
		const textElement = document.getElementById('download-text');
		textElement.textContent = 'Download SKPI';
	}
</script>
<script>
	const ctx = document.getElementById('myChart').getContext('2d');

	function getRandomColor() {
		let letters = '0123456789ABCDEF';
		let color = '#';
		for (let i = 0; i < 6; i++) {
			color += letters[Math.floor(Math.random() * 16)];
		}
		return color;
	}

	let labels = [];
	let data = [];
	let backgroundColors = [];
	let hoverBackgroundColors = [];
	let colorsMap = {}; // Untuk menyimpan warna untuk setiap kategori

	<?php foreach ($spmMhs as $row) : ?>
		var kategori = "<?= $row['subkategori'] ?>";
		var poin = <?= $row['total_poin'] ?>;

		// Generate a color for this category if not already generated
		if (!colorsMap[kategori]) {
			colorsMap[kategori] = getRandomColor();
		}

		var bgColor = colorsMap[kategori];
		var hoverColor = getRandomColor();

		labels.push(kategori);
		data.push(poin);
		backgroundColors.push(bgColor);
		hoverBackgroundColors.push(hoverColor);

		// Apply the color to the span element corresponding to the category
		var element = document.getElementById('circle-' + kategori);
		if (element) {
			element.style.backgroundColor = bgColor; // Use the color for this category
		}
	<?php endforeach; ?>

	// Check if there is any data to display
	if (labels.length === 0 || data.length === 0) {
		document.getElementById('no-graph').style.display = 'block';
		document.getElementById('myChart').style.display = 'none'; // Hide the canvas
	} else {
		var polarChart = new Chart(ctx, {
			type: 'polarArea',
			data: {
				labels: labels,
				datasets: [{
					label: labels,
					data: data,
					backgroundColor: backgroundColors,
					borderColor: 'rgba(0,0,0,0)', // Transparent border
					borderWidth: 0, // No border
					hoverBackgroundColor: hoverBackgroundColors
				}]
			},
			options: {
				responsive: true,
				maintainAspectRatio: true,
				scales: {
					r: {
						display: false,
					}
				},
				plugins: {
					legend: {
						display: false,
					},
					tooltip: {
						intersect: false,
						enabled: true
					}
				}
			}
		});
	}
</script>
