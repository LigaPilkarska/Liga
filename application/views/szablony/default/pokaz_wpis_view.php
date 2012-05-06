            
             <div id="TRESC">
             <?php foreach($wpisy as $wpis): ?>
                <div class="news_kontener">
                    <div class="news_tytul">
                      <h1>
                           <?=$wpis['tytul'] ?>
                      </h1>
                    </div>
                    <div class="news_caly">

                        <div class="news_logo">
                            <img width="112px" height="96px" src="<?php echo base_url(); ?>szablony/default/images/logosek.png" alt="logo" />
                        </div>
                        <div class="news_tresc">
                             <?=$wpis['wpis'] ?>
                            
                        </div>
                        <div class="news_author_data">Dodał: <a href="mailto:<?=$wpis['mail'] ?>"><?=$wpis['login'] ?></a>, <?php echo(date('d/m/Y H:i' ,mysql_to_unix($wpis['data']))); ?></div>
                    </div>
                </div><br /><br />
             <?php endforeach ?>

                <div class="kom_kontener">
                <?php foreach($komentarze as $wpis): ?>
                    <div class="kom_caly">
                        <div class="kom_tresc">
                             <?=$wpis['komentarz'] ?>
                            
                        </div>
                        <div class="news_author_data">Dodał: <?=$wpis['autor'] ?>
                        <?php $czyAdmin = $this->session->userdata('uprawnienie');
                        if(isset($czyAdmin) && ($czyAdmin=='admin_global' || $czyAdmin=='admin' || $czyAdmin=='trener'))
                          echo '<a href="'.base_url() .'index.php/'. 'main/edytujKomentarz/'.$wpis['idKomentarza'].'"><img src="'.base_url().'szablony/default/images/b_edit.png" /></a> <a href="'.$wpis['idKomentarza'].'" alt="'.$wpis['idWpisu'].'" class="usun_kom"><img src="'.base_url().'szablony/default/images/b_del.png" /></a>'; ?>
                        </div>
                    </div><br /><br />
                    <hr />
             <?php endforeach ?></div>
                    
                    <?php 
                    echo form_open(site_url() .'/'. 'main/dodajKomentarz/'.$this->uri->segment(3), array('id'=>'form_dodawania_uzytk', 'class'=>'form_dodawania_uzytk'));
                    echo form_fieldset("Dodaj Komentarz", array('class' => 'form_dodawania_uzytk_fieldset'));
                    //echo '<p>';
                    $login_label_data = array('class' => 'errors');
                    echo form_label('Autor', 'login_input', $login_label_data).'<br />';
                    
                    $login_data = array('class' => 'errors', 'name' => 'login_input', 'id' => 'login_input',
                    'maxlength' => '100', 'size' => '50', 'style' => 'width:60%');
                    echo form_input($login_data).'<br />';
                    
                              
                    $email_label_data = array('class' => 'errors');
                    echo form_label('Komentarz', 'email_input', $email_label_data).'<br />';
                    
                    $email_data = array('class' => 'errors', 'name' => 'email_input', 'id' => 'email_input',
                     'size' => '50', 'style' => 'width:80%; height:80px');
                    echo form_textarea($email_data).'<br />';
  
                    echo '<br /><br />';
                    echo form_submit('dodaj', 'Dodaj komentarz');
                    echo form_fieldset_close();
                    //echo '</p>';
                    echo form_close();
                            
                                        
                       ?>
            </div>
        </div>
	
