<?php
require('../bazadanych.php');
$limit = 3;

$sth = $pdo->prepare('SELECT COUNT(*) AS count FROM samochody;');
$sth->execute();
$result = $sth->fetch();

$counter = $result['count'];

$page = isSet($_GET['page']) ? intval($_GET['page']) : 1;
$from = ( $page - 1 ) * $limit;

$sth = $pdo->prepare('SELECT samochody.*, marki.marki_id FROM samochody LEFT JOIN marki ON samochody.marki_id = marki.marki_id ORDER BY samochody.marki_id DESC LIMIT ' . $from . ', ' . $limit );
$sth->execute();
$result=$sth-> fetchAll();


echo '<table border="1">';
echo '<tr>';
echo '<td>samochody_id</td>';
echo '<td>samochody_nazwa</td>';
echo '<td>samochody_opis</td>';
echo '<td>samochody_zdjecie</td>';
echo '</tr>';

foreach( $result as $key => $wiersz ) {

    echo '<tr>';
    echo '<td>' . $wiersz['samochody_id'] . '</td>';
    echo '<td>' . $wiersz['samochody_nazwa'] . '</td>';
    echo '<td>' . $wiersz['samochody_opis'] . '</td>';
    echo '<td>' . "<img src='../zdjecia/" . $wiersz['samochody_zdjecie'] . "'width='200'>" . '</td>';
    echo '<td>' . "<a href='edytujauto.php?id=" . $wiersz['samochody_id'] . "'>Usun</td>";
    echo '</tr>';
}
echo '</table>';

$pack = ceil($counter / $limit);

$starter = ($page) - 3;
if ($starter < 1) {
    $starter = 1;
}

$ender = ($page) + 3;

if ($ender - $starter < 6) {
    $ender = 7;
}

if (($counter % $limit) === 0){
    $pages = $counter / $limit;
} else {
    $pages = floor($counter / $limit) + 1;
}
if ($ender > $pages){
    $ender = $pages;
    $starter = $ender - 6;
}

if ($starter < 1){
    $starter = 1;
}
for ($i = $starter; $i <= $ender; $i++) {
    $sAdd = ( $i == 1 ) ? '' : ' ';
    $sBold = ( $i == $page ) ? 'style="font-weight:bold;font-size:20px;"' : '';
    echo $sAdd . '<a ' . $sBold . ' class="paginator" href="?page=' . $i . '">' . $i . '</a>';
}

?>

<button onclick="window.location.href='dodajauto.php'">Dodaj nowe auto!</button>