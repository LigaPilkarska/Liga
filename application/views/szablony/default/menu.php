        <div id="KONTENER_BODY">
            <div id="KONTENER_BODY2">
            <div id="MENU">
                             
            </div>
            <div id="INFORMACJE">

                <?php
                    echo form_open(site_url() .'/'. uri_string(), array('id'=>'form_logowania', 'class'=>'form_logowania'));
                    echo form_fieldset("Twoje konto", array('class' => 'form_logowania_fieldset'));
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
                    echo form_fieldset_close();
                    echo '</p>';
                    echo form_close();    
                ?>

                    
                    <script>(function(d, s, id) {
                          var js, fjs = d.getElementsByTagName(s)[0];
                          if (d.getElementById(id)) return;
                          js = d.createElement(s); js.id = id;
                          js.src = "//connect.facebook.net/pl_PL/all.js#xfbml=1&appId=APP_ID";
                          fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));
                    </script>
                    <div id="fb-root"></div>
                    <!--<div class="fb-like-box" data-href="http://www.facebook.com/platform" data-width="292" data-show-faces="true" data-stream="true" data-header="true"></div>-->
                    <!-- 326171408104 - futbolowo 
                         316139208439971 - pilkarzyki_hej -->   
                    <fb:fan profile_id="316139208439971" stream="0" connections="9" height="340" logobar="1" width="200">
                    
                    </fb:fan>
                    <div style="font-size:11px; padding-left:10px">
                        <a href="http://www.facebook.com/PilkarzykiHej">pilkarzyki_hej.pl</a> on Facebook
                    </div>
                    <br style="clear: both;" /> 
                
            </div>
