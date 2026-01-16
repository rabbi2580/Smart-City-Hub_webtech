<?php
session_start();

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include '../../../db.php'; // adjust path if needed

    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($username) || empty($password)) {
        $error = "Please fill in all fields";
    } else {
        $stmt = $conn->prepare("SELECT id, username, password, role, name 
                                FROM users 
                                WHERE username = ? AND role = 'mayor'");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($user = $result->fetch_assoc()) {
          
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id']   = $user['id'];
                $_SESSION['username']  = $user['username'];
                $_SESSION['role']      = $user['role'];
                $_SESSION['user_name'] = $user['name'];

                header("Location: ../php/mayor_dashboard_controller.php");
                exit;
            } else {
                $error = "Incorrect password";
            }
        } else {
            $error = "No mayor account found with this username";
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mayor Login - Smart City Hub</title>
    <link rel="stylesheet" href="../css/mayor-style.css"> <!-- adjust path -->
    <style>
        .login-container { max-width: 400px; margin: 100px auto; padding: 30px; background: rgba(0,0,0,0.6); border-radius: 12px; }
        .error { color: #ff4444; text-align: center; }
        input { width: 100%; padding: 12px; margin: 10px 0; border-radius: 6px; }
        button { width: 100%; padding: 12px; background: #0066cc; color: white; border: none; border-radius: 6px; font-size: 18px; cursor: pointer; }
    </style>
</head>
<body>

<div class="login-container">
    <h2 style="text-align:center; color: #ffcc00;">Mayor Login</h2>
    
    <?php if ($error): ?>
        <p class="error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="POST">
        <input type="text" name="username" placeholder="Username" required autofocus>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login as Mayor</button>
    </form>

    <p style="text-align:center; margin-top:20px;">
        <a href="../../../Citizen/MVC/html/login.php" style="color:#ccc;">← Back to Citizen Login</a>
    </p>
</div>

</body>
</html>