<?php
require_once __DIR__ . "/../php/auth.php";
require_once __DIR__ . "/../db/user_model.php";

$user = user_find_by_id($_SESSION["user_id"]);

if (!$user) {
    header("Location: dashboard.php");
    exit();
}

$msg = $_GET["msg"] ?? "";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<header class="gov-header">
  <div class="wrap">
    <div class="gov-left">
      <div class="seal">SC</div>
      <div class="brand">
        <div class="title">Smart City Citizen Portal</div>
        <div class="subtitle">Edit Profile Information</div>
      </div>
    </div>
    <div class="gov-right">
      <a class="btn-logout" href="dashboard.php">Back</a>
    </div>
  </div>
</header>

<main class="container">
  <div class="auth-grid">
    <div class="card">
      <div class="card-head">
        <h2>Profile details</h2>
        <p>Update your personal information.</p>
      </div>

      <div class="card-body">
        <?php if ($msg === "ok") { ?>
          <div class="notice">Profile updated successfully.</div>
        <?php } ?>

        <form method="POST" action="../php/profile_update.php">

          <label>Username (cannot be changed)</label>
          <input type="text" value="<?php echo htmlspecialchars($user["username"]); ?>" disabled>

          <label>ID Number (cannot be changed)</label>
          <input type="text" value="<?php echo htmlspecialchars($user["id_number"]); ?>" disabled>

          <label>Full Name</label>
          <input type="text" name="name" required
                 value="<?php echo htmlspecialchars($user["name"]); ?>">

          <label>Phone</label>
          <input type="text" name="phone" required
                 value="<?php echo htmlspecialchars($user["phone"]); ?>">

          <label>Location</label>
          <input type="text" name="location" required
                 value="<?php echo htmlspecialchars($user["location"]); ?>">

          <label>Area (optional)</label>
          <input type="text" name="area"
                 value="<?php echo htmlspecialchars($user["area"] ?? ""); ?>">

          <div class="actions">
            <button class="btn btn-primary" type="submit">Save Changes</button>
            <a class="btn" href="dashboard.php">Cancel</a>
          </div>

        </form>
      </div>
    </div>
  </div>
</main>

</body>
</html>
