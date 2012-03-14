<?php

class Zawodnicy extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->db->query('SET NAMES latin2');
    }
    
    public function pobierz_zawodnikow($idDruzyny) {
        $this->db->where('idDruzyny', $idDruzyny);
        $query = $this->db->get('zawodnicy');
        return $query->result_array();
    }
    
}
?>
