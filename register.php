<!doctype html>
<html lang="nl">

<head>
    <title></title>
    <?php require_once 'head.php'; ?>
</head>

<body>
    <div class="form-container">
        <div class="form-header">
            <h3>Sign Up</h3>
        </div>
        <!-- Убедитесь, что action совпадает с названием вашего PHP-файла -->
        <form action="app/Http/Controllers/registerController.php" method="POST">
            <div class="input-container">
                <!-- Новое поле для имени -->
                <input type="text" placeholder="Full Name" required name="naam" id="naam">

                <input type="text" placeholder="Username" required name="username" id="username">
                <input type="password" placeholder="Create Password" required name="password" id="password">
                <input type="password" placeholder="Re-Enter password" required name="password2" id="password2">
            </div>
            <div class="button">
                <button class="submit" type="submit">Sign Up</button>
            </div>
        </form>
        <div class="signup">
            Already have an account? <a href="index.php">Log In</a>
        </div>
    </div>




</body>