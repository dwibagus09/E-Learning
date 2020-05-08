<?php
class Template2{
    protected $_ci;
    
    function __construct(){
        $this->_ci = &get_instance();
    }
    
  function utama($content, $data = NULL){
    /*
     * $data['headernya'] , $data['contentnya'] , $data['footernya']
     * variabel diatas ^ nantinya akan dikirim ke file views/template/index.php
     * */
        $data['head'] = $this->_ci->load->view('Partial_siswa/head', $data, TRUE);
        $data['header_menu'] = $this->_ci->load->view('Partial_siswa/header_menu', $data, TRUE);
        $data['content'] = $this->_ci->load->view($content, $data, TRUE);
		$this->_ci->load->view($content, $data, TRUE);
        $data['footer'] = $this->_ci->load->view('Partial_siswa/footer', $data, TRUE);
        echo $data['blank'] = $this->_ci->load->view('Partial_siswa/blank', $data, TRUE);
        
    }
}
?>