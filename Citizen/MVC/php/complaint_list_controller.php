<?php
require_once "auth.php";
require_once "complaint_model.php";

$complaints = complaint_get_by_user($_SESSION["user_id"]);

require_once __DIR__ . "/../html/complaint_list_view.php";
