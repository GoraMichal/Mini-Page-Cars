<?php
require("../bazadanych.php");

if (isset($_POST['marki_nazwa'])) {
    
    $stmt = $pdo->prepare("INSERT INTO marki (marki_nazwa) VALUES (:nazwa)");
    $stmt->bindParam( ':nazwa', $_POST['marki_nazwa'] );
    
    $stmt->execute();


    echo "Marka dodana!";

}
?>