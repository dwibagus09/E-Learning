

<div class="panel panel-default">
<div class="panel-heading">
   <h3 class="panel-title"><i class="fa fa-pencil"></i> Edit Pengguna</h3>
</div>
			  
   <div class="panel-body">
              
			
<div> 

<form class="user" action="<?php echo base_url().'Page/save_edit'; ?>" method="post"> 
<div class="form-group">                      
 <input type="hidden" name="id" value="<?php echo $list['id']; ?>">
<input type="text" class="form-control " id="username" name="Username" value="<?php echo $list['username']; ?>" > 
</div>
 <div class="form-group"> 
<input type="text" class="form-control " id="password" name="Password" value="<?php echo $list['password']; ?>" > 
</div> 
<select id="akses" class="form-control" name="Akses" require> 
<option value="1">Admin</option>
<option value="2">Guru</option>
</select> 
<br>
<input type="submit" class="btn btn-success btn-icon-split" style="float:right;" name="submit" value="Simpan">
</form>
<a href="<?php echo base_url().'Page/data_login'?>"><button class="btn btn-warning btn-icon-split" >&xlarr;&nbsp;Kembali</button></a><hr>
<?php
            if($this->input->get('update')==1)
            {
                echo "Data Berhasil diupdate !";
            }
            else if($this->input->get('update')==2)
            {
                echo "Data Gagal diupdate !";
            }
        ?>



</div>
</div>             