<?php
include("../db/db.php");

$query = "SELECT * FROM complaints WHERE status='Forwarded'";
$result = mysqli_query($conn, $query);
