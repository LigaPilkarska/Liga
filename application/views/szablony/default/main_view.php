            
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
                            <br style="line-height:5px;" /><a href="#" class="read_more">Read more</a>
                        </div>
                        <div class="news_author_data">Doda³: <a href="#">14Lukas14</a>, 10/03/2012 16:12</div>
                    </div>
                </div><br /><br />
             <?php endforeach ?>
                 
                <div class="newsy_pozostale_kontener">
                    
                    <?php foreach($wpisy2 as $wpis): ?>
                    <div class="newsy_pozostale_caly">
                        <div class="newsy_pozostale_tytul">05/03/2012 - <a href="#"><?=$wpis['tytul'] ?></a></div>
                        <div class="newsy_pozostale_tresc"><?=$wpis['wpis'] ?></div>
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
                    </div>-->
                    <br style="line-height:5px;" /><a href="#" class="read_more">All news</a>
                </div>

            </div>
        </div>
	
