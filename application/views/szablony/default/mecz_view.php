<div id="TYTUL_STRONY">
    <h3><?=$mecz->nazwaGospodarza.' - '.$mecz->nazwaGoscia ?></h3>
</div>
<div id="ZAWODNIK">
    Kolejka: <?=$mecz->kolejka ?> <br />
    Data: <?=$mecz->data ?> <br />
    Mecz: <?=$mecz->nazwaGospodarza.' - '.$mecz->nazwaGoscia ?> <br />
    Wynik: <?=$mecz->bramkiGospodarza.' - '.$mecz->bramkiGoscia ?> <br />
    Sędzia: <?=$mecz->sedzia ?> <br />

<div class="kontener_uczestnictw">
<div class="uczestnictwa">
    <table>
         <caption>Uczestnictwa drużyny <?=$mecz->nazwaGospodarza ?></caption>
         <tr><th>Nazwisko</th><th>Imię</th><th>Pozycja</th><th>Wejście</th><th>Zejście</th><tr>
         <?php foreach($ucz_gosp as $ucz): ?>
         <tr><td><?=$ucz['nazwiskoZawodnika'] ?></td><td><?=$ucz['imieZawodnika'] ?></td><td><?=$ucz['pozycja'] ?></td><td><?=$ucz['wejscie'] ?></td><td><?=$ucz['zejscie'] ?></td></tr>
         <?php endforeach; ?>
     </table>
</div>
<div class="uczestnictwa">
    <table>
         <caption>Uczestnictwa drużyny <?=$mecz->nazwaGoscia ?></caption>
         <tr><th>Nazwisko</th><th>Imię</th><th>Pozycja</th><th>Wejście</th><th>Zejście</th><tr>
         <?php foreach($ucz_gosc as $ucz): ?>
         <tr><td><?=$ucz['nazwiskoZawodnika'] ?></td><td><?=$ucz['imieZawodnika'] ?></td><td><?=$ucz['pozycja'] ?></td><td><?=$ucz['wejscie'] ?></td><td><?=$ucz['zejscie'] ?></td></tr>
         <?php endforeach; ?>
     </table>
</div>
</div>
<div class="kontener_uczestnictw">
<div class="uczestnictwa">
    <table>
         <caption>Wydarzenia drużyny <?=$mecz->nazwaGospodarza ?></caption>
         <tr><th>Nazwisko</th><th>Imię</th><th>Zdarzenie</th><th>Minuta</th><tr>
         <?php foreach($wyd_gosp as $ucz): ?>
         <tr><td><?=$ucz['nazwiskoZawodnika'] ?></td><td><?=$ucz['imieZawodnika'] ?></td><td><?=$ucz['zdarzenie'] ?></td><td><?=$ucz['minuta'] ?></td></tr>
         <?php endforeach; ?>
     </table>
</div>
<div class="uczestnictwa">
    <table>
         <caption>Wydarzenia drużyny <?=$mecz->nazwaGoscia ?></caption>
         <tr><th>Nazwisko</th><th>Imię</th><th>Zdarzenie</th><th>Minuta</th><tr>
         <?php foreach($wyd_gosc as $ucz): ?>
         <tr><td><?=$ucz['nazwiskoZawodnika'] ?></td><td><?=$ucz['imieZawodnika'] ?></td><td><?=$ucz['zdarzenie'] ?></td><td><?=$ucz['minuta'] ?></td></tr>
         <?php endforeach; ?>
     </table>
</div>
</div>
</div>