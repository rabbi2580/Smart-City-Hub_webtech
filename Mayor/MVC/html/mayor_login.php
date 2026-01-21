<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mayor Login - Smart City Hub</title>
    <link rel="stylesheet" href="../css/mayor-style.css">
</head>
<body>

<div class="login-container">
    <h2 class="login-title">Mayor Login</h2>

    <?php if (!empty($error)): ?>
        <p class="error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="POST" action="../php/mayor_login.php">
        <input type="text" name="username" placeholder="Username" required autofocus>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login as Mayor</button>
    </form>

    <p class="back-link">
        <a href="../../../Citizen/MVC/html/login.php">← Back to Citizen Login</a>
    </p>
</div>

</body>
</html>
