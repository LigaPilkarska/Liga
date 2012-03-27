<div id="TYTUL_STRONY">
    <h3><?=$zawodnik->nazwiskoZawodnika.' '.$zawodnik->imieZawodnika ?></h3>
</div>
<div id="ZAWODNIK">
    <img src="<?php echo base_url(); ?>szablony/zawodnicy/<?=$zawodnik->idZawodnika.'.png' ?>" alt="zdjęcie_zawodnika" />
    Data urodzenia: <?=$zawodnik->dataUrodzenia ?> <br />
    Pozycja: <?=$zawodnik->pozycja ?> <br />
    Wzrost: <?=$zawodnik->wzrost.' cm' ?> <br />
    Waga: <?=$zawodnik->waga.' kg' ?> <br />
    Drużyna: <?=$druzyna->nazwaDruzyny ?>
    
</div>