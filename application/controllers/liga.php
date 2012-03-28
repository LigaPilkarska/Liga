<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Liga extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model('wpisy_model');
            $this->load->model('ligi_model');
            $this->load->model('druzyny_model');
        }
    
	public function index()
	{
            //$this->wpisy->wstaw_newsa('strona');
            $data['title'] = 'Tytuł';
            $data['description'] = 'To jest przykładowy opis.';
            $data['keywords'] = array('klucz1', 'klucz2', 'klucz3');
            $data['lang'] = 'pl';
            $data['ligi'] = $this->ligi_model->pobierz_ligi();
            $data['opcje'] = array('main/index'=>'Newsy', 'main/1'=>'Informacje o stronie', 'liga/index'=>'Ligi', 'main/2'=>'Kontakt');
            $this->load->view('szablony/default/header', $data);
            $this->load->view('szablony/default/menu');
            $this->load->view('szablony/default/lista_lig_view');
            $this->load->view('szablony/default/footer');
	}
        
        public function wybor($idLigi)
	{
            $data['title'] = 'Tytuł';
            $data['description'] = 'To jest przykładowy opis.';
            $data['keywords'] = array('klucz1', 'klucz2', 'klucz3');
            $data['lang'] = 'pl';
            $data['wpisy'] = $this->wpisy_model->pobierz_newsy('liga', $idLigi);
            $data['wpisy2'] = $this->wpisy_model->pobierz_newsy2('liga', $idLigi);
            $data['nazwa'] = $this->ligi_model->pobierzDane($idLigi);
            $data['opcje'] = array('liga/wybor/'.$idLigi=>'Newsy', 'main/1'=>'Informacje o stronie', 'liga/druzyny/'.$idLigi=>'Drużyny', 'mecz/mecze_ligi/'.$idLigi=>'Mecze', 'liga/tabela/'.$idLigi=>'Tabela');
            $this->load->view('szablony/default/header', $data);
            
            $this->load->view('szablony/default/menu');
            $this->load->view('szablony/default/liga_view');
            $this->load->view('szablony/default/main_view');
            $this->load->view('szablony/default/footer');
	}
        
        public function druzyny($idLigi)
	{
            $data['title'] = 'Tytuł';
            $data['description'] = 'To jest przykładowy opis.';
            $data['keywords'] = array('klucz1', 'klucz2', 'klucz3');
            $data['lang'] = 'pl';
            $data['druzyny'] = $this->druzyny_model->pobierzDruzyny($idLigi);
            $data['nazwa'] = $this->ligi_model->pobierzDane($idLigi);
            $data['opcje'] = array('liga/wybor/'.$idLigi=>'Newsy', 'main/1'=>'Informacje o stronie', 'liga/druzyny/'.$idLigi=>'Drużyny', 'mecz/mecze_ligi/'.$idLigi=>'Mecze', 'liga/tabela/'.$idLigi=>'Tabela');
            $this->load->view('szablony/default/header', $data);
            $this->load->view('szablony/default/menu');
            $this->load->view('szablony/default/liga_view');
            $this->load->view('szablony/default/lista_druzyn_view');
            $this->load->view('szablony/default/footer');
	}
        
        public function tabela($idLigi) {
            $data['title'] = 'Tytuł';
            $data['description'] = 'To jest przykładowy opis.';
            $data['keywords'] = array('klucz1', 'klucz2', 'klucz3');
            $data['lang'] = 'pl';
            $data['druzyny'] = $this->druzyny_model->pobierzTabele($idLigi);
            $data['nazwa'] = $this->ligi_model->pobierzDane($idLigi);
            $data['opcje'] = array('liga/wybor/'.$idLigi=>'Newsy', 'main/1'=>'Informacje o stronie', 'liga/druzyny/'.$idLigi=>'Drużyny', 'mecz/mecze_ligi/'.$idLigi=>'Mecze', 'liga/tabela/'.$idLigi=>'Tabela');
            $this->load->view('szablony/default/header', $data);
            $this->load->view('szablony/default/menu');
            $this->load->view('szablony/default/liga_view');
            $this->load->view('szablony/default/tabela_view');
            $this->load->view('szablony/default/footer');
        }
}

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
