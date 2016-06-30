<?php
session_start();
$stopWatching = isSet( $stopWatching )  ? $stopWatching : false;
try
{
   $pdo = new PDO('mysql:host=localhost;dbname=samochody;encoding=utf8', 'root', 'root');

}
catch(PDOException $e)
{
   echo 'Połączenie nie mogło zostać utworzone: ' . $e->getMessage();
}

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

if(  !isSet( $_SESSION['user'] ) && !$stopWatching ) { //do logowania
   header( 'location: http://localhost/szkolenie/login.php' );
}