
<form action="" enctype="multipart/form-data" method="POST">
<table class="form">
<?php
	for ($i=1; $i<=$_POST['count_data']; $i++){?>
<tr> 
	<td style="margin-top: 30px; margin-right:20px; float:left;"><?=$i?></td>
    <td style="margin-top: 10px; float:right; ">Pertanyaan<textarea rows="10" cols="100" name="3">A long time ago in a galaxy far, far away...</textarea></td>
</tr>
<tr>
<td style="float: left; margin-left:20px; margin-top:15px;">Pilihan a &nbsp; :</td>
<td  style="float: left; margin-left: 10px; margin-top:10px;"><input class="form-control" type=”text” name=”pil1″></td>
</tr>
<tr>
<td style="float: left; margin-left:20px; margin-top:15px;">Pilihan b &nbsp; :</td>
<td  style="float: left; margin-left: 10px; margin-top:10px;"><input class="form-control" type=”text” name=”pil2″></td>
</tr>
<tr>
<td style="float: left; margin-left:20px; margin-top:15px;">Pilihan c &nbsp; :</td>
<td  style="float: left; margin-left: 10px; margin-top:10px;"><input class="form-control" type=”text” name=”pil3″></td>
</tr>
<tr>
<td style="float: left; margin-left:20px; margin-top:15px;">Pilihan d &nbsp; :</td>
<td  style="float: left; margin-left: 10px; margin-top:10px;"><input class="form-control" type=”text” name=”pil4″></td>
</tr>
<tr>
<td style="float: left; margin-left:20px; margin-top:15px;">Pilihan e &nbsp; :</td>
<td  style="float: left; margin-left: 10px; margin-top:10px;"><input class="form-control" type=”text” name=”pil5″></td>
</tr>
<tr>
<td style="float: left; margin-left:20px; margin-top:15px;">Jawaban &nbsp; :</td>
<td style="float: left; margin-left: 10px; margin-top:15px;" >
<input type="radio" value="a" name="jawaban">A
<input type="radio" value="b" name="jawaban">B
<input type="radio" value="c" name=”jawaban”>C
<input type="radio" value="d" name=”jawaban”>D
</td>
</tr>
<?php
		}
		?>
<tr>
    <td align="center" style="padding-bottom: 10px;"><input type="submit" onclick="window.scrollTo(0,0)" name="update" value="Save Changes"></td>
</tr>

</table>
</form>
<?
print_r($_REQUEST); 
?>