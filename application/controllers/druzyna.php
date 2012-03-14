<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Druzyna extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model('wpisy');
            $this->load->model('druzyny');
            $this->load->model('zawodnicy');
        }
    
         public function wybor($idDruzyny)
	{
            $data['title'] = 'Tytu³';
            $data['description'] = 'To jest przyk³adowy opis.';
            $data['keywords'] = array('klucz1', 'klucz2', 'klucz3');
            $data['lang'] = 'pl';
            $data['wpisy'] = $this->wpisy->pobierz_newsy('druzyna', $idDruzyny);
            $data['wpisy2'] = $this->wpisy->pobierz_newsy2('druzyna', $idDruzyny);
            $data['nazwa'] = $this->druzyny->pobierzDane($idDruzyny);
            $data['opcje'] = array('druzyna/wybor/'.$idDruzyny=>'Newsy', 'main/1'=>'Informacje o dru¿ynie', 'druzyna/zawodnicy/'.$idDruzyny=>'Zawodnicy', 'main/2'=>'Rozegrane mecze', 'liga/index'=>'Ligi');
            $this->load->view('szablony/default/header', $data);
            $this->load->view('szablony/default/menu');
            $this->load->view('szablony/default/druzyna_view');
            $this->load->view('szablony/default/main_view');
            $this->load->view('szablony/default/footer');
	}
        
        public function zawodnicy($idDruzyny) {
            $data['title'] = 'Tytu³';
            $data['description'] = 'To jest przyk³adowy opis.';
            $data['keywords'] = array('klucz1', 'klucz2', 'klucz3');
            $data['lang'] = 'pl';
            $data['zawodnicy'] = $this->zawodnicy->pobierz_zawodnikow($idDruzyny);
            $data['opcje'] = array('druzyna/wybor/'.$idDruzyny=>'Newsy', 'main/1'=>'Informacje o dru¿ynie', 'druzyna/zawodnicy/'.$idDruzyny=>'Zawodnicy', 'main/2'=>'Rozegrane mecze', 'liga/index'=>'Ligi');
            $this->load->view('szablony/default/header', $data);
            $this->load->view('szablony/default/menu');
            $this->load->view('szablony/default/lista_zawodnikow');
            $this->load->view('szablony/default/main_view');
            $this->load->view('szablony/default/footer');
        }
}
?>