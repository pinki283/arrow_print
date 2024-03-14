<?php
$conn = mysqli_connect("localhost", "root", "", "arrow_print");
// $conn = mysqli_connect("localhost", "printingclub", "printingclub", "printingclub");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>