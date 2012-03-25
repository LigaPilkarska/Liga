<?php

class Ligi extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->db->query('SET NAMES utf8');
        //SET NAMES 'utf8' lub 'latin2';
    }
    
    public function pobierzDane($idLigi) {
        $this->db->where('idLigi', $idLigi);
        $query = $this->db->get('ligi');
        return $query->row();
    }
    
    public function pobierz_ligi() {
        $query = $this->db->get('ligi');
        return $query->result_array();
    }
}
?>
