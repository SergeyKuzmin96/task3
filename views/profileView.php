<?php

session_start();

if (!$_SESSION['user']) {
    header('Location: /');
}
$dir_original = "../public/uploads/original/";
$dir_mini = "../public/uploads/mini/";

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Профиль</title>

    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Профиль -->

<form>
    <h2 style="margin: 10px 0;"><?= $_SESSION['user']['login'] ?></h2>
    <a href="changePersonalDataView.php">Смена личных данных</a>
    <br>
    <a href="../controllers/logoutController.php" class="logout">Выход</a>
</form>


<script src="../assets/js/jquery-3.6.0.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>

</body>
</html>