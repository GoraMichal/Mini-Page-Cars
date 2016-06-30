<?php
require("../bazadanych.php");

if (isset($_GET['id'])) {

    $sql = "DELETE FROM samochody WHERE samochody_id =" . $_GET['id'];
    
    $pdo->exec($sql);

    echo "Samochod usunięty!";

}
?>