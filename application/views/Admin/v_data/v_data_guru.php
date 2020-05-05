<div class="panel panel-default">
<div class="panel-heading">
   <h3 class="panel-title"><i class="fa fa-user"></i> Daftar Guru</h3>
</div>
			  
   <div class="panel-body">
              
			<table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
			<tr style="text-align:center;">
				<th style="text-align:center;">No</th>
				<th style="text-align:center;">NIY</th>
				<th style="text-align:center;">Nama</th>
				<th style="text-align:center;">Foto</th>
				<th style="text-align:center;">Option</th>
			</tr>
			</thead>
			<tbody>
			
			<?php
			$no = 1;
			foreach ($list as $row): ?>
			<input type="hidden" value="<?php echo $row->id ?>">
			<tr style="text-align:center;">
				<td width="50"><?php echo $no++ ?></td>
				
				<td width="150">
				<?php echo $row->nip ?>
				</td>
				<td width="150">
				<?php echo $row->nama_guru ?>
				</td>
				<td width="150">
				<img src="<?=base_url('upload/guru/'.$row->foto)?>" style="width:100px; height:100px position:center;">
				</td>
				<td width="150">
				<a href="<?php echo base_url().'index.php/page/edit_guru/'.$row->id; ?>"><button class="btn btn-primary btn-icon-split" ><i class="fa fa-pencil"></i>&nbsp;Edit</button></a>|
				<a href="<?php echo base_url().'index.php/page/hapus_guru/'.$row->id; ?>"><button class="btn btn-danger btn-icon-split" ><i class="fa fa-trash"></i>&nbsp;Hapus</button></a>
				</td>
 			<?php endforeach; ?>
			
			</tr>
			</tbody>
            </table>
			  <a href="<?php echo base_url().'index.php/page/tambah'?>"><button class="btn btn-success btn-icon-split" ><i class="fa fa-plus"></i>&nbsp;Tambah</button></a>
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
            
        