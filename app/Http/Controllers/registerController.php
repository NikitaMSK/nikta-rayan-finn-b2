<?php
session_start();

// 1. Проверяем авторизацию
if(isset($_SESSION['user_id'])){
    header("Location: /index.php?msg=account_aangemaakt");
exit;;
}

// 2. Обработка формы
if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    // Путь к БД с учетом расположения контроллера в app/Http/Controllers/
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
        // Проверка пользователя
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
                // Редирект в корень сайта на login.php
                header("Location: /index.php?msg=account_aangemaakt");
                exit;
            } else {
                die("Er is iets misgegaan!");
            }
        }
    }
}
?>
