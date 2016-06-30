<?php
$stopWatching = true;  //do logowania
require("bazadanych.php");

class user
{
    private $pdo;

    public function __construct($pdo){
    $this->pdo = $pdo;

    }

    public function Login($login, $password){
        if (!empty($login) && !empty($password)){
            $st = $this->pdo->prepare("SELECT * FROM user WHERE login=:login and password=:password");
            $st->bindParam(':login', $login);
            $st->bindParam(':password', $password);
            $st->execute();

            if ($st->rowCount() == 1) {
                echo "Weryfikacja";
                $_SESSION['user'] = 1; //zwraca zalogowane usera
                     }else {
                echo 'Niepoprawne';
             }
        }else{
             echo 'Wprowadz dane';
        }
    }
}
?>

<?php
    if(isset($_POST['login'])){
        $login = $_POST['login'];
        $password = $_POST['password'];

        $object = new user($pdo);
        $object -> Login($login, $password);
        header('location: index.php');
    }
?>
<?php
    if(isset($_POST['']))
?>
<body>
<form name="form-logowanie" action="login.php" method="post">
    Login: <input name="login" type="text"><br>
    Haslo: <input name="password" type="password">
    <input name="zaloguj" value="Zaloguj" type="submit">
</form>
</body>


<!--session_destroy();-->