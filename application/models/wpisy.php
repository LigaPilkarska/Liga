<?php

class Wpisy extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->db->query('SET NAMES latin2');
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
    
    public function wstaw_newsa($slug='strona'){
        if($slug=='strona') {
            $data = array(
    'tytul' => 'Wódka, papierochy i drugi' ,
    'wpis' => 'ble ble lbe lsa ajs asjkg asj gnajs gnasj ngas; asl; gasl glasg ajsng jasn gjasn jgnas g
         akdgladn gladk gmadlk gmladk mgadl mgdam gkad mgkadmk gmadk; gmad; g
         sa ka gjah gja kglad gjadj ghjadh gjadhj ghjadh gjadh gjdah jg adgh jadh gkjadhg kjhadjk hgjadhj 
         ajdghkjadhgk adj gad eia er ea jgieaj hgeq ojkehqij hi al;igj aw jgiawj giajw igjaiijij [ alga g
         ljlh tro h[ uk, lhmi tm;j;lkmj ae fkae la;fhm karm h;ae p[hgakeh;ae h;ea]' ,
    'idKonta' => 1);

            $this->db->insert('wpisy', $data);
        }
    }
}
?>