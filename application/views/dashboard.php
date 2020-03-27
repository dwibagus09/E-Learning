
<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('Partial/view_head');?> <!--Include menu-->
</head>
<body>
 <?php $this->load->view('Partial/view_nav');?> <!--Include menu-->
<div class="container" style="margin-top: 80px">
    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
              <?php $this->load->view('Partial/view_sidebar');?> <!--Include menu-->
            </div>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
            <?php $this->load->view('Partial/v_index');?> <!--Include menu-->
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('Partial/view_js');?> <!--Include menu-->
</body>
</html>