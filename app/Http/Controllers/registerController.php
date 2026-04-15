<?php
session_start();

if(isset($_SESSION['user_id'])){
    header("Location: /index.php?msg=account_aangemaakt");
exit;;
}

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    require_once __DIR__ . '/../../../backend/conn.php';

    $naam = $_POST['naam'] ?? ''; 
    $username = $_POST['username'] ?? ''; 
    $password = $_POST['password'] ?? '';
    $password_check = $_POST['password2'] ?? '';

    if(empty($naam) || empty($username) || empty($password)) {
        die("Vul alle velden in!");
    } elseif($password !== $password_check) {
        die("Wachtwoorden zijn niet gelijk!");
    } else {
        $query = "SELECT * FROM users WHERE username = :username";
        $statement = $conn->prepare($query);
        $statement->execute([":username" => $username]);

        if($statement->rowCount() > 0) {
            die("Error: account bestaat al");
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO users (naam, username, password) VALUES (:naam, :username, :password)";
            $statement = $conn->prepare($query);
            $result = $statement->execute([
                ":naam"     => $naam,
                ":username" => $username,
                ":password" => $hash
            ]);

            if($result) {
                header("Location: /index.php?msg=account_aangemaakt");
                exit;
            } else {
                die("Er is iets misgegaan!");
            }
        }
    }
}
?>
