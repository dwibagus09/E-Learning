<div class="row"> 
<div class="col-lg-7"> 
<div class="p-5"> <div class="text-center"> 
<h1 class="h4 text-gray-900 mb-4">Tambah Data Ujian</h1>
</div> 
<form class="user" action="<?php echo base_url().'index.php/Page_guru/tambah_proses_ujian';?>" method="post"> 
<div class="form-group">
<label>Tanggal Ujian</label>                        
<input type="date" class="form-control form-control-user" name="tgl" placeholder="Tanggal Ujian" require> 
</div>
<div class="form-group">
<label>Mata Pelajaran</label> 
<select id="akses" class="form-control" name="mapel" require> 
<option>-- Pilih Salah Satu --</option>
<?php 
foreach ($mapel as $row):?>  
<option value="<?php echo $row->id_mapel;?>"><?php echo $row->nama;?></option>
<?php endforeach; ?>  
</select> 
</div> 
<div class="form-group">
<label>Kelas</label> 
<select id="akses" class="form-control" name="kelas" require> 
<option>-- Pilih Salah Satu --</option>
<?php 
foreach ($kelas as $row):?>  
<option value="<?php echo $row->id_kelas;?>"><?php echo $row->nama_kelas;?></option>
<?php endforeach; ?>  
</select> 
</div> 
<div class="form-group"> 
<input type="textarea" class="form-control form-controluser" name="ket" placeholder="Keterangan Ujian" require>
</div> 
<div class="form-group"> 
<input type="text" class="form-control form-controluser" name="count_data" placeholder="Masukkan Jumlah Soal Ujian" require>
</div> 
<input type="submit" class="btn btn-success btn-icon-split" name="submit" value="Tambah"> 
</form><hr> 
</div>
</div>
</div> 