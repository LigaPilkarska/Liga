<div id="TYTUL_STRONY">
    <h2><?php echo lang('panel_news') ?></h2>
</div>
<div id="TRESC">
    <?php $czyAdmin = $this->session->userdata('uprawnienie');
        if($czyAdmin!='admin_global') {
            echo 'Nie masz uprawnień by przebywać na tej stronie!';
            
        } 
        else { 
            foreach($wpis as $uzytkownik){
                    echo form_open(base_url() .'index.php/'. 'main/edytujWpis/'.$this->uri->segment(3), array('id'=>'form_dodawania_uzytk', 'class'=>'form_dodawania_uzytk'));
                    echo form_fieldset(lang('edit_news'), array('class' => 'form_dodawania_uzytk_fieldset'));
                    //echo '<p>';
                    $login_label_data = array('class' => 'errors');
                    echo form_label(lang('title'), 'login_input', $login_label_data).'<br />';
                    
                    $login_data = array('class' => 'errors', 'name' => 'login_input', 'id' => 'login_input', 'value' => $uzytkownik['tytul'],
                    'maxlength' => '100', 'size' => '50', 'style' => 'width:60%');
                    echo form_input($login_data).'<br />';
                    
                                       
                    $email_label_data = array('class' => 'errors');
                    echo form_label(lang('text'), 'email_input', $email_label_data).'<br />';
                    
                    $email_data = array('class' => 'errors', 'name' => 'email_input', 'id' => 'email_input', 'value' => $uzytkownik['wpis'],
                    'maxlength' => '100', 'size' => '50', 'style' => 'width:80%; height:80px');
                    echo form_textarea($email_data).'<br />';
                    
                                       
                    echo '<br /><br />';
                    echo form_submit('edytuj', lang('edit_news'));
                    echo form_fieldset_close();
                    //echo '</p>';
                    echo form_close();
                }
        }
        ?>
    </div>