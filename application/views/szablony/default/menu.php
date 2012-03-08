        <div id="KONTENER_BODY">
            <div id="MENU">
                
            </div>
            <div id="INFORMACJE">
                <?php
                    echo form_open(site_url() .'/'. uri_string(), array('id'=>'form_logowania'));
                    echo form_close();
                    $login_data = array('name' => 'login_input', 'id' => 'login_input','value' => 'nick',
                    'maxlength' => '100', 'size' => '50', 'style' => 'width:50%');
                    echo form_input($login_data);
                    echo form_submit('zaloguj', 'Zaloguj');
                    $password_data = array('name' => 'password_input', 'id' => 'password_input','value' => 'password',
                    'maxlength' => '100', 'size' => '50', 'style' => 'width:50%');
                    echo form_password($password_data);
                    
                ?>
            </div>
