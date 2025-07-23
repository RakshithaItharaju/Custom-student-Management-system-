<?php
include 'db_config.php';
if ($_POST) {
    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $query = "INSERT INTO students (name, roll_no) VALUES ('$name', '$roll')";
    mysqli_query($conn, $query);
    echo "Student added successfully.";
}
?>
<form method="post">
    Name: <input name="name"><br>
    Roll No: <input name="roll"><br>
    <input type="submit" value="Add Student">
</form>
