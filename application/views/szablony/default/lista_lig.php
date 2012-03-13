<div id="TRESC">
    
                    <img style="float: right;" src="<?php echo base_url(); ?>szablony/default/images/wojewodztwa2.png" alt="mapa województw" usemap="#mapa_wojewodztw" />
                    <map id="mapa_wojewodztw" name="mapa_wojewodztw">
                        <area shape="poly" coords="18, 42, 77, 14, 82, 51, 23, 95" href="zachodniopomorskie" alt="woj. zachodniopomorskie" />
                        <area shape="poly" coords="83, 13, 87, 54, 121, 47, 143, 53, 149, 43, 146, 24, 131, 21, 123, 3" href="pomorskie" alt="woj. pomorskie" />
                        <area shape="poly" coords="230, 21, 239, 44, 162, 75, 145, 56, 157, 43, 149, 25, 159, 19" href="warminsko-mazurskie" alt="woj. warmiñsko-mazurskie" />
                        <area shape="poly" coords="234, 25, 250, 23, 273, 90, 251, 111, 237, 104, 210, 63, 240, 43" href="podlaskie" alt="woj. podlaskie" />
                        <area shape="poly" coords="22, 98, 58, 77, 54, 96, 56, 125, 70, 134, 66, 140, 59, 135, 30, 152" href="lubuskie" alt="woj. lubuskie" />
                        <area shape="poly" coords="61, 81, 78, 69, 74, 62 94, 57, 100, 96, 143, 112, 115, 164, 55, 121" href="wielkopolskie" alt="woj. wielkopolskie" />
                        <area shape="poly" coords="101, 55, 119, 48, 144, 55, 160, 70, 147, 111, 100, 96, 94, 65" href="kujawsko-pomorskie" alt="woj. kujawsko-pomorskie" />
                        <area shape="poly" coords="160, 75, 209, 63, 251, 117, 220, 125, 218, 166, 182, 157, 168, 115, 148, 110" href="mazowieckie" alt="woj. mazowieckie" />
                        <area shape="poly" coords="219, 125, 253, 113, 268, 121, 265, 137, 281, 191, 246, 198, 220, 179" href="lubelskie" alt="woj. lubelskie" />
                        <area shape="poly" coords="30, 151, 71, 134, 86, 145, 95, 142, 106, 160, 80, 196, 79, 207, 62, 195, 68, 187, 28, 168" href="dolnoslaskie" alt="woj. dolno¶l±skie" />
                        <area shape="poly" coords="104, 161, 131, 170, 124, 205, 113, 216, 103, 211, 104, 202, 83, 194" href="opolskie" alt="woj. opolskie" />
                        <area shape="poly" coords="132, 170, 164, 180, 166, 194, 156, 197, 143, 215, 156, 235, 141, 243, 114, 213, 125, 206" href="slaskie" alt="woj. ¶l±skie" />
                        <area shape="poly" coords="143, 113, 167, 114, 184, 134, 181, 157, 163, 178, 118, 164" href="lodzkie" alt="woj. ³ódzkie" />
                        <area shape="poly" coords="166, 193, 177, 196, 180, 207, 203, 198, 209, 240, 163, 249, 144, 217" href="malopolskie" alt="woj. ma³opolskie" />
                        <area shape="poly" coords="181, 158, 216, 165, 219, 183, 181, 207, 163, 191, 164, 171" href="swietokrzyskie" alt="woj. ¶wiêtokrzyskie" />
                        <area shape="poly" coords="220, 180, 229, 178, 237, 196, 270, 199, 247, 234, 252, 256, 210, 239, 204, 197" href="podkarpackie" alt="woj. podkarpackie" />
	
                    </map>
    
             <?php foreach($ligi as $liga): ?>
                Województwo: <?=$liga['wojewodztwo']?> <br />
                Klasa: <?=$liga['klasa']?> <br />
                Grupa: <?=$liga['grupa']?> <br/>
                Rok: <?=$liga['rok']?> <br />
                <?php echo anchor('liga/wybor/'.$liga['idLigi'], 'Przejd¼'); ?><br />
             <?php endforeach; ?>
</div>
