<?php
include 'db.php';
$error = '';
if (!isset($_GET['id'])) { header('Location: index.php'); exit; }
$id = (int)$_GET['id'];
$res = $conn->query("SELECT * FROM students WHERE id=$id");
if ($res->num_rows == 0) { header('Location: index.php'); exit; }
$student = $res->fetch_assoc();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $roll = $conn->real_escape_string($_POST['roll_no']);
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $dept = $conn->real_escape_string($_POST['department']);
    $year = (int)$_POST['year'];
    if ($conn->query("UPDATE students SET roll_no='$roll', name='$name', email='$email', department='$dept', year=$year WHERE id=$id")) {
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
    <title>Edit Student</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="container">
    <h1>Edit Student</h1>
    <?php if($error): ?><p class="error"><?= $error ?></p><?php endif; ?>
    <form method="post">
        <label>Roll No</label><input name="roll_no" value="<?= htmlspecialchars($student['roll_no']) ?>" required>
        <label>Name</label><input name="name" value="<?= htmlspecialchars($student['name']) ?>" required>
        <label>Email</label><input name="email" type="email" value="<?= htmlspecialchars($student['email']) ?>">
        <label>Department</label><input name="department" value="<?= htmlspecialchars($student['department']) ?>">
        <label>Year</label><input name="year" type="number" min="1" max="8" value="<?= htmlspecialchars($student['year']) ?>">
        <button type="submit" class="btn">Update</button>
        <a class="btn secondary" href="index.php">Cancel</a>
    </form>
</div>
</body>
</html>
