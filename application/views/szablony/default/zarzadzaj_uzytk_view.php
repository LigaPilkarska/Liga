<div id="TYTUL_STRONY">
    <h2>Panel Administracyjny - Użytkownicy</h2>
</div>
<div id="TRESC">
    <?php $czyAdmin = $this->session->userdata('uprawnienie');
        if($czyAdmin!='admin_global') {
            echo 'Nie masz uprawnień by przebywać na tej stronie!';
            
        } 
        else { 
            if($this->uri->segment(2)=='uzytkownicy') {?>
                <table border=1 cellpadding=5 rules='all'>
                    <tr><th>ID</th><th>Login</th><th>Uprawnienie</th><th>E-mail</th><!--<th>Liga</th><th>Drużyna</th>--><th>Opcje</th></tr>
                    <?php 
                    foreach ($uzytkownicy as $uzytk){
                        echo '<tr>';
                        echo '<td>'.$uzytk['idKonta'].'</td>';
                        echo '<td>'.$uzytk['login'].'</td>';
                        echo '<td>'.$uzytk['uprawnienie'].'</td>';
                        echo '<td>'.$uzytk['mail'].'</td>';
                        /*echo '<td>'.$uzytk['liga'].'</td>';
                        echo '<td>'.$uzytk['druzyna'].'</td>';*/
                        echo '<td style="text-align:center"><a href="uzytkownik/'.$uzytk['idKonta'].'"><img src="'.base_url().'szablony/default/images/b_edit.png" /></a> <a href="'.$uzytk['idKonta'].'" class="usun_uzytk"><img src="'.  base_url().'szablony/default/images/b_del.png" /></a>'.'</td>';
                        echo '</tr>';
                    }
                 echo '</table>';
                 echo '<br />'.anchor(site_url().'/zarzadzaj/uzytkownik/-1', 'Dodaj użytkownika =)');
            }
            elseif($this->uri->segment(2)=='uzytkownik' && $this->uri->segment(3)==-1){
                echo form_open(site_url() .'/'. 'zarzadzaj/dodajUzytk', array('id'=>'form_dodawania_uzytk', 'class'=>'form_dodawania_uzytk'));
                    echo form_fieldset("Dodaj Użytkownika", array('class' => 'form_dodawania_uzytk_fieldset'));
                    //echo '<p>';
                    $login_label_data = array('class' => 'errors');
                    echo form_label('Login', 'login_input', $login_label_data).'<br />';
                    
                    $login_data = array('class' => 'errors', 'name' => 'login_input', 'id' => 'login_input',
                    'maxlength' => '100', 'size' => '50', 'style' => 'width:20%');
                    echo form_input($login_data).'<br />';
                    
                    $password_label_data = array('class' => 'errors');
                    echo form_label('Hasło', 'password_input', $password_label_data).'<br />';
                    
                    $password_data = array('name' => 'password_input', 'id' => 'password_input',
                    'maxlength' => '100', 'size' => '50', 'style' => 'width:20%');
                    echo form_password($password_data).'<br />';
                    
                    $uprawnienie_label_data = array('class' => 'errors');
                    echo form_label('Uprawnienie', 'uprawnienie_select', $uprawnienie_label_data).'<br />';
                    
                    $options = array('kibic' => 'kibic', 'trener' => 'trener', 'admin' => 'admin', 'admin_global' => 'admin_global');
                    echo form_dropdown('uprawnienie_select', $options).'<br />';
                    
                    $email_label_data = array('class' => 'errors');
                    echo form_label('Email', 'email_input', $email_label_data).'<br />';
                    
                    $email_data = array('class' => 'errors', 'name' => 'email_input', 'id' => 'email_input',
                    'maxlength' => '100', 'size' => '50', 'style' => 'width:20%');
                    echo form_input($email_data).'<br />';
                    
                    //echo '<div id="liga_div" class="visible:none">';
                        $wojewodztwo_label_data = array('class' => 'errors');
                        echo form_label('Województwo', 'wojewodztwo_select', $wojewodztwo_label_data).'<br />';

                        $options = array('dolnośląskie' => 'dolnośląskie', 'lubelskie' => 'lubelskie', 'lubuskie' => 'lubuskie', 'łódzkie' => 'łódzkie', 'małopolskie' => 'małopolskie', 'mazowieckie' => 'mazowieckie', 'podkarpackie' => 'podkarpackie', 'świętokrzyskie' => 'świętokrzyskie');
                        echo form_dropdown('wojewodztwo_select', $options).'<br />';

                        $klasa_label_data = array('class' => 'errors');
                        echo form_label('Klasa', 'klasa_select', $klasa_label_data).'<br />';

                        $options = array('okręgowa' => 'okręgowa', 'A' => 'A', 'B' => 'B', 'C' => 'C');
                        echo form_dropdown('klasa_select', $options).'<br />';

                        $grupa_label_data = array('class' => 'errors');
                        echo form_label('Grupa', 'grupa_select', $grupa_label_data).'<br />';

                        $options = array();
                        echo form_dropdown('grupa_select', $options).'<br />';
                    //echo '</div>';
                    /*$ligi_label_data = array('class' => 'errors');
                    echo form_label('Liga', 'ligi_select', $ligi_label_data).'<br />';
                    
                    $options = $ligi['klasa'];
                    echo form_dropdown('ligi_select', $options, array(), 'style=width:50%');*/
                    
                    echo '<br /><br />';
                    echo form_submit('dodaj', 'Dodaj Użytkownika');
                    echo form_fieldset_close();
                    //echo '</p>';
                    echo form_close();
            }
            elseif($this->uri->segment(2)=='uzytkownik' && $this->uri->segment(3)!=-1) {
                foreach($uzytkownik as $uzytkownik){
                    echo form_open(site_url() .'/'. 'zarzadzaj/edytujUzytk/'.$this->uri->segment(3), array('id'=>'form_dodawania_uzytk', 'class'=>'form_dodawania_uzytk'));
                    echo form_fieldset("Edytuj Użytkownika", array('class' => 'form_dodawania_uzytk_fieldset'));
                    //echo '<p>';
                    $login_label_data = array('class' => 'errors');
                    echo form_label('Login', 'login_input', $login_label_data).'<br />';
                    
                    $login_data = array('class' => 'errors', 'name' => 'login_input', 'id' => 'login_input', 'value' => $uzytkownik['login'],
                    'maxlength' => '100', 'size' => '50', 'style' => 'width:20%');
                    echo form_input($login_data).'<br />';
                    
                    $uprawnienie_label_data = array('class' => 'errors');
                    echo form_label('Uprawnienie', 'uprawnienie_select', $uprawnienie_label_data).'<br />';
                    
                    $options = array('kibic' => 'kibic', 'trener' => 'trener', 'admin' => 'admin', 'admin_global' => 'admin_global');
                    echo form_dropdown('uprawnienie_select', $options, $uzytkownik['uprawnienie']).'<br />';
                    
                    $email_label_data = array('class' => 'errors');
                    echo form_label('Email', 'email_input', $email_label_data).'<br />';
                    
                    $email_data = array('class' => 'errors', 'name' => 'email_input', 'id' => 'email_input', 'value' => $uzytkownik['mail'],
                    'maxlength' => '100', 'size' => '50', 'style' => 'width:20%');
                    echo form_input($email_data).'<br />';
                    
                    /*$ligi_label_data = array('class' => 'errors');
                    echo form_label('Liga', 'ligi_select', $ligi_label_data).'<br />';
                    
                    $options = $ligi['klasa'];
                    echo form_dropdown('ligi_select', $options, array(), 'style=width:50%');*/
                    
                    echo '<br /><br />';
                    echo form_submit('edytuj', 'Aktualizuj Użytkownika');
                    echo form_fieldset_close();
                    //echo '</p>';
                    echo form_close();
                }
            }
        }
        ?>
    </div>