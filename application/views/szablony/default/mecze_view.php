<div id="TRESC">
     <table>
         <tr><th>Kolejka</th><th>Data</th><th>Gospodarz - Gość</th></tr>
         <?php foreach($mecze as $mecz): ?>
         <tr><?php echo '<td>'.$mecz['kolejka'].'</td><td>'.$mecz['data'].'</td><td>'.anchor('mecz/mecz_opis/'.$mecz['idMecze'], $mecz['nazwaGospodarza'].' - '.$mecz['nazwaGoscia'].'</td>'); ?></tr>
         <?php endforeach; ?>
     </table>
</div>