            
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
                        <div class="news_author_data"><?php echo lang('news_author'); ?> <a href="mailto:<?=$wpis['mail'] ?>"><?=$wpis['login'] ?></a>, <?php echo(date('d/m/Y H:i' ,mysql_to_unix($wpis['data']))); ?></div>
                    </div>
                </div><br /><br />
             <?php endforeach ?>

                <div class="kom_kontener">
                <?php foreach($komentarze as $wpis): ?>
                    <div class="kom_caly">
                        <div class="kom_tresc">
                             <?=$wpis['komentarz'] ?>
                            
                        </div>
                        <div class="news_author_data"><?php echo lang('news_author'); ?> <?=$wpis['autor'] ?>
                        <?php if(isset($czyAdmin) && ($czyAdmin=='admin_global' || 
                            ($czyAdmin=='admin' && isset($idLigi) && $idLigi == $this->session->userdata('liga')) || 
                            ($czyAdmin=='trener' && isset($idDruzyny) && $idDruzyny == $this->session->userdata('druzyna'))))
                          echo '<a href="'.base_url() .'index.php/'. 'main/edytujKomentarz/'.$wpis['idKomentarza'].'"><img src="'.base_url().'szablony/default/images/b_edit.png" /></a> <a href="'.$wpis['idKomentarza'].'" alt="'.$wpis['idWpisu'].'" class="usun_kom"><img src="'.base_url().'szablony/default/images/b_del.png" /></a>'; ?>
                        </div>
                    </div><br /><br />
                    <hr />
             <?php endforeach ?></div>
                    
                    <?php 
                    echo form_open(site_url() .'/'. 'main/dodajKomentarz/'.$this->uri->segment(3), array('id'=>'form_dodawania_uzytk', 'class'=>'form_dodawania_uzytk'));
                    echo form_fieldset(lang('news_addcomment'), array('class' => 'form_dodawania_uzytk_fieldset'));
                    //echo '<p>';
                    

                    $autor_label_data = array('class' => 'errors');
                    echo form_label(lang('news_commentauthor'), 'login_input', $autor_label_data).'<br />';
                    
                    $login = $this->session->userdata('login');
                    if(isset($login) && $login != '')
                        $autor_data = array('class' => 'errors', 'name' => 'autor_input', 'id' => 'autor_input',
                    'maxlength' => '100', 'size' => '50', 'style' => 'width:60%', 'value' => $login);
                    else
                        $autor_data = array('class' => 'errors', 'name' => 'autor_input', 'id' => 'autor_input',
                    'maxlength' => '100', 'size' => '50', 'style' => 'width:60%');
                    
                    echo form_input($autor_data).'<br />';
                    
                    
                    $komentarz_label_data = array('class' => 'errors');
                    echo form_label(lang('news_comment'), 'komentarz_input', $komentarz_label_data).'<br />';
                    
                    $komentarz_data = array('class' => 'errors', 'name' => 'komentarz_input', 'id' => 'komentarz_input',
                     'size' => '50', 'style' => 'width:80%; height:80px');
                    echo form_textarea($komentarz_data).'<br />';
  
                    echo '<br /><br />';
                    echo form_submit('dodaj', lang('news_commentbutton'));
                    echo form_fieldset_close();
                    //echo '</p>';
                    echo form_close();
                            
                                        
                       ?>
            </div>
        </div>
	
