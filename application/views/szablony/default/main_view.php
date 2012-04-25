            
             <div id="TRESC">
                 
                 <?php $czyAdmin = $this->session->userdata('uprawnienie');
                    if(isset($czyAdmin) && ($czyAdmin=='admin_global' || $czyAdmin=='admin' || $czyAdmin=='trener')) { 
                        
                        if($this->uri->segment(1)=='liga')
                        echo form_open(site_url() .'/'. 'liga/dodajNews/'.$this->uri->segment(3), array('id'=>'form_dodawania_uzytk', 'class'=>'form_dodawania_uzytk'));
                        elseif($this->uri->segment(1)=='druzyna')
                                echo form_open(site_url() .'/'. 'druzyna/dodajNews/'.$this->uri->segment(3), array('id'=>'form_dodawania_uzytk', 'class'=>'form_dodawania_uzytk'));
                        else echo form_open(site_url() .'/'. 'main/dodajNews', array('id'=>'form_dodawania_uzytk', 'class'=>'form_dodawania_uzytk'));
                    echo form_fieldset("Dodaj News", array('class' => 'form_dodawania_uzytk_fieldset'));
                    //echo '<p>';
                    $login_label_data = array('class' => 'errors');
                    echo form_label('Tytuł', 'login_input', $login_label_data).'<br />';
                    
                    $login_data = array('class' => 'errors', 'name' => 'login_input', 'id' => 'login_input',
                    'maxlength' => '100', 'size' => '50', 'style' => 'width:60%');
                    echo form_input($login_data).'<br />';
                    
                              
                    $email_label_data = array('class' => 'errors');
                    echo form_label('Treść', 'email_input', $email_label_data).'<br />';
                    
                    $email_data = array('class' => 'errors', 'name' => 'email_input', 'id' => 'email_input',
                     'size' => '50', 'style' => 'width:80%; height:80px');
                    echo form_textarea($email_data).'<br />';
  
                    echo '<br /><br />';
                    echo form_submit('dodaj', 'Dodaj news');
                    echo form_fieldset_close();
                    //echo '</p>';
                    echo form_close();
                            
                                        
                       }?>
                 
             <?php foreach($wpisy as $wpis): ?>
                 
                <div class="news_kontener">
                    <div class="news_tytul">
                      <h1>
                           <?=$wpis['tytul'] ?>
                          <?php if(isset($czyAdmin) && ($czyAdmin=='admin_global' || $czyAdmin=='admin' || $czyAdmin=='trener'))
                          echo '<a href=""><img src="'.base_url().'szablony/default/images/b_edit.png" /></a> <a href="'.$wpis['idWpisu'].'" class="usun_news"><img src="'.base_url().'szablony/default/images/b_del.png" /></a>'; ?>
                      </h1>
                        
                    </div>
                    <div class="news_caly">

                        <div class="news_logo">
                            <img src="<?php echo base_url(); ?>szablony/default/images/logosek.png" alt="logo" />
                        </div>
                        <div class="news_tresc">
                             <?=word_limiter($wpis['wpis'], 70, '(..)') ?>
                            <br style="line-height:5px;" /><?php echo anchor(site_url().'/main/wpis/'.$wpis['idWpisu'], 'Read more', array('class'=>'read_more')) ?>
                        </div>
                        <div class="news_author_data">Dodał: <a href="mailto:<?=$wpis['mail'] ?>"><?=$wpis['login'] ?></a>, <?php echo(date('d/m/Y H:i' ,mysql_to_unix($wpis['data']))); ?></div>
                    </div>
                </div><br /><br />
             <?php endforeach ?> 
             <?php if($wpisy2 != null){ ?>
                 
                <div class="newsy_pozostale_kontener">
                    
                    <?php foreach($wpisy2 as $wpis): ?>
                    <div class="newsy_pozostale_caly">
                        <div class="newsy_pozostale_tytul"><?php echo(date('d/m/Y' ,mysql_to_unix($wpis['data']))); ?> - <?php echo anchor(site_url().'/main/wpis/'.$wpis['idWpisu'], $wpis['tytul'], array()) ?>
                        <?php if(isset($czyAdmin) && ($czyAdmin=='admin_global' || $czyAdmin=='admin' || $czyAdmin=='trener'))
                          echo '<a href=""><img src="'.base_url().'szablony/default/images/b_edit.png" /></a> <a href="" class="usun_uzytk"><img src="'.base_url().'szablony/default/images/b_del.png" /></a>'; ?>
                        </div>
                        <div class="newsy_pozostale_tresc"><?=word_limiter($wpis['wpis'], 20) ?></div>
                    </div>
                    <?php endforeach ?>
                    <br style="line-height:5px;" /><a href="#" class="read_more">All news</a>
                </div>
              <?php } ?>
            </div>
        <!--</div>
        </div>-->
	
