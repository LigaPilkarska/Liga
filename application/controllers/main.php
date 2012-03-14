<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model('wpisy');
            $this->load->model('ligi');
            $this->load->model('druzyny');
            $this->load->model('konta');
        }
    
	public function index()
	{
            //$this->wpisy->wstaw_newsa('strona');
            $data['title'] = 'Ligi piłkarskie';
            $data['description'] = 'To jest przykładowy opis.';
            $data['keywords'] = array('klucz1', 'klucz2', 'klucz3');
            $data['lang'] = 'pl';
            $data['wpisy'] = $this->wpisy->pobierz_newsy('strona');
            $data['wpisy2'] = $this->wpisy->pobierz_newsy2('strona');
            $data['opcje'] = array('main/index'=>'Newsy', 'main/1'=>'Informacje o stronie', 'liga/index'=>'Ligi', 'main/2'=>'Kontakt');
            $this->load->view('szablony/default/header', $data);
            $this->load->view('szablony/default/menu');
            $this->load->view('szablony/default/main_view');
            $this->load->view('szablony/default/footer');
            $this->load->library('javascript');
            $this->javascript->hide("#MENU");
            
            //$this->jquery->hide('#trigger');
            //$this->
	}
        
        public function wpis($idWpisu){
            $data['wpisy'] = $this->wpisy->pobierz_wpis($idWpisu);
            foreach($data['wpisy'] as $temp){
                $data['title'] = $temp['tytul'].' - '.$temp['login'];
            }
            $data['description'] = 'To jest przykładowy opis.';
            $data['keywords'] = array('klucz1', 'klucz2', 'klucz3');
            $data['lang'] = 'pl';
            $data['opcje'] = array('main/index'=>'Newsy', 'main/1'=>'Informacje o stronie', 'liga/index'=>'Ligi', 'main/2'=>'Kontakt');
            $this->load->view('szablony/default/header', $data);
            $this->load->view('szablony/default/menu');
            $this->load->view('szablony/default/pokaz_wpis_view');
            $this->load->view('szablony/default/footer');
        }
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */
