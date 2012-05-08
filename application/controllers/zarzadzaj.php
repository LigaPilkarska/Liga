<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of zarzadzaj
 *
 * @author Izuk
 */
class Zarzadzaj extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model('uzytkownicy_model');
            $this->load->model('ligi_model');
            $this->load->model('druzyny_model');
            if(isset($_COOKIE['sitelang']) && $_COOKIE['sitelang']=='eng'){
                $this->lang->load('menu', 'english');
                $this->lang->load('news', 'english');
            }
            else {
                $this->lang->load('menu', 'polish');
                $this->lang->load('news', 'polish');
            }
            $this->load->helper('language');
            
        }
        
        public function index() {
            $data['title'] = 'Ligi piłkarskie - panel administracyjny';
            $data['description'] = 'To jest przykładowy opis.';
            $data['keywords'] = array('klucz1', 'klucz2', 'klucz3');
            $data['lang'] = 'pl';
            $data['opcje'] = array('main/index'=>'Newsy', 'main/1'=>lang('menu_option_info'), 'liga/index'=>'Ligi', 'main/2'=>'Kontakt');
            $this->load->view('szablony/default/header', $data);
            $this->load->view('szablony/default/menu');
            $this->load->view('szablony/default/zarzadzaj_view');
            $this->load->view('szablony/default/footer');
        }
        
        public function uzytkownicy() {
            $data['title'] = 'Panel Administracyjny - zarządzaj użytkownikami';
            $data['description'] = 'To jest przykładowy opis.';
            $data['keywords'] = array('klucz1', 'klucz2', 'klucz3');
            $data['lang'] = 'pl';
            $data['uzytkownicy'] = $this->uzytkownicy_model->dajUzytkownikow($this->session->userdata('konto_id'));
            $data['opcje'] = array('main/index'=>'Newsy', 'main/1'=>lang('menu_option_info'), 'liga/index'=>'Ligi', 'main/2'=>'Kontakt');
            $this->load->view('szablony/default/header', $data);
            $this->load->view('szablony/default/menu');
            $this->load->view('szablony/default/zarzadzaj_uzytk_view');
            $this->load->view('szablony/default/footer');
        }
        
        public function uzytkownik($idKonta=-1) {
            $data['title'] = 'Panel Administracyjny - dodaj/usuń użytkownika';
            $data['description'] = 'To jest przykładowy opis.';
            $data['keywords'] = array('klucz1', 'klucz2', 'klucz3');
            $data['lang'] = 'pl';
            $data['uzytkownicy'] = $this->uzytkownicy_model->dajUzytkownikow($this->session->userdata('konto_id'));
            $data['ligi'] = $this->ligi_model->pobierz_ligi();
            $data['druzyny'] = $this->druzyny_model->dajWszystkieDruzyny();
            
                $data['uzytkownik'] = $this->uzytkownicy_model->dajUzytkownika($idKonta);
            $data['opcje'] = array('main/index'=>'Newsy', 'main/1'=>lang('menu_option_info'), 'liga/index'=>'Ligi', 'main/2'=>'Kontakt');
            $this->load->view('szablony/default/header', $data);
            $this->load->view('szablony/default/menu');
            $this->load->view('szablony/default/zarzadzaj_uzytk_view');
            $this->load->view('szablony/default/footer');
        }
        
        function dodajUzytk(){
            $login = $this->input->post('login_input');
            $uprawnienie = $this->input->post('uprawnienie_select');
            $email = $this->input->post('email_input');
            $this->uzytkownicy_model->dodajUzytkownika($login, $uprawnienie, $email);
            redirect(base_url().'index.php/zarzadzaj/uzytkownicy');
        }
        
        function edytujUzytk($idUzytk){
            $login = $this->input->post('login_input');
            $uprawnienie = $this->input->post('uprawnienie_select');
            $email = $this->input->post('email_input');
            $this->uzytkownicy_model->edytujUzytkownika($idUzytk, $login, $uprawnienie, $email);
            redirect(base_url().'index.php/zarzadzaj/uzytkownicy');
        }
        
        function usunUzytk($idUzytk){
            $this->uzytkownicy_model->usunUzytkownika($idUzytk);
        }
        
        public function ligi() {
            $data['title'] = 'Panel Administracyjny - zarządzaj ligami';
            $data['description'] = 'To jest przykładowy opis.';
            $data['keywords'] = array('klucz1', 'klucz2', 'klucz3');
            $data['lang'] = 'pl';
            $data['ligi'] = $this->ligi_model->pobierz_ligi();
            $data['opcje'] = array('main/index'=>'Newsy', 'main/1'=>lang('menu_option_info'), 'liga/index'=>'Ligi', 'main/2'=>'Kontakt');
            $this->load->view('szablony/default/header', $data);
            $this->load->view('szablony/default/menu');
            $this->load->view('szablony/default/zarzadzaj_ligami_view');
            $this->load->view('szablony/default/footer');
        }
        
        public function liga($idLigi=-1) {
            $data['title'] = 'Panel Administracyjny - dodaj/usuń ligę';
            $data['description'] = 'To jest przykładowy opis.';
            $data['keywords'] = array('klucz1', 'klucz2', 'klucz3');
            $data['lang'] = 'pl';
            $data['ligi'] = $this->ligi_model->pobierz_ligi();
           // $data['druzyny'] = $this->druzyny_model->dajWszystkieDruzyny();
            
            $data['liga'] = $this->ligi_model->dajLige($idLigi);
            $data['opcje'] = array('main/index'=>'Newsy', 'main/1'=>lang('menu_option_info'), 'liga/index'=>'Ligi', 'main/2'=>'Kontakt');
            $this->load->view('szablony/default/header', $data);
            $this->load->view('szablony/default/menu');
            $this->load->view('szablony/default/zarzadzaj_ligami_view');
            $this->load->view('szablony/default/footer');
        }
        
        function dodajLige(){
            $wojewodztwo = $this->input->post('wojewodztwo_select');
            $klasa = $this->input->post('klasa_select');
            $grupa = $this->input->post('grupa_input');
            $rok = $this->input->post('rok_input');
            $this->ligi_model->dodajLige($wojewodztwo, $klasa, $grupa, $rok);
            redirect(base_url().'index.php/zarzadzaj/ligi');
        }
        
        function edytujLige($idLigi){
            $wojewodztwo = $this->input->post('wojewodztwo_select');
            $klasa = $this->input->post('klasa_select');
            $grupa = $this->input->post('grupa_input');
            $rok = $this->input->post('rok_input');
            $this->ligi_model->edytujLige($idLigi, $wojewodztwo, $klasa, $grupa, $rok);
            redirect(base_url().'index.php/zarzadzaj/ligi');
        }
        
        function usunLige($idLigi){
            $this->ligi_model->usunLige($idLigi);
        }
        
        public function druzyny() {
            $data['title'] = 'Panel Administracyjny - zarządzaj drużynami';
            $data['description'] = 'To jest przykładowy opis.';
            $data['keywords'] = array('klucz1', 'klucz2', 'klucz3');
            $data['lang'] = 'pl';
            $data['druzyny'] = $this->druzyny_model->dajWszystkieDruzyny();
            $data['opcje'] = array('main/index'=>'Newsy', 'main/1'=>lang('menu_option_info'), 'liga/index'=>'Ligi', 'main/2'=>'Kontakt');
            $this->load->view('szablony/default/header', $data);
            $this->load->view('szablony/default/menu');
            $this->load->view('szablony/default/zarzadzaj_druz_view');
            $this->load->view('szablony/default/footer');
        }
        
        public function druzyna($idDruzyny=-1) {
            $data['title'] = 'Panel Administracyjny - dodaj/usuń drużynę';
            $data['description'] = 'To jest przykładowy opis.';
            $data['keywords'] = array('klucz1', 'klucz2', 'klucz3');
            $data['lang'] = 'pl';            
            $data['druzyna'] = $this->druzyny_model->dajDruzyne($idDruzyny);
            $data['opcje'] = array('main/index'=>'Newsy', 'main/1'=>lang('menu_option_info'), 'liga/index'=>'Ligi', 'main/2'=>'Kontakt');
            $this->load->view('szablony/default/header', $data);
            $this->load->view('szablony/default/menu');
            $this->load->view('szablony/default/zarzadzaj_druz_view');
            $this->load->view('szablony/default/footer');
        }
        
        function dodajDruzyne(){
            $nazwa = $this->input->post('nazwa_input');
            $prezes = $this->input->post('prezes_input');
            $stadion = $this->input->post('stadion_input');
            $liga = $this->input->post('grupa_select');
            $this->druzyny_model->dodajDruzyne($nazwa, $prezes, $stadion, $liga);
            redirect(base_url().'index.php/zarzadzaj/druzyny');
        }
        
        function dajListeGrup($woj, $klasa){
            //$data['title'] = 'Panel Administracyjny - dodaj/usuń drużynę';
            //$data['description'] = 'To jest przykładowy opis.';
            //$data['keywords'] = array('klucz1', 'klucz2', 'klucz3');
            //$data['lang'] = 'pl'; 
            //echo $woj;
            $data['grupy'] = $this->druzyny_model->dajListeGrup(urldecode($woj), urldecode($klasa));
            //$this->load->view('szablony/default/header', $data);
            $this->load->view('szablony/default/lista_grup_view', $data);
        }
        
        function edytujDruzyne($idDruzyny){
            $nazwa = $this->input->post('nazwa_input');
            $prezes = $this->input->post('prezes_input');
            $stadion = $this->input->post('stadion_input');
            $this->druzyny_model->edytujDruzyne($idDruzyny, $nazwa, $prezes, $stadion);
            redirect(base_url().'index.php/zarzadzaj/druzyny');
        }
        
        function usunDruzyne($idDruzyny){
            $this->druzyny_model->usunDruzyne($idDruzyny);
        }
}

?>
