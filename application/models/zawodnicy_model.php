<?php

class Zawodnicy_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->db->query('SET NAMES utf8');
    }
    
    public function pobierz_zawodnikow($idDruzyny, $idLigi) {
        $this->db->where('idDruzyny', $idDruzyny);
        $query = $this->db->get('zawodnicy'.$idLigi);
        return $query->result_array();
    }
    
    public function pobierz_zawodnika($idZawodnika, $idLigi) {
        $this->db->where('idZawodnika', $idZawodnika);
        $query = $this->db->get('zawodnicy'.$idLigi);
        return $query->row();
    }
    
}
?>
