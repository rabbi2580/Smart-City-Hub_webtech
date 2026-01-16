<?php
$conn = new mysqli("localhost", "root", "", "SmartCityHub");

if ($conn->connect_error) {
    die("Database connection failed");
}
