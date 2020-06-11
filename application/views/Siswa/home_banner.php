<section class="home_banner_area">
		<div class="banner_inner">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div class="banner_content">
							<h2>
								Selamat Datang <br>
								<?php echo $this->session->userdata("ses_nama") ?>
							</h2>
							<p>
								Berdoa dulu Sebelum Belajar<br>
								رَضِتُ بِااللهِ رَبَا وَبِالْاِسْلاَمِ دِيْنَا وَبِمُحَمَّدٍ نَبِيَا وَرَسُوْلاَ رَبِّ زِدْ نِيْ عِلْمًـاوَرْزُقْنِـيْ فَهْمًـا<br>
								Artinya :<br>
								“Kami ridho Allah Swt sebagai Tuhanku, Islam sebagai agamaku, dan Nabi Muhammad sebagai Nabi dan Rasul, Ya Allah, tambahkanlah kepadaku ilmu dan berikanlah aku pengertian yang baik”
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<!--================ Start Feature Area =================-->
	<section class="feature_area">
		<div class="container">
			<div class="row justify-content-end">
				<div class="col-lg-4">
					<div class="single_feature d-flex flex-row pb-30">
						<div class="icon">
							<span class="lnr lnr-book"></span>
						</div>
						<div class="desc">
							<a class="nav-link" href="<?php echo base_url('Page_Siswa/Data_Materi/'.$this->session->userdata("ses_nama"))?>"><h4>Materi</h4></a>
							<p>
								In the history of modern astronomy, there is probably no one greater leap forward building and launch.
							</p>
						</div>
					</div>
					<div class="single_feature d-flex flex-row pb-30">
						<div class="icon">
							<span class="fa fa-trophy"></span>
						</div>
						<div class="desc">
							<a class="nav-link" href="<?php echo base_url('Page_Siswa/Data_Tugas/'.$this->session->userdata("ses_nama"))?>"><h4>Tugas</h4></a>
							<p>
								In the history of modern astronomy, there is probably no one greater leap forward building and launch.
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================ End Feature Area =================-->