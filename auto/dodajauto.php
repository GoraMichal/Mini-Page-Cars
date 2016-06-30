<?php
require("../bazadanych.php");
?>

<h1>Dodaj auto</h1>

<form enctype="multipart/form-data" action="zapiszauto.php" method="post">    
    <select name="marka">
        <?php
        
        $sql = "SELECT marki_id, marki_nazwa FROM marki";
        $statement = $pdo->query($sql);

        if($statement) {
            foreach($statement as $wiersz) {
                echo "<option value='" . $wiersz['marki_id'] . "'>" . $wiersz['marki_nazwa'] . "</option>";
        
            }
        }
                
        ?>
    </select>
    <br />
    
    <input type="text" name="nazwa" placeholder="Nazwa auta"/>
    <br />
    
    <textarea name="opis" placeholder="Opis Auta"></textarea>
    <br />
    
    
    <input type="file" name="zdjecie" />
    <br />
    
    <input type="submit" value="zapisz">
</form>