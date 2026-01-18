<?php
require_once __DIR__ . "/auth.php";
require_once __DIR__ . "/complaint_model.php";

$complaints = complaint_get_by_user((int) $_SESSION["user_id"]);

require_once __DIR__ . "/../html/complaint_list_view.php";
