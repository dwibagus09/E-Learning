<div class="panel panel-default">
<div class="panel-heading">
   <h3 class="panel-title"><i class="fa fa-user"></i> Daftar Guru</h3>
</div>
			  
   <div class="panel-body">
              
			<table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
			<tr style="text-align:center;">
				<th style="text-align:center;">No</th>
				<th style="text-align:center;">Nilai</th>
                <th style="text-align:center;">Id Tugas</th>
                <th style="text-align:center;">NIS</th>
				<th style="text-align:center;">Option</th>
			</tr>
			</thead>
			<tbody>
			<input type="hidden" value="<?php echo $this->session->userdata("ses_nama") ?>" name="username">
			<?php
            $no = 1;
			foreach ($nilai as $row): ?>

			<tr style="text-align:center;">
				<td width="50"><?php echo $no++ ?></td>
				
				<td width="150">
				<a href="<?php echo $row->nilai?>"></a> 
				</td>

                <td width="150">
				<a href="<?php echo $row->id_tugas?>"></a> 
				</td>

                <td width="150">
				<a href="<?php echo $row->nis?>"></a> 
				</td>

				<td width="150">
				<a href="<?php echo base_url().'page_guru/edit_materi/'.$row->id_hasil; ?>"><button class="btn btn-primary btn-icon-split" ><i class="fa fa-pencil"></i>&nbsp;Edit</button></a>|
				<a href="<?php echo base_url().'page_guru/hapus_materi/'.$row->id_hasil; ?>"><button class="btn btn-danger btn-icon-split" ><i class="fa fa-trash"></i>&nbsp;Hapus</button></a>
				</td>
 			<?php endforeach; ?>
			
			</tr>
			</tbody>
            </table>
			  <a href="<?php echo base_url().'page_guru/tambah/'.$this->session->userdata("ses_nama") ?>"><button class="btn btn-success btn-icon-split" ><i class="fa fa-plus"></i>&nbsp;Tambah</button></a>
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
            
        