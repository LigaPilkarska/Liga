<?php

class Konta_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->db->query('SET NAMES utf8');
        //SET NAMES 'utf8' lub 'latin2';
    }
    
    public function pobierzHaslo($login) {
        $this->db->where('login', $login);
        $query = $this->db->get('konta');
        return $query->row()->haslo;
    }
}
?>
