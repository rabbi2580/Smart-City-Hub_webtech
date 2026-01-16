<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<h2>Login</h2>

<form method="post" action="../php/login_controller.php">
    <input type="text" name="username" placeholder="Username"><br><br>
    <input type="password" name="password" placeholder="Password"><br><br>
    <button type="submit">Login</button>
</form>

<p style="color:red;"><?php echo $error ?? ""; ?></p>
<a href="register_view.php">Register</a>
</body>
</html>
