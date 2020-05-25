<div class="panel panel-default">
<div class="panel-heading">
   <h3 class="panel-title"><i class="fa fa-user"></i> Daftar Ujian</h3>
</div>
			  
   <div class="panel-body">
              
			<table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
			<tr style="text-align:center;">
				<th style="text-align:center;">No</th>
				<th style="text-align:center;">Nama Ujian</th>
				<th style="text-align:center;">Kelas</th>
				<th style="text-align:center;">Tanggal</th>
				<th style="text-align:center;">Keterangan</th>
				<th style="text-align:center;">Option</th>
			</tr>
			</thead>
			<tbody>
			<input type="hidden" value="<?php echo $this->session->userdata("ses_nama") ?>" name="username">
			<?php
            $no = 1;
			foreach ($ujian as $row): ?>

			<tr style="text-align:center;">
				<td width="50"><?php echo $no++ ?></td>
				
				<td width="150">
				<?php echo $row->nama?> 
				</td>

                <td width="150">
				<?php echo $row->kelas."&nbsp;".$row->nama_kelas;?>
                </td>

				<td width="150">
				<?php echo $row->tgl_ujian;?>
                </td>

				<td width="150">
				<?php echo $row->keterangan?> 
				</td>
				

				<td width="150">
				<a href="<?php echo base_url().'Page_guru/edit_ujian/'.$row->id_ujian ?>"><button class="btn btn-primary btn-icon-split" ><i class="fa fa-pencil"></i>&nbsp;</button></a>|
				<a href="<?php echo base_url().'Page_guru/hapus_ujian/'.$row->id_ujian; ?>"><button class="btn btn-danger btn-icon-split" ><i class="fa fa-trash"></i>&nbsp;</button></a>
				</td>
 			<?php endforeach; ?>
			
			</tr>
			</tbody>
            </table>
			  <a href="<?php echo base_url().'Page_guru/tambah_ujian/'.$this->session->userdata("ses_nama") ?>"><button class="btn btn-success btn-icon-split" ><i class="fa fa-plus"></i>&nbsp;Tambah</button></a>
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
            
        