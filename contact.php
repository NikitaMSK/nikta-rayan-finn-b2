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
    <link rel="stylesheet" href="css/contact.css">
    <meta charset="UTF-8">
    <meta name="viewport">
    <title>Contact pagina</title>
</head>

<body>
    <header class="task-header">
        <div class="form-group">
            <form action="">
                <div class="logo">Developerland</div>
                <nav>
                    <p>Welkom: <?php echo $_SESSION['username'] ?></p>

                    <a href="../index.php">Home</a>
                    <a href="../create.php" class="btn-action">New Task</a>
                    <a href="../logout.php">Log out</a>
                </nav>
            </form>
        </div>
    </header>
    <main>
        <form class="contact-form" onsubmit="return false;">
            <div class="input-group">
                <label for="name">Name</label>
                <input type="text" id="name" >
            </div>

            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email">
            </div>

            <div class="input-group">
                <label for="message">Message</label>
                <textarea id="message" ></textarea>
            </div>

            <button type="submit" class="submit-btn">Sumbit</button>
        </form>
    </main>
</body>

</html>