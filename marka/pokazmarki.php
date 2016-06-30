<?php
require('../bazadanych.php');
?>

<h1>Marki w bazie</h1>
<ul>
<?php        
    $sql = "SELECT marki_id, marki_nazwa FROM marki";
    
        $statement = $pdo->query($sql);

        if($statement) {
            foreach($statement as $wiersz) {
                echo "<li>" . $wiersz['marki_nazwa'] . " --- <a href='usunmarke.php?id=" . $wiersz['marki_id'] . "'>X</a></li>";        
            }
        }


?>
</ul>

<button onclick="window.location.href='dodajmarke.php'">Dodaj nową markę!</button>