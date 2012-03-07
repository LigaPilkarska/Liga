<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

<<<<<<< HEAD
        public function __construct() {
            parent::__construct();
            $this->load->model('wpisy');
        }
=======
    public function __construct() {
        parent::__construct();
        $this->load->model('news_model');
    }
>>>>>>> 8834cc93c248b105102c497a02c2c7a7308a1836
    
	public function index()
	{
            $data['title'] = 'Tytu³';
            $data['description'] = 'To jest przyk³adowy opis.';
            $data['keywords'] = array('klucz1', 'klucz2', 'klucz3');
            $data['lang'] = 'pl';
<<<<<<< HEAD
            $data['wpisy'] = $this->wpisy->pobierz_newsy('strona');
            $this->load->view('szablony/default/header', $data);
            $this->load->view('szablony/default/menu');
            $this->load->view('szablony/default/main_view');
=======
            $data['wpisy'] = $this->news_model->pobierz_newsy('strona');
            $this->load->view('szablony/default/header', $data);
            $this->load->view('szablony/default/menu');
            $this->load->view('szablony/default/main_view', $data);
>>>>>>> 8834cc93c248b105102c497a02c2c7a7308a1836
            $this->load->view('szablony/default/footer');
            $this->load->library('javascript');
            $this->javascript->hide("#MENU");
            
            //$this->jquery->hide('#trigger');
            //$this->
	}
}

