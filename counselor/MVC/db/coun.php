<?php
$conn = new mysqli("localhost", "root", "", "smart_city_hub");

if ($conn->connect_error) {
    die("Database connection failed");
}
