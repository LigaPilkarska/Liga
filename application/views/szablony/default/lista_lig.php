<div id="TRESC">
             <?php foreach($ligi as $liga): ?>
                Wojew�dztwo: <?=$liga['wojewodztwo']?> <br />
                Klasa: <?=$liga['klasa']?> <br />
                Grupa: <?=$liga['grupa']?> <br/>
                Rok: <?=$liga['rok']?> <br />
                <?php echo anchor('liga/wybor/'.$liga['idLigi'], 'Przejd�'); ?><br />
             <?php endforeach; ?>
</div>
