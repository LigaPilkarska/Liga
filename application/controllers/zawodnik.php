<?php

class Zawodnik extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model('zawodnicy_model');
            $this->load->model('druzyny_model');
            if(isset($_COOKIE['sitelang']) && $_COOKIE['sitelang']=='eng'){
                $this->lang->load('menu', 'english');
                $this->lang->load('news', 'english');
            }
            else {
                $this->lang->load('menu', 'polish');
                $this->lang->load('news', 'polish');
            }
            $this->load->helper('language');
            
        }
        
        public function wybor($idZawodnika, $idLigi) {
            $data['title'] = 'Tytuł';
            $data['description'] = 'To jest przykładowy opis.';
            $data['keywords'] = array('klucz1', 'klucz2', 'klucz3');
            $data['lang'] = 'pl';
            $data['zawodnik'] = $this->zawodnicy_model->pobierz_zawodnika($idZawodnika, $idLigi);
            foreach($data['zawodnik'] as $zawodnik) {
                $idDruzyny = $zawodnik['idDruzyny'];
            }
            $data['druzyna'] = $this->druzyny_model->pobierzDane($idDruzyny);
            $data['opcje'] = array('druzyna/wybor/'.$idDruzyny=>'Newsy', 'druzyna/info/'.$idDruzyny=>'Informacje o drużynie', 'druzyna/zawodnicy/'.$idDruzyny=>'Zawodnicy', 'mecz/mecze_druzyny/'.$idDruzyny.'/'.$idLigi=>'Rozegrane mecze');
            $this->load->view('szablony/default/header', $data);
            $this->load->view('szablony/default/menu');
            $this->load->view('szablony/default/zawodnik_view');
            $this->load->view('szablony/default/footer');
        }
}
?>
