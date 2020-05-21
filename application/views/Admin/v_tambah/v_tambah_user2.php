<div class="row"> 
<div class="col-lg-7"> 
<div class="p-5"> <div class="text-center"> 
<h1 class="h4 text-gray-900 mb-4">Tambah User Siswa</h1>
</div> 
<form class="user" action="<?php echo base_url().'Page/tambah_proses2';?>" method="post"> 
<div class="form-group">                       
<input type="text" class="form-control form-control-user" id="username" name="Username" placeholder="Username Maximal 10 Character" require> 
</div>
 <div class="form-group"> 
<input type="password" class="form-control form-controluser" id="password" name="Password" placeholder="Password Maximal 6 Character" require> 
</div> 
<div class="form-group"> 
<select id="akses" class="form-control" name="Akses" require> 
<option value="0">
Grup User</option> 
<option value="3">Siswa</option> 
</select> 
</div> 
<input type="submit" class="btn btn-success btn-icon-split" name="submit" value="Tambah"> 
</form><hr> 
<div class="text-center"> <a class="small" href="Index">Kembali</a> 
</div>
</div>
</div>
</div> 