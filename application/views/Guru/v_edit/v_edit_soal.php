
<form action="<?php echo base_url().'Page_guru/proses_tambah_soal';?>" enctype="multipart/form-data" method="POST">
<table class="form">

	<input type="hidden" class="form-control form-control-user" id="id_pertanyaan" name="id_pertanyaam" value="<?php echo $ujian['id_pertanyaan'];?>" require>
<tr> 
	<!-- <td style="margin-top: 30px; margin-right:20px; float:left;"><?=$i?></td> -->
    <td style="margin-top: 10px; float:right; ">Pertanyaan<textarea rows="10" cols="100" name="pertanyaan[]"><?php echo $ujian['soal'];?></textarea></td>
</tr>
<tr>
<td style="float: left; margin-left:20px; margin-top:15px;">Pilihan a &nbsp; :</td>
<td  style="float: left; margin-left: 10px; margin-top:10px;"><input class="form-control" type="text" name="pil1[]" value="<?php echo $ujian['a'];?>"></td>
</tr>
<tr>
<td style="float: left; margin-left:20px; margin-top:15px;">Pilihan b &nbsp; :</td>
<td  style="float: left; margin-left: 10px; margin-top:10px;"><input class="form-control" type="text" name="pil2[]" value="<?php echo $ujian['b'];?>"></td>
</tr>
<tr>
<td style="float: left; margin-left:20px; margin-top:15px;">Pilihan c &nbsp; :</td>
<td  style="float: left; margin-left: 10px; margin-top:10px;"><input class="form-control" type="text" name="pil3[]"value="<?php echo $ujian['c'];?>"></td>
</tr>
<tr>
<td style="float: left; margin-left:20px; margin-top:15px;">Pilihan d &nbsp; :</td>
<td  style="float: left; margin-left: 10px; margin-top:10px;"><input class="form-control" type="text" name="pil4[]" value="<?php echo $ujian['d'];?>"></td>
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

<input class="form-control" type="text" name="id_ujian[]" value="<?php echo $id['id_ujian'];?>">
</td>
</tr>

<tr>
    <td style="padding-bottom: 10px; text-align:center;"><input type="submit" onclick="window.scrollTo(0,0)" name="update" value="Save Changes"></td>
</tr>

</table>
</form>
<div class="text-center"> <a class="small" href="<?php echo base_url().'Page_guru/data_ujian/'.$this->session->userdata("ses_nama")?>">Kembali</a>
<?
print_r($_REQUEST); 
?>
