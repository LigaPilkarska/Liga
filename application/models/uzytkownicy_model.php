<?php

class Uzytkownicy_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->db->query('SET NAMES utf8');
        //SET NAMES 'utf8' lub 'latin2';
    }
    
    public function dajUzytkownikow($idKonta) {
        $query = 'SELECT idKonta, login, uprawnienie, mail, liga, druzyna FROM konta WHERE idKonta != '.$idKonta;
        //$this->db->select('idKonta, login, uprawnienie, mail');
        //$query = $this->db->get('konta');
        $wynik = $this->db->query($query);
        return $wynik->result_array();
    }
    
    public function dajUzytkownika($idKonta) {
        $query = 'SELECT idKonta, login, uprawnienie, mail, liga, druzyna FROM konta WHERE idKonta = '.$idKonta;
        //$this->db->select('idKonta, login, uprawnienie, mail');
        //$query = $this->db->get('konta');
        $wynik = $this->db->query($query);
        return $wynik->result_array();
    }
    
    public function dodajUzytkownika($login, $uprawnienie, $email) {
        $query = 'INSERT INTO konta (login, haslo, uprawnienie, mail) VALUES ("'.$login.'", "haselko", "'.$uprawnienie.'", "'.$email.'")';
        $wynik = $this->db->query($query);
    }
    
    public function edytujUzytkownika($idKonta, $login, $uprawnienie, $email) {
        $query = 'UPDATE konta SET login="'.$login.'", uprawnienie="'.$uprawnienie.'", mail="'.$email.'" WHERE idKonta='.$idKonta;
        //$this->db->select('idKonta, login, uprawnienie, mail');
        //$query = $this->db->get('konta');
        $wynik = $this->db->query($query);
    }
    
    public function usunUzytkownika($idKonta) {
        $query = 'DELETE FROM konta WHERE idKonta='.$idKonta;
        $wynik = $this->db->query($query);
        //return $wynik->row();
    }
    
}
?>