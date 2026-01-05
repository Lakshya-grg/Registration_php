<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $theme = $_POST["theme"];
    setcookie("theme", $theme, time() + 86400 * 30);
    header("Location: dashboard.php");
    exit;
}
?>

<form method="post">
    <h2>Select Theme</h2>
    <select name="theme">
        <option value="light">Light Mode</option>
        <option value="dark">Dark Mode</option>
    </select><br><br>
    <button type="submit">Save Preference</button>
</form>