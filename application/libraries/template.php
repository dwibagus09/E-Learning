<?php
class Template{
    protected $_ci;
    
    function __construct(){
        $this->_ci = &get_instance();
    }
    
  function utama($content, $data = NULL){
    /*
     * $data['headernya'] , $data['contentnya'] , $data['footernya']
     * variabel diatas ^ nantinya akan dikirim ke file views/template/index.php
     * */
        $data['head'] = $this->_ci->load->view('Partial/view_head', $data, TRUE);
		$data['navbar'] = $this->_ci->load->view('Partial/view_nav', $data, TRUE);
		$data['sidebar'] = $this->_ci->load->view('Partial/view_sidebar', $data, TRUE);
        $data['content'] = $this->_ci->load->view($content, $data, TRUE);
		$this->_ci->load->view($content, $data, TRUE);
        $data['footer'] = $this->_ci->load->view('Partial/view_js', $data, TRUE);
        echo $data['blank'] = $this->_ci->load->view('Partial/blank', $data, TRUE);
        
    }
}
?>