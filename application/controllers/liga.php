<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Liga extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model('wpisy_model');
            $this->load->model('ligi_model');
            $this->load->model('druzyny_model');
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
            $data['title'] = 'Tytuł';
            $data['description'] = 'To jest przykładowy opis.';
            $data['keywords'] = array('klucz1', 'klucz2', 'klucz3');
            $data['lang'] = 'pl';
            $data['ligi'] = $this->ligi_model->pobierz_ligi();
            $data['opcje'] = array('main/index'=>lang('menu_option_news'), 'main/1'=> lang('menu_option_info'), 'liga/index'=>lang('menu_option_league'), 'main/2'=>lang('menu_option_contact'));
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
            $data['idLigi'] = $idLigi;
            $data['wpisy'] = $this->wpisy_model->pobierz_newsy('liga', $idLigi);
            $data['wpisy2'] = $this->wpisy_model->pobierz_newsy2('liga', $idLigi);
            $data['nazwa'] = $this->ligi_model->pobierzDane($idLigi);
            $data['opcje'] = array('liga/wybor/'.$idLigi=>lang('menu_option_news'), 'main/1'=>lang('menu_option_info'), 'liga/druzyny/'.$idLigi=>lang('menu_option_teams'), 'mecz/mecze_ligi/'.$idLigi=>lang('menu_option_matches'), 'liga/tabela/'.$idLigi=>lang('menu_option_table'));
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
            $data['opcje'] = array('liga/wybor/'.$idLigi=>lang('menu_option_news'), 'main/1'=>lang('menu_option_info'), 'liga/druzyny/'.$idLigi=>lang('menu_option_teams'), 'mecz/mecze_ligi/'.$idLigi=>lang('menu_option_matches'), 'liga/tabela/'.$idLigi=>lang('menu_option_table'));
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
            $data['opcje'] = array('liga/wybor/'.$idLigi=>lang('menu_option_news'), 'main/1'=>lang('menu_option_info'), 'liga/druzyny/'.$idLigi=>lang('menu_option_teams'), 'mecz/mecze_ligi/'.$idLigi=>lang('menu_option_matches'), 'liga/tabela/'.$idLigi=>lang('menu_option_table'));
            $this->load->view('szablony/default/header', $data);
            $this->load->view('szablony/default/menu');
            $this->load->view('szablony/default/liga_view');
            $this->load->view('szablony/default/tabela_view');
            $this->load->view('szablony/default/footer');
        }
        
        public function dodajNews($liga) {
            $login = $this->input->post('login_input');
            $email = $this->input->post('email_input');
            $this->wpisy_model->wstaw_newsa_liga($login, $email, $liga);
            redirect(base_url().'index.php/liga/wybor/'.$liga);
        }
}

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
