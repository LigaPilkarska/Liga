<?php

class Wpisy extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function pobierz_newsy($slug='strona', $liga=NULL) {
        $this->db->order_by('idWpisu', 'desc');
        if($slug=='strona') {
            $this->db->where('idLigi', NULL);
            $this->db->where('idDruzyny', NULL);
        } elseif($slug=='liga') {
            $this->db->where('idLigi', $liga);
        } elseif($slug=='druzyna') {
            $this->db->where('idDruzyny', $liga);
        }
        //$query = $this->db->query('SELECT * FROM wpisy');
        $query = $this->db->get('wpisy', 3);
        return $query->result_array();
    }
}
?>