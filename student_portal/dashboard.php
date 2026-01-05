<?php
session_start();

if (!isset($_SESSION["logged_in"])) {
    header("Location: login.php");
    exit;
}

$theme = $_COOKIE["theme"] ?? "light";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body {
            background-color: <?= $theme === "dark" ? "#000" : "#fff" ?>;
            color: <?= $theme === "dark" ? "#fff" : "#000" ?>;
        }
    </style>
</head>
<body>

<h2>Welcome, <?= $_SESSION["student_id"] ?></h2>

<a href="preference.php">Change Theme</a><br><br>
<a href="logout.php">Logout</a>

</body>
</html>