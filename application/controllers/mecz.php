<?php

class Mecz extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model('mecze_model');
        }
        
        public function mecze_ligi($idLigi) {
            $data['title'] = 'Ligi piłkarskie';
            $data['description'] = 'To jest przykładowy opis.';
            $data['keywords'] = array('klucz1', 'klucz2', 'klucz3');
            $data['lang'] = 'pl';
            $data['mecze'] = $this->mecze_model->pobierz_mecze_ligi($idLigi);
            $data['opcje'] = array('liga/wybor/'.$idLigi=>'Newsy', 'main/1'=>'Informacje o stronie', 'liga/druzyny/'.$idLigi=>'Drużyny', 'mecz/mecze_ligi/'.$idLigi=>'Mecze', 'liga/tabela/'.$idLigi=>'Tabela');
            $this->load->view('szablony/default/header', $data);
            $this->load->view('szablony/default/menu');
            $this->load->view('szablony/default/mecze_view');
            $this->load->view('szablony/default/footer');
        }
        
        public function mecze_druzyny($idDruzyny) {
            $data['title'] = 'Ligi piłkarskie';
            $data['description'] = 'To jest przykładowy opis.';
            $data['keywords'] = array('klucz1', 'klucz2', 'klucz3');
            $data['lang'] = 'pl';
            $data['mecze'] = $this->mecze_model->pobierz_mecze_druzyny($idDruzyny);
            foreach($data['mecze'] as $mecz) {
                $idLigi = $mecz['idLigi'];
            }
            $data['opcje'] = array('liga/wybor/'.$idLigi=>'Newsy', 'main/1'=>'Informacje o stronie', 'liga/druzyny/'.$idLigi=>'Drużyny', 'mecz/mecze_ligi/'.$idLigi=>'Mecze');
            $this->load->view('szablony/default/header', $data);
            $this->load->view('szablony/default/menu');
            $this->load->view('szablony/default/mecze_view');
            $this->load->view('szablony/default/footer');
        }
        
        public function mecz_opis($idMeczu) {
            $data['title'] = 'Ligi piłkarskie';
            $data['description'] = 'To jest przykładowy opis.';
            $data['keywords'] = array('klucz1', 'klucz2', 'klucz3');
            $data['lang'] = 'pl';
            $data['mecz'] = $this->mecze_model->pobierz_mecz($idMeczu);
            
            $idLigi = $data['mecz']->idLigi;
            $idGospodarza = $data['mecz']->idGospodarza;
            $idGoscia = $data['mecz']->idGoscia;
                            
            $data['ucz_gosp'] = $this->mecze_model->pobierz_uczestnictwa($idGospodarza, $idMeczu);
            $data['ucz_gosc'] = $this->mecze_model->pobierz_uczestnictwa($idGoscia, $idMeczu);
            
            $data['wyd_gosp'] = $this->mecze_model->pobierz_wydarzenia($idGospodarza, $idMeczu);
            $data['wyd_gosc'] = $this->mecze_model->pobierz_wydarzenia($idGoscia, $idMeczu);
            
            $data['opcje'] = array('mecz/mecze_druzyny/'.$idGospodarza=>'Mecze gospodarza', 'mecz/mecze_druzyny/'.$idGoscia=>'Mecze gościa', 'mecz/mecze_ligi/'.$idLigi=>'Mecze w lidze');
            $this->load->view('szablony/default/header', $data);
            $this->load->view('szablony/default/menu');
            $this->load->view('szablony/default/mecz_view');
            $this->load->view('szablony/default/footer');
        }
}
?>
