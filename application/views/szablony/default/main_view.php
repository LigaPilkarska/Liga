            
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
                            <img src="<?php echo base_url(); ?>szablony/default/images/logosek.png" alt="logo" />
                        </div>
                        <div class="news_tresc">
                             <?=substr($wpis['wpis'], 0, 400) ?>...
                            <br style="line-height:5px;" /><?php echo anchor(site_url().'/main/wpis/'.$wpis['idWpisu'], 'Read more', array('class'=>'read_more')) ?>
                        </div>
                        <div class="news_author_data">Doda�: <a href="mailto:<?=$wpis['mail'] ?>"><?=$wpis['login'] ?></a>, <?php echo(date('d/m/Y H:i' ,mysql_to_unix($wpis['data']))); ?></div>
                    </div>
                </div><br /><br />
             <?php endforeach ?>
                 
                <div class="newsy_pozostale_kontener">
                    
                    <?php foreach($wpisy2 as $wpis): ?>
                    <div class="newsy_pozostale_caly">
                        <div class="newsy_pozostale_tytul"><?php echo(date('d/m/Y' ,mysql_to_unix($wpis['data']))); ?> - <?php echo anchor(site_url().'/main/wpis/'.$wpis['idWpisu'], $wpis['tytul'], array()) ?></div>
                        <div class="newsy_pozostale_tresc"><?=substr($wpis['wpis'], 0, 150) ?>...</div>
                    </div>
                    <?php endforeach ?>
                    <br style="line-height:5px;" /><a href="#" class="read_more">All news</a>
                </div>

            </div>
        </div>
        <!--</div>-->
	
