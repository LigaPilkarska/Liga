        <div id="KONTENER_BODY">
            <div id="KONTENER_BODY2">
            <div id="MENU">
                <div id="MENU_NAGLOWEK">MENU </div><hr />
                <div id="MENU_ZAWARTOSC">
                <?php foreach($opcje as $key => $wartosc) {
                        echo anchor($key, $wartosc);
                        echo '<br />';
                      }
                    $czyAdmin = $this->session->userdata('uprawnienie');
                    if(isset($czyAdmin) && ($czyAdmin=='admin_global' || $czyAdmin=='admin' || $czyAdmin=='trener')) {
                        echo anchor('zarzadzaj/index', 'Panel administracyjny').'<br />';
                    }
                ?>
                </div><br />
            
             
            <?php $czyAdmin = $this->session->userdata('uprawnienie');
                    if(isset($czyAdmin) && ($czyAdmin=='admin_global' || $czyAdmin=='admin' || $czyAdmin=='trener')) { ?>    
                        
                            <div id="MENU_NAGLOWEK">ZARZĄDZAJ </div><hr />
                            <div id="MENU_ZAWARTOSC">
                            <?php 
                                $czyAdmin = $this->session->userdata('uprawnienie');
                                if($czyAdmin=='admin_global') {
                                    echo anchor('zarzadzaj/ligi', 'Zarządzaj ligami').'<br />';
                                    echo anchor('zarzadzaj/uzytkownicy', 'Zarządzaj użytkownikami').'<br />';
                                    echo anchor('zarzadzaj/druzyny', 'Zarządzaj drużynami').'<br />';
                                }
                            ?>
                            </div>
                            <?php               
                       }?>
                       </div>     
                
            <div id="INFORMACJE">
                <!--<div id="MENU_NAGLOWEK">TWOJE KONTO</div><hr />-->
                <?php
                $czyZalogowany = $this->session->userdata('login');
                if(!isset($czyZalogowany) || $czyZalogowany=='') {
                    echo form_open(site_url() .'/'. 'admin', array('id'=>'form_logowania', 'class'=>'form_logowania'));
                    echo form_fieldset("Twoje konto", array('class' => 'form_logowania_fieldset'));
                    //echo '<p>';
                    
                    //etykieta i pole loginu
                    $login_label_data = array('class' => 'errors');
                    echo form_label('Login', 'login_input', $login_label_data).'<br />';
                    if(isset($login) && $login != '')
                        $login_data = array('class' => 'errors', 'name' => 'login_input', 'id' => 'login_input','value' => $login,
                    'maxlength' => '100', 'size' => '50', 'style' => 'width:50%');
                    else    
                        $login_data = array('class' => 'errors', 'name' => 'login_input', 'id' => 'login_input','placeholder' => 'login',
                    'maxlength' => '100', 'size' => '50', 'style' => 'width:50%');
                    echo form_input($login_data).'<br />';
                    
                    //etykieta i pole hasła
                    $password_label_data = array('class' => 'errors');
                    echo form_label('Hasło', 'password_input', $password_label_data).'<br />';
                    if(isset($haslo) && $haslo != '')
                        $password_data = array('name' => 'password_input', 'id' => 'password_input', 'value' => $haslo,
                    'maxlength' => '100', 'size' => '50', 'style' => 'width:50%');
                    else
                        $password_data = array('name' => 'password_input', 'id' => 'password_input', 'placeholder' => 'hasło',
                    'maxlength' => '100', 'size' => '50', 'style' => 'width:50%');
                    echo form_password($password_data);
                    
                    //ukryte pole, by powrócić do odpowiedniego miejsca
                    echo form_hidden('prev_url', current_url());
                    echo '<br /><br />';
                    
                    //przycisk zaloguj
                    echo form_submit('zaloguj', 'Zaloguj');
                    
                    //linki przypomnienia hasła i rejestracji
                    echo '<br /><br />'.anchor('/admin/przypomnij_haslo', 'Zapomniałeś hasła?');
                    echo ' | '.anchor('/admin/zarejestruj', 'Nie masz konta?');
                    echo form_fieldset_close();
                    //echo '</p>';
                    echo form_close();
                }
                else {
                    echo form_open(site_url() .'/'. 'admin', array('id'=>'form_logowania', 'class'=>'form_logowania'));
                    echo form_fieldset("Twoje konto", array('class' => 'form_logowania_fieldset'));
                    //echo '<p>';
                    echo 'Zalogowany jako ' .  $this->session->userdata('login');
                    echo '<br />Twój adres email: <a href="mailto:' . $this->session->userdata('email').'">'.$this->session->userdata('email').'</a>';
                    echo '<br /><br />';
                    echo form_submit('edytuj', 'Edytuj konto');
                    echo '<br /><br />' . anchor(site_url().'/admin/wyloguj', 'Wyloguj się');
                    echo ' | '.anchor('/admin/usun', 'Usuń konto');
                    echo form_fieldset_close();
                    //echo '</p>';
                    echo form_close();
                    //echo '<br />' . anchor(site_url().'/admin/index/wyloguj', 'Wyloguj');
                }
                ?>

                    
                    
                
            </div>
