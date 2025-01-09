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

	<div class="mb-4 inline-flex justify-between p-4 rounded-2xl bg-[#fafafa]">
		<a class="text-blue-600 font-bold inline-flex justify-between items-center gap-2" href="<?= site_url(ucwords($role) . '/Skpi_Mahasiswa'); ?>">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left">
				<path d="M205 34.8c11.5 5.1 19 16.6 19 29.2l0 64 112 0c97.2 0 176 78.8 176 176c0 113.3-81.5 163.9-100.2 174.1c-2.5 1.4-5.3 1.9-8.1 1.9c-10.9 0-19.7-8.9-19.7-19.7c0-7.5 4.3-14.4 9.8-19.5c9.4-8.8 22.2-26.4 22.2-56.7c0-53-43-96-96-96l-96 0 0 64c0 12.6-7.4 24.1-19 29.2s-25 3-34.4-5.4l-160-144C3.9 225.7 0 217.1 0 208s3.9-17.7 10.6-23.8l160-144c9.4-8.5 22.9-10.6 34.4-5.4z" />
			</svg>
			Kembali
		</a>
		<div class="inline-flex justify-between gap-2">
			<!-- <button type="button" id="pdf" aria-label="Print Dokumen"
				class="flex border gap-1 text-blue-600 items-center space-x-2 bg-blue-100 hover:bg-blue-200 p-2 rounded-lg transition duration-200">
				<i data-feather="file-text" class="w-5 h-5"></i>
				<p class="font-semibold hidden md:block">PDF</p>
			</button> -->
			<!-- Print Button with Tooltip -->
			<button type="button" id="print" aria-label="Print Dokumen"
				class="flex border gap-1 text-red-600 items-center space-x-2 bg-red-100 hover:bg-red-200 p-2 rounded-lg transition duration-200">
				<i data-feather="printer" class="w-5 h-5"></i>
				<p class="font-semibold hidden md:block">Print</p>
			</button>
		</div>
	</div>

	<div class="bg-[#fafafa] p-4 rounded-2xl">
		<table class="w-full font-tnr" id="content">
			<thead class="header-print">
				<tr>
					<td class="content-print">
						<header class="flex flex-row justify-between items-center">
							<img src="<?= base_url('assets/static/img/logouaa.png'); ?>" alt="Logo uaa" class="w-auto h-[2rem] sm:h-[3rem] md:h-20">
							<div class="flex flex-col items-end text-[#0B5E91]">
								<h1 class="font-bold text-end text-[0.7rem] sm:text-[0.8rem] md:text-sm">Jl. Brawijaya No.99, Yogyakarta 55183</h1>
								<p class="mt-1 text-end text-[0.8rem] sm:text-sm md:text-base">Telp. (0274) 4342288 Fax. (0274) 4342269</p>
								<div class="flex flex-row gap-2 items-center mt-1 text-[0.6rem] md:text-xs text-end">
									<div class="flex flex-row items-center">
										<i data-feather="globe" class="p-0.5 md:p-1 bg-[#0B5E91] text-white w-[12px] h-[12px] sm:w-[16px] sm:h-[16px] md:w-[20px] md:h-[20px] rounded-lg"></i>
										<p class="ml-1">www.almaata.ac.id</p>
									</div>
									<div class="flex flex-row items-center">
										<i data-feather="mail" class="p-0.5 md:p-1 bg-[#0B5E91] text-white w-[12px] h-[12px] sm:w-[16px] sm:h-[16px] md:w-[20px] md:h-[20px] rounded-lg"></i>
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
					<td id="content-print" class="content-print">
						<main class="container mx-auto p-3 lg:p-6 text-black print-content">
							<section>

								<h2 class="text-justify text-sm font-semibold">
									Surat Keterangan Pendamping Ijazah (SKPI) ini mengacu pada Kerangka Kualiﬁkasi Nasional Indonesia (KKNI), Peraturan Mentri Ristek Dikti RI Nomor 44 Tahun 2015 (Tentang SNPT), Konvensi UNESCO (tentang pengakuan studi, ijazah dan gelar pendidikan tinggi) dan SK Rektor Universitas Alma Ata Nomor 088/A/SK/UAA/IX/2016 (Tentang Capaian Pembelajaran). Tujuan dari SKPI ini adalah menjadi dokumen yang menyatakan kemampuan kerja, penguasaan pengetahuan, dan sikap/moral pemegangnya.
								</h2>
								<em class="text-justify text-sm">
									This Diploma Supplement refers to the Indonesian Qualiﬁcation Framework and UNESCO Convention on the Recognition of Studies, Diplomas and Degrees in Higher Education. The purpose of the supplement is to provide a description of the nature, level, context and status of the studies that were pursued and successfully completed by the individual named on the original qualiﬁcation to which this supplement is appended.
								</em>
								<section>
									<ol type="1" class="list-inside my-6">
										<!-- INFORMASI TENTANG IDENTITAS DIRI PEMEGANG SKPI -->
										<div class="my-6">
											<p class="text-sm font-semibold uppercase">01. INFORMASI TENTANG IDENTITAS DIRI PEMEGANG SKPI</p>
											<em class="text-sm font-semibold uppercase">01. Information Identifying The Holder of Diploma Supplement</em>
											<table class="w-full mt-2 text-sm text-center">
												<tr>
													<th class="border border-black">NAMA LENGKAP <span><em>Full Name</em></span></th>
													<th class="border border-black">TAHUN MASUK DAN LULUS <span><em>Year of Completion</em></span></th>
												</tr>
												<tr>
													<td class="p-2 border border-black capitalize"><?= $skpi['nama']; ?></td>
													<td class="p-2 border border-black"><?= $skpi['tahun_masuk']; ?><?= !empty($skpi['tahun_lulus']) ? ' - ' . $skpi['tahun_lulus'] : ''; ?> <br> <em><?= $skpi['tahun_masuk']; ?><?= $skpi['tahun_lulus']; ?></em></td>
												</tr>

												<tr>
													<th class="border border-black">TEMPAT DAN TANGGAL LAHIR <span><em>Date and Place of Birth</em></span></th>
													<th class="border border-black">NOMOR SERI IJAZAH <span><em>Diploma Serial Number</em></span></th>
												</tr>
												<tr>
													<td class="p-2 border border-black"><?= $skpi['tempat_lahir']; ?> <?= (!empty($skpi['tempat_lahir'] && $skpi['tgl_lahir'])) ? $skpi['tempat_lahir'] . ', ' . $skpi['tgl_lahir'] : '' ?><br> <em><?= (!empty($skpi['tempat_lahir'] && $skpi['tgl_lahir'])) ? auto_translate($skpi['tempat_lahir']) . ', ' . auto_translate($skpi['tgl_lahir']) : ''; ?></em></td>
													<td class="p-2 border border-black"><?= $skpi['nomor_ijazah']; ?> <br><em><?= $skpi['nomor_ijazah']; ?></em></td>
												</tr>

												<tr>
													<th class="border border-black">NOMOR INDUK MAHASISWA <span><em>Student Identification Number</em></span></th>
													<th class="border border-black">GELAR DAN SINGKATAN <span><em>Name of Qualification</em></span></th>
												</tr>
												<tr>
													<td class="p-2 border border-black"><?= $skpi['nim']; ?><br><em><?= $skpi['nim']; ?></em></td>
													<td class="p-2 border border-black"><?= $skpi['gelar']; ?> (<?= $skpi['singkatan_gelar']; ?>) <br><em><?= auto_translate($skpi['gelar']); ?> (<?= $skpi['singkatan_gelar']; ?>)</em></td>
												</tr>

											</table>
										</div>
								</section>
								<section>
									<!-- INFORMASI TENTANG IDENTITAS PENYELENGGARA PROGRAM -->
									<div class="my-6">
										<p class="text-sm font-semibold uppercase">02. INFORMASI TENTANG IDENTITAS PENYELENGGARA PROGRAM</p>
										<em class="text-sm font-semibold uppercase">02. Information Identifying The Awarding Institution</em>
										<table class="w-full mt-2 text-sm text-center">
											<tr>
												<th class="border border-black">SK PENDIRIAN PERGURUAN TINGGI <span><em>Awarding Institution’s License</em></span></th>
												<th class="border border-black">PERSYARATAN PENERIMAAN <span><em>Entry Requirements</em></span></th>
											</tr>
											<tr>
												<td class="p-2 border border-black">Nomor 155/KPT/I/2016 <br> 7033 Tahun 2016
												</td>
												<td class="p-2 border border-black"><?= $skpi['syarat_penerimaan']; ?> <br><em><?= auto_translate($skpi['syarat_penerimaan']); ?></em></td>
											</tr>

											<tr>
												<th class="border border-black">NAMA PERGURUAN TINGGI <span><em>Awarding Institution</em></span></th>
												<th class="border border-black">BAHASA PENGANTAR KULIAH <span><em>Language of Instruction</em></span></th>
											</tr>
											<tr>
												<td class="p-2 border border-black">Universitas Alma Ata (UAA) <br> <em>Alma Ata University</em></td>
												<td class="p-2 border border-black">Bahasa Indonesia <br><em><?= auto_translate('Bahasa Indonesia'); ?> </em></td>
											</tr>

											<tr>
												<th class="border border-black">FAKULTAS <span><em>Faculty</em></span></th>
												<th class="border border-black">PROGRAM STUDI <span><em>Major</em></span></th>
											</tr>
											<tr>
												<td class="p-2 border border-black capitalize"><?= $skpi['fakultas'] ?> <br><em><?= auto_translate($skpi['fakultas']); ?></em></td>
												<td class="p-2 border border-black capitalize"><?= $skpi['prodi'] ?> <br><em><?= auto_translate($skpi['prodi']); ?></em></td>
											</tr>

											<tr>
												<th class="border border-black">SISTEM PEMBELAJARAN <span><em>Learning System</em></span></th>
												<th class="border border-black">SISTEM PENILAIAN <span><em>Grading System</em></span></th>
											</tr>
											<tr>
												<td class="p-2 border border-black capitalize"><?= $skpi['sistem_pembelajaran'] ?> <br><em><?= auto_translate($skpi['sistem_pembelajaran']); ?></em></td>
												<td class="p-2 border border-black">Skala 1-4; A=4, AB=3.5, B=3, BC=2.5, C=2, D=1 E=0<br><em>Scale1-4; A=4, AB=3.5, B=3, BC=2.5, C=2, D=1 E=0</em>
												</td>
											</tr>
											<tr>
												<th class="border border-black">JENIS & JENJANG PENDIDIKAN <span><em>Type & Level of Education</em></span></th>
												<th class="border border-black">LAMA STUDI REGULER <span><em>Regular Length of Study</em></span></th>
											</tr>
											<tr>
												<td class="p-2 border border-black"><?= $skpi['jenjang'] ?> <br><em><?= auto_translate($skpi['jenjang']); ?></em></td>
												<td class="p-2 border border-black"><?= $skpi['semester'] ?> Semester<br><em><?= auto_translate($skpi['semester'] . 'Semester'); ?></em></td>
											</tr>

											<tr>
												<th class="border border-black">JENJANG KUALIFIKASI SESUAI KKNI <span><em>Level of Qualification in the National Qualification Framework</em></span></th>
												<th class="border border-black">JENIS DAN JENJANG PENDIDIKAN LANJUTAN <span><em>Access to Further Study</em></span></th>
											</tr>
											<tr>
												<td class="p-2 border border-black"><?= (!empty($skpi['jenjang_kualifikasi'])) ? 'Jenjang ' . $skpi['jenjang_kualifikasi'] : '' ?> <br><em><?= (!empty($skpi['jenjang_kualifikasi'])) ? auto_translate('Jenjang' . $skpi['jenjang_kualifikasi']) : ''; ?></em></td>
												<td class="p-2 border border-black"><?= $skpi['jenjang_lanjutan'] ?> <br><em><?= auto_translate($skpi['jenjang_lanjutan']); ?></em></td>
											</tr>

										</table>
									</div>
								</section>
								<section>
									<!-- INFORMASI TENTANG CAPAIAN PEMBELAJARAN  -->
									<div class="my-6">
										<p class="text-sm font-semibold uppercase">03. INFORMASI TENTANG CAPAIAN PEMBELAJARAN </p>
										<em class="text-sm font-semibold uppercase">03. Information Identifying the Learning Outcomes </em>

										<ol type="A" class="list-inside list-upper-alpha my-4 ml-4">
											<!-- CAPAIAN PEMBELAJARAN -->
											<div class="my-4 text-justify">
												<li class="font-semibold text-sm">CAPAIAN PEMBELAJARAN</li>
												<em class="font-semibold text-sm">LEARNING OUTCOMES</em>
												<ol type="1" class="list-outside list-decimal my-2 ml-4">
													<?php
													$no = 1;
													$id_kategori = [];
													$current_category = '';


													foreach ($kategori_cpl as $row) {
														$id_kategori[] = $row['id_kategori_cpl'];
													}

													foreach ($cpl as $row) {
														if (in_array($row['id_kategori_cpl'], $id_kategori) && $row['id_prodi'] == $skpi['id_prodi']) {

															if ($current_category !== $row['kategori']) {

																if ($current_category !== '') {
																	echo '</ol>';
																}

																// Start a new <div> and category for the new category
																echo '<div class="my-2">';
																echo '<li class="font-semibold text-sm uppercase">';
																// Clean the category name by removing 'values' if it exists
																echo $row['kategori']; // Remove 'values' from category
																echo '<span><em> ' . auto_translate($row['kategori']) . '</em></span>';
																echo '</li>';

																// Start a new <ol> for the new category
																echo '<ol class="list-lower-alpha list-outside text-xs lg:text-sm border border-black text-justify pl-5 py-2 pr-2 ml-2 my-2">';
																$current_category = $row['kategori']; // Update the current category
															}

															// Output each item within the same <ol> for the same category
															echo '<li>';
															echo '<div class="flex flex-row text-justify whitespace-nowrap">';
															echo ucfirst($row['konten']) . '.';
															echo '<span class="ml-1"><em>' . auto_translate(ucfirst($row['konten'])) . '.</em></span>';
															echo '</div>';
															echo '</li>';

															$no++;
														}
													}

													// Close the last <ol> after the loop
													if ($current_category !== '') {
														echo '</ol>';
														echo '</div>'; // Close the last <div> for the last category
													}
													?>
												</ol>
											</div>

											<!-- PRESTASI DAN KEGIATAN -->
											<div class="my-4 pr-4">
												<li class="font-semibold text-sm">PRESTASI DAN KEGIATAN</li>
												<em class="font-semibold text-sm">ACTIVITIES ACHIEVEMENTS AND AWARDS</em>
												<h3 class="font-semibold text-sm mx-4">Pemegang SKPI ini memiliki prestasi dan telah mengikuti program</h3>
												<em class="font-semibold text-sm mx-4">The holder of this supplement has the following professional certiﬁcations:</em>
												<table class="w-full p-2 m-2 text-justify text-sm mx-4">
													<tbody>
														<?php
														$no = 1;

														// Cek apakah $spm kosong
														if (empty($spm)) {
														?>
															<tr>
																<td class="text-center border border-black px-6 py-3 text-sm text-gray-500">
																	N/A.
																</td>
															</tr>
															<?php
														} else {
															foreach ($spm as $row) {
															?>
																<tr>
																	<td class="border border-black text-xs lg:text-sm whitespace-normal p-4">
																		<?=
																		$no . '. ' .
																			ucwords($row['kategori']) . ' "' .
																			$row['kegiatan'] . '" ' .
																			" yang diselenggarakan oleh " .
																			ucwords($row['penyelenggara']) .
																			" pada tanggal " .
																			tanggal($row['tanggal_mulai']) .
																			(!empty($row['tanggal_selesai']) ? ' sampai ' . tanggal($row['tanggal_selesai']) : '') .
																			(!empty($row['tempat_kegiatan']) ? ' di ' . ucwords($row['tempat_kegiatan']) : '') .
																			"."
																		?>

																		<em>
																			<?= ucwords(auto_translate($row['kategori'])) .
																				' "' . auto_translate($row['kegiatan']) . '" ' .
																				' was held by ' . auto_translate(ucwords($row['penyelenggara'])) .
																				' on ' . auto_translate(tanggal($row['tanggal_mulai'])) . (!empty($row['tanggal_selesai']) ? ' until ' . auto_translate(tanggal($row['tanggal_selesai'])) : '') .
																				(!empty($row['tempat_kegiatan']) ? ' at ' . auto_translate(ucwords($row['tempat_kegiatan'])) : '') . '.'  ?>
																		</em>
																	</td>

																</tr>
														<?php
																$no++;
															}
														}
														?>
													</tbody>
												</table>
											</div>
										</ol>
									</div>
								</section>
								<section>
									<!-- INFORMASI TENTANG SISTEM PENDIDIKAN TINGGI DI INDONESIA -->
									<div class="my-6">
										<div class="text-sm font-semibold uppercase">04. INFORMASI TENTANG SISTEM PENDIDIKAN TINGGI DI INDONESIA</div>
										<em class="text-sm font-semibold uppercase">04. Information on the Indonesian Higher Education System and the Indonesian National Qualifications Framework</em>
										<div class="border border-black my-4 p-2 font-semibold text-sm text-justify">
											<h3 class="">SISTEM PENDIDIKAN TINGGI DI INDONESIA <span><em>HIGHER EDUCATION SYSTEM IN INDONESIA</em></span></h3>
											<div>
												Pendidikan Tinggi adalah jenjang pendidikan setelah pendidikan menengah yang mencakup program diploma, program sarjana, program magister, program doktor, program profesi, program spesialis yang diselenggarakan oleh perguruan tinggi berdasarkan kebudayaan bangsa Indonesia. <br>
												Universitas merupakan Perguruan Tinggi yang menyelenggarakan pendidikan akademik dan dapat menyelenggarakan pendidikan vokasi dalam berbagai rumpun Ilmu Pengetahuan dan/atau Teknologi dan jika memenuhi syarat, universitas dapat menyelenggarakan pendidikan profesi. <br>
												Akademi merupakan Perguruan Tinggi yang menyelenggarakan pendidikan vokasi dalam satu atau beberapa cabang Ilmu Pengetahuan dan/atau Teknologi tertentu. <br> <br>
												<em class="font-normal">
													Higher education are the education level after secondary education who include programs of diploma, bachelor, magister, doctoral, professional program, specialist program which holds by the college based on national culture Indonesia. <br>
													University is higher education institutions which run academic education and can hold vocational education in various thicket science and / or technology and if qualified, can hold university professional education. <br>
													The academy is higher education institutions which run vocational education in one or more branches science and / or technology particular.
												</em> <br><br>

												Proses Pembelajaran <br>
												Standar proses pembelajaran merupakan kriteria minimal tentang pelaksanaan pembelajaran pada program studi untuk memperoleh capaian pembelajaran lulusan yang mencakup karakteristik proses pembelajaran, perencanaan proses pembelajaran, pelaksanaan proses pembelajaran dan beban belajar mahasiswa. <br>
												Proses pembelajaran melalui kegiatan kurikuler wajib menggunakan metode pembelajaran yang efektif sesuai dengan karakteristik mata kuliah untuk mencapai kemampuan tertentu yang ditetapkan dalam matakuliah dalam rangkaian pemenuhan capaian pembelajaran lulusan. <br> <br>
												<em class="font-normal">
													Learning process <br>
													The standard process of learning is a minimal criteria on the implementation of the learning on the major to obtain these learning outcome which included the characteristics of learning process, planning, implementation and study load of the students. <br>
													Learning through the activities of curriculum are obliged to use a method of learning effective in accordance with courses characteristic to reach the certain ability in the courses in the series of the fulfillment of these learning graduates.
												</em> <br><br>
												Beban Belajar dan Lama Studi <br>
												Beban belajar mahasiswa dinyatakan dalam besaran sks (satuan kredit semester). <br>
												Dengan sistem ini, mahasiswa dimungkinkan untuk memilih sendiri mata kuliah yang akan ia ambil dalam satu semester. Sks digunakan sebagai ukuran: <br>
												<ol class="list-inside list-lower-alpha">
													<li>Besarnya beban studi mahasiswa.</li>
													<li>Besarnya pengakuan atas keberhasilan usaha belajar mahasiswa.</li>
													<li>Besarnya usaha belajar yang diperlukan mahasiswa untuk menyelesaikan suatu program, baik program semesteran maupun program lengkap.</li>
													<li>Besarnya usaha penyelenggaraan pendidikan bagi tenaga pengajar. Nilai 1 sks untuk menyelesaikan suatu program, baik program semesteran maupun program lengkap.</li>
													<li>Besarnya usaha penyelenggaraan pendidikan bagi tenaga pengajar.</li>
												</ol> <br><br>
												<em class="font-normal">
													Study load and long study <br>
													Study load students expressed in SCU (Semester Credit Unit). With this system, students possible to choose its own lecture that will he took each semester. unit semester credit.used as a measure: <br>
													<ol class="list-inside list-lower-alpha">
														<li>The magnitude of the burden of study of a student.</li>
														<li>The size of the recognition of the success of business learn students.</li>
														<li>Much work learn necessary college students to completed a course , both programs biannual or programs complete.</li>
														<li>Much work the implementation of education for power pengajar.nilai 1(one) unit semester credit to completed a course, both programs biannual or programs complete.</li>
														<li>Much work the implementation of education for teachers.</li>
													</ol>
												</em>
												<br> <br>
												1 (satu) sks untuk kegiatan kuliah setara dengan beban studi tiap minggu selama satu semester:
												<ol class="list-inside list-lower-alpha">
													<li>1 (satu) sks teori : 100 menit pertemuan/minggu disertai dengan 70 menit kegiatan mandiri.</li>
													<li>1 (satu) sks praktikum: 170 menit pertemuan/minggu.</li>
													<li>1 (satu) sks klinik: 170 menit pertemuan/minggu.</li>
												</ol>
												<br>
												Seorang mahasiswa dapat dinyatakan lulus apabila telah menyelesaikan jumlah sks tertentu. Untuk menyelesaikan Pendidikan Diploma III seorang mahasiswa diwajibkan untuk menyelesaikan beban studi sekurang-kurangnya 108 sks dan maksimal 120 sks dapat ditempuh dalam waktu 6 semester dan selama-lamanya 10 semester. <br><br>
												<em class="font-normal">
													1 (one) SCU for a course is comparable to the load of study per week during one semester: <br>
													<ol class="list-inside list-lower-alpha">
														<li>1 (one) SCU for theory: 100 minutes of meetings / week along with 70 minutes of independent tasks.</li>
														<li>1 (one) SCU for practicum: 170 minutes of meetings / week.</li>
														<li>1 (one) SCU for clinic: 170 minutes of meetings / week.</li>
													</ol>
													A student graduates from a level of education only if he or she passes certain number of SCUs. To graduate from a Diploma III, a student has to pass a minimum of 108 (one hundred eighty) and maximal of 120 (one hundred and twenty) SCU can be completed in a minimum of 6 (six) semesters and a maximum of 10 (ten) semesters.
												</em>
											</div>
										</div>
									</div>
								</section>
								<section>
									<!-- INFORMASI TENTANG KERANGKA KUALIFIKASI NASIONAL INDONESIA (KKNI) -->
									<div class="my-6">
										<div class="text-sm font-semibold uppercase">05. INFORMASI TENTANG KERANGKA KUALIFIKASI NASIONAL INDONESIA (KKNI)</div>
										<em class="text-sm font-semibold uppercase">05. Information of Indonesian Qualification Framework</em>
										<div class="border border-black my-4 p-2 font-semibold text-sm text-justify">
											<div>
												Kerangka Kualiﬁkasi Nasional Indonesia (KKNI) adalah kerangka penjenjangan kualiﬁkasi dan kompetensi tenaga kerja Indonesia yang menyandingkan, menyetarakan, dan mengintegrasikan sektor pendidikan dengan sektor pelatihan dan pengalaman kerja dalam suatu skema pengakuan kemampuan kerja yang disesuaikan dengan struktur di berbagai sektor pekerjaan. KKNI merupakan perwujudan mutu dan jati diri Bangsa Indonesia terkait dengan sistem pendidikan nasional, sistem pelatihan kerja nasional serta sistem penilaian kesetaraan capaian pembelajaran (learning outcomes) nasional, yang dimiliki Indonesia untuk menghasilkan sumberdaya manusia yang bermutu dan produktif. KKNI merupakan sistem yang berdiri sendiri dan merupakan jembatan antara sektor pendidikan dan pelatihan untuk membentuk SDM nasional berkualitas dan bersertiﬁkat melalui skema pendidikan formal, non formal, informal, pelatihan kerja atau pengalaman kerja. Jenjang kualiﬁkasi adalah tingkat capaian pembelajaran yang disepakati secara nasional, disusun berdasarkan ukuran hasil pendidikan dan/atau pelatihan yang diperoleh melalui pendidikan formal, nonformal, informal, atau pengalaman kerja.
												<br><br>
												<em class="font-normal">
													Indonesian National Qualification Scheme (KKNI) is a leveling scheme for qualification and competence of Indonesian manpower putting up closer, equalizing, and integrating the educational sector to the training sector and the work experience within a scheme of work competence regognition adjusted to the structures in various employment sectors. KKNI in the materialization of quality and selft-identity of the Indonesian people related to the national education system, national employment training system as well as the assessment system for equality in national learning outcomes owned by Indonesia in order to produce the qualified and productive human resources. KKNI is a stand-alone system and bridges between the educational sector and the training sector in order to develop and set up the qualified national human resources getting the certificates throughformal, non-formal, informal educations,work training or work experiences. Qualification level, a nationally legalized learning outcomes, is composed by the results of education and training activities (formal, nonformal) or working experiences.
												</em>
											</div>
										</div>
									</div>
								</section>
								<section>
									<!-- PENGESAHAN SKPI -->
									<div class="my-6 border border-black">
										<div class="text-sm font-semibold uppercase mx-3 mt-3">06. PENGESAHAN SKPI</div>
										<em class="text-sm font-semibold uppercase mx-3">06. SKPI Legalization</em>
										<div class="text-sm text-justify grid grid-cols-2">

											<!-- Signature & Stamp -->
											<div class="col-span-2 text-center my-2">
												<div class="relative inline-block">
													<p>Yogyakarta, <?= tanggal(date('Y-m-d')); ?></p>
													<em><?= auto_translate('Yogyakarta,' . tanggal(date('Y-m-d'))); ?></em>
													<p class="capitalize">Dekan Fakultas <?= $skpi['fakultas'] ?></p>
													<em class="capitalize">Dekan Fakultas <?= auto_translate($skpi['fakultas']) ?></em>
													<br><br><br><br><br><br>
													<p class="capitalize font-bold"><?= $skpi['nama_dekan']; ?></p>
													<p class="capitalize text-xs">Nomor Induk Pegawai/<span><em>Employee ID Number:</em></span> <?= $skpi['id_staff']; ?></p>
												</div>
											</div>

											<!-- Official Notes -->
											<div class="border-t border-r border-black p-2 text-xs">
												Catatan resmi
												<ul class="list-inside list-disc">
													<li>
														SKPI dikeluarkan oleh institusi pendidikan tinggi yang berwenang mengeluarkan ijazah sesuai dengan peraturan perundang-undangan yang berlaku.
													</li>
													<li>
														SKPI hanya diterbitkan setelah mahasiswa dinyatakan lulus dari suatu program studi secara resmi oleh Perguruan Tinggi.
													</li>
													<li>
														SKPI diterbitkan dalam Bahasa Indonesia dan Bahasa Inggris.
													</li>
													<li>
														SKPI yang asli diterbitkan menggunakan kertas khusus (barcode/hologram security paper) berlogo Perguruan Tinggi, yang diterbitkan secara khusus oleh Perguruan Tinggi.
													</li>
													<li>
														Penerima SKPI dicantumkan dalam situs resmi Perguruan Tinggi.
													</li>
												</ul>
											</div>

											<!-- Address -->
											<div class="border-t border-black p-2 text-xs">
												Alamat
												<br><br><br>
												UNIVERSITAS ALMA ATA <br>
												Jl. Brawijaya No 99, Tamantirto DI Yogyakarta <br>
												Tel: (+62 274) 434 22 88 <br>
												Fax: (+62 274) 434 22 69 <br>
												Website: www.almaata.ac.id
											</div>
										</div>
									</div>
								</section>
								</ol>
							</section>
						</main>
					</td>
				</tr>
			</tbody>
			<tfoot class="footer-print font-footer-pdf">
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

	</div>

