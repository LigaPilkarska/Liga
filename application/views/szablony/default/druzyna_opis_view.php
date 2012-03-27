<div id="TYTUL_STRONY">
    <h3><?=$druzyna->nazwaDruzyny ?></h3>
</div>
<div id="ZAWODNIK">
    <img src="<?php echo base_url(); ?>szablony/loga_druzyn/<?=$druzyna->idDruzyny.'.gif' ?>" alt="zdjęcie_loga_druzyny" />
    Prezes: <?=$druzyna->prezes ?> <br />
    Stadion: <?=$druzyna->stadion ?> <br />
    Liga: <?php echo 'woj. '.$liga->wojewodztwo.', klasa '.$liga->klasa.', grupa '.$liga->grupa ?>
    
</div>