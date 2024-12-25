<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SKPI <?= $skpi['nim'] ?></title>
</head>

<body>
	<table class="font-tnr" style="width: 100%;">
		<thead class="header-print">
			<tr>
				<td class="content-print">
					<header style="display: flex; flex-direction: row; justify-content: space-between; align-items: center;">
						<img src="<?= base_url('assets/static/img/logouaa.png'); ?>" alt="Logo uaa" style="width: auto; height: 2rem; @media (min-width: 640px) { height: 3rem; } @media (min-width: 768px) { height: 5rem; }">
						<div style="display: flex; flex-direction: column; align-items: flex-end; color: #0B5E91;">
							<h1 style="font-weight: bold; text-align: end; font-size: 0.7rem; @media (min-width: 640px) { font-size: 0.8rem; } @media (min-width: 768px) { font-size: 1rem; }">
								Jl. Brawijaya No.99, Yogyakarta 55183
							</h1>
							<p style="margin-top: 0.25rem; text-align: end; font-size: 0.8rem; @media (min-width: 640px) { font-size: 0.875rem; } @media (min-width: 768px) { font-size: 1rem; }">
								Telp. (0274) 4342288 Fax. (0274) 4342269
							</p>
							<div style="display: flex; flex-direction: row; gap: 0.5rem; align-items: center; margin-top: 0.25rem; font-size: 0.6rem; text-align: end; @media (min-width: 768px) { font-size: 0.75rem; }">
								<div style="display: flex; flex-direction: row; align-items: center;">
									<i data-feather="globe" style="padding: 0.125rem; background-color: #0B5E91; color: white; width: 12px; height: 12px; border-radius: 0.5rem; @media (min-width: 640px) { width: 16px; height: 16px; } @media (min-width: 768px) { width: 20px; height: 20px; }"></i>
									<p style="margin-left: 0.25rem;">www.almaata.ac.id</p>
								</div>
								<div style="display: flex; flex-direction: row; align-items: center;">
									<i data-feather="mail" style="padding: 0.125rem; background-color: #0B5E91; color: white; width: 12px; height: 12px; border-radius: 0.5rem; @media (min-width: 640px) { width: 16px; height: 16px; } @media (min-width: 768px) { width: 20px; height: 20px; }"></i>
									<p style="margin-left: 0.25rem;">uaa@almaata.ac.id</p>
								</div>
							</div>
						</div>
					</header>
					<hr style="border-top: 2px solid #B0B0B0; margin: 0.5rem 0;">
				</td>
			</tr>
		</thead>

		<tbody>
			<tr>
				<td class="content-print">
					<main class="print-content" style="max-width: 100%; margin-left: auto; margin-right: auto; padding: 0.75rem; color: black;">
						<section>
							<h2 style="text-align: justify; font-size: 0.875rem; line-height: 1.25rem; font-weight: 600;">
								Surat Keterangan Pendamping Ijazah (SKPI) ini mengacu pada Kerangka Kualiﬁkasi Nasional Indonesia (KKNI), Peraturan Mentri Ristek Dikti RI Nomor 44 Tahun 2015 (Tentang SNPT), Konvensi UNESCO (tentang pengakuan studi, ijazah dan gelar pendidikan tinggi) dan SK Rektor Universitas Alma Ata Nomor 088/A/SK/UAA/IX/2016 (Tentang Capaian Pembelajaran). Tujuan dari SKPI ini adalah menjadi dokumen yang menyatakan kemampuan kerja, penguasaan pengetahuan, dan sikap/moral pemegangnya.
							</h2>
							<em style="text-align: justify; font-size: 0.875rem; line-height: 1.25rem;">
								This Diploma Supplement refers to the Indonesian Qualiﬁcation Framework and UNESCO Convention on the Recognition of Studies, Diplomas and Degrees in Higher Education. The purpose of the supplement is to provide a description of the nature, level, context and status of the studies that were pursued and successfully completed by the individual named on the original qualiﬁcation to which this supplement is appended.
							</em>
							<section>
								<ol type="1" style="list-style-position: inside; margin-top: 1.5rem; margin-bottom: 1.5rem;">
									<!-- INFORMASI TENTANG IDENTITAS DIRI PEMEGANG SKPI -->
									<div style="margin-top: 1.5rem; margin-bottom: 1.5rem;">
										<p style="font-size: 0.875rem; font-weight: 600; text-transform: uppercase;">01. INFORMASI TENTANG IDENTITAS DIRI PEMEGANG SKPI</p>
										<em style="font-size: 0.875rem; font-weight: 600; text-transform: uppercase;">01. Information Identifying The Holder of Diploma Supplement</em>
										<table style="width: 100%; margin-top: 0.5rem; font-size: 0.875rem; text-align: center;">
											<tr>
												<th style="border: 1px solid black; padding: 0.5rem;">NAMA LENGKAP <span><em>Full Name</em></span></th>
												<th style="border: 1px solid black; padding: 0.5rem;">TAHUN MASUK DAN LULUS <span><em>Year of Completion</em></span></th>
											</tr>
											<tr>
												<td style="padding: 0.5rem; border: 1px solid black; text-transform: capitalize;"><?= $skpi['nama']; ?></td>
												<td style="padding: 0.5rem; border: 1px solid black;"><?= $skpi['tahun_masuk']; ?><?= !empty($skpi['tahun_lulus']) ? ' - ' . $skpi['tahun_lulus'] : ''; ?> <br> <em><?= $skpi['tahun_masuk']; ?><?= $skpi['tahun_lulus']; ?></em></td>
											</tr>

											<tr>
												<th style="border: 1px solid black; padding: 0.5rem;">TEMPAT DAN TANGGAL LAHIR <span><em>Date and Place of Birth</em></span></th>
												<th style="border: 1px solid black; padding: 0.5rem;">NOMOR SERI IJAZAH <span><em>Diploma Serial Number</em></span></th>
											</tr>
											<tr>
												<td style="padding: 0.5rem; border: 1px solid black;"><?= $skpi['tempat_lahir']; ?> <?= (!empty($skpi['tempat_lahir'] && $skpi['tgl_lahir'])) ? $skpi['tempat_lahir'] . ', ' . $skpi['tgl_lahir'] : '' ?><br> <em><?= (!empty($skpi['tempat_lahir'] && $skpi['tgl_lahir'])) ? auto_translate($skpi['tempat_lahir']) . ', ' . auto_translate($skpi['tgl_lahir']) : ''; ?></em></td>
												<td style="padding: 0.5rem; border: 1px solid black;"><?= $skpi['nomor_ijazah']; ?> <br><em><?= $skpi['nomor_ijazah']; ?></em></td>
											</tr>

											<tr>
												<th style="border: 1px solid black; padding: 0.5rem;">NOMOR INDUK MAHASISWA <span><em>Student Identification Number</em></span></th>
												<th style="border: 1px solid black; padding: 0.5rem;">GELAR DAN SINGKATAN <span><em>Name of Qualification</em></span></th>
											</tr>
											<tr>
												<td style="padding: 0.5rem; border: 1px solid black;"><?= $skpi['nim']; ?><br><em><?= $skpi['nim']; ?></em></td>
												<td style="padding: 0.5rem; border: 1px solid black;"><?= $skpi['gelar']; ?> (<?= $skpi['singkatan_gelar']; ?>) <br><em><?= auto_translate($skpi['gelar']); ?> (<?= $skpi['singkatan_gelar']; ?>)</em></td>
											</tr>

										</table>
									</div>
							</section>
							<section>
								<!-- INFORMASI TENTANG IDENTITAS PENYELENGGARA PROGRAM -->
								<div style="margin-top: 1.5rem; margin-bottom: 1.5rem;">
									<p style="font-size: 0.875rem; font-weight: 600; text-transform: uppercase;">02. INFORMASI TENTANG IDENTITAS PENYELENGGARA PROGRAM</p>
									<em style="font-size: 0.875rem; font-weight: 600; text-transform: uppercase;">02. Information Identifying The Awarding Institution</em>
									<table style="width: 100%; margin-top: 0.5rem; font-size: 0.875rem; text-align: center; border-collapse: collapse;">
										<tr>
											<th style="border: 1px solid black; padding: 0.5rem;">SK PENDIRIAN PERGURUAN TINGGI <span><em>Awarding Institution’s License</em></span></th>
											<th style="border: 1px solid black; padding: 0.5rem;">PERSYARATAN PENERIMAAN <span><em>Entry Requirements</em></span></th>
										</tr>
										<tr>
											<td style="padding: 0.5rem; border: 1px solid black;">Nomor 155/KPT/I/2016 <br> 7033 Tahun 2016</td>
											<td style="padding: 0.5rem; border: 1px solid black;"><?= $skpi['syarat_penerimaan']; ?> <br><em><?= auto_translate($skpi['syarat_penerimaan']); ?></em></td>
										</tr>

										<tr>
											<th style="border: 1px solid black; padding: 0.5rem;">NAMA PERGURUAN TINGGI <span><em>Awarding Institution</em></span></th>
											<th style="border: 1px solid black; padding: 0.5rem;">BAHASA PENGANTAR KULIAH <span><em>Language of Instruction</em></span></th>
										</tr>
										<tr>
											<td style="padding: 0.5rem; border: 1px solid black;">Universitas Alma Ata (UAA) <br> <em>Alma Ata University</em></td>
											<td style="padding: 0.5rem; border: 1px solid black;">Bahasa Indonesia <br><em><?= auto_translate('Bahasa Indonesia'); ?> </em></td>
										</tr>

										<tr>
											<th style="border: 1px solid black; padding: 0.5rem;">FAKULTAS <span><em>Faculty</em></span></th>
											<th style="border: 1px solid black; padding: 0.5rem;">PROGRAM STUDI <span><em>Major</em></span></th>
										</tr>
										<tr>
											<td style="padding: 0.5rem; border: 1px solid black; text-transform: capitalize;"><?= $skpi['fakultas'] ?> <br><em><?= auto_translate($skpi['fakultas']); ?></em></td>
											<td style="padding: 0.5rem; border: 1px solid black; text-transform: capitalize;"><?= $skpi['prodi'] ?> <br><em><?= auto_translate($skpi['prodi']); ?></em></td>
										</tr>

										<tr>
											<th style="border: 1px solid black; padding: 0.5rem;">SISTEM PEMBELAJARAN <span><em>Learning System</em></span></th>
											<th style="border: 1px solid black; padding: 0.5rem;">SISTEM PENILAIAN <span><em>Grading System</em></span></th>
										</tr>
										<tr>
											<td style="padding: 0.5rem; border: 1px solid black; text-transform: capitalize;"><?= $skpi['sistem_pembelajaran'] ?> <br><em><?= auto_translate($skpi['sistem_pembelajaran']); ?></em></td>
											<td style="padding: 0.5rem; border: 1px solid black;">Skala 1-4; A=4, AB=3.5, B=3, BC=2.5, C=2, D=1 E=0<br><em>Scale1-4; A=4, AB=3.5, B=3, BC=2.5, C=2, D=1 E=0</em></td>
										</tr>

										<tr>
											<th style="border: 1px solid black; padding: 0.5rem;">JENIS & JENJANG PENDIDIKAN <span><em>Type & Level of Education</em></span></th>
											<th style="border: 1px solid black; padding: 0.5rem;">LAMA STUDI REGULER <span><em>Regular Length of Study</em></span></th>
										</tr>
										<tr>
											<td style="padding: 0.5rem; border: 1px solid black;"><?= $skpi['jenjang'] ?> <br><em><?= auto_translate($skpi['jenjang']); ?></em></td>
											<td style="padding: 0.5rem; border: 1px solid black;"><?= $skpi['semester'] ?> Semester<br><em><?= auto_translate($skpi['semester'] . 'Semester'); ?></em></td>
										</tr>

										<tr>
											<th style="border: 1px solid black; padding: 0.5rem;">JENJANG KUALIFIKASI SESUAI KKNI <span><em>Level of Qualification in the National Qualification Framework</em></span></th>
											<th style="border: 1px solid black; padding: 0.5rem;">JENIS DAN JENJANG PENDIDIKAN LANJUTAN <span><em>Access to Further Study</em></span></th>
										</tr>
										<tr>
											<td style="padding: 0.5rem; border: 1px solid black;"><?= (!empty($skpi['jenjang_kualifikasi'])) ? 'Jenjang ' . $skpi['jenjang_kualifikasi'] : '' ?> <br><em><?= (!empty($skpi['jenjang_kualifikasi'])) ? auto_translate('Jenjang' . $skpi['jenjang_kualifikasi']) : ''; ?></em></td>
											<td style="padding: 0.5rem; border: 1px solid black;"><?= $skpi['jenjang_lanjutan'] ?> <br><em><?= auto_translate($skpi['jenjang_lanjutan']); ?></em></td>
										</tr>
									</table>
								</div>
							</section>
							<section>
								<!-- INFORMASI TENTANG CAPAIAN PEMBELAJARAN -->
								<div style="margin-top: 1.5rem; margin-bottom: 1.5rem;">
									<p style="font-size: 0.875rem; font-weight: 600; text-transform: uppercase;">03. INFORMASI TENTANG CAPAIAN PEMBELAJARAN </p>
									<em style="font-size: 0.875rem; font-weight: 600; text-transform: uppercase;">03. Information Identifying the Learning Outcomes </em>

									<ol type="A" style="list-style-position: inside; margin-top: 1rem; margin-left: 1rem;">
										<!-- CAPAIAN PEMBELAJARAN -->
										<div style="margin-top: 1rem; text-align: justify;">
											<li style="font-weight: 600; font-size: 0.875rem;">CAPAIAN PEMBELAJARAN</li>
											<em style="font-weight: 600; font-size: 0.875rem;">LEARNING OUTCOMES</em>
											<ol type="1" style="list-style-position: outside; list-style-type: decimal; margin-top: 0.5rem; margin-left: 1rem; padding-left: 1.25rem; padding-right: 1.25rem; margin-bottom: 0.5rem;">
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
															echo '<div style="margin-top: 0.5rem;">';
															echo '<li style="font-weight: 600; font-size: 0.875rem; text-transform: uppercase;">';
															// Clean the category name by removing 'values' if it exists
															echo $row['kategori']; // Remove 'values' from category
															echo '<span><em> ' . auto_translate($row['kategori']) . '</em></span>';
															echo '</li>';

															// Start a new <ol> for the new category
															echo '<ol style="list-style-position: outside; list-style-type: lower-alpha; text-align: justify; font-size: 0.75rem; padding-left: 1.25rem; padding-right: 1.25rem; margin-left: 1rem; margin-top: 0.5rem; margin-bottom: 0.5rem; border: 1px solid black;">';
															$current_category = $row['kategori']; // Update the current category
														}

														// Output each item within the same <ol> for the same category
														echo '<li>';
														echo '<div style="display: flex; flex-direction: row; text-align: justify; white-space: nowrap;">';
														echo ucfirst($row['konten']) . '.';
														echo '<span style="margin-left: 0.25rem;"><em>' . auto_translate(ucfirst($row['konten'])) . '.</em></span>';
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
										<div style="margin-top: 1rem; padding-right: 1rem;">
											<li style="font-weight: 600; font-size: 0.875rem;">PRESTASI DAN KEGIATAN</li>
											<em style="font-weight: 600; font-size: 0.875rem;">ACTIVITIES ACHIEVEMENTS AND AWARDS</em>
											<h3 style="font-weight: 600; font-size: 0.875rem; margin-left: 1rem; margin-right: 1rem;">Pemegang SKPI ini memiliki prestasi dan telah mengikuti program</h3>
											<em style="font-weight: 600; font-size: 0.875rem; margin-left: 1rem; margin-right: 1rem;">The holder of this supplement has the following professional certiﬁcations:</em>
											<table style="width: 100%; padding: 0.5rem; margin: 0.5rem; text-align: justify; font-size: 0.875rem; margin-left: 1rem; margin-right: 1rem;">
												<tbody>
													<?php
													$no = 1;

													// Cek apakah $spm kosong
													if (empty($spm)) {
													?>
														<tr>
															<td style="text-align: center; border: 1px solid black; padding: 1rem; font-size: 0.875rem; color: #6b7280;">
																N/A.
															</td>
														</tr>
														<?php
													} else {
														foreach ($spm as $row) { ?>
															<tr>
																<td style="border: 1px solid black; font-size: 0.75rem; padding: 1rem; white-space: normal;">
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
																			' on ' . auto_translate(tanggal($row['tanggal_mulai'])) .
																			(!empty($row['tanggal_selesai']) ? ' until ' . auto_translate(tanggal($row['tanggal_selesai'])) : '') .
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
								<div style="margin: 1.5rem 0;">
									<div style="font-size: 0.875rem; font-weight: 600; text-transform: uppercase;">04. INFORMASI TENTANG SISTEM PENDIDIKAN TINGGI DI INDONESIA</div>
									<em style="font-size: 0.875rem; font-weight: 600; text-transform: uppercase;">04. Information on the Indonesian Higher Education System and the Indonesian National Qualifications Framework</em>
									<div style="border: 1px solid black; margin: 1rem 0; padding: 0.5rem; font-weight: 600; font-size: 0.875rem; text-align: justify;">
										<h3>SISTEM PENDIDIKAN TINGGI DI INDONESIA <span><em>HIGHER EDUCATION SYSTEM IN INDONESIA</em></span></h3>
										<div>
											Pendidikan Tinggi adalah jenjang pendidikan setelah pendidikan menengah yang mencakup program diploma, program sarjana, program magister, program doktor, program profesi, program spesialis yang diselenggarakan oleh perguruan tinggi berdasarkan kebudayaan bangsa Indonesia. <br>
											Universitas merupakan Perguruan Tinggi yang menyelenggarakan pendidikan akademik dan dapat menyelenggarakan pendidikan vokasi dalam berbagai rumpun Ilmu Pengetahuan dan/atau Teknologi dan jika memenuhi syarat, universitas dapat menyelenggarakan pendidikan profesi. <br>
											Akademi merupakan Perguruan Tinggi yang menyelenggarakan pendidikan vokasi dalam satu atau beberapa cabang Ilmu Pengetahuan dan/atau Teknologi tertentu. <br> <br>
											<em style="font-weight: normal;">
												Higher education are the education level after secondary education who include programs of diploma, bachelor, magister, doctoral, professional program, specialist program which holds by the college based on national culture Indonesia. <br>
												University is higher education institutions which run academic education and can hold vocational education in various thicket science and / or technology and if qualified, can hold university professional education. <br>
												The academy is higher education institutions which run vocational education in one or more branches science and / or technology particular.
											</em> <br><br>

											Proses Pembelajaran <br>
											Standar proses pembelajaran merupakan kriteria minimal tentang pelaksanaan pembelajaran pada program studi untuk memperoleh capaian pembelajaran lulusan yang mencakup karakteristik proses pembelajaran, perencanaan proses pembelajaran, pelaksanaan proses pembelajaran dan beban belajar mahasiswa. <br>
											Proses pembelajaran melalui kegiatan kurikuler wajib menggunakan metode pembelajaran yang efektif sesuai dengan karakteristik mata kuliah untuk mencapai kemampuan tertentu yang ditetapkan dalam matakuliah dalam rangkaian pemenuhan capaian pembelajaran lulusan. <br> <br>
											<em style="font-weight: normal;">
												Learning process <br>
												The standard process of learning is a minimal criteria on the implementation of the learning on the major to obtain these learning outcome which included the characteristics of learning process, planning, implementation and study load of the students. <br>
												Learning through the activities of curriculum are obliged to use a method of learning effective in accordance with courses characteristic to reach the certain ability in the courses in the series of the fulfillment of these learning graduates.
											</em> <br><br>
											Beban Belajar dan Lama Studi <br>
											Beban belajar mahasiswa dinyatakan dalam besaran sks (satuan kredit semester). <br>
											Dengan sistem ini, mahasiswa dimungkinkan untuk memilih sendiri mata kuliah yang akan ia ambil dalam satu semester. Sks digunakan sebagai ukuran: <br>
											<ol style="list-style-type: lower-alpha; padding-left: 1rem;">
												<li>Besarnya beban studi mahasiswa.</li>
												<li>Besarnya pengakuan atas keberhasilan usaha belajar mahasiswa.</li>
												<li>Besarnya usaha belajar yang diperlukan mahasiswa untuk menyelesaikan suatu program, baik program semesteran maupun program lengkap.</li>
												<li>Besarnya usaha penyelenggaraan pendidikan bagi tenaga pengajar. Nilai 1 sks untuk menyelesaikan suatu program, baik program semesteran maupun program lengkap.</li>
												<li>Besarnya usaha penyelenggaraan pendidikan bagi tenaga pengajar.</li>
											</ol> <br><br>
											<em style="font-weight: normal;">
												Study load and long study <br>
												Study load students expressed in SCU (Semester Credit Unit). With this system, students possible to choose its own lecture that will he took each semester. unit semester credit.used as a measure: <br>
												<ol style="list-style-type: lower-alpha; padding-left: 1rem;">
													<li>The magnitude of the burden of study of a student.</li>
													<li>The size of the recognition of the success of business learn students.</li>
													<li>Much work learn necessary college students to completed a course , both programs biannual or programs complete.</li>
													<li>Much work the implementation of education for power pengajar.nilai 1(one) unit semester credit to completed a course, both programs biannual or programs complete.</li>
													<li>Much work the implementation of education for teachers.</li>
												</ol>
											</em>
											<br> <br>
											1 (satu) sks untuk kegiatan kuliah setara dengan beban studi tiap minggu selama satu semester:
											<ol style="list-style-type: lower-alpha; padding-left: 1rem;">
												<li>1 (satu) sks teori : 100 menit pertemuan/minggu disertai dengan 70 menit kegiatan mandiri.</li>
												<li>1 (satu) sks praktikum: 170 menit pertemuan/minggu.</li>
												<li>1 (satu) sks klinik: 170 menit pertemuan/minggu.</li>
											</ol>
											<br>
											Seorang mahasiswa dapat dinyatakan lulus apabila telah menyelesaikan jumlah sks tertentu. Untuk menyelesaikan Pendidikan Diploma III seorang mahasiswa diwajibkan untuk menyelesaikan beban studi sekurang-kurangnya 108 sks dan maksimal 120 sks dapat ditempuh dalam waktu 6 semester dan selama-lamanya 10 semester. <br><br>
											<em style="font-weight: normal;">
												1 (one) SCU for a course is comparable to the load of study per week during one semester: <br>
												<ol style="list-style-type: lower-alpha; padding-left: 1rem;">
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
								<div style="margin-top: 1.5rem; margin-bottom: 1.5rem;">
									<div style="font-size: 0.875rem; font-weight: 600; text-transform: uppercase;">05. INFORMASI TENTANG KERANGKA KUALIFIKASI NASIONAL INDONESIA (KKNI)</div>
									<em style="font-size: 0.875rem; font-weight: 600; text-transform: uppercase;">05. Information of Indonesian Qualification Framework</em>
									<div style="border: 1px solid black; margin-top: 1rem; margin-bottom: 1rem; padding: 0.5rem; font-weight: 600; font-size: 0.875rem; text-align: justify;">
										<div>
											Kerangka Kualiﬁkasi Nasional Indonesia (KKNI) adalah kerangka penjenjangan kualiﬁkasi dan kompetensi tenaga kerja Indonesia yang menyandingkan, menyetarakan, dan mengintegrasikan sektor pendidikan dengan sektor pelatihan dan pengalaman kerja dalam suatu skema pengakuan kemampuan kerja yang disesuaikan dengan struktur di berbagai sektor pekerjaan. KKNI merupakan perwujudan mutu dan jati diri Bangsa Indonesia terkait dengan sistem pendidikan nasional, sistem pelatihan kerja nasional serta sistem penilaian kesetaraan capaian pembelajaran (learning outcomes) nasional, yang dimiliki Indonesia untuk menghasilkan sumberdaya manusia yang bermutu dan produktif. KKNI merupakan sistem yang berdiri sendiri dan merupakan jembatan antara sektor pendidikan dan pelatihan untuk membentuk SDM nasional berkualitas dan bersertiﬁkat melalui skema pendidikan formal, non formal, informal, pelatihan kerja atau pengalaman kerja. Jenjang kualiﬁkasi adalah tingkat capaian pembelajaran yang disepakati secara nasional, disusun berdasarkan ukuran hasil pendidikan dan/atau pelatihan yang diperoleh melalui pendidikan formal, nonformal, informal, atau pengalaman kerja.
											<br><br>
											<em style="font-weight: normal;">
												Indonesian National Qualification Scheme (KKNI) is a leveling scheme for qualification and competence of Indonesian manpower putting up closer, equalizing, and integrating the educational sector to the training sector and the work experience within a scheme of work competence regognition adjusted to the structures in various employment sectors. KKNI in the materialization of quality and selft-identity of the Indonesian people related to the national education system, national employment training system as well as the assessment system for equality in national learning outcomes owned by Indonesia in order to produce the qualified and productive human resources. KKNI is a stand-alone system and bridges between the educational sector and the training sector in order to develop and set up the qualified national human resources getting the certificates through formal, non-formal, informal educations, work training or work experiences. Qualification level, a nationally legalized learning outcomes, is composed by the results of education and training activities (formal, nonformal) or working experiences.
											</em>
										</div>
									</div>
								</div>
							</section>
							<section>
								<!-- PENGESAHAN SKPI -->
								<div style="margin-top: 1.5rem; margin-bottom: 1.5rem; border: 1px solid black;">
									<div style="font-size: 0.875rem; font-weight: 600; text-transform: uppercase; margin-left: 0.75rem; margin-top: 0.75rem;">06. PENGESAHAN SKPI</div>
									<em style="font-size: 0.875rem; font-weight: 600; text-transform: uppercase; margin-left: 0.75rem;">06. SKPI Legalization</em>
									<div style="font-size: 0.875rem; text-align: justify; display: grid; grid-template-columns: repeat(2, 1fr);">

										<!-- Signature & Stamp -->
										<div style="grid-column: span 2; text-align: center; margin-top: 0.5rem; margin-bottom: 0.5rem;">
											<div style="position: relative; display: inline-block;">
												<p>Yogyakarta, <?= tanggal(date('Y-m-d')); ?></p>
												<em><?= auto_translate('Yogyakarta,' . tanggal(date('Y-m-d'))); ?></em>
												<p style="text-transform: capitalize;">Dekan Fakultas <?= $skpi['fakultas'] ?></p>
												<em style="text-transform: capitalize;">Dekan Fakultas <?= auto_translate($skpi['fakultas']) ?></em>
												<br><br><br><br><br><br>
												<p style="text-transform: capitalize; font-weight: bold;"><?= $skpi['nama_dekan']; ?></p>
												<p style="text-transform: capitalize; font-size: 0.75rem;">Nomor Induk Pegawai/<span><em>Employee ID Number:</em></span> <?= $skpi['id_staff']; ?></p>
											</div>
										</div>

										<!-- Official Notes -->
										<div style="border-top: 1px solid black; border-right: 1px solid black; padding: 0.5rem; font-size: 0.75rem;">
											Catatan resmi
											<ul style="list-style-type: disc; list-style-position: inside;">
												<li>SKPI dikeluarkan oleh institusi pendidikan tinggi yang berwenang mengeluarkan ijazah sesuai dengan peraturan perundang-undangan yang berlaku.</li>
												<li>SKPI hanya diterbitkan setelah mahasiswa dinyatakan lulus dari suatu program studi secara resmi oleh Perguruan Tinggi.</li>
												<li>SKPI diterbitkan dalam Bahasa Indonesia dan Bahasa Inggris.</li>
												<li>SKPI yang asli diterbitkan menggunakan kertas khusus (barcode/hologram security paper) berlogo Perguruan Tinggi, yang diterbitkan secara khusus oleh Perguruan Tinggi.</li>
												<li>Penerima SKPI dicantumkan dalam situs resmi Perguruan Tinggi.</li>
											</ul>
										</div>

										<!-- Address -->
										<div style="border-top: 1px solid black; padding: 0.5rem; font-size: 0.75rem;">
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
		<tfoot class="footer-print">
			<tr>
				<td class="content-print font-footer-pdf">
					<footer class="print-footerfont-footer-pdf" style="background-color: #fcd34d; padding: 0.5rem; ">
						<p style=" text-align: center; letter-spacing: 0.1em; font-weight: 600; color: white;">
							The University that never ends with its innovation
						</p>
					</footer>
				</td>
			</tr>
		</tfoot>
	</table>
</body>

</html>
