<div id="TYTUL_STRONY">
    <h3><?=$mecz->nazwaGospodarza.' - '.$mecz->nazwaGoscia ?></h3>
</div>
<div id="ZAWODNIK">
    Kolejka: <?=$mecz->kolejka ?> <br />
    Data: <?=$mecz->data ?> <br />
    Mecz: <?=$mecz->nazwaGospodarza.' - '.$mecz->nazwaGoscia ?> <br />
    Wynik: <?=$mecz->bramkiGospodarza.' - '.$mecz->bramkiGoscia ?> <br />
    Sędzia: <?=$mecz->sedzia ?> <br />

<div class="uczestnictwa">
    <ul>
         <li>Uczestnictwa drużyny <?=$mecz->nazwaGospodarza ?></li>
         <?php foreach($ucz_gosp as $ucz): ?>
         <li><?=$ucz['nazwiskoZawodnika'].' '.$ucz['imieZawodnika'].' '.$ucz['pozycja'].' '.$ucz['wejscie'].' '.$ucz['zejscie'] ?></li>
         <?php endforeach; ?>
     </ul>
</div>
<div class="uczestnictwa">
    <ul>
         <li>Uczestnictwa drużyny <?=$mecz->nazwaGoscia ?></li>
         <?php foreach($ucz_gosc as $ucz): ?>
         <li><?=$ucz['nazwiskoZawodnika'].' '.$ucz['imieZawodnika'].' '.$ucz['pozycja'].' '.$ucz['wejscie'].' '.$ucz['zejscie'] ?></li>
         <?php endforeach; ?>
     </ul>
</div>
</div>