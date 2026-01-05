<?php
session_start();
require_once "db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $student_id = $_POST["student_id"];
    $password = $_POST["password"];

    $sql = "SELECT password_hash FROM students WHERE student_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $student_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password_hash"])) {
            $_SESSION["logged_in"] = true;
            $_SESSION["student_id"] = $student_id;
            header("Location: dashboard.php");
            exit;
        }
    }
}
?>

<form method="post">
    <h2>Login</h2>
    <input type="text" name="student_id" placeholder="Student ID" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button type="submit">Login</button>
</form>