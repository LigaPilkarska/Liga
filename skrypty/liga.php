<?php
//header("Content-Type: text/html; charset=iso-8859-2");
// nawiazujemy polaczenie
$connection = @mysql_connect('localhost', 'root', '')
// w przypadku niepowodznie wy�wietlamy komunikat
or die('Brak po��czenia z serwerem MySQL.<br />B��d: '.mysql_error());
// po��czenie nawi�zane ;-)
// nawi�zujemy po��czenie z baz� danych
$db = @mysql_select_db('ligapilkarska', $connection)
// w przypadku niepowodzenia wy�wietlamy komunikat
or die('Nie mog� po��czy� si� z baz� danych<br />B��d: '.mysql_error());
// po��czenie nawi�zane ;-)
mysql_query('SET NAMES utf8');
//$query='INSERT INTO ligi VALUES(null, "lubuskie", "A", "Inowroc�aw", "2012")';

$query = 'SELECT * FROM ligi WHERE wojewodztwo="'.$_POST['idLigi'].'"';
//echo $query;
//mysql_query('SET NAMES latin2');
$wynik = mysql_query($query);
//mysql_query('SET NAMES latin2');
echo '<h3>'.$_POST['idLigi'].'</h3>';
if(mysql_num_rows($wynik)>0) {
    echo '<ul>';
    while($r = mysql_fetch_assoc($wynik)) {
        echo '<li><a href = "http://localhost/liga/index.php/liga/wybor/'.$r['idLigi'].'">Klasa:'.$r['klasa'].' / Grupa: '.$r['grupa'].'</a></li>';
    }
    
    echo '</ul>';

}
else { 
    echo 'Niestety dla tego wojew�dztwa nie ma jeszcze wprowadzonych �adnych lig!';
 }
mysql_close($connection);
?>
