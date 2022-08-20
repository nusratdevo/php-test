<?php
$conn = mysqli_connect('localhost', 'root', '', 'testing') or die('connection fail');
$sql = "SELECT * FROM students";

$result = mysqli_query($conn, $sql) or die("SQL query Failed");
$outpur  =mysqli_fetch_all($result , MYSQLI_ASSOC);

echo $json_data = json_encode($output, JSON_PRETTY_PRINT);