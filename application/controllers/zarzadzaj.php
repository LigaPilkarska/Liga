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
            
        }
        
        public function index() {
            $data['title'] = 'Ligi piłkarskie - panel administracyjny';
            $data['description'] = 'To jest przykładowy opis.';
            $data['keywords'] = array('klucz1', 'klucz2', 'klucz3');
            $data['lang'] = 'pl';
            $data['opcje'] = array('main/index'=>'Newsy', 'main/1'=>'Informacje o stronie', 'liga/index'=>'Ligi', 'main/2'=>'Kontakt');
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
            $data['opcje'] = array('main/index'=>'Newsy', 'main/1'=>'Informacje o stronie', 'liga/index'=>'Ligi', 'main/2'=>'Kontakt');
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
            $data['opcje'] = array('main/index'=>'Newsy', 'main/1'=>'Informacje o stronie', 'liga/index'=>'Ligi', 'main/2'=>'Kontakt');
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
}

?>
