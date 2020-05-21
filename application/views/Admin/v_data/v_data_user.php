<div class="panel panel-default">
<div class="panel-heading">
   <h3 class="panel-title"><i class="fa fa-user"></i> Daftar Pengguna</h3>
</div>
			  
   <div class="panel-body">
              
			<table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
			<tr>
				<th>No</th>
				<th>Username</th>
				<th>Password</th>
				<th>User</th>
				<th>Option</th>
			</tr>
			</thead>
			<tbody>
			
			<?php
			$no = 1;
			foreach ($list as $row): ?>
			<input type="hidden" value="<?php echo $row->id ?>">
			<tr>
				<td width="50"><?php echo $no++ ?></td>
				
				<td width="150">
				<?php echo $row->username ?>
				</td>
				<td width="150">
				<?php echo $row->password ?>
				</td>
				<td width="150">
				<?php echo $row->akses ?>
				</td>
				<td width="150">
				<a href="<?php echo base_url().'Page/edit/'.$row->id; ?>"><button class="btn btn-primary btn-icon-split" ><i class="fa fa-pencil"></i>&nbsp;Edit</button></a>
				<a href="<?php echo base_url().'Page/hapus/'.$row->id; ?>"><button class="btn btn-danger btn-icon-split" ><i class="fa fa-trash"></i>&nbsp;Hapus</button></a>
				</td>
 			<?php endforeach; ?>
			
			</tr>
			</tbody>
            </table>
			  <!--<a href="<?php echo base_url().'Page/tambah'?>"><button class="btn btn-success btn-icon-split" ><i class="fa fa-plus"></i>&nbsp;Tambah</button></a>-->
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
            
        