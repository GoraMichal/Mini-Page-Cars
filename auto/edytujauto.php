<?php
require("../bazadanych.php");
?>

<h1>Edytuj auto</h1>

<form enctype="multipart/form-data" action="zapiszedycje.php" method="post">
    <select name="marka">
        <?php
        $sth = $pdo->prepare('SELECT marki_id FROM samochody WHERE samochody.samochody_id = :id');
        $sth->bindParam('id', $_GET['id']);
        $sth->execute();
        $id_marki = $sth->fetchAll(); // znjadz czy do tego nie ma parametru usuwajacego pierwszy element tablicy
//        var_dump($id_marki[0]['marki_id']);

        //$sth = $pdo->prepare('SELECT marki.* FROM samochody LEFT JOIN marki ON samochody.marki_id = marki.marki_id WHERE samochody_id = ' .$_GET['id']);
        $sth = $pdo->prepare('SELECT marki_id, marki_nazwa FROM marki;');
        $sth->execute();
        $statement = $sth->fetchAll();

        if($statement) {
            foreach($statement as $wiersz) {
                echo "<option value='" . $wiersz['marki_id'] . "'" . ($id_marki[0]['marki_id'] == $wiersz['marki_id'] ? ' selected' : '') . ">" . $wiersz['marki_nazwa'] . "</option>";

            }
        }


        ?>
    </select>
    <br />

    <?php
    $sth = $pdo->prepare('SELECT samochody.*, marki.* FROM samochody LEFT JOIN marki ON samochody.marki_id = marki.marki_id WHERE samochody_id = ' .$_GET['id']);
    $sth->execute();
    $result = $sth->fetchAll();


    foreach ($result as $key => $wiersz) {


        echo '<input type="text" name="nazwa" value=" '. $wiersz['samochody_nazwa'] .'">'; ?>
        <br/>
        <?php
        echo '<input type="text" name="opis" value=" '. $wiersz['samochody_opis'] .'">';
    }
    ?>

    <br />

    <input type="submit" value="zapisz">
</form>