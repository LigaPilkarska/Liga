        <div id="TRESC">
            <div class="news_kontener">
                <?php foreach($wpisy as $wpis): ?>
                <div class="wpis">
                <div class="news_tytul">
                  <h1>
                      <?=$wpis['tytul'] ?>
                  </h1>
                </div>
                <div class="news_caly">
                    
                    <div class="news_logo">
                        <img src="szablony/default/images/news_default.jpg"></img>
                    </div>
                    <div class="news_tresc">
                        <?=$wpis['wpis'] ?>
                        <br style="line-height:5px;"><a href="#" class="read_more">Read more</a>
                    </div>
                </div>
                </div>
                <?php endforeach ?>
            </div>
            
          
            
            <div class="newsy_pozostale_kontener">
                <div class="newsy_pozostale_caly">
                    <div class="newsy_pozostale_tytul">05/03/2012 - <a href="#">News nr 4</a></div>
                    <div class="newsy_pozostale_tresc">Tresc, ble ble ble ble ble. Napiszmy co� wi�cej
                    jak chocia�by to, �e za m�dre to nie jest. Heh, ciekawe jak si� sprawdzi nasz
                    tekst, w ko�cu ble ble ble ble. </div>
                </div>
                <div class="newsy_pozostale_caly">
                    <div class="newsy_pozostale_tytul">05/03/2012 - <a href="#">News nr 5</a></div>
                    <div class="newsy_pozostale_tresc">Tresc, ble ble ble ble ble. Napiszmy co� wi�cej
                    jak chocia�by to, �e za m�dre to nie jest. Tutaj jeszcze troszk� naskrobie!</div>
                </div>
                <div class="newsy_pozostale_caly">
                    <div class="newsy_pozostale_tytul">02/03/2012 - <a href="#">News nr 6</a></div>
                    <div class="newsy_pozostale_tresc">A tutaj paragrafik o jeszcze czym� innym :) echh
                    ale �eby by�o uczciwie, to i tutaj dajmy 3 linijki, by to sie �adniusio komponowa�o.</div>
                </div>
            </div>
            
        </div>
	
