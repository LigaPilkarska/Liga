<div id="TRESC">
     <ul>
         <li>Kolejka | Data | Gospodarz - Gość</li>
         <?php foreach($mecze as $mecz): ?>
         <li><?php echo anchor('mecz/mecz_opis/'.$mecz['idMecze'], $mecz['kolejka'].' '.$mecz['data'].' '.$mecz['nazwaGospodarza'].' - '.$mecz['nazwaGoscia']); ?></li>
         <?php endforeach; ?>
     </ul>
</div>