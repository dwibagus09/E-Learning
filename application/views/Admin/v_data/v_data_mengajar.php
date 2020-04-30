<div class="panel panel-default">
<div class="panel-heading">
   <h3 class="panel-title"><i class="fa fa-user"></i> Daftar Mengajar</h3>
</div>
			  
   <div class="panel-body">
              
			<table class="table table-bordered" width="100%" cellspacing="0">
             <thead>
			<tr>
				<th style="text-align:center;">Foto</th>
				<th style="text-align:center;">Nama Guru</th>
				<th style="text-align:center;">Mata Pelajaran</th>
				<th style="text-align:center;">Kelas</th>
				<th style="text-align:center;">Option</th>
				
			</tr>
			</thead>
			<tbody>
			
			<?php
			$no = 1;
			foreach ($list as $row): ?>
			<input type="hidden" value="<?php echo $row->id_mengajar ?>">
			<tr style="text-align:center;">
				<td width="25"><img src="<?=base_url('upload/guru/'.$row->foto)?>" style="width:50px; height:50px position:center;"></td>
				
				<td width="100">
				<?php echo $row->nama_guru ?>
				</td>
				<td width="100">
				<?php echo $row->nama ?>
				</td>
				<td width="50">
				<?php echo $row->nama_kelas ?>
				</td>
				<td width="100">
				<a href="<?php echo base_url().'page/edit_mengajar/'.$row->id_mengajar; ?>"><button class="btn btn-primary btn-icon-split" ><i class="fa fa-pencil"></i>&nbsp;Edit</button></a>
				<a href="<?php echo base_url().'page/hapus_mengajar/'.$row->id_mengajar; ?>"><button class="btn btn-danger btn-icon-split" ><i class="fa fa-trash"></i>&nbsp;Hapus</button></a>
				</td>
 			<?php endforeach; ?>
			
			</tr>
			</tbody>
            </table>
			  <a href="<?php echo base_url().'page/tambah_jumlah_mengajar'?>"><button class="btn btn-success btn-icon-split" ><i class="fa fa-plus"></i>&nbsp;Tambah</button></a>
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
            
            
        