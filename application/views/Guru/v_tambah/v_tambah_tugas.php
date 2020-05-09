
<div class="row"> 
<div class="col-lg-7"> 
<div class="p-5"> <div class="text-center"> 
<h1 class="h4 text-gray-900 mb-4">Tambah Data Tugas</h1>
</div> 
<form class="user" action="<?php echo base_url().'index.php/Page_guru/proses_tambah_tugas'; ?>" method="post" enctype="multipart/form-data"> 
<div class="form-group">                      
<input type="text" class="form-control form-control-user" id="id_tgs" name="id_tugas" placeholder="Id Tugas" require> 
</div>
<div class="form-group">                      
<input type="text" class="form-control form-control-user" id="kode" name="kode_tugas" placeholder="Kode" require> 
</div> 
<div class="form-group">                      
<input type="text" class="form-control form-control-user" id="kode" name="deskripsi" placeholder="Deskripsi" require> 
</div>
<div class="form-group">                      
<input type="date" class="form-control form-control-user" id="start" name="start" placeholder="Waktu Mulai" require> 
</div>
<div class="form-group">                      
<input type="date" class="form-control form-control-user" id="end" name="end" placeholder="Waktu Akhir" require> 
</div>   
<!-- <div class="form-group"> 
<input type="file" class="form-control form-controluser" id="tugas" name="tugas" placeholder="Pilih Tugas" require> 
</div>   -->
<div class="form-group"> 
<input type="text" class="form-control form-controluser" id="id" name="Id" value="<?php echo $get_id['id_mengajar']; ?>" require> 
</div> 
<input type="submit" class="btn btn-success btn-icon-split" name="submit" value="Tambah"> 
</form><hr> 
<div class="text-center"> <a class="small" href="Index">Kembali</a> 
</div>
</div>
</div>
</div> 