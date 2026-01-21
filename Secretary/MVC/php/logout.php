<?php
session_start();
session_unset();
session_destroy();

header("Location: /Smart-City-Hub_webtech/index.php");
exit;
