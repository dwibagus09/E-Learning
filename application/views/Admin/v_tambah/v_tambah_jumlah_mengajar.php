<div class="row"> 
<div class="col-lg-7"> 
<div class="p-5"> <div class="text-center"> 
<h1 class="h4 text-gray-900 mb-4">Tambah Pengajar</h1>
</div> 
 <form action ="<?php echo base_url().'index.php/Page/tambah_mengajar';?>" method="POST">
		<div class="form-group">
		<label for="count_add">Masukkan Jumlah Guru</label>
		<input type="text" name="count_data"  maxlength="3" pattern="[0-9]+" class="form-control">
		</div>
	<div class="form-group" align="right">
	<input type="submit" name="generate" value="Generate" class="btn btn-success ">
	</div>
	</form><hr> 
<div class="text-center"> <a class="small" href="Index">Kembali</a> 
</div>
</div>
</div>
</div> 