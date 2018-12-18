<?php  
Class Register_model extends CI_Model{

    function __construct(){
        parent::__construct();
        $this->load->library('session');
    }

    public function create_user($tabel,$data){
    	$this->db->insert($tabel,$data);

    }

}
?>


