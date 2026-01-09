<?php
session_start();
if (isset($_SESSION["user_id"])) {
    header("Location: dashboard.php");
    exit();
}

$error = isset($_GET["error"]) ? "Invalid email or password." : "";
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
                <p>Use your registered email and password to access your dashboard.</p>
            </div>

            <div class="card-body">
                <?php if ($error !== "") { ?>
                    <div class="alert"><?php echo htmlspecialchars($error); ?></div>
                <?php } ?>

                <form method="POST" action="../php/login.php">
                    <label>Username</label>
                    <input type="text" name="username" required>

                    <label>Password</label>
                    <input type="password" name="password" required>

                    <div class="actions">
                        <button class="btn btn-primary" type="submit">Login</button>
                    </div>
                </form>
                
                <div class="actions">
                    <a class="btn" href="register.php">Create a new account</a>
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
