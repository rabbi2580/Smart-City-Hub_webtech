<?php
$conn = mysqli_connect("localhost", "root", "", "smart_city_hub");

if (!$conn) {
    die("Database connection failed");
}
