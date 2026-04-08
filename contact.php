<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: http://pra-b3-2026-feb-finn-rayan-nikita.test");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" type="image/png" href="favicon.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Contact pagina</title>
    <?php require_once 'head.php'; ?>
</head>

<body>
    <header class="task-header">
        <div class="task-brand">
            <div class="logo">Developerland</div>
            <nav>
                <p>Welkom: <?php echo $_SESSION['username'] ?></p>

                <a href="../index.php">Home</a>
                <a href="create.php" class="btn-action">Nieuwe melding</a>
                <a href="#">Contact</a>
                <a href="../logout.php">Logout</a>
            </nav>
        </div>
    </header>
</body>

</html>