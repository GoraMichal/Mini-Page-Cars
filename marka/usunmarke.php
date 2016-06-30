<?php
require("../bazadanych.php");

if (isset($_GET['id'])) {

    $sql = "DELETE FROM marki WHERE marki_id =" . $_GET['id'];
    
    $pdo->exec($sql);

    echo "Marka usunięta!";

}
?>