<div class="row"> 
<div class="col-lg-7"> 
<div class="p-5"> <div class="text-center"> 
<h1 class="h4 text-gray-900 mb-4">Tambah Mata Pelajaran</h1>
</div> 
<form class="user" action="<?php echo base_url().'Page/tambah_proses_mapel';?>" method="post"> 
<input type="hidden" name="total[]" value="<?=@$_POST['count_data']?> ">
		<table class="table">
		<tr>
			<th>No.</th>
			<th>Masukkan Mata Pelajaran</th>
		</tr>
		<?php
		for ($i=1; $i<=$_POST['count_data']; $i++){?>
			<tr>
			<td><?=$i?></td>
			<td>
				<input type="text" name="nama_mapel[]" class="form-control" required>
			</td>
			</tr>
		<?php
		}
		?>
		</table>

<input type="submit" class="btn btn-success btn-icon-split" name="submit" value="Tambah"> 
</form><hr> 
<div class="text-center"> <a class="small" href="Index">Kembali</a> 
</div>
</div>
</div>
</div> 