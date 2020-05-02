<div class="panel panel-default">
<div class="panel-heading">
   <h3 class="panel-title"><i class="fa fa-pencil"></i> Edit Mata Pelajaran</h3>
</div>
			  
   <div class="panel-body">
              
			
<div> 

<form class="user" action="<?php echo base_url().'Page/save_edit_mapel'; ?>" method="post"> 
<div class="form-group">                      
 <input type="hidden" name="id" value="<?php echo $list['id_mapel']; ?>">
<input type="text" class="form-control " id="mapel" name="Mapel" value="<?php echo $list['nama']; ?>" > 
</div>
 <br>
<input type="submit" class="btn btn-success btn-icon-split" style="float:right;" name="submit" value="Simpan">
</form>
<a href="data_jurusan"><button class="btn btn-warning btn-icon-split" >&xlarr;&nbsp;Kembali</button></a><hr>
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