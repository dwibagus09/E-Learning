<div class="panel panel-default">
<div class="panel-heading">
   <h3 class="panel-title"><i class="fa fa-user"></i> Daftar Nilai</h3>
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
				<a href="<?php echo $row->nilai?>"><?php echo $row->nilai?></a> 
				</td>

                <td width="150">
				<a href="<?php echo $row->id_tugas?>"><?php echo $row->id_tugas?></a> 
				</td>

                <td width="150">
				<a href="<?php echo $row->nis?>"><?php echo $row->nis?></a> 
				</td>

				<td width="150">
				<a href="<?php echo base_url().'Page_guru/cetak_nilai/'.$row->id_hasil; ?>"><button class="btn btn-primary btn-icon-split" ><i class="fa fa-pencil"></i>&nbsp;Cetak</button></a>|
				<a href="<?php echo base_url().'Page_guru/download/'.$row->id_hasil; ?>"><button class="btn btn-default btn-icon-split" ><i class="fa fa-download"></i>&nbsp;Download</button></a>
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
            
        