<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
		  <a class="navbar-brand"><img src="<?php echo base_url('assets/images/logo.png')?>" height="40px" width="40px" style="float:left; margin-right:15px; margin-top:-10px;">SMK AS - SIDDIQY</a>
		
        </div>
        <div id="navbar" class="navbar-collapse collapse">
        <div class="navbar-form navbar-right">
               
        <li class="nav-item dropdown no-arrow">
		<a class="nav-link dropdown-list" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	<?php if($this->session->userdata('akses')=='1'):?>
		<span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin </span>
		<img class="img-circle" height="40px" width="40px"  src="<?php echo base_url('assets/images/logo.png')?>">
	<?php elseif($this->session->userdata('akses')=='2'):?>
		<span class="mr-2 d-none d-lg-inline text-gray-600 small">Guru</span>
		<img class="img-circle" height="40px" width="40px" src="<?php echo base_url('assets/images/logo.png')?>">
	<?php endif;?>
		</a>
		<!-- Dropdown - User Information -->
	
	</li>
		</div>		 
		</div>  
</nav>