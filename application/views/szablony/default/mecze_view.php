<div id="TRESC">
     <table>
         <tr><th><?php echo lang('queue') ?></th><th><?php echo lang('date') ?></th><th><?php echo lang('host') ?></th></tr>
         <?php foreach($mecze as $mecz): ?>
         <tr><?php echo '<td>'.$mecz['kolejka'].'</td><td>'.$mecz['data'].'</td><td>'.anchor('mecz/mecz_opis/'.$mecz['idMecze'].'/'.$idLigi, $mecz['nazwaGospodarza'].' - '.$mecz['nazwaGoscia'].'</td>'); ?></tr>
         <?php endforeach; ?>
     </table>
</div>