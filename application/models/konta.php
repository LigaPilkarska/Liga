<?php

class Konta extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->db->query('SET NAMES latin2');
        //SET NAMES 'utf8' lub 'latin2';
    }
    
    public function pobierzHaslo($login) {
        $this->db->where('login', $login);
        $query = $this->db->get('konta');
        return $query->row()->haslo;
    }
}
?>
