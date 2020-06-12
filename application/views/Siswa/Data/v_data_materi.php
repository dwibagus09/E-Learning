<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				
                    <div class="panel panel-default">
<div class="panel-heading">
   <h3 class="panel-title"><i class="fa fa-user"></i> Daftar Materi</h3>
</div>
			  
   <div class="panel-body" style="color:black;">
              
			<table class="table table-bordered" width="100%" cellspacing="0" style="color:black;">
            <thead>
			<tr style="text-align:center;">
				<th style="text-align:center;">No</th>
				<th style="text-align:center;">Nama Materi</th>
			</tr>
			</thead>
			<tbody>
			<input type="hidden" value="<?php echo $this->session->userdata("ses_nama") ?>" name="username">
			<?php
            $no = 1;
			foreach ($materi as $row): ?>

			<tr>
				<td width="50"><?php echo $no++ ?></td>
				<td width="150">
				<a href="<?php echo base_url().'Page_siswa/download/'.$row->file_materi ?>"><?php echo $row->nama_materi?></a> 
				</td>

				
 			<?php endforeach; ?>
			
			</tr>
			</tbody>
            </table>
	</div>
				<?php
            if($this->input->get('delete')==1)
            {
                echo "Data Anda Berhasil Dihapus !";
            }
            else if($this->input->get('delete')==2)
            {
                echo "Data Anda Gagal Dihapus !";
            }
			?>
				
</div>
						</div>
				
			</div>
		</div>
	</div>