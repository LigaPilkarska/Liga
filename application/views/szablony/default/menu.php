        <div id="KONTENER_BODY">
            <div id="MENU">
                <?php
                    echo form_open(site_url() .'/'. uri_string(), array('id'=>'form_logowania'));
                    echo form_close();
                    $login_data = array('name' => 'login_input', 'id' => 'login_input','value' => 'nick',
                    'maxlength' => '100', 'size' => '50', 'style' => 'width:50%');
                    echo form_input($login_data);
                ?>
            </div>
            <div id="INFORMACJE">Dodatkowe informacje</div>
