<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Druzyna extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model('wpisy');
            $this->load->model('druzyny');
        }
    
         public function wybor($idDruzyny)
	{
            $data['title'] = 'Tytu³';
            $data['description'] = 'To jest przyk³adowy opis.';
            $data['keywords'] = array('klucz1', 'klucz2', 'klucz3');
            $data['lang'] = 'pl';
            $data['wpisy'] = $this->wpisy->pobierz_newsy('liga', $idDruzyny);
            $data['wpisy2'] = $this->wpisy->pobierz_newsy2('liga', $idDruzyny);
            $data['nazwa'] = $this->druzyny->pobierzDane($idDruzyny);
            $this->load->view('szablony/default/header', $data);
            $this->load->view('szablony/default/menu');
            $this->load->view('szablony/default/druzyna_view');
            $this->load->view('szablony/default/main_view');
            $this->load->view('szablony/default/footer');
	}
}
?>