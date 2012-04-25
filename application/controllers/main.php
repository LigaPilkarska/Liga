<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model('wpisy_model');
            $this->load->model('ligi_model');
            $this->load->model('druzyny_model');
            $this->load->model('konta_model');
        }
    
	public function index()
	{
            //$this->wpisy->wstaw_newsa('strona');
            $data['title'] = 'Ligi piłkarskie';
            $data['description'] = 'To jest przykładowy opis.';
            $data['keywords'] = array('klucz1', 'klucz2', 'klucz3');
            $data['lang'] = 'pl';
            $data['wpisy'] = $this->wpisy_model->pobierz_newsy('strona');
            $data['wpisy2'] = $this->wpisy_model->pobierz_newsy2('strona');
            $data['opcje'] = array('main/index'=>'Newsy', 'main/1'=>'Informacje o stronie', 'liga/index'=>'Ligi', 'main/2'=>'Kontakt');
            $this->load->view('szablony/default/header', $data);
            $this->load->view('szablony/default/menu');
            $this->load->view('szablony/default/main_view');
            $this->load->view('szablony/default/footer');
	}
        
        public function wpis($idWpisu){
            $data['wpisy'] = $this->wpisy_model->pobierz_wpis($idWpisu);
            $data['komentarze'] = $this->wpisy_model->pobierz_komentarze($idWpisu);
            foreach($data['wpisy'] as $temp){
                $data['title'] = $temp['tytul'].' - '.$temp['login'];
            }
            $data['description'] = 'To jest przyk�adowy opis.';
            $data['keywords'] = array('klucz1', 'klucz2', 'klucz3');
            $data['lang'] = 'pl';
            
            foreach($data['wpisy'] as $wpis) {
                $idLigi = $wpis['idLigi'];
                $idDruzyny = $wpis['idDruzyny'];
            }
            if($idLigi!=NULL)
                $data['opcje'] = array('liga/wybor/'.$idLigi=>'Newsy', 'main/1'=>'Informacje o stronie', 'liga/druzyny/'.$idLigi=>'Drużyny');
            elseif($idDruzyny!=NULL)
                $data['opcje'] = array('druzyna/wybor/'.$idDruzyny=>'Newsy', 'main/1'=>'Informacje o drużynie', 'druzya'.$idDruzyny=>'Zawodnicy', 'main/2'=>'Rozegrane mecze');
            else
                $data['opcje'] = array('main/index'=>'Newsy', 'main/1'=>'Informacje o stronie', 'liga/index'=>'Ligi', 'main/2'=>'Kontakt');  
            
            $this->load->view('szablony/default/header', $data);
            $this->load->view('szablony/default/menu');
            $this->load->view('szablony/default/pokaz_wpis_view');
            $this->load->view('szablony/default/footer');
        }
        
        public function dodajNews() {
            $login = $this->input->post('login_input');
            $email = $this->input->post('email_input');
            $this->wpisy_model->wstaw_newsa($login, $email);
            redirect(base_url().'index.php/main/index');
        }
        
        function usunNews($idWpisu){
            echo 'dziala';
            $this->wpisy_model->usun_wpis($idWpisu);
        }
        
        public function dodajKomentarz($idWpisu) {
            $login = $this->input->post('login_input');
            $email = $this->input->post('email_input');
            $this->wpisy_model->wstaw_komentarz($login, $email, $idWpisu);
            redirect(base_url().'index.php/main/wpis/'.$idWpisu);
        }
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */
