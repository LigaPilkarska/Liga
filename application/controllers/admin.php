<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model('admin_model');
        }
        
        public function _checkLogin($login, $haslo) {
            return $this->admin_model->sprLogin($login, $haslo);
        }
        
        public function index() {
            $login = $this->session->userdata('login');
            if(!isset($login) || $login == '') {
                $login = $this->input->post('login_input');
                $haslo = $this->input->post('password_input');
                $url_dest = $this->input->post('prev_url');
                $wynik = $this->_checkLogin($login, $haslo);
                if($wynik == null){
                    $data['title'] = 'Błąd logowania';
                    $data['description'] = 'To jest przykładowy opis.';
                    $data['keywords'] = array('klucz1', 'klucz2', 'klucz3');
                    $data['lang'] = 'pl';
                    $data['opcje'] = array('main/index'=>'Newsy', 'main/1'=>'Informacje o stronie', 'liga/index'=>'Ligi', 'main/2'=>'Kontakt');
                    $this->load->view('szablony/default/header', $data);
                    $this->load->view('szablony/default/menu');
                    $this->load->view('szablony/default/admin_logowanie_view');
                    $this->load->view('szablony/default/footer');
                }
                else {
                    $newdata = array(
                       //'session_id' => time() . $wynik->id,
                       'login'  => $wynik->login,
                       'email'     => $wynik->mail,
                       'uprawnienie' => $wynik->uprawnienie
                   );

                    $this->session->set_userdata($newdata);
                    if($url_dest == ' ')
                        $url_dest = base_url();
                    redirect($url_dest);
                }
            }
            elseif($this->uri->segment(3) == 'wyloguj') {
                $array_items = array('login'  => '' ,'email' => '', 'uprawnienie' => '');
                $this->session->unset_userdata($array_items);
                $this->session->sess_destroy();
                redirect(base_url());
            }
            else {
                $data['title'] = 'Panel admina';
                $data['description'] = 'To jest przykładowy opis.';
                $data['keywords'] = array('klucz1', 'klucz2', 'klucz3');
                $data['lang'] = 'pl';
                $data['opcje'] = array('main/index'=>'Newsy', 'main/1'=>'Informacje o stronie', 'liga/index'=>'Ligi', 'main/2'=>'Kontakt');
                $this->load->view('szablony/default/header', $data);
                $this->load->view('szablony/default/menu');
                $this->load->view('szablony/default/admin_profil_view');
                $this->load->view('szablony/default/footer');
            }
        }
        
        public function wyloguj(){
            $array_items = array('session_id' => '', 'username'  => '' ,'email' => '', 'uprawnienie' => '');
            $this->session->unset_userdata($array_items);
            $this->session->sess_destroy();
            redirect('http://localhost/liga/index.php/liga/wybor/2');
        }
}
?>
