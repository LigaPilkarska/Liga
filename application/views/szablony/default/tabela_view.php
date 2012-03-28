<div id="TRESC">
     <table>
         <caption>Tabela ligowa</caption>
         <tr><th>Nazwa drużyny</th></tr>
         <?php foreach($druzyny as $druzyna): ?>
         <tr><td><?php echo anchor('druzyna/wybor/'.$druzyna['idDruzyny'], $druzyna['nazwaDruzyny']); ?></td></tr>
         <?php endforeach; ?>
     </table>
</div>
