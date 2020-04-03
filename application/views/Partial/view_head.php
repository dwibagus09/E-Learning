<?php if($this->session->userdata('akses')=='1'):?>
    <title> Dashboard Administrator</title>
	<?php elseif($this->session->userdata('akses')=='2'):?>
    <title> Dashboard Guru</title>
	<?php endif;?>
	<link rel="icon" type="image/png" href="<?php echo base_url('assets/images/logo.png')?>"/>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    