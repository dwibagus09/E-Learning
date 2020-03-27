<div class="panel panel-default">
<div class="panel-heading">
   <h3 class="panel-title"><i class="fa fa-user"></i> Daftar Pengguna</h3>
</div>
			  
   <div class="panel-body">
              
			<table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
			<tr>
				<th>No</th>
				<th>NIP</th>
				<th>Nama</th>
				<th>Alamat</th>
				<th>Jenis Kelamin</th>
				<th>Foto</th>
				<th>Option</th>
			</tr>
			</thead>
			<tbody>
			
			<?php
			$no = 1;
			foreach ($list as $row): ?>
			<input type="hidden" value="<?php echo $row->id ?>">
			<tr>
				<td><?php echo $no++ ?></td>
				
				<td width="150">
				<?php echo $row->nip ?>
				</td>
				<td width="150">
				<?php echo $row->nama_guru ?>
				</td>
				<td width="150">
				<?php echo $row->alamat ?>
				</td>
				<td width="150">
				<?php echo $row->jenis_kelamin ?>
				</td>
				<td width="150">
				<img src="<?=base_url('upload/guru/'.$row->foto)?>" style="width:100px; height:100px position:center;">
				</td>
				<td width="250">
				<a href="<?php echo base_url().'page/edit/'.$row->id; ?>"><button class="btn btn-primary btn-icon-split" ><i class="fa fa-pencil"></i>&nbsp;Edit</button></a>|
				<a href="<?php echo base_url().'page/hapus/'.$row->id; ?>"><button class="btn btn-danger btn-icon-split" ><i class="fa fa-trash"></i>&nbsp;Hapus</button></a>
				</td>
 			<?php endforeach; ?>
			
			</tr>
			</tbody>
            </table>
			  <a href="<?php echo base_url().'page/tambah_guru'?>"><button class="btn btn-success btn-icon-split" ><i class="fa fa-plus"></i>&nbsp;Tambah</button></a>
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
            
        