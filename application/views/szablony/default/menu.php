        <div id="KONTENER_BODY">
            <div id="MENU">
                
            </div>
            <div id="INFORMACJE">
                <?php
                    echo form_open(site_url() .'/'. uri_string(), array('id'=>'form_logowania', 'class'=>'form_logowania'));
                    echo form_fieldset("Logowanie", array('class' => 'form_logowania_fieldset'));
                    echo '<p>';
                    $login_label_data = array('class' => 'errors');
                    echo form_label('Login', 'login_input', $login_label_data).'<br />';
                    $login_data = array('class' => 'errors', 'name' => 'login_input', 'id' => 'login_input','placeholder' => 'login',
                    'maxlength' => '100', 'size' => '50', 'style' => 'width:50%');
                    echo form_input($login_data).'<br />';
                    $password_label_data = array('class' => 'errors');
                    echo form_label('Has³o', 'password_input', $password_label_data).'<br />';
                    $password_data = array('name' => 'password_input', 'id' => 'password_input', 'placeholder' => 'has³o',
                    'maxlength' => '100', 'size' => '50', 'style' => 'width:50%');
                    echo form_password($password_data);
                    echo '<br /><br />';
                    echo form_submit('zaloguj', 'Zaloguj');
                    echo '<br /><br />'.anchor('/main/index', 'Zapomnia³e¶ has³a?');
                    echo ' | '.anchor('/main/index', 'Nie masz konta?');
                    echo '</p>';
                    echo form_close();
                    
                ?>
            </div>
