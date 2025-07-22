<?php
$conn = mysqli_connect("localhost", "root", "", "sqli_lab");
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}
