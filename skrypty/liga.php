<?php
//header("Content-Type: text/html; charset=iso-8859-2");
// nawiazujemy polaczenie
$connection = @mysql_connect('localhost', 'root', '')
// w przypadku niepowodznie wy¶wietlamy komunikat
or die('Brak po³±czenia z serwerem MySQL.<br />B³±d: '.mysql_error());
// po³±czenie nawi±zane ;-)
// nawi±zujemy po³±czenie z baz± danych
$db = @mysql_select_db('ligapilkarska', $connection)
// w przypadku niepowodzenia wy¶wietlamy komunikat
or die('Nie mogê po³±czyæ siê z baz± danych<br />B³±d: '.mysql_error());
// po³±czenie nawi±zane ;-)
mysql_query('SET NAMES latin2');
//$query='INSERT INTO ligi VALUES(null, "lubuskie", "A", "Inowroc³aw", "2012")';

$query = 'SELECT * FROM ligi WHERE wojewodztwo="'.$_POST['idLigi'].'"';
echo $query;
//mysql_query('SET NAMES latin2');
$wynik = mysql_query($query);
//mysql_query('SET NAMES latin2');
?>
<ul>
    <?php while($r = mysql_fetch_assoc($wynik)) {
        echo '<li><a href = "http://localhost/liga/index.php/liga/wybor/'.$r['idLigi'].'">Klasa:'.$r['klasa'].' / Grupa: '.$r['grupa'].'</a></li>';
    }
    ?>
</ul>
<?php // zamykamy po³±czenie
mysql_close($connection);
?>
