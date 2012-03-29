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
    
    public function pobierzTabele($idLigi) {
        $sql = 'SELECT idDruzyny, nazwaDruzyny, punkty_gosp, punkty_gosc, punkty_gosp+punkty_gosc AS punkty, bramki_strz_gosp+bramki_strz_gosc AS bramki_strz, bramki_strac_gosp+bramki_strac_gosc AS bramki_strac FROM (SELECT idDruzyny, nazwaDruzyny, SUM(IF (m1.zatwierdzony AND m1.bramkiGospodarza>m1.bramkiGoscia, 3, IF(m1.zatwierdzony AND m1.bramkiGospodarza=m1.bramkiGoscia, 1, 0))) AS punkty_gosp, SUM(IF (m2.zatwierdzony AND m2.bramkiGospodarza<m2.bramkiGoscia, 3, IF(m2.zatwierdzony AND m2.bramkiGospodarza=m2.bramkiGoscia, 1, 0))) AS punkty_gosc, SUM(IF(m1.bramkiGospodarza IS NOT NULL, m1.bramkiGospodarza, 0)) AS bramki_strz_gosp, SUM(IF(m2.bramkiGoscia IS NOT NULL, m2.bramkiGoscia, 0)) AS bramki_strz_gosc, SUM(IF(m2.bramkiGospodarza IS NOT NULL, m2.bramkiGospodarza, 0)) AS bramki_strac_gosp, SUM(IF(m1.bramkiGoscia IS NOT NULL, m1.bramkiGoscia, 0)) AS bramki_strac_gosc 
            FROM druzyny LEFT JOIN mecze m1 ON druzyny.idDruzyny = m1.idGospodarza LEFT JOIN mecze m2 ON druzyny.idDruzyny = m2.idGoscia 
            WHERE idLigi='.$idLigi.' GROUP BY nazwaDruzyny, idDruzyny ORDER BY punkty_gosp DESC, nazwaDruzyny ASC) AS pom';
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
}
?>
