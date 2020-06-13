<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				
                    <div class="panel panel-default">
<div class="panel-heading">
   <h3 class="panel-title"><i class="fa fa-user"></i>Submit Tugas</h3>
</div>
			  
   <div class="panel-body" style="color:black;">
              
			<table class="table table-bordered" width="100%" cellspacing="0">
            
		<form class="user" action="<?php echo base_url().'Page_siswa/proses_tambah_file/'.$this->session->userdata("ses_nama"); ?>" method="post" enctype="multipart/form-data"> 
        <div class="form-group"> 
            <input type="file" class="form-control form-controluser" id="file_tugas" name="file_tugas"  require> 
        </div> 
        <div class="form-group">
        Pilih Tugas : &nbsp;
            <select class="form-control" name="tugas" id="category" required>
                <?php foreach($id as $row ):?>
                <option value="<?php echo $row->id_tugas;?>"><?php echo $row->deskripsi;?></option>
                <?php endforeach;?>
			</select>
        </div> 
            <input type="submit" class="btn btn-success btn-icon-split" name="submit" value="submit"> 
        </form><hr> 
            <div class="text-center"> <a class="small" style="color:black; font-size:20px" href="<?php echo base_url().'Page_siswa/data_tugas/'.$this->session->userdata("ses_nama")?>">Kembali</a> 
            </div>
            
            </table>
	</div>
				<?php
            if($this->input->get('delete')==1)
            {
                echo "Data Anda Berhasil Dihapus !";
            }
            else if($this->input->get('delete')==2)
            {
                echo "Data Anda Gagal Dihapus !";
            }
			?>
				
</div>
						</div>
				
			</div>
		</div>
	</div>