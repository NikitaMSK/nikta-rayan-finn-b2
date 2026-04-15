<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: http://pra-b3-2026-feb-finn-rayan-nikita.test");
}

?>
<?php require_once '../backend/conn.php'; ?>
<!doctype html>
<html lang="nl">

<head>
    <link rel="icon" type="image/png" href="../favicon.png">
    <title>New task</title>
    <link rel="stylesheet" href="../css/newmeld.css">
</head>

<body>



    <div class="container">
        <h1>New Task</h1>

        <form action="<?php echo $base_url; ?>/app/Http/Controllers/takenController.php" method="POST">
            <input type="hidden" name="action" value="create">

            <div class="form-group">
                <label for="attractie">Titel:</label>
                <input type="text" name="attractie" id="attractie" class="form-input" placeholder="titel">
            </div>
              <div class="form-group">
                <label for="afdeling">Department</label>
                <select name="afdeling" id="afdeling">
                    <option value="">-- Choose a department --</option>
                    <option value="IT">IT</option>
                    <option value="HR">HR</option>
                    <option value="Marketing">Marketing</option>
                    <option value="Finance">Finance</option>
                    <option value="Klantenservice">Customer Service</option>
                    <option value="Facilitair">Facilities</option>
                    <option value="Onderhoud">Maintenance</option>
                    <option value="Management">Management</option>
                </select>
            </div>
            <div class="form-group">
                <input type="checkbox" name="prioriteit" id="prioriteit">
                <label for="prioriteit">Done or not done</label>

            </div>
            <div class="form-group">
                <label for="melder">Username:</label>
                <input type="text" name="melder" id="melder" class="form-input" placeholder="username">
            </div>
            <div class="form-group">
                <label for="datetime">Deadline:</label>
                <input type="datetime-local" name="datetime" id="datetime" class="form-input">
            </div>
            <div class="form-group">
                <label for="info">Description:</label>
                <input type="text" name="info" id="info" class="form-input" placeholder="Description">
            </div>

            <div class="form-group">

                <input type="submit" value="Send task" class="sumbit-btn">
            </div>

        </form>
    </div>






</body>

</html>