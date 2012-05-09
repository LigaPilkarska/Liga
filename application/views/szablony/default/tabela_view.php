<div id="TRESC">
     <table border=1 cellpadding=2 rules='all'>
         <caption><?php echo lang('name_table') ?></caption>
         <tr><th>Poz</th><th><?php echo lang('name') ?></th><th>Pkt</th><th>Pkt D/W</th><th>Br +/-</th></tr>
         <?php $i=0;
         foreach($druzyny as $druzyna): $i++; ?>
         <tr><td><?=$i ?></td><td><?php echo anchor('druzyna/wybor/'.$druzyna['idDruzyny'], $druzyna['nazwaDruzyny']); ?></td><td><?=$druzyna['punkty'] ?></td><td><?=$druzyna['punkty_gosp'].' / '.$druzyna['punkty_gosc'] ?></td><td><?=$druzyna['bramki_strz'].' / '.$druzyna['bramki_strac'] ?></td></tr>
         <?php endforeach; ?>
     </table>
</div>
