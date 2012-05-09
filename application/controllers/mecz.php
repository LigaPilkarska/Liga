<?php

class Mecz extends CI_Controller {

        //var $id_Ligi;
        public function __construct() {
            parent::__construct();
            $this->load->model('mecze_model');
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
            //$this->id_Ligi = $this->uri->segment(3);
        }
        
        public function mecze_ligi($idLigi) {
            $data['title'] = 'Ligi piłkarskie';
            $data['description'] = 'To jest przykładowy opis.';
            $data['keywords'] = array('klucz1', 'klucz2', 'klucz3');
            $data['lang'] = 'pl';
            $data['idLigi'] = $idLigi;
            $data['mecze'] = $this->mecze_model->pobierz_mecze_ligi($idLigi);
            $data['opcje'] = array('liga/wybor/'.$idLigi=>lang('menu_option_news'), 'main/1'=>lang('menu_option_info'), 'liga/druzyny/'.$idLigi=>lang('menu_option_teams'), 'mecz/mecze_ligi/'.$idLigi=>lang('menu_option_matches'), 'liga/tabela/'.$idLigi=>lang('menu_option_table'));
            $this->load->view('szablony/default/header', $data);
            $this->load->view('szablony/default/menu');
            $this->load->view('szablony/default/mecze_view', $data);
            $this->load->view('szablony/default/footer');
        }
        
        public function mecze_druzyny($idDruzyny, $idLigi) {
            $data['title'] = 'Ligi piłkarskie';
            $data['description'] = 'To jest przykładowy opis.';
            $data['keywords'] = array('klucz1', 'klucz2', 'klucz3');
            $data['lang'] = 'pl';
            $data['mecze'] = $this->mecze_model->pobierz_mecze_druzyny($idDruzyny, $idLigi);
            foreach($data['mecze'] as $mecz) {
                $idLigi = $mecz['idLigi'];
            }
            $data['idLigi'] = $idLigi;
            $data['opcje'] = array('liga/wybor/'.$idLigi=>'Newsy', 'main/1'=>lang('menu_option_info'), 'liga/druzyny/'.$idLigi=>'Drużyny', 'mecz/mecze_ligi/'.$idLigi=>'Mecze');
            $this->load->view('szablony/default/header', $data);
            $this->load->view('szablony/default/menu');
            $this->load->view('szablony/default/mecze_view');
            $this->load->view('szablony/default/footer');
        }
        
        public function mecz_opis($idMeczu, $idLigi) {
            $data['title'] = 'Ligi piłkarskie';
            $data['description'] = 'To jest przykładowy opis.';
            $data['keywords'] = array('klucz1', 'klucz2', 'klucz3');
            $data['lang'] = 'pl';
            $data['mecz'] = $this->mecze_model->pobierz_mecz($idMeczu, $idLigi);
            
            $idLigi = $data['mecz']->idLigi;
            $idGospodarza = $data['mecz']->idGospodarza;
            $idGoscia = $data['mecz']->idGoscia;
                            
            $data['ucz_gosp'] = $this->mecze_model->pobierz_uczestnictwa($idGospodarza, $idMeczu, $idLigi);
            $data['ucz_gosc'] = $this->mecze_model->pobierz_uczestnictwa($idGoscia, $idMeczu, $idLigi);
            
            $data['wyd_gosp'] = $this->mecze_model->pobierz_wydarzenia($idGospodarza, $idMeczu, $idLigi);
            $data['wyd_gosc'] = $this->mecze_model->pobierz_wydarzenia($idGoscia, $idMeczu, $idLigi);
            
            $data['opcje'] = array('mecz/mecze_druzyny/'.$idGospodarza.'/'.$idLigi=>'Mecze gospodarza', 'mecz/mecze_druzyny/'.$idGoscia.'/'.$idLigi=>'Mecze gościa', 'mecz/mecze_ligi/'.$idLigi=>'Mecze w lidze');
            $this->load->view('szablony/default/header', $data);
            $this->load->view('szablony/default/menu');
            $this->load->view('szablony/default/mecz_view');
            $this->load->view('szablony/default/footer');
        }
}
?>
