<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION["user_id"])) {
    header("Location: dashboard.php");
    exit();
}


$registered = isset($_GET["registered"]) ? "Registration successful. Please login." : "";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Citizen Portal Login</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<header class="gov-header">
    <div class="wrap">
        <div class="gov-left">
            <div class="seal">SC</div>
            <div class="brand">
                <div class="title">Smart City Citizen Portal</div>
                <div class="subtitle">Government Services and Complaint Management</div>
            </div>
        </div>
        <div class="gov-right"></div>
    </div>
</header>

<main class="container">
    <div class="auth-grid">
        <div class="card">
            <div class="card-head">
                <h2>Sign in</h2>
                <p>Use your registered username and password to access your dashboard.</p>
            </div>
            <div class="card-body">
                <?php if ($registered !== "") { ?>
                    <div class="notice"><?php echo htmlspecialchars($registered); ?></div>
                <?php } ?>
                <?php if ($error !== "") { ?>
                    <div class="alert"><?php echo htmlspecialchars($error); ?></div>
                <?php } ?>

                <form method="POST" action="../php/login_controller.php">
                    <label>Username</label>
                    <input type="text" name="username" required>

                    <label>Password</label>
                    <input type="password" name="password" required>

                    <div class="actions">
                        <button class="btn btn-primary" type="submit">Login</button>
                    </div>
                    
                    <label style="display:flex; align-items:center; gap:8px; font-size:14px; margin:10px 0;">
                        <input type="checkbox" name="remember_me" value="1">
                        Remember me
                    </label>

                </form>

                <div class="actions">
                    <a class="btn" href="register_view.php">Create a new account</a>
                </div>

                <div class="notice">
                    Authorized users only. All activities may be monitored for security purposes.
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>
