
<form action="<?php echo base_url().'index.php/Page_guru/proses_tambah_soal';?>" enctype="multipart/form-data" method="POST">
<table class="form">
<?php
	for ($i=1; $i<=$this->uri->segment('3'); $i++){?>
	
<tr> 
	
	<td style="margin-top: 30px; margin-right:20px; float:left;"><?=$i?></td>
    <td style="margin-top: 10px; float:right; ">Pertanyaan<textarea rows="10" cols="100" name="pertanyaan[]"></textarea></td>
</tr>
<tr>
<td style="float: left; margin-left:20px; margin-top:15px;">Pilihan a &nbsp; :</td>
<td  style="float: left; margin-left: 10px; margin-top:10px;"><input class="form-control" type="text" name="pil1[]"></td>
</tr>
<tr>
<td style="float: left; margin-left:20px; margin-top:15px;">Pilihan b &nbsp; :</td>
<td  style="float: left; margin-left: 10px; margin-top:10px;"><input class="form-control" type="text" name="pil2[]"></td>
</tr>
<tr>
<td style="float: left; margin-left:20px; margin-top:15px;">Pilihan c &nbsp; :</td>
<td  style="float: left; margin-left: 10px; margin-top:10px;"><input class="form-control" type="text" name="pil3[]"></td>
</tr>
<tr>
<td style="float: left; margin-left:20px; margin-top:15px;">Pilihan d &nbsp; :</td>
<td  style="float: left; margin-left: 10px; margin-top:10px;"><input class="form-control" type="text" name="pil4[]"></td>
</tr>
<tr>
<!-- <td style="float: left; margin-left:20px; margin-top:15px;">Pilihan e &nbsp; :</td>
<td  style="float: left; margin-left: 10px; margin-top:10px;"><input class="form-control" type="text" name="pil5[]"></td> -->
</tr>
<tr>
<td style="float: left; margin-left:20px; margin-top:15px;">Jawaban &nbsp; :</td>
<td style="float: left; margin-left: 10px; margin-top:15px;" >
<input type="radio" value="a" name="jawaban[]">A
<input type="radio" value="b" name="jawaban[]">B
<input type="radio" value="c" name="jawaban[]">C
<input type="radio" value="d" name="jawaban[]">D
</td>
</tr>
<tr>
<td style="float: left; margin-left:20px; margin-top:15px; margin-bottom:40px;"> Id_Ujian &nbsp; :</td>
<td style="float: left; margin-left: 10px; margin-top:15px;">
<input class="form-control" type="text" name="id_ujian[]" value="<?php echo $id_ujian['id_ujian'];?>">
</td>
</tr>
<?php
		}
		?>
<tr>
    <td style="padding-bottom: 10px; text-align:center;"><input type="submit" onclick="window.scrollTo(0,0)" name="update" value="Save Changes"></td>
</tr>

</table>
</form>
<div class="text-center"> <a class="small" href="<?php echo base_url().'Page_guru/data_ujian/'.$this->session->userdata("ses_nama")?>">Kembali</a>
<?
print_r($_REQUEST); 
?>
