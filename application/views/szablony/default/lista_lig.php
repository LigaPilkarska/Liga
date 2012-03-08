<div id="TRESC">
             <?php foreach($ligi as $liga): ?>
                Województwo: <?=$liga['wojewodztwo']?> <br />
                Klasa: <?=$liga['klasa']?> <br />
                Grupa: <?=$liga['grupa']?> <br/>
                Rok: <?=$liga['rok']?> <br />
                <?php echo anchor('liga/wybor/'.$liga['idLigi'], 'Przejd¼'); ?><br />
             <?php endforeach; ?>
</div>
