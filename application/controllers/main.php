<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model('wpisy_model');
            $this->load->model('ligi_model');
            $this->load->model('druzyny_model');
            $this->load->model('konta_model');
            if(isset($_COOKIE['sitelang']) && $_COOKIE['sitelang']=='eng'){
                $this->lang->load('menu', 'english');
                $this->lang->load('news', 'english');
                $this->lang->load('header', 'english');
            }
            else {
                $this->lang->load('menu', 'polish');
                $this->lang->load('news', 'polish');
                $this->lang->load('header', 'polish');
            }
            $this->load->helper('language');
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
            $data['opcje'] = array('main/index'=>lang('menu_option_news'), 'main/1'=> lang('menu_option_info'), 'liga/index'=>lang('menu_option_league'), 'main/2'=>lang('menu_option_contact'));
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
                $data['opcje'] = array('liga/wybor/'.$idLigi=>lang('menu_option_news'), 'main/1'=>lang('menu_option_info'), 'liga/druzyny/'.$idLigi=>lang('menu_option_teams'));
            elseif($idDruzyny!=NULL)
                $data['opcje'] = array('druzyna/wybor/'.$idDruzyny=>lang('menu_option_news'), 'main/1'=>lang('menu_option_infoteam'), 'druzya'.$idDruzyny=>lang('menu_option_players'), 'main/2'=>lang('menu_option_playedmatches'));
            else
                $data['opcje'] = array('main/index'=>lang('menu_option_news'), 'main/1'=> lang('menu_option_info'), 'liga/index'=>lang('menu_option_league'), 'main/2'=>lang('menu_option_contact'));  
            
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
        
        public function edytujWpisy($idWpisu){
            $data['title'] = 'Panel Administracyjny - dodaj/usuń wpis';
            $data['description'] = 'To jest przykładowy opis.';
            $data['keywords'] = array('klucz1', 'klucz2', 'klucz3');
            $data['lang'] = 'pl';
            $data['wpis'] = $this->wpisy_model->dajWpis($idWpisu);
            
            $data['opcje'] = array('main/index'=>lang('menu_option_news'), 'main/1'=> lang('menu_option_info'), 'liga/index'=>lang('menu_option_league'), 'main/2'=>lang('menu_option_contact'));
            $this->load->view('szablony/default/header', $data);
            $this->load->view('szablony/default/menu');
            $this->load->view('szablony/default/zarzadzaj_wpisami_view');
            $this->load->view('szablony/default/footer');
        }
        
        function edytujWpis($idWpisu){
            $login = $this->input->post('login_input');
            $email = $this->input->post('email_input');
            $this->wpisy_model->edytujWpis($idWpisu, $login, $email);
            redirect(base_url().'index.php/main/wpis/'.$idWpisu);
        }
        
        function usunNews($idWpisu){
            echo 'dziala';
            $this->wpisy_model->usun_wpis($idWpisu);
        }
        
        public function dodajKomentarz($idWpisu) {
            $autor = $this->input->post('autor_input');
            $komentarz = $this->input->post('komentarz_input');
            
            $czyZalogowany = $this->session->userdata('login');
            if(!isset($czyZalogowany) || $czyZalogowany == '')
                $autor = '#'.$this->input->post('autor_input');
                
            $this->wpisy_model->wstaw_komentarz($autor, $komentarz, $idWpisu);
            redirect(base_url().'index.php/main/wpis/'.$idWpisu);
        }
        
        public function edytujKomentarz($idWpisu){
            $data['title'] = 'Panel Administracyjny - dodaj/usuń komentarz';
            $data['description'] = 'To jest przykładowy opis.';
            $data['keywords'] = array('klucz1', 'klucz2', 'klucz3');
            $data['lang'] = 'pl';
            $data['komentarz'] = $this->wpisy_model->dajKomentarz($idWpisu);
            
            $data['opcje'] = array('main/index'=>lang('menu_option_news'), 'main/1'=> lang('menu_option_info'), 'liga/index'=>lang('menu_option_league'), 'main/2'=>lang('menu_option_contact'));
            $this->load->view('szablony/default/header', $data);
            $this->load->view('szablony/default/menu');
            $this->load->view('szablony/default/zarzadzaj_kom_view');
            $this->load->view('szablony/default/footer');
        }
        
        function edytujKomentarze($idKom, $idWpisu){
            $login = $this->input->post('login_input');
            $email = $this->input->post('email_input');
            $this->wpisy_model->edytujKomentarz($idKom, $login, $email);
            redirect(base_url().'index.php/main/wpis/'.$idWpisu);
        }
        
        function usunKomentarz($idKomentarza){
            $this->wpisy_model->usun_komentarz($idKomentarza);
        }
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */
