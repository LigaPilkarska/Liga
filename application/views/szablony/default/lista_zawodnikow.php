<div id="TRESC">
     Zawodnicy w dru¿ynie:
     <ol>
         <?php foreach($zawodnicy as $zawodnik): ?>
         <li><?php echo anchor('zawodnik/wybor/'.$zawodnik['idZawodnika'], $zawodnik['nazwiskoZawodnika'].' '.$zawodnik['imieZawodnika']); ?></li>
         <?php endforeach; ?>
     </ol>
</div>
