<div class="row"> 
<div class="col-lg-7"> 
<div class="p-5"> <div class="text-center"> 
<h1 class="h4 text-gray-900 mb-4">Tambah Pengajar</h1>
</div> 
<form class="user" action="<?php echo base_url().'index.php/Page/tambah_proses_kelas';?>" method="post"> 
<input type="hidden" name="total[]" value="<?=@$_POST['count_data']?> ">
		<table class="table">
		<tr>
			<th>No.</th>
			<th>Nama Guru</th>
			<th>Mata Pelajaran</th>
			<th>Kelas</th>
		</tr>
		<?php
		for ($i=1; $i<=$_POST['count_data']; $i++){?>
			<tr>
			<td><?=$i?></td>
			<td>
			<select class="form-control" name="guru[]" id="category" required>
            <option value="">No Selected</option>
                <?php foreach($list as $row ):?>
                <option value="<?php echo $row->nip;?>"><?php echo $row->nama_guru;?></option>
                <?php endforeach;?>
			</select>
			</td>

			<td>
			<select class="form-control" name="guru[]" id="category" required>
            <option value="">No Selected</option>
                <?php foreach($list3 as $row2 ):?>
                <option value="<?php echo $row2->id_mapel;?>"><?php echo $row2->nama;?></option>
                <?php endforeach;?>
			</select>
			</td>

			<td>
				<select class="form-control" name="guru[]" id="category" required>
           		<option value="">No Selected</option>
                <?php foreach($kelas as $row2 ):?>
                <option value="<?php echo $row2->id_kelas;?>"><?php echo $row2->nama_kelas;?></option>
                <?php endforeach;?>
			</select>
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