
<div class="row"> 
    <div class="col-lg-7"> 
        <div class="p-5"> <div class="text-center"> 
            <h1 class="h4 text-gray-900 mb-4">Tambah Data Tugas</h1>
        </div> 
        <form class="user" action="<?php echo base_url().'Page_guru/save_edit_tugas/'.$this->session->userdata("ses_nama"); ?>" method="post" enctype="multipart/form-data"> 
        <div class="form-group">                      
            <input type="hidden" class="form-control form-control-user" id="id_tgs" name="id_tugas" value="<?php echo $tugas['id_tugas'];?>" require> 
        </div>
        <div class="form-group">                      
            <input type="text" class="form-control form-control-user" id="kode" name="kode_tugas" value="<?php echo $tugas['kd_tugas'];?>" require> 
        </div> 
        <div class="form-group">                      
            <textarea name="deskripsi" id="desc" cols="70" rows="10" require><?php echo $tugas['deskripsi'];?></textarea> 
        </div>
        <div class="form-group">                      
            <input type="date" class="form-control form-control-user" id="start" name="start" value="<?php echo $tugas['waktu_mulai'];?>" require> 
        </div>
        <div class="form-group">                      
            <input type="date" class="form-control form-control-user" id="end" name="end" value="<?php echo $tugas['waktu_selesai'];?>" require> 
        </div>   
        <!-- <div class="form-group"> 
            <input type="file" class="form-control form-controluser" id="tugas" name="tugas" placeholder="Pilih Tugas" require> 
        /div>   -->
        <div class="form-group"> 
            <input type="hidden" class="form-control form-controluser" id="id" name="mengajar" value="<?php echo $tugas['id_mengajar'];?>" require> 
        </div> 
            <input type="submit" class="btn btn-success btn-icon-split" name="submit" value="Update"> 
        </form><hr> 
            <div class="text-center"> <a class="small" href="<?php echo base_url().'Page_guru/data_tugas/'.$this->session->userdata("ses_nama")?>">Kembali</a> 
            </div>
        </div>
    </div>
</div> 