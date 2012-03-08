<div id="TRESC">
     Dru¿yny w lidze:
     <ol>
         <?php foreach($druzyny as $druzyna): ?>
         <li><?php echo anchor('druzyna/wybor/'.$druzyna['idDruzyny'], $druzyna['nazwaDruzyny']); ?></li>
         <?php endforeach; ?>
     </ol>
</div>