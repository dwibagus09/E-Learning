<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				
                    <div class="panel panel-default">
<div class="panel-heading">
   <h3 class="panel-title"><i class="fa fa-user"></i> Daftar Tugas</h3>
</div>
			  
   <div class="panel-body" style="color:black;">
              
			<table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
			<tr style="text-align:center;">
				<th style="text-align:center;">No</th>
				<th style="text-align:center;">Nama Tugas</th>
				<th style="text-align:center;">Held</th>
				<th style="text-align:center;">Deadline</th>
				<th style="text-align:center;">Option</th>
				<th style="text-align:center;">Notifikasi Pengumpulan</th>
			</tr>
			</thead>
			<tbody>
			<input type="hidden" value="<?php echo $this->session->userdata("ses_nama") ?>" name="username">
			<?php
            $no = 1;
			foreach ($tugas as $row): ?>

			<tr>
				<td width="50"><?php echo $no++ ?></td>
				<td width="150">
				<?php echo $row->deskripsi;?>
				</td>
				<td width="50"><?php echo $row->waktu_mulai; ?></td>
				<td width="50"><?php echo $row->waktu_selesai; ?></td>
				<td style="text-align:center;" width="150">
				<a href="<?php echo base_url().'Page_siswa/Submit_Tugas/'.$this->session->userdata("ses_nama") ?>"><button class="btn btn-primary btn-icon-split" ><i class="fa fa-plus"></i>&nbsp;Submit</button></a>
				</td>
				 <td width="50">
				Telah Mengumpulkan !
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