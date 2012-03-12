<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Liga extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model('wpisy');
            $this->load->model('ligi');
            $this->load->model('druzyny');
        }
    
	public function index()
	{
            //$this->wpisy->wstaw_newsa('strona');
            $data['title'] = 'Tytu³';
            $data['description'] = 'To jest przyk³adowy opis.';
            $data['keywords'] = array('klucz1', 'klucz2', 'klucz3');
            $data['lang'] = 'pl';
            $data['ligi'] = $this->ligi->pobierz_ligi();
            $this->load->view('szablony/default/header', $data);
            $this->load->view('szablony/default/menu');
            $this->load->view('szablony/default/lista_lig');
            $this->load->view('szablony/default/footer');
	}
        
        public function wybor($idLigi)
	{
            $data['title'] = 'Tytu³';
            $data['description'] = 'To jest przyk³adowy opis.';
            $data['keywords'] = array('klucz1', 'klucz2', 'klucz3');
            $data['lang'] = 'pl';
            $data['wpisy'] = $this->wpisy->pobierz_newsy('liga', $idLigi);
            $data['wpisy2'] = $this->wpisy->pobierz_newsy2('liga', $idLigi);
            $data['nazwa'] = $this->ligi->pobierzDane($idLigi);
            $this->load->view('szablony/default/header', $data);
            
            $this->load->view('szablony/default/menu');
            $this->load->view('szablony/default/liga_view');
            $this->load->view('szablony/default/main_view');
            $this->load->view('szablony/default/footer');
	}
        
        public function druzyny($idLigi)
	{
            $data['title'] = 'Tytu³';
            $data['description'] = 'To jest przyk³adowy opis.';
            $data['keywords'] = array('klucz1', 'klucz2', 'klucz3');
            $data['lang'] = 'pl';
            $data['druzyny'] = $this->druzyny->pobierzDruzyny($idLigi);
            $data['nazwa'] = $this->ligi->pobierzDane($idLigi);
            $this->load->view('szablony/default/header', $data);
            $this->load->view('szablony/default/menu');
            $this->load->view('szablony/default/liga_view');
            $this->load->view('szablony/default/lista_druzyn');
            $this->load->view('szablony/default/footer');
	}
}

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
