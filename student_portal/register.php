<?php
require_once "db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $student_id = $_POST["student_id"];
    $name = $_POST["name"];
    $password = $_POST["password"];

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $sql = "INSERT INTO students (student_id, name, password_hash) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $student_id, $name, $hashedPassword);

    if ($stmt->execute()) {
        header("Location: login.php");
        exit;
    }
}
?>

<form method="post">
    <h2>Register</h2>
    <input type="text" name="student_id" placeholder="Student ID" required><br><br>
    <input type="text" name="name" placeholder="Name" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button type="submit">Register</button>
</form>