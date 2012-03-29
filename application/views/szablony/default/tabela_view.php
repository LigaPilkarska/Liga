<div id="TRESC">
     <table>
         <caption>Tabela ligowa</caption>
         <tr><th>Miejsce</th><th>Nazwa drużyny</th><th>Punkty</th><th>Punkty gosp/gość</th><th>Bramki strzelone/stracone</th></tr>
         <?php $i=0;
         foreach($druzyny as $druzyna): $i++; ?>
         <tr><td><?=$i ?></td><td><?php echo anchor('druzyna/wybor/'.$druzyna['idDruzyny'], $druzyna['nazwaDruzyny']); ?></td><td><?=$druzyna['punkty'] ?></td><td><?=$druzyna['punkty_gosp'].' / '.$druzyna['punkty_gosc'] ?></td><td><?=$druzyna['bramki_strz'].' / '.$druzyna['bramki_strac'] ?></td></tr>
         <?php endforeach; ?>
     </table>
</div>
