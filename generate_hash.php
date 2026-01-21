<?php
$passwords = ["123456", "123456", "123456"]; 

foreach ($passwords as $pwd) {
    echo "Password: $pwd<br>";
    echo "Hash: " . password_hash($pwd, PASSWORD_DEFAULT) . "<br><br>";
}
?>
