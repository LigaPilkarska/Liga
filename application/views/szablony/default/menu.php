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
                        echo anchor('zarzadzaj/index', lang('menu_option_adminpanel')).'<br />';
                    }
                ?>
                </div><br />
            
             
            <?php $czyAdmin = $this->session->userdata('uprawnienie');
                    if(isset($czyAdmin) && ($czyAdmin=='admin_global' || $czyAdmin=='admin' || $czyAdmin=='trener')) { ?>    
                        
                            <div id="MENU_NAGLOWEK"><?php echo lang('menu_bar_admin');?> </div><hr />
                            <div id="MENU_ZAWARTOSC">
                            <?php 
                                $czyAdmin = $this->session->userdata('uprawnienie');
                                if($czyAdmin=='admin_global') {
                                    echo anchor('zarzadzaj/ligi', lang('menu_option_leagueadmin')).'<br />';
                                    echo anchor('zarzadzaj/uzytkownicy', lang('menu_option_usersadmin')).'<br />';
                                    echo anchor('zarzadzaj/druzyny', lang('menu_option_teamsadmin')).'<br />';
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
                    echo form_fieldset(lang('menu_bar_login'), array('class' => 'form_logowania_fieldset'));
                    //echo '<p>';
                    
                    //etykieta i pole loginu
                    $login_label_data = array('class' => 'errors');
                    echo form_label(lang('menu_login_login'), 'login_input', $login_label_data).'<br />';
                    if(isset($login) && $login != '')
                        $login_data = array('class' => 'errors', 'name' => 'login_input', 'id' => 'login_input','value' => $login,
                    'maxlength' => '100', 'size' => '50', 'style' => 'width:50%');
                    else    
                        $login_data = array('class' => 'errors', 'name' => 'login_input', 'id' => 'login_input','placeholder' => lang('menu_login_login'),
                    'maxlength' => '100', 'size' => '50', 'style' => 'width:50%');
                    echo form_input($login_data).'<br />';
                    
                    //etykieta i pole hasła
                    $password_label_data = array('class' => 'errors');
                    echo form_label(lang('menu_login_pass'), 'password_input', $password_label_data).'<br />';
                    if(isset($haslo) && $haslo != '')
                        $password_data = array('name' => 'password_input', 'id' => 'password_input', 'value' => $haslo,
                    'maxlength' => '100', 'size' => '50', 'style' => 'width:50%');
                    else
                        $password_data = array('name' => 'password_input', 'id' => 'password_input', 'placeholder' => lang('menu_login_pass'),
                    'maxlength' => '100', 'size' => '50', 'style' => 'width:50%');
                    echo form_password($password_data);
                    
                    //ukryte pole, by powrócić do odpowiedniego miejsca
                    echo form_hidden('prev_url', current_url());
                    echo '<br /><br />';
                    
                    //przycisk zaloguj
                    echo form_submit('zaloguj', lang('menu_login_logINbutton'));
                    
                    //linki przypomnienia hasła i rejestracji
                    echo '<br /><br />'.anchor('/admin/przypomnij_haslo', lang('menu_login_forgetpass'));
                    echo ' | '.anchor('/admin/zarejestruj', lang('menu_login_noaccount'));
                    echo form_fieldset_close();
                    //echo '</p>';
                    echo form_close();
                }
                else {
                    echo form_open(site_url() .'/'. 'admin', array('id'=>'form_logowania', 'class'=>'form_logowania'));
                    echo form_fieldset(lang('menu_bar_login'), array('class' => 'form_logowania_fieldset'));
                    //echo '<p>';
                    echo lang('menu_login_status') .  $this->session->userdata('login');
                    echo '<br />'.lang('menu_login_statusMAIL').'<a href="mailto:' . $this->session->userdata('email').'">'.$this->session->userdata('email').'</a>';
                    echo '<br /><br />';
                    echo form_submit('edytuj', lang('menu_login_editbutton'));
                    echo '<br /><br />' . anchor(site_url().'/admin/wyloguj', lang('menu_login_logOUT'));
                    echo ' | '.anchor('/admin/usun', lang('menu_login_delaccount'));
                    echo form_fieldset_close();
                    //echo '</p>';
                    echo form_close();
                    //echo '<br />' . anchor(site_url().'/admin/index/wyloguj', 'Wyloguj');
                }
                ?>

                    
                    
                
            </div>
