<?php  

class Template {
 	// protected $_ci;

    function __construct(){
        $this->CI = & get_instance();
    }

    function display($template, $data=null){
    	$data['_content'] = $this->CI->load->view($template, $data, true);
    	$data['_header'] = $this->CI->load->view('template/header', $data, true);
    	$data['_sidebar'] = $this->CI->load->view('template/sidebar', $data, true);
    	$this->CI->load->view('/template.php', $data);
    }
}

?>