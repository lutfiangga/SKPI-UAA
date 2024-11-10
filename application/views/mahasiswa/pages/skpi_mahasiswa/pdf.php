<table class="w-full times-new-roman">
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
			<td class="content-print">
				<main class="container mx-auto p-3 md:p-6 text-black print-content">
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
											<td class="p-2 border border-black"><?= $skpi['tahun_masuk']; ?><?= $skpi['tahun_lulus']; ?> <br> <em><?= $skpi['tahun_masuk']; ?><?= $skpi['tahun_lulus']; ?></em></td>
										</tr>

										<tr>
											<th class="border border-black">TEMPAT DAN TANGGAL LAHIR <span><em>Date and Place of Birth</em></span></th>
											<th class="border border-black">NOMOR SERI IJAZAH <span><em>Diploma Serial Number</em></span></th>
										</tr>
										<tr>
											<td class="p-2 border border-black"><?= $skpi['tempat_lahir']; ?>, <?= $skpi['tgl_lahir']; ?><br> <em><?= auto_translate($skpi['tempat_lahir']); ?>, <?= auto_translate($skpi['tgl_lahir']); ?></em></td>
											<td class="p-2 border border-black"><?= $skpi['nomor_ijazah']; ?></td>
										</tr>

										<tr>
											<th class="border border-black">NOMOR INDUK MAHASISWA <span><em>Student Identification Number</em></span></th>
											<th class="border border-black">GELAR DAN SINGKATAN <span><em>Name of Qualification</em></span></th>
										</tr>
										<tr>
											<td class="p-2 border border-black"><?= $skpi['nim']; ?></td>
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
										<td class="p-2 border border-black">Jenjang <?= $skpi['jenjang_kualifikasi'] ?> <br><em><?= auto_translate('Jenjang' . $skpi['jenjang_kualifikasi']); ?></em></td>
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
										<ol type="1" class="list-inside list-decimal my-2 ml-4">
											<!-- CAPAIAN PEMBELAJARAN BIDANG SIKAP DAN TATA NILAI -->
											<div class="my-2">
												<li class="font-semibold text-sm">CAPAIAN PEMBELAJARAN BIDANG SIKAP DAN TATA NILAI <span><em>ATTITUDE LEARNING OUTCOMES</em></span></li>
												<ol class="list-lower-alpha list-outside text-xs lg:text-sm border border-black text-justify pl-5 py-2 pr-2 ml-2 my-2">
													<?php
													$no = 1;
													// Cek apakah $cpl kosong
													if (empty($cpl)) { ?>
														<p class="text-center">
															N/A.
														</p>
														<?php
													} else {
														foreach ($cpl as $row) {
															if ($row['kategori'] == 'Capaian Pembelajaran Bidang Sikap dan Tata Nilai' && $row['id_prodi'] == $skpi['id_prodi']) {
														?>
																<li>
																	<div class="flex flex-row text-justify whitespace-nowrap">
																		<?= $row['konten'] ?>.<span class="ml-1"><em><?= auto_translate($row['konten']) ?></em>.</span>
																	</div>
																</li>
													<?php
																$no++;
															}
														}
													}
													?>
												</ol>
											</div>

											<!-- CAPAIAN PEMBELAJARAN BIDANG KETERAMPILAN UMUM -->
											<div class="my-2">
												<li class="font-semibold text-sm">CAPAIAN PEMBELAJARAN BIDANG KETERAMPILAN UMUM <span><em>GENERAL SKILLS LEARNING OUTCOMES</em></span></li>
												<ol class="list-lower-alpha list-outside text-xs lg:text-sm border border-black text-justify pl-5 py-2 pr-2 ml-2 my-2">
													<?php
													$no = 1;
													// Cek apakah $cpl kosong
													if (empty($cpl)) { ?>
														<p class="text-center">
															N/A.
														</p>
														<?php
													} else {
														foreach ($cpl as $row) {
															if ($row['kategori'] == 'Capaian Pembelajaran Bidang Keterampilan Umum' && $row['id_prodi'] == $skpi['id_prodi']) {
														?>
																<li>
																	<div class="flex flex-row text-justify whitespace-nowrap">
																		<?= $row['konten'] ?>.<span class="ml-1"><em><?= auto_translate($row['konten']) ?></em>.</span>
																	</div>
																</li>
													<?php
																$no++;
															}
														}
													}
													?>
												</ol>
											</div>

											<!-- CAPAIAN PEMBELAJARAN BIDANG PENGETAHUAN  -->
											<div class="my-2">
												<li class="font-semibold text-sm">CAPAIAN PEMBELAJARAN BIDANG PENGETAHUAN <span><em>KNOWLEDGE LEARNING OUTCOMES</em></span></li>
												<ol class="list-lower-alpha list-outside text-xs lg:text-sm border border-black text-justify pl-5 py-2 pr-2 ml-2 my-2">
													<?php
													$no = 1;
													// Cek apakah $cpl kosong
													if (empty($cpl)) { ?>
														<p class="text-center">
															N/A.
														</p>
														<?php
													} else {
														foreach ($cpl as $row) {
															if ($row['kategori'] == 'Capaian Pembelajaran Bidang Pengetahuan' && $row['id_prodi'] == $skpi['id_prodi']) {
														?>
																<li>
																	<div class="flex flex-row text-justify whitespace-nowrap">
																		<?= $row['konten'] ?>.<span class="ml-1"><em><?= auto_translate($row['konten']) ?></em>.</span>
																	</div>
																</li>
													<?php
																$no++;
															}
														}
													}
													?>
												</ol>

											</div>

											<!-- CAPAIAN PEMBELAJARAN BIDANG KETERAMPILAN KHUSUS  -->
											<div class="my-2">
												<li class="font-semibold text-sm">CAPAIAN PEMBELAJARAN BIDANG KETERAMPILAN KHUSUS <span><em>SPECIAL SKILLS LEARNING OUTCOMES</em></span></li>
												<ol class="list-lower-alpha list-outside text-xs lg:text-sm border border-black text-justify pl-5 py-2 pr-2 ml-2 my-2">
													<?php
													$no = 1;
													// Cek apakah $cpl kosong
													if (empty($cpl)) { ?>
														<p class="text-center">
															N/A.
														</p>
														<?php
													} else {
														foreach ($cpl as $row) {
															if ($row['kategori'] == 'Capaian Pembelajaran Bidang Keterampilan Khusus' && $row['id_prodi'] == $skpi['id_prodi']) {
														?>
																<li>
																	<div class="flex flex-row text-justify whitespace-nowrap">
																		<?= $row['konten'] ?>.<span class="ml-1"><em><?= auto_translate($row['konten']) ?></em>.</span>
																	</div>
																</li>
													<?php
																$no++;
															}
														}
													}
													?>
												</ol>
											</div>
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
														if ($row['nim'] == $this->session->userdata('id_user')) {
													?>
															<tr>
																<td class="border border-black text-xs lg:text-sm whitespace-normal p-4">
																	<?= $no; ?>. <?= $row['kategori'] ?> "<?= $row['kegiatan'] ?>" yang diselenggarakan <?= $row['penyelenggara'] ?> pada tanggal <?= tanggal($row['tanggal_mulai']) ?>
																	<?= !empty($row['tanggal_selesai']) ? 'sampai ' . tanggal($row['tanggal_selesai']) : '' ?>
																	<?= !empty($row['tempat_kegiatan']) ? 'di ' . tanggal($row['tempat_kegiatan']) : '' ?>. <em><span class="capitalize"> <?= auto_translate($row['kategori']) ?> </span>"<?= auto_translate($row['kegiatan']) ?>" was held by<?= auto_translate($row['penyelenggara']) ?> on <?= auto_translate(tanggal($row['tanggal_mulai'])) ?>
																		<?= !empty($row['tanggal_selesai']) ? 'until ' . auto_translate(tanggal($row['tanggal_selesai'])) : '' ?>
																		<?= !empty($row['tempat_kegiatan']) ? 'at ' . auto_translate(tanggal($row['tempat_kegiatan'])) : '' ?>. </em>
																</td>

															</tr>
												<?php
															$no++;
														}
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
	<tfoot class="footer-print great-vibes">
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
