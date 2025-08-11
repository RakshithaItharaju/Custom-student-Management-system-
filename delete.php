<?php
include 'db.php';
if (!isset($_GET['id'])) { header('Location: index.php'); exit; }
$id = (int)$_GET['id'];
$conn->query("DELETE FROM students WHERE id=$id");
header('Location: index.php');
exit;
?>