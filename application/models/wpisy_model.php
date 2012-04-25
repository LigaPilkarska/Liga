<?php

class Wpisy_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->db->query('SET NAMES utf8');
        //SET NAMES 'utf8' lub 'latin2';
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
        $this->db->join('konta', 'konta.idKonta = wpisy.idKonta');
        $query = $this->db->get('wpisy', 3);
        return $query->result_array();
    }
    
    public function pobierz_newsy2($slug='strona', $liga=NULL) {
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
        $query = $this->db->get('wpisy', 3, 3);
        return $query->result_array();
    }
    
    public function pobierz_wpis($idWpisu) {
        $this->db->where('idWpisu', $idWpisu);
        $this->db->join('konta', 'konta.idKonta = wpisy.idKonta');
        $query = $this->db->get('wpisy');
        return $query->result_array();
    }
    
    public function wstaw_newsa($tytul, $tresc){
            $data = array(
    'tytul' => $tytul ,
    'wpis' => $tresc ,
    'idKonta' => $this->session->userdata('konto_id'));

            $this->db->insert('wpisy', $data);
    }
    
    public function wstaw_newsa_liga($tytul, $tresc, $liga){
            $data = array(
    'tytul' => $tytul ,
    'wpis' => $tresc ,
    'idLigi' => $liga,
    'idKonta' => $this->session->userdata('konto_id'));

            $this->db->insert('wpisy', $data);
    }
    
    public function wstaw_newsa_druzyna($tytul, $tresc, $druzyna){
            $data = array(
    'tytul' => $tytul ,
    'wpis' => $tresc ,
    'idDruzyny' => $druzyna,
    'idKonta' => $this->session->userdata('konto_id'));

            $this->db->insert('wpisy', $data);
    }
    
    public function usun_wpis($idWpisu) {
        $query = 'DELETE FROM wpisy WHERE idWpisu='.$idWpisu;
        echo $query;
        $wynik = $this->db->query($query);
    }
    
    public function pobierz_komentarze($idWpisu) {
        $this->db->where('idWpisu', $idWpisu);
        $query = $this->db->get('komentarze');
        return $query->result_array();
    }
    
    public function wstaw_komentarz($autor, $tresc, $idWpisu){
            $data = array(
    'komentarz' => $tresc ,
    'autor' => $autor ,
    'idWpisu' => $idWpisu,
    'ipAutora' => 0);

            $this->db->insert('komentarze', $data);
    }
}
?>