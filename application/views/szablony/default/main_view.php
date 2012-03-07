            
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
                    <br style="line-height:5px;" /><a href="#" class="read_more">All news</a>
                </div>

            </div>
        </div>
	
