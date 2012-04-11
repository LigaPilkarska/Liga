<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Druzyna extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model('wpisy_model');
            $this->load->model('druzyny_model');
            $this->load->model('zawodnicy_model');
            $this->load->model('ligi_model');
        }
    
         public function wybor($idDruzyny)
	{
            $data['title'] = 'Tytuł';
            $data['description'] = 'To jest przykładowy opis.';
            $data['keywords'] = array('klucz1', 'klucz2', 'klucz3');
            $data['lang'] = 'pl';
            $data['wpisy'] = $this->wpisy_model->pobierz_newsy('druzyna', $idDruzyny);
            $data['wpisy2'] = $this->wpisy_model->pobierz_newsy2('druzyna', $idDruzyny);
            $data['nazwa'] = $this->druzyny_model->pobierzDane($idDruzyny);
            foreach($data['nazwa'] as $wpis) {
                $idLigi = $wpis['idLigi'];
            }
            $data['opcje'] = array('druzyna/wybor/'.$idDruzyny=>'Newsy', 'druzyna/info/'.$idDruzyny=>'Informacje o drużynie', 'druzyna/zawodnicy/'.$idDruzyny=>'Zawodnicy', 'mecz/mecze_druzyny/'.$idDruzyny.'/'.$idLigi=>'Rozegrane mecze', 'liga/druzyny/'.$idLigi=>'Drużyny');
            $this->load->view('szablony/default/header', $data);
            $this->load->view('szablony/default/menu');
            $this->load->view('szablony/default/druzyna_view');
            $this->load->view('szablony/default/main_view');
            $this->load->view('szablony/default/footer');
	}
        
        public function zawodnicy($idDruzyny) {
            $data['title'] = 'Tytuł';
            $data['description'] = 'To jest przykładowy opis.';
            $data['keywords'] = array('klucz1', 'klucz2', 'klucz3');
            $data['lang'] = 'pl';
            $data['dr'] = $this->druzyny_model->pobierzDane($idDruzyny);
            foreach($data['dr'] as $wpis) {
                $idLigi = $wpis['idLigi'];
            }
            $data['idLigi'] = $idLigi;
            $data['zawodnicy'] = $this->zawodnicy_model->pobierz_zawodnikow($idDruzyny, $idLigi);
            $data['opcje'] = array('druzyna/wybor/'.$idDruzyny=>'Newsy', 'druzyna/info/'.$idDruzyny=>'Informacje o drużynie', 'druzyna/zawodnicy/'.$idDruzyny=>'Zawodnicy', 'mecz/mecze_druzyny/'.$idDruzyny.'/'.$idLigi=>'Rozegrane mecze', 'liga/druzyny/'.$idLigi=>'Drużyny');
            $this->load->view('szablony/default/header', $data);
            $this->load->view('szablony/default/menu');
            $this->load->view('szablony/default/lista_zawodnikow_view');
            $this->load->view('szablony/default/footer');
        }
        
        public function info($idDruzyny) {
            $data['title'] = 'Tytuł';
            $data['description'] = 'To jest przykładowy opis.';
            $data['keywords'] = array('klucz1', 'klucz2', 'klucz3');
            $data['lang'] = 'pl';
            $data['druzyna'] = $this->druzyny_model->pobierzDane($idDruzyny);
            foreach($data['druzyna'] as $wpis) {
                $idLigi = $wpis['idLigi'];
            }
            $data['liga'] = $this->ligi_model->pobierzDane($idLigi);
            $data['opcje'] = array('druzyna/wybor/'.$idDruzyny=>'Newsy', 'druzyna/info/'.$idDruzyny=>'Informacje o drużynie', 'druzyna/zawodnicy/'.$idDruzyny=>'Zawodnicy', 'main/2'=>'Rozegrane mecze', 'liga/druzyny/'.$idLigi=>'Drużyny');
            $this->load->view('szablony/default/header', $data);
            $this->load->view('szablony/default/menu');
            $this->load->view('szablony/default/druzyna_opis_view');
            $this->load->view('szablony/default/footer');
        }
}
?>