<?php

class Zawodnik extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model('zawodnicy_model');
            $this->load->model('druzyny_model');
            
        }
        
        public function wybor($idZawodnika) {
            $data['title'] = 'Tytuł';
            $data['description'] = 'To jest przykładowy opis.';
            $data['keywords'] = array('klucz1', 'klucz2', 'klucz3');
            $data['lang'] = 'pl';
            $data['zawodnik'] = $this->zawodnicy_model->pobierz_zawodnika($idZawodnika);
            foreach($data['zawodnik'] as $zawodnik) {
                $idDruzyny = $zawodnik['idDruzyny'];
            }
            $data['druzyna'] = $this->druzyny_model->pobierzDane($idDruzyny);
            $data['opcje'] = array('druzyna/wybor/'.$idDruzyny=>'Newsy', 'main/1'=>'Informacje o drużynie', 'druzyna/zawodnicy/'.$idDruzyny=>'Zawodnicy', 'main/2'=>'Rozegrane mecze');
            $this->load->view('szablony/default/header', $data);
            $this->load->view('szablony/default/menu');
            $this->load->view('szablony/default/zawodnik_view');
            $this->load->view('szablony/default/footer');
        }
}
?>
