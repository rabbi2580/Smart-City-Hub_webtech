<?php
session_start();
if (isset($_SESSION["user_id"])) {
    header("Location: dashboard.php");
    exit();
}

$error = $_GET["error"] ?? "";
$msg = "";

if ($error === "empty") $msg = "All required fields must be filled.";
if ($error === "match") $msg = "Passwords do not match.";
if ($error === "weak") $msg = "Password must be at least 6 characters.";
if ($error === "user") $msg = "Username already exists. Choose a different one.";
if ($error === "fail") $msg = "Registration failed. Try again.";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Citizen Registration</title>
    <link rel="stylesheet" href="../css/style.css">
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
        <div class="gov-right"></div>
    </div>
</header>

<main class="container">
    <div class="auth-grid">
        <div class="card">
            <div class="card-head">
                <h2>Create account</h2>
                <p>Register as a citizen to submit and track complaints.</p>
            </div>

            <div class="card-body">
                <?php if ($msg !== "") { ?>
                    <div class="alert"><?php echo htmlspecialchars($msg); ?></div>
                <?php } ?>

                <form method="POST" action="../php/register.php">
                    <label>Username</label>
                    <input type="text" name="username" required>

                    <label>Password</label>
                    <input type="password" name="password" required>

                    <label>Confirm Password</label>
                    <input type="password" name="confirm_password" required>

                    <label>Full Name</label>
                    <input type="text" name="name" required>

                    <label>ID Number</label>
                    <input type="text" name="id_number" required>

                    <label>Phone</label>
                    <input type="text" name="phone" required>

                    <label>Location</label>
                    <input type="text" name="location" required>

                    <label>Area (optional)</label>
                    <input type="text" name="area">

                    <div class="actions">
                        <button class="btn btn-primary" type="submit">Register</button>
                        <a class="btn" href="login.php">Back to Login</a>
                    </div>
                </form>

                <div class="notice">
                    Your password is stored securely as a hash. Do not share your credentials.
                </div>
            </div>
        </div>
    </div>
</main>

</body>
</html>
