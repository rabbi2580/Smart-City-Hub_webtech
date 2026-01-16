<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Information - Mayor</title>
    <link rel="stylesheet" href="../css/mayor-style.css">
</head>
<body>
    <div class="container">
        <h1>Change Your Information</h1>
        <a href="/SmartCityHub/Mayor/MVC/html/mayor_dashboard.php" class="back-btn"><- Back to Dashboard</a>
        <?php if($success): ?>
            <p style="color: aqua;"><?php echo $success; ?></p>
        <?php endif ?>
        <?php if ($error): ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php endif; ?>
        <form method="POST">
            <label>Name</label><br>
            <input type="text" name="name" value="<?php echo htmlspecialchars($user['name']??''); ?>" required> <br>
            <label>Phone</label><br>
            <input type="text" name="phone" value="<?php echo htmlspecialchars($user['phone']??''); ?>" required> <br>
            <label>Location</label><br>
            <input type="text" name="location" value="<?php echo htmlspecialchars($user['location']??''); ?>" required> <br>
            <label>New PAssword</label><br>
            <input type="password" name="password" > <br>
            <label>Confirm Password</label><br>
            <input type="password" name="confirm_password" > <br>
            <button type="submit">Update Info</button>
           
            
        </form>

    </div>
</body>
</html>