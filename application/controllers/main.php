<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model('wpisy');
        }
    
	public function index()
	{
            $data['title'] = 'Tytu³';
            $data['description'] = 'To jest przyk³adowy opis.';
            $data['keywords'] = array('klucz1', 'klucz2', 'klucz3');
            $data['lang'] = 'pl';
            $data['wpisy'] = $this->wpisy->pobierz_newsy('strona');
            $this->load->view('szablony/default/header', $data);
            $this->load->view('szablony/default/menu');
            $this->load->view('szablony/default/main_view');
            $this->load->view('szablony/default/footer');
            $this->load->library('javascript');
            $this->javascript->hide("#MENU");
            
            //$this->jquery->hide('#trigger');
            //$this->
	}
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */
