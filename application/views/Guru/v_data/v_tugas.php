<div class="panel panel-default">
<div class="panel-heading">
   <h3 class="panel-title"><i class="fa fa-user"></i> Daftar Tugas</h3>
</div>
			  
   <div class="panel-body">
              
			<table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
			<tr style="text-align:center;">
				<th style="text-align:center;">No</th>
				<th style="text-align:center;">Kode Tugas</th>
				<th style="text-align:center;">Deskripsi</th>
				<th style="text-align:center;">Waktu Mulai</th>
				<th style="text-align:center;">Waktu Selesai</th>
				<th style="text-align:center;">Option</th>
			</tr>
			</thead>
			<tbody>
			<input type="hidden" value="<?php echo $this->session->userdata("ses_nama") ?>" name="username">
			<?php
            $no = 1;
			foreach ($tugas as $row): ?>

			<tr style="text-align:center">
				<td width="50"><?php echo $no++ ?></td>
				
				<td width="150">
				<?php echo $row->kd_tugas?>
				</td>

				<td width="150">
				<?php echo $row->deskripsi?> 
				</td>

				<td width="150">
				<?php echo $row->waktu_mulai?> 
				</td>

				<td width="150">
				<?php echo $row->waktu_selesai?> 
				</td>

				<td width="150">
				<a href="<?php echo base_url().'Page_guru/edit_tugas/'.$row->id_tugas; ?>"><button class="btn btn-primary btn-icon-split" ><i class="fa fa-pencil"></i>&nbsp;Edit</button></a>|
				<a href="<?php echo base_url().'Page_guru/hapus_tugas/'.$row->id_tugas; ?>"><button class="btn btn-danger btn-icon-split" ><i class="fa fa-trash"></i>&nbsp;Hapus</button></a>
				</td>
 			<?php endforeach; ?>
			
			</tr>
			</tbody>
            </table>
			  <a href="<?php echo base_url().'Page_guru/tambah_tugas/'.$this->session->userdata("ses_nama") ?>"><button class="btn btn-success btn-icon-split" ><i class="fa fa-plus"></i>&nbsp;Tambah</button></a>
			  <a href="<?php echo base_url().'Page_guru/lihat_file_tugas/'.$this->session->userdata("ses_nama") ?>"><button class="btn btn-primary btn-icon-split" ><i class="fa fa-eye"></i>&nbsp;Pengumpulan</button></a>
			</div>
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
            
        