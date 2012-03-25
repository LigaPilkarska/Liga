        <div id="KONTENER_BODY">
            <div id="KONTENER_BODY2">
            <div id="MENU">
                <div id="MENU_NAGLOWEK">MENU </div><hr />
                <div id="MENU_ZAWARTOSC">
                <?php foreach($opcje as $key => $wartosc) {
                        echo anchor($key, $wartosc);
                        echo '<br />';
                      } 
                ?>
                </div>
            </div>
            <div id="INFORMACJE">
                <!--<div id="MENU_NAGLOWEK">TWOJE KONTO</div><hr />-->
                <?php
                $login = $this->session->userdata('login');
                if(!isset($login) || $login=='') {
                    echo form_open(site_url() .'/'. 'admin', array('id'=>'form_logowania', 'class'=>'form_logowania'));
                    echo form_fieldset("Twoje konto", array('class' => 'form_logowania_fieldset'));
                    //echo '<p>';
                    $login_label_data = array('class' => 'errors');
                    echo form_label('Login', 'login_input', $login_label_data).'<br />';
                    $login_data = array('class' => 'errors', 'name' => 'login_input', 'id' => 'login_input','placeholder' => 'login',
                    'maxlength' => '100', 'size' => '50', 'style' => 'width:50%');
                    echo form_input($login_data).'<br />';
                    $password_label_data = array('class' => 'errors');
                    echo form_label('Hasło', 'password_input', $password_label_data).'<br />';
                    $password_data = array('name' => 'password_input', 'id' => 'password_input', 'placeholder' => 'hasło',
                    'maxlength' => '100', 'size' => '50', 'style' => 'width:50%');
                    echo form_password($password_data);
                    echo form_hidden('prev_url', current_url());
                    echo '<br /><br />';
                    echo form_submit('zaloguj', 'Zaloguj');
                    echo '<br /><br />'.anchor('/main/index', 'Zapomniałeś hasła?');
                    echo ' | '.anchor('/main/index', 'Nie masz konta?');
                    echo form_fieldset_close();
                    //echo '</p>';
                    echo form_close();
                }
                else {
                    echo 'Zalogowany jako ' .  $this->session->userdata('login') . ' o id: ';
                    echo $this->session->userdata('session_id') . ' i adresie email: ' . $this->session->userdata('email');
                    echo '<br />' . anchor(site_url().'/admin/index/wyloguj', 'Wyloguj');
                }
                ?>

                    
                    
                
            </div>
