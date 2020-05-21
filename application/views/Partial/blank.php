
 <!DOCTYPE html>
<html style="background:gray; padding:50px;">
<head>
	<?php echo @$head; ?>
</head>
<body>
  <?php echo @$navbar; ?>
<div class="container" style="margin-top: 60px; padding:55px;">
    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
               <?php echo @$sidebar; ?>
            </div>
        </div>
		
        <div class="col-md-9">
            <?php echo @$content; ?>

    </div>
</div>
<a href="<?php echo base_url().'dashboard/logout'?>"><button style="float:right;" class="btn btn-danger btn-icon-split" ><i class="fa fa-sign-out fa-sm fa-fw mr-2 text-gray-400"></i>Logout</button></a>
<?php echo @$footer; ?>
</body>
</html>
