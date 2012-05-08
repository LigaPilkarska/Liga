<div id="TYTUL_STRONY">
    <h2>Panel Administracyjny - Ligi</h2>
</div>
<div id="TRESC">
    <?php $czyAdmin = $this->session->userdata('uprawnienie');
        if($czyAdmin!='admin_global') {
            echo 'Nie masz uprawnień by przebywać na tej stronie!';
            
        } 
        else { 
            if($this->uri->segment(2)=='ligi') {?>
                <table border=1 cellpadding=5 rules='all'>
                    <tr><th>ID</th><th>Województwo</th><th>Klasa</th><th>Grupa</th><th>Rok</th><th>Opcje</th></tr>
                    <?php 
                    foreach ($ligi as $liga){
                        echo '<tr>';
                        echo '<td>'.$liga['idLigi'].'</td>';
                        echo '<td>'.$liga['wojewodztwo'].'</td>';
                        echo '<td>'.$liga['klasa'].'</td>';
                        echo '<td>'.$liga['grupa'].'</td>';
                        echo '<td>'.$liga['rok'].'</td>';
                        echo '<td style="text-align:center"><a href="liga/'.$liga['idLigi'].'"><img src="'.base_url().'szablony/default/images/b_edit.png" /></a> <a href="'.$liga['idLigi'].'" class="usun_lige"><img src="'.  base_url().'szablony/default/images/b_del.png" /></a>'.'</td>';
                        echo '</tr>';
                    }
                 echo '</table>';
                 echo '<br />'.anchor(site_url().'/zarzadzaj/liga/-1', 'Dodaj ligę');
            }
            elseif($this->uri->segment(2)=='liga' && $this->uri->segment(3)==-1){
                echo form_open(site_url() .'/'. 'zarzadzaj/dodajLige', array('id'=>'form_dodawania_uzytk', 'class'=>'form_dodawania_uzytk'));
                    echo form_fieldset("Dodaj Ligę", array('class' => 'form_dodawania_uzytk_fieldset'));
                    $wojewodztwo_label_data = array('class' => 'errors');
                    echo form_label('Województwo', 'wojewodztwo_select', $wojewodztwo_label_data).'<br />';
                    
                    $options = array('dolnośląskie' => 'dolnośląskie', 'lubelskie' => 'lubelskie', 'lubuskie' => 'lubuskie', 'łódzkie' => 'łódzkie', 'małopolskie' => 'małopolskie', 'mazowieckie' => 'mazowieckie', 'podkarpackie' => 'podkarpackie', 'świętokrzyskie' => 'świętokrzyskie');
                    echo form_dropdown('wojewodztwo_select', $options).'<br />';
                    
                    $klasa_label_data = array('class' => 'errors');
                    echo form_label('Klasa', 'klasa_select', $klasa_label_data).'<br />';
                    
                    $options = array('okręgowa' => 'okręgowa', 'A' => 'A', 'B' => 'B', 'C' => 'C');
                    echo form_dropdown('klasa_select', $options).'<br />';
                    
                    $grupa_label_data = array('class' => 'errors');
                    echo form_label('Grupa', 'grupa_input', $grupa_label_data).'<br />';
                    
                    $grupa_data = array('name' => 'grupa_input', 'id' => 'grupa_input',
                    'maxlength' => '100', 'size' => '50', 'style' => 'width:20%');
                    echo form_input($grupa_data).'<br />';
                    
                    $rok_label_data = array('class' => 'errors');
                    echo form_label('Rok', 'rok_input', $rok_label_data).'<br />';
                    
                    $rok_data = array('class' => 'errors', 'name' => 'rok_input', 'id' => 'rok_input',
                    'maxlength' => '100', 'size' => '50', 'style' => 'width:20%');
                    echo form_input($rok_data).'<br />';
                    
                    echo '<br /><br />';
                    echo form_submit('dodaj', 'Dodaj Ligę');
                    echo form_fieldset_close();
                    echo form_close();
            }
            elseif($this->uri->segment(2)=='liga' && $this->uri->segment(3)!=-1) {
                foreach($liga as $liga){
                    echo form_open(site_url() .'/'. 'zarzadzaj/edytujLige/'.$this->uri->segment(3), array('id'=>'form_dodawania_uzytk', 'class'=>'form_dodawania_uzytk'));
                    echo form_fieldset("Edytuj Ligę", array('class' => 'form_dodawania_uzytk_fieldset'));
                    
                    $wojewodztwo_label_data = array('class' => 'errors');
                    echo form_label('Województwo', 'wojewodztwo_select', $wojewodztwo_label_data).'<br />';
                    
                    $options = array('dolnośląskie' => 'dolnośląskie', 'lubelskie' => 'lubelskie', 'lubuskie' => 'lubuskie', 'łódzkie' => 'łódzkie', 'małopolskie' => 'małopolskie', 'mazowieckie' => 'mazowieckie', 'podkarpackie' => 'podkarpackie', 'świętokrzyskie' => 'świętokrzyskie');
                    echo form_dropdown('wojewodztwo_select', $options, $liga['wojewodztwo']).'<br />';
                    
                    $klasa_label_data = array('class' => 'errors');
                    echo form_label('Klasa', 'klasa_select', $klasa_label_data).'<br />';
                    
                    $options = array('okręgowa' => 'okręgowa', 'A' => 'A', 'B' => 'B', 'C' => 'C');
                    echo form_dropdown('klasa_select', $options, $liga['klasa']).'<br />';
                    
                    $grupa_label_data = array('class' => 'errors');
                    echo form_label('Grupa', 'grupa_input', $grupa_label_data).'<br />';
                    
                    $grupa_data = array('name' => 'grupa_input', 'id' => 'grupa_input', 'value' => $liga['grupa'],
                    'maxlength' => '100', 'size' => '50', 'style' => 'width:20%');
                    echo form_input($grupa_data).'<br />';
                    
                    $rok_label_data = array('class' => 'errors');
                    echo form_label('Rok', 'rok_input', $rok_label_data).'<br />';
                    
                    $rok_data = array('class' => 'errors', 'name' => 'rok_input', 'id' => 'rok_input',
                    'maxlength' => '100', 'size' => '50', 'style' => 'width:20%', 'value' => $liga['rok']);
                    echo form_input($rok_data).'<br />';
                    
                    echo '<br /><br />';
                    echo form_submit('edytuj', 'Aktualizuj Ligę');
                    echo form_fieldset_close();
                    //echo '</p>';
                    echo form_close();
                }
            }
        }
        ?>
    </div>