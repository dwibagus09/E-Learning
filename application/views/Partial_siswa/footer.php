<footer class="footer-area section_gap">
		<div class="container">
			<div class="row footer-bottom d-flex justify-content-between">
				<p class="col-lg-8 col-sm-12 footer-text m-0 text-white">Copyright © 2018 All rights reserved | This template is
					made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#">Colorlib</a></p>
			</div>
		</div>
	</footer>
	<!--================ End footer Area  =================-->

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="<?php echo base_url('assets/siswa/js/jquery-3.2.1.min.js')?>"></script>
	<script src="<?php echo base_url('assets/siswa/js/popper.js')?>"></script>
	<script src="<?php echo base_url('assets/siswa/js/bootstrap.min.js')?>"></script>
	<script src="<?php echo base_url('assets/siswa/js/stellar.js')?>"></script>
	<script src="<?php echo base_url('assets/siswa/js/countdown.js')?>"></script>
	<script src="<?php echo base_url('assets/siswa/vendors/nice-select/js/jquery.nice-select.min.js')?>"></script>
	<script src="<?php echo base_url('assets/siswa/vendors/owl-carousel/owl.carousel.min.js')?>"></script>
	<script src="<?php echo base_url('assets/siswa/js/owl-carousel-thumb.min.js')?>"></script>
	<script src="<?php echo base_url('assets/siswa/js/jquery.ajaxchimp.min.js')?>"></script>
	<script src="<?php echo base_url('assets/siswa/vendors/counter-up/jquery.counterup.js')?>"></script>
	<script src="<?php echo base_url('assets/siswa/js/mail-script.js')?>"></script>
	<!--===============================================================================================-->	
	<script src="<?php echo base_url('assets/custom-table/vendor/jquery/jquery-3.2.1.min.js')?>"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/custom-table/vendor/bootstrap/js/popper.js')?>"></script>
	<script src="<?php echo base_url('assets/custom-table/vendor/bootstrap/js/bootstrap.min.js')?>"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/custom-table/vendor/select2/select2.min.js')?>"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/custom-table/vendor/perfect-scrollbar/perfect-scrollbar.min.js')?>"></script>
	<script>
		$('.js-pscroll').each(function(){
			var ps = new PerfectScrollbar(this);

			$(window).on('resize', function(){
				ps.update();
			})

			$(this).on('ps-x-reach-start', function(){
				$(this).parent().find('.table100-firstcol').removeClass('shadow-table100-firstcol');
			});

			$(this).on('ps-scroll-x', function(){
				$(this).parent().find('.table100-firstcol').addClass('shadow-table100-firstcol');
			});

		});

		
		
		
	</script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/custom-table/js/main.js')?>"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="<?php echo base_url('assets/siswa/js/gmaps.min.js')?>"></script>
	<script src="<?php echo base_url('assets/siswa/js/theme.js')?>"></script>