<?php
require('../bazadanych.php');

if( isset($_POST['nazwa']) ) {
    
    $marka = $_POST['marka'];
    $nazwa = $_POST['nazwa'];
    $opis = $_POST['opis'];
    
    $stmt = $pdo->prepare("INSERT INTO samochody (`marki_id` , `samochody_nazwa`, `samochody_opis`, `samochody_zdjecie`)
    VALUES (:marka, :nazwa, :opis, :zdjecie)");

    $stmt->bindParam(':marka', $marka );    
    $stmt->bindParam(':nazwa', $nazwa );
    $stmt->bindParam(':opis', $opis );
    
    
    if ( isset($_FILES) ) {
        $upload_dir = "../zdjecia/";
        $new_name = time() . $_FILES['zdjecie']['name'];
        
        $target_dir = $upload_dir . $new_name;
        
        
        $check = getimagesize($_FILES["zdjecie"]["tmp_name"]);
        
        if($check !== false) {
            echo "Plik jest zdjęciem. - " . $check["mime"] . ".";
            echo "<br />";
            
            if (move_uploaded_file($_FILES["zdjecie"]["tmp_name"], $target_dir)) {
                echo "Zdjęcie ". basename( $_FILES["zdjecie"]["name"]). " zostało przesłane.";
            } else {
                echo "Ups, coś poszło nie tak przy wysyłaniu zdjęcia.!";
            }
            
            $stmt->bindParam(':zdjecie', $new_name);
        
        } else {
            echo "Plik musi być zdjęciem.";
        }
        
    }
    
    
    $stmt->execute();

    echo '<br>';
    echo "Dodano nowy samochod!";

}

?>

