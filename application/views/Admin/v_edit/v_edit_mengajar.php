<div class="panel panel-default">
<div class="panel-heading">
   <h3 class="panel-title"><i class="fa fa-pencil"></i> Edit Pengajar</h3>
</div>
              
   <div class="panel-body">
              
            
<div> 

<form class="user" action="<?php echo base_url().'index.php/Page/save_edit_mengajar'; ?>" method="post">
 <input type="hidden" name="id" value="<?php echo $list['id_mengajar']; ?>"> 
<td>
            <select class="form-control" name="guru" id="category" required>
            <option value="">No Selected</option>
                <?php foreach($list1 as $row ):?>
                <option value="<?php echo $row->nip;?>"><?php echo $row->nama_guru;?></option>
                <?php endforeach;?>
            </select>
            </td>
            <br>
            <td>
            <select class="form-control" name="mapel" id="category" required>
            <option value="">No Selected</option>
                <?php foreach($list3 as $row2 ):?>
                <option value="<?php echo $row2->id_mapel;?>"><?php echo $row2->nama;?></option>
                <?php endforeach;?>
            </select>
            </td>
            <br>
            <td>
                <select class="form-control" name="kelas" id="category" required>
                <option value="">No Selected</option>
                <?php foreach($kelas as $row2 ):?>
                <option value="<?php echo $row2->id_kelas;?>"><?php echo $row2->nama_kelas;?></option>
                <?php endforeach;?>
            </select>
            </td>
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