<div class="panel panel-default">
<div class="panel-heading">
   <h3 class="panel-title"><i class="fa fa-user"></i> Daftar Penugmpilan Tugas</h3>
</div>
			  
   <div class="panel-body">
              
			<table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
			<tr style="text-align:center;">
				<th style="text-align:center;">No</th>
				<th style="text-align:center;">Nama Tugas</th>
				<th style="text-align:center;">Option</th>
			</tr>
			</thead>
			<tbody>
			<input type="hidden" value="<?php echo $this->session->userdata("ses_nama") ?>" name="username">
			<?php
            $no = 1;
			foreach ($file as $row): ?>

			<tr>
				<td width="50"><?php echo $no++ ?></td>
				<td width="150">
				<a href="<?php echo base_url().'Page_guru/downloadTugas/'.$row->file_tugas ?>"><?php echo $row->file_tugas?></a> 
				</td>

				<td style="text-align:center;" width="150">
				<a href="<?php echo base_url().'Page_guru/hapus_file/'.$row->id_file; ?>"><button class="btn btn-danger btn-icon-split" ><i class="fa fa-trash"></i>&nbsp;Hapus</button></a>
				</td>
 			<?php endforeach; ?>
			
			</tr>
			</tbody>
            </table>
			  <!-- <a href="<?php echo base_url().'Page_guru/tambah/'.$this->session->userdata("ses_nama") ?>"><button class="btn btn-success btn-icon-split" ><i class="fa fa-plus"></i>&nbsp;Tambah</button></a> -->
		</div>
        <div class="text-center"> <a class="small" href="<?php echo base_url().'Page_guru/data_tugas/'.$this->session->userdata("ses_nama")?>"><button class="btn btn-primary btn-icon-split" ><i class="fa fa-book"></i>&nbsp;Kembali</button></a></div>
				<br>
                <?php
            if($this->input->get('delete')==1)
            {
				echo "<script>alert('Data Berhasil Dihapus!');
				</script>";
            }
            else if($this->input->get('delete')==2)
            {
                echo "<script>alert('Data Anda Gagal Dihapus !');
				</script>";
            }
			?>
				
</div>
            
        