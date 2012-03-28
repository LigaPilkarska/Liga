<?php

class Mecze_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->db->query('SET NAMES utf8');
        //SET NAMES 'utf8' lub 'latin2';
    }
    
    public function pobierz_mecze_ligi($idLigi) {
     /*   $this->db->where('idLigi', $idLigi);*/
        $sql ='SELECT idMecze, kolejka, data, d1.nazwaDruzyny AS nazwaGospodarza, d2.nazwaDruzyny AS nazwaGoscia FROM mecze INNER JOIN druzyny d1 ON idGospodarza=d1.idDruzyny INNER JOIN druzyny d2 ON idGoscia=d2.idDruzyny WHERE (SELECT idLigi FROM druzyny WHERE idDruzyny=idGoscia) ORDER BY kolejka, data';
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
    public function pobierz_mecze_druzyny($idDruzyny) {
     /*   $this->db->where('idLigi', $idLigi);*/
        $sql ='SELECT idMecze, kolejka, data, d1.nazwaDruzyny AS nazwaGospodarza, d2.nazwaDruzyny AS nazwaGoscia, d1.idLigi FROM mecze INNER JOIN druzyny d1 ON idGospodarza=d1.idDruzyny INNER JOIN druzyny d2 ON idGoscia=d2.idDruzyny WHERE (idGospodarza='.$idDruzyny.' OR idGoscia='.$idDruzyny.') ORDER BY kolejka, data';
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
    public function pobierz_mecz($idMecze) {
        $sql ="SELECT idMecze, kolejka, data, idGospodarza, bramkiGospodarza, idGoscia, bramkiGoscia, imieSedziego, nazwiskoSedziego, nazwiskoSedziego AS sedzia, sedzBoczny1, sedzBoczny2, d1.nazwaDruzyny AS nazwaGospodarza, d2.nazwaDruzyny AS nazwaGoscia, d1.idLigi FROM mecze INNER JOIN druzyny d1 ON idGospodarza=d1.idDruzyny INNER JOIN druzyny d2 ON idGoscia=d2.idDruzyny INNER JOIN sedziowie ON mecze.idSedziego=sedziowie.idSedziego WHERE idMecze=".$idMecze;
        $query = $this->db->query($sql);
        return $query->row();
    }
    
    public function pobierz_uczestnictwa($idDruzyny, $idMecze) {
        $sql = 'SELECT zawodnicy.idZawodnika, imieZawodnika, nazwiskoZawodnika, pozycja, wejscie, zejscie FROM zawodnicy INNER JOIN uczestnictwa ON uczestnictwa.idZawodnika = zawodnicy.idZawodnika WHERE zawodnicy.idDruzyny='.$idDruzyny.' AND idMeczu='.$idMecze;
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
    public function pobierz_wydarzenia($idDruzyny, $idMecze) {
        $sql = 'SELECT zawodnicy.idZawodnika, imieZawodnika, nazwiskoZawodnika, zdarzenie, minuta FROM zawodnicy INNER JOIN wydarzenia ON zawodnicy.idZawodnika=wydarzenia.idZawodnika WHERE idMeczu='.$idMecze.' AND idDruzyny='.$idDruzyny.' ORDER BY zdarzenie, minuta';
        $query = $this->db->query($sql);
        return $query->result_array();
    }
}
?>
