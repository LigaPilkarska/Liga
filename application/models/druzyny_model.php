<?php

class Druzyny_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->db->query('SET NAMES utf8');
        //SET NAMES 'utf8' lub 'latin2';
    }
    
    public function pobierzDane($idDruzyny) {
        $this->db->where('idDruzyny', $idDruzyny);
        $query = $this->db->get('druzyny');
        return $query->row();
    }
    
    public function pobierzDruzyny($idLigi) {
        $this->db->where('idLigi', $idLigi);
        $query = $this->db->get('druzyny');
        return $query->result_array();
    }
    
}
?>
