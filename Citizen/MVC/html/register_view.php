<?php
session_start();
$message = $_SESSION["reg_message"] ?? "";
$form_data = $_SESSION["reg_form_data"] ?? [];
unset($_SESSION["reg_message"]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Citizen Registration</title>
  <link rel="stylesheet" href="../css/style.css">
  <script src="../js/register_validation.js" defer></script>
</head>
<body>

<header class="gov-header">
  <div class="wrap">
    <div class="gov-left">
      <div class="seal">SC</div>
      <div class="brand">
        <div class="title">Smart City Citizen Portal</div>
        <div class="subtitle">Citizen Registration</div>
      </div>
    </div>

    <div class="gov-right">
      <a class="btn-logout" href="login_view.php">Back to Login</a>
    </div>
  </div>
</header>

<main class="container">
  <div class="auth-grid">
    <div class="card">
      <div class="card-head">
        <h2>Create a Citizen Account</h2>
        <p>Please provide accurate information to complete registration.</p>
      </div>

      <div class="card-body">
        <?php if ($message): ?>
          <div class="<?php echo (stripos($message, "successful") !== false) ? "notice" : "alert"; ?>">
            <?php echo htmlspecialchars($message); ?>
          </div>
        <?php endif; ?>

        <form method="POST" action="../php/register_controller.php" id="registerForm" autocomplete="off">
          <label>First Name</label>
          <input type="text" name="first_name" value="<?php echo htmlspecialchars($form_data["first_name"] ?? ""); ?>" required>

          <label>Last Name</label>
          <input type="text" name="last_name" value="<?php echo htmlspecialchars($form_data["last_name"] ?? ""); ?>" required>

          <label>Username</label>
          <input type="text" name="username" value="<?php echo htmlspecialchars($form_data["username"] ?? ""); ?>" required>

          <label>Password</label>
          <input type="password" name="password" required>

          <label>Confirm Password</label>
          <input type="password" name="confirm_password" required>

          <label>ID Number</label>
          <input type="text" name="id_number" value="<?php echo htmlspecialchars($form_data["id_number"] ?? ""); ?>" required>

          <label>Phone Number</label>
          <input type="text" name="phone" value="<?php echo htmlspecialchars($form_data["phone"] ?? ""); ?>" required>

          <label>Location</label>
          <input type="text" name="location" value="<?php echo htmlspecialchars($form_data["location"] ?? ""); ?>" required>

          <div class="actions">
            <button class="btn btn-primary" type="submit">Register</button>
            <a class="btn" href="login_view.php">Cancel</a>
          </div>
        </form>

        <div class="notice" style="margin-top:14px;">
          Already registered? <a href="login_view.php">Login</a>
        </div>
      </div>
    </div>
  </div>
</main>

</body>
</html>
