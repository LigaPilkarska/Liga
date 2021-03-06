<div id="TYTUL_STRONY">
    <h2><?php echo lang('panel_team') ?></h2>
</div>
<div id="TRESC">
    <?php $czyAdmin = $this->session->userdata('uprawnienie');
        if($czyAdmin!='admin_global') {
            echo 'Nie masz uprawnień by przebywać na tej stronie!';
            
        } 
        else { 
            if($this->uri->segment(2)=='druzyny') {?>
                <table border=1 cellpadding=5 rules='all'>
                    <tr><th>ID</th><th><?php echo lang('name') ?></th><th><?php echo lang('president') ?></th><th><?php echo lang('stadium') ?></th><th><?php echo lang('options') ?></th></tr>
                    <?php 
                    foreach ($druzyny as $druzyna){
                        echo '<tr>';
                        echo '<td>'.$druzyna['idDruzyny'].'</td>';
                        echo '<td>'.$druzyna['nazwaDruzyny'].'</td>';
                        echo '<td>'.$druzyna['prezes'].'</td>';
                        echo '<td>'.$druzyna['stadion'].'</td>';
                        echo '<td style="text-align:center"><a href="druzyna/'.$druzyna['idDruzyny'].'"><img src="'.base_url().'szablony/default/images/b_edit.png" /></a> <a href="'.$druzyna['idDruzyny'].'" class="usun_druzyne"><img src="'.  base_url().'szablony/default/images/b_del.png" /></a>'.'</td>';
                        echo '</tr>';
                    }
                 echo '</table>';
                 echo '<br />'.anchor(site_url().'/zarzadzaj/druzyna/-1', lang('add_team'));
            }
            elseif($this->uri->segment(2)=='druzyna' && $this->uri->segment(3)==-1){
                echo form_open(site_url() .'/'. 'zarzadzaj/dodajDruzyne', array('id'=>'form_dodawania_uzytk', 'class'=>'form_dodawania_uzytk'));
                    echo form_fieldset(lang('add_team'), array('class' => 'form_dodawania_uzytk_fieldset'));
                    $nazwa_label_data = array('class' => 'errors');
                    echo form_label(lang('name'), 'nazwa_input', $nazwa_label_data).'<br />';
                    
                    $nazwa_data = array('class' => 'errors', 'name' => 'nazwa_input', 'id' => 'nazwa_input',
                    'maxlength' => '100', 'size' => '50', 'style' => 'width:40%', 'required'=>'required');
                    echo form_input($nazwa_data).'<br />';
                           
                    $prezes_label_data = array('class' => 'errors');
                    echo form_label(lang('president'), 'prezes_input', $prezes_label_data).'<br />';
                    
                    $prezes_data = array('name' => 'prezes_input', 'id' => 'prezes_input',
                    'maxlength' => '100', 'size' => '50', 'style' => 'width:40%', 'required'=>'required');
                    echo form_input($prezes_data).'<br />';
                    
                    $stadion_label_data = array('class' => 'errors');
                    echo form_label(lang('stadium'), 'stadion_input', $stadion_label_data).'<br />';
                    
                    $stadion_data = array('class' => 'errors', 'name' => 'stadion_input', 'id' => 'stadion_input',
                    'maxlength' => '100', 'size' => '50', 'style' => 'width:40%', 'required'=>'required');
                    echo form_input($stadion_data).'<br />';
                    
                    $wojewodztwo_label_data = array('class' => 'errors');
                    echo form_label(lang('voivodship'), 'wojewodztwo_select', $wojewodztwo_label_data).'<br />';
                    
                    $options = array('dolnośląskie' => 'dolnośląskie', 'lubelskie' => 'lubelskie', 'lubuskie' => 'lubuskie', 'łódzkie' => 'łódzkie', 'małopolskie' => 'małopolskie', 'mazowieckie' => 'mazowieckie', 'podkarpackie' => 'podkarpackie', 'świętokrzyskie' => 'świętokrzyskie');
                    echo form_dropdown('wojewodztwo_select', $options).'<br />';
                    
                    $klasa_label_data = array('class' => 'errors');
                    echo form_label(lang('class'), 'klasa_select', $klasa_label_data).'<br />';
                    
                    $options = array('okręgowa' => 'okręgowa', 'A' => 'A', 'B' => 'B', 'C' => 'C');
                    echo form_dropdown('klasa_select', $options).'<br />';
                    
                    $grupa_label_data = array('class' => 'errors');
                    echo form_label(lang('group'), 'grupa_select', $grupa_label_data).'<br />';
                    
                    $options = array();
                    echo form_dropdown('grupa_select', $options).'<br />';
                    
                    echo '<br /><br />';
                    echo form_submit('dodaj', lang('add_team'));
                    echo form_fieldset_close();
                    echo form_close();
            }
            elseif($this->uri->segment(2)=='druzyna' && $this->uri->segment(3)!=-1) {
                foreach($druzyna as $liga){
                    echo form_open(site_url() .'/'. 'zarzadzaj/edytujDruzyne/'.$this->uri->segment(3), array('id'=>'form_dodawania_uzytk', 'class'=>'form_dodawania_uzytk'));
                    echo form_fieldset(lang('edit_team'), array('class' => 'form_dodawania_uzytk_fieldset'));
                    
                    $nazwa_label_data = array('class' => 'errors');
                    echo form_label(lang('name'), 'nazwa_input', $nazwa_label_data).'<br />';
                    
                    $nazwa_data = array('class' => 'errors', 'name' => 'nazwa_input', 'id' => 'nazwa_input', 'value' => $liga['nazwaDruzyny'],
                    'maxlength' => '100', 'size' => '50', 'style' => 'width:40%');
                    echo form_input($nazwa_data).'<br />';
                    
                    $prezes_label_data = array('class' => 'errors');
                    echo form_label(lang('president'), 'prezes_input', $prezes_label_data).'<br />';
                    
                    $prezes_data = array('class' => 'errors', 'name' => 'prezes_input', 'id' => 'prezes_input', 'value' => $liga['prezes'],
                    'maxlength' => '100', 'size' => '50', 'style' => 'width:40%');
                    echo form_input($prezes_data).'<br />';
                    
                    $stadion_label_data = array('class' => 'errors');
                    echo form_label(lang('stadium'), 'stadion_input', $stadion_label_data).'<br />';
                    
                    $stadion_data = array('class' => 'errors', 'name' => 'stadion_input', 'id' => 'stadion_input', 'value' => $liga['stadion'],
                    'maxlength' => '100', 'size' => '50', 'style' => 'width:40%');
                    echo form_input($stadion_data).'<br />';
                    
                    echo '<br /><br />';
                    echo form_submit('edytuj', lang('edit_team'));
                    echo form_fieldset_close();
                    //echo '</p>';
                    echo form_close();
                }
            }
        }
        ?>
    </div>
