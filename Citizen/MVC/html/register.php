<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Citizen Registration </title>
        <link rel="stylesheet" href="../css/register-style.css">
        <script src="../js/register-validation.js" defer></script>

    </head>
<body>
    <div class="container">
        <h2>Citizen Registration </h2>
        <div id="message" style="padding: 15px; margin: 20px 0; border-radius: 6px;">
            <?php echo $message; ?>
        </div>
        <form method="POST" action="../php/register_controller.php"> 
        <label>First Name </label>
        <input type="text" name="first_name" value="<?php echo htmlspecialchars($form_data['first_name']??''); ?>" required><br>
        <label>Last Name </label>
        <input type="text" name="last_name" value="<?php echo htmlspecialchars($form_data['last_name']??''); ?>" required><br>
        <label>Username </label>
        <input type="text" name="username" value="<?php echo htmlspecialchars($form_data['username'] ?? ''); ?>" required><br><br>
        <label>Password</label>
        <input type="password" name="password" required><br>
        <label>Confirm password </label>
        <input type="password" name="confirm_password" required><br>
        <label>ID Number</label>
        <input type="text" name="id_number" value="<?php echo htmlspecialchars($form_data['id_number']??''); ?>" required><br>
        <label>Phone Number</label>
        <input type="text" name="phone" value="<?php echo htmlspecialchars($form_data['phone']??''); ?>" required><br>
        <label>Location</label>
        <input type="text" name="id_number" value="<?php echo htmlspecialchars($form_data['location']??''); ?>" required><br>
        <button type="submit"> Register </button>
    
    </form>
    <p>Already have an Smart City Hub account?<a href="login.php">Click here</a> </p>
    </div>
</body>
</html>