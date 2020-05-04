<div class="panel panel-default">
<div class="panel-heading">
   <h3 class="panel-title"><i class="fa fa-user"></i> Daftar Materi</h3>
</div>
			  
   <div class="panel-body">
              
			<table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
			<tr style="text-align:center;">
				<th style="text-align:center;">No</th>
				<th style="text-align:center;">Nama Materi</th>
				<th style="text-align:center;">Option</th>
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
				<a href="<?php echo base_url().'page_guru/download/'.$row->file_materi ?>"><?php echo $row->nama_materi?></a> 
				</td>

				<td style="text-align:center;" width="150">
				<a href="<?php echo base_url().'page_guru/edit_materi/'.$row->id_materi; ?>"><button class="btn btn-primary btn-icon-split" ><i class="fa fa-pencil"></i>&nbsp;Edit</button></a>|
				<a href="<?php echo base_url().'page_guru/hapus_materi/'.$row->id_materi; ?>"><button class="btn btn-danger btn-icon-split" ><i class="fa fa-trash"></i>&nbsp;Hapus</button></a>
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
            
        