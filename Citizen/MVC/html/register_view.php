<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<h2>Register</h2>

<form method="post" action="../php/register_controller.php">
    <input type="text" name="username" placeholder="Username"><br><br>
    <input type="email" name="email" placeholder="Email"><br><br>
    <input type="password" name="password" placeholder="Password"><br><br>
    <button type="submit">Register</button>
</form>

<p style="color:green;"><?php echo $success ?? ""; ?></p>
<p style="color:red;"><?php echo $error ?? ""; ?></p>

<a href="login_view.php">Back to Login</a>
</body>
</html>
