<div class="row"> 
<div class="col-lg-7"> 
<div class="p-5"> <div class="text-center"> 
<h1 class="h4 text-gray-900 mb-4">Tambah Data Guru</h1>
</div> 
<form class="user" action="<?php echo base_url().'Page/tambah_proses_guru'; ?>" method="post" enctype="multipart/form-data"> 
<div class="form-group">                      
<input type="text" class="form-control form-control-user" id="niy" name="Niy" placeholder="Nomor induk yayasan" require> 
</div>
<div class="form-group">                      
<input type="text" class="form-control form-control-user" id="nama" name="Nama" placeholder="Nama Lengkap Guru" require> 
</div>
<div class="form-group">                      
<input type="textarea" class="form-control form-control-user" id="alamat" name="Alamat" placeholder="Alamat Lengkap Guru" require>
</div>
<div class="form-group"> 
<select id="jenkel" class="form-control" name="Jenkel" require> 
<option value="0">
Pilih Jenis Kelamin</option> 
<option value="Pria">Pria</option> 
<option value="Wanita">Wanita</option> 
</select> 
</div>
<div class="form-group"> 
<input type="file" class="form-control form-controluser" id="foto" name="photo" placeholder="Pilih Foto" require> 
</div>  
<div class="form-group"> 
<input type="hidden" class="form-control form-controluser" id="id" name="Id" value="<?php echo $list['id'] ?>" require> 
</div> 
<input type="submit" class="btn btn-success btn-icon-split" name="submit" value="Tambah"> 
</form><hr> 
<div class="text-center"> <a class="small" href="Index">Kembali</a> 
</div>
</div>
</div>
</div> 