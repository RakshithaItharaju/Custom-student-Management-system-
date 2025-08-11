<?php
include 'db.php';
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $roll = $conn->real_escape_string($_POST['roll_no']);
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $dept = $conn->real_escape_string($_POST['department']);
    $year = (int)$_POST['year'];
    if ($conn->query("INSERT INTO students (roll_no, name, email, department, year) VALUES ('$roll','$name','$email','$dept',$year)")) {
        header('Location: index.php');
        exit;
    } else {
        $error = 'Error: ' . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Add Student</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="container">
    <h1>Add Student</h1>
    <?php if($error): ?><p class="error"><?= $error ?></p><?php endif; ?>
    <form method="post">
        <label>Roll No</label><input name="roll_no" required>
        <label>Name</label><input name="name" required>
        <label>Email</label><input name="email" type="email">
        <label>Department</label><input name="department">
        <label>Year</label><input name="year" type="number" min="1" max="8">
        <button type="submit" class="btn">Save</button>
        <a class="btn secondary" href="index.php">Cancel</a>
    </form>
</div>
</body>
</html>
