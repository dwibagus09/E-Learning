<div class="row"> 
<div class="col-lg-7"> 
<div class="p-5"> <div class="text-center"> 
<h1 class="h4 text-gray-900 mb-4">Tambah Kelas</h1>
</div> 
<form class="user" action="<?php echo base_url().'index.php/Page/tambah_proses_kelas';?>" method="post"> 
<input type="hidden" name="total[]" value="<?=@$_POST['count_data']?> ">
		<table class="table">
		<tr>
			<th>No.</th>
			<th>Pilih Kelas</th>
			<th>Nama Kelas</th>
		</tr>
		<?php
		for ($i=1; $i<=$_POST['count_data']; $i++){?>
			<tr>
			<td><?=$i?></td>
			<td>
			<select class="form-control" name="kelas[]" id="category" required>
            <option value="">No Selected</option>
            <option value="10">10</option>
			<option value="11">11</option>
			<option value="12">12</option>
			</select>
			</td>
			<td>
				<input type="text" name="nama_kelas[]" class="form-control" required>
				<input type="hidden" name="jurusan[]" value="<?=@$_POST['count_jurusan']?> ">
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