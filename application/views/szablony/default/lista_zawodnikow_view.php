<div id="TRESC">
     Zawodnicy w drużynie:
     <ol>
         <?php foreach($zawodnicy as $zawodnik): ?>
         <li><?php echo anchor('zawodnik/wybor/'.$zawodnik['idZawodnika'].'/'.$idLigi, $zawodnik['nazwiskoZawodnika'].' '.$zawodnik['imieZawodnika']); ?></li>
         <?php endforeach; ?>
     </ol>
</div>
