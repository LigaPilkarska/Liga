<?php

class Admin_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->db->query('SET NAMES utf8');
        //SET NAMES 'utf8' lub 'latin2';
    }
    
    public function sprLogin($login, $haslo) {
        $this->db->where('login', $login);
        $this->db->where('haslo', $haslo);
        $query = $this->db->get('konta');
        return $query->row();
    }
    
}
?>
