<?php

class Druzyny extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->db->query('SET NAMES latin2');
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