</section>
<script>
	//export pdf
	$('#pdf').on('click', function() {
		const content = document.getElementById('content-print');

		html2pdf()
			.from(content)
			.set({
				margin: 0.27,
				filename: `skpi_<?= $skpi['nim'] ?>.pdf`,
				html2canvas: {
					scale: 3,
					useCORS: true,
				},
				jsPDF: {
					unit: 'in',
					format: 'legal',
					orientation: 'portrait',
				},
			})
			.save();

	});

	// Print
	$(document).on('click', '#print', function() {
		const elementToPrint = $('#content-print').prop('outerHTML');
		// Buat popup baru untuk mencetak
		const popupWindow = window.open('', '_blank', 'width=800,height=600');
		popupWindow.document.open();
		popupWindow.document.write(`
        <!DOCTYPE html>
        <html>
        <head>
            <title>SKPI-<?= $skpi['nim'] ?></title>
            <script src="https://cdn.tailwindcss.com"><\/script>
            <link rel="stylesheet" href="${window.location.origin}/assets/vendor/css/app.css">
        </head>
        <body>
            ${elementToPrint}
        </body>
        </html>
    	`);
		popupWindow.document.close();
		popupWindow.onload = function() {
			// Panggil fungsi cetak
			popupWindow.print();
			// Tutup popup setelah cetak selesai
			popupWindow.onafterprint = function() {
				popupWindow.close();
			};
		};
	});
</script>
