<?php

class Ligi_model extends CI_Model {
    
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
    
    public function dajLige($idLigi) {
        $this->db->where('idLigi', $idLigi);
        $query = $this->db->get('ligi');
        return $query->result_array();
    }
    
    public function pobierz_ligi() {
        $query = $this->db->get('ligi');
        return $query->result_array();
    }
    
    public function dodajLige($wojewodztwo, $klasa, $grupa, $rok) {
        $query = 'INSERT INTO ligi (wojewodztwo, klasa, grupa, rok) VALUES ("'.$wojewodztwo.'", "'.$klasa.'", "'.$grupa.'", "'.$rok.'")';
        $wynik = $this->db->query($query);
    }
    
    public function edytujLige($idLigi, $wojewodztwo, $klasa, $grupa, $rok) {
        $query = 'UPDATE ligi SET wojewodztwo="'.$wojewodztwo.'", klasa="'.$klasa.'", grupa="'.$grupa.'", rok="'.$rok.'" WHERE idLigi='.$idLigi;
        $wynik = $this->db->query($query);
    }
    
    public function usunLige($idLigi) {
        $query = 'DELETE FROM ligi WHERE idLigi='.$idLigi;
        $wynik = $this->db->query($query);
        //return $wynik->row();
    }
}
?>
