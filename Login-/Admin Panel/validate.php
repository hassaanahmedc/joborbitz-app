<?php
session_start();
if(isset($_SESSION['loggedin'])){
    header("Location: welcome.php");
}else{

    require_once 'dbconn.php';
    try {
    $pdo = new PDO($attr, $user, $pass, $opts);
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}
$Login = false;
$showError = false;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $password = $_POST["password"];

        // $sql = "SELECT * FROM `admins login` WHERE username='$username' and password='$password'";
        $query = $pdo->query("SELECT * FROM `admins_login` WHERE email='$email'");
        
        $num = $query->rowCount();
        if ($num == 1) {
                $row = $query->fetch(PDO::FETCH_BOTH);
                if (password_verify($password, $row['password'])) {
                    session_start();
                    $Login = true;
                    $_SESSION['loggedin'] = true;
                    header("Location: welcome.php");
                }
                else {
                    $showError ="Invalid Credentials";
                }
        }
        else
        {
            $showError ="Invalid Credentials";
        }
    }
}
?>
