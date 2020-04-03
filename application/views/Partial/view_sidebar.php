
  <?php if($this->session->userdata('akses')=='1'):?>
   <a href="#" class="list-group-item active" style="text-align: center;background-color: black;border-color: black">
                ADMINISTRATOR
              </a>		 
              <a href="<?php echo base_url().'index.php/page'?>" class="list-group-item"><i class="fa fa-dashboard"></i> Dashboard</a>
	  <li class="nav-item dropdown list-group-item">
				<a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class="fa fa-folder"></i>
				<span class="menu-sidebar">Master Data</span>
				</a>
			  <div class="dropdown-menu" aria-labelledby="pagesDropdown">
					<h6 class="dropdown-header">Menu :</h6>
					<a href="data_jurusan" class="list-group-item"><i class="fa fa-folder"></i> Data Jurusan</a>
					<a href="Page/Data_Kelas" class="list-group-item"><i class="fa fa-folder"></i> Data Kelas</a>
			 </div>
      </li>  
	  
	  
	  
              <a href="data_guru" class="list-group-item"><i class="fa fa-folder"></i> Manajemen Guru</a>
			  <a href="data_siswa" class="list-group-item"><i class="fa fa-folder"></i> Manajemen Siswa</a>
              <a href="data_login" class="list-group-item"><i class="fa fa-folder"></i> Manajemen User</a>
           
			
 <?php elseif($this->session->userdata('akses')=='2'):?>
  <a href="#" class="list-group-item active" style="text-align: center;background-color: black;border-color: black">
                MENU GURU
              </a>
              <a href=href="<?php echo base_url().'index'?> class="list-group-item"><i class="fa fa-dashboard"></i> Dashboard</a>
              <a href="#" class="list-group-item"><i class="fa fa-folder"></i> Unggah Tugas</a>
              <a href="#" class="list-group-item"><i class="fa fa-folder"></i> Daftar Nilai</a>
			  
  <?php else:?>
   <a href="#" class="list-group-item active" style="text-align: center;background-color: black;border-color: black">
                MENU SISWA
              </a>
              <a href="<?php echo base_url().'index.php/page'?>" class="list-group-item"><i class="fa fa-dashboard"></i> Dashboard</a>
              <a href="<?php echo base_url().'index.php/page/data_siswa'?>" class="list-group-item"><i class="fa fa-folder"></i> Master Data</a>
              <a href="#" class="list-group-item"><i class="fa fa-folder"></i> Pengerjaan Tugas</a>
              <a href="#" class="list-group-item"><i class="fa fa-folder"></i> Lihat Hasil Ujian</a>
	 <?php endif;?>
	 