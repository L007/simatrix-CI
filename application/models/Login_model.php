<?php
Class Login_model extends CI_Model{

    function __construct(){
        parent::__construct();
        $this->load->library('session');
    }

	public function getCredentials($user, $pass){
        
        $query = "SELECT * FROM users WHERE username = '$user' AND password = '$pass' ";
        $hasil = $this->db->query($query)->row();
        // $result = 0;
        if(!empty($hasil)){
            $this->session->set_userdata('username', $hasil->username);
            $this->session->set_userdata('id_user',$hasil->id_user);
            return $hasil;
            
        } else{
            return 0;
        }
    }
	
}