            
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
                             <?=substr($wpis['wpis'], 0, 400) ?>...
                            <br style="line-height:5px;" /><?php echo anchor(site_url().'/main/wpis/'.$wpis['idWpisu'], 'Read more', array('class'=>'read_more', 'alt'=>'Przeczytaj wiêcej')) ?>
                        </div>
                        <div class="news_author_data">Doda³: <a href="mailto:<?=$wpis['mail'] ?>"><?=$wpis['login'] ?></a>, <?php echo(date('d/m/Y H:i' ,mysql_to_unix($wpis['data']))); ?></div>
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
                    
                    <!--<div class="newsy_pozostale_caly">
                        <div class="newsy_pozostale_tytul">05/03/2012 - <a href="#">News nr 5</a></div>
                        <div class="newsy_pozostale_tresc">Tresc, ble ble ble ble ble. Napiszmy co¶ wiêcej
                        jak chocia¿by to, ¿e za m±dre to nie jest. Tutaj jeszcze troszkê naskrobie!</div>
                    </div>
                    <div class="newsy_pozostale_caly">
                        <div class="newsy_pozostale_tytul">02/03/2012 - <a href="#">News nr 6</a></div>
                        <div class="newsy_pozostale_tresc">A tutaj paragrafik o jeszcze czym¶ innym :) echh
                        ale ¿eby by³o uczciwie, to i tutaj dajmy 3 linijki, by to sie ³adniusio komponowa³o.</div>
                    </div>
                    
                    <img src="<?php echo base_url(); ?>szablony/default/images/wojewodztwa2.png" alt="mapa województw" usemap="#mapa_wojewodztw" />
                    <map id="mapa_wojewodztw" name="mapa_wojewodztw">
                        <area shape="poly" coords="18px, 42px, 77px, 14px, 82px, 51px, 23px, 95px" href="zachodniopomorskie" alt="woj. zachodniopomorskie" />
                        <area shape="poly" coords="83px, 13px, 87px, 54px, 121px, 47px, 143px, 53px, 149px, 43px, 146px, 24px, 131px, 21px, 123px, 3px" href="pomorski" alt="woj. pomorskie" />
	
                    </map>-->
                    
                    <img src="<?php echo base_url(); ?>szablony/default/images/wojewodztwa2.png" alt="mapa województw" usemap="#mapa_wojewodztw" />
                    <map id="mapa_wojewodztw" name="mapa_wojewodztw">
                        <area shape="poly" coords="18, 42, 77, 14, 82, 51, 23, 95" href="zachodniopomorskie" alt="woj. zachodniopomorskie" />
                        <area shape="poly" coords="83, 13, 87, 54, 121, 47, 143, 53, 149, 43, 146, 24, 131, 21, 123, 3" href="pomorski" alt="woj. pomorskie" />
	
                    </map>
                    
                    
                    <br style="line-height:5px;" /><a href="#" class="read_more">All news</a>
                </div>

            </div>
        </div>
	
