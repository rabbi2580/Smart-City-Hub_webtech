<!DOCTYPE html>
<html>
<head>
    <title>Update Profile</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<h2>Update Profile</h2>

<form method="post" action="../php/profile_update_controller.php">
    <input type="text" name="username" value="<?php echo $_SESSION['username']; ?>"><br><br>
    <input type="email" name="email"><br><br>
    <button type="submit">Update</button>
</form>

<p style="color:green;"><?php echo $success ?? ""; ?></p>
<p style="color:red;"><?php echo $error ?? ""; ?></p>

<a href="dashboard.php">Back</a>
</body>
</html>
