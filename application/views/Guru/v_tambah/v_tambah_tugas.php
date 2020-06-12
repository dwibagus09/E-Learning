
<div class="row"> 
    <div class="col-lg-7"> 
        <div class="p-5"> <div class="text-center"> 
            <h1 class="h4 text-gray-900 mb-4">Tambah Data Tugas</h1>
        </div> 
        <form class="user" action="<?php echo base_url().'Page_guru/proses_tambah_tugas/'.$this->session->userdata("ses_nama"); ?>" method="post" enctype="multipart/form-data"> 
        <!-- <div class="form-group">                      
            <input type="text" class="form-control form-control-user" id="id_tgs" name="id_tugas" placeholder="Id Tugas" require> 
        </div> -->
        <div class="form-group">                      
            <input type="text" class="form-control form-control-user" id="kode" name="kode_tugas" placeholder="Kode" require> 
        </div> 
        <div class="form-group">                      
            <textarea name="deskripsi" id="desc" cols="70" rows="10" placeholder="Deskripsi" require></textarea> 
        </div>
        <div class="form-group">                      
            <input type="date" class="form-control form-control-user" id="start" name="start" placeholder="Waktu Mulai" require> 
        </div>
        <div class="form-group">                      
            <input type="date" class="form-control form-control-user" id="end" name="end" placeholder="Waktu Akhir" require> 
        </div>   
        <!-- <div class="form-group"> 
            <input type="file" class="form-control form-controluser" id="tugas" name="tugas" placeholder="Pilih Tugas" require> 
        /div>   -->
        <!-- <select>
            <option value="">Kelas</option>
                <?php foreach($kelas as $row ):?>
                <option value="<?php echo $row->id_kelas;?>"><?php echo $row->kelas."&nbsp;".$row->nama_kelas;?></option>
                <?php endforeach;?>
		</select>   -->
		</select>  

        <div class="form-group"> 
            <input type="hidden" class="form-control form-controluser" id="id" name="mengajar" value="<?php echo $get_id['id_mengajar']; ?>" require> 
        </div> 
            <input type="submit" class="btn btn-success btn-icon-split" name="submit" value="Tambah"> 
        </form><hr> 
            <div class="text-center"> <a class="small" href="<?php echo base_url().'Page_guru/data_tugas/'.$this->session->userdata("ses_nama")?>">Kembali</a> 
            </div>
        </div>
    </div>
</div> 