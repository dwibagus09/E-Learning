<?php if($this->session->userdata('akses')=='1'):?>
    <title> Dashboard Administrator</title>
	<?php elseif($this->session->userdata('akses')=='2'):?>
    <title> Dashboard Guru</title>
	<?php endif;?>
	<link rel="icon" type="image/png" href="<?php echo base_url('assets/images/logo.png')?>"/>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

  <!-- Custom styles for this template-->
    