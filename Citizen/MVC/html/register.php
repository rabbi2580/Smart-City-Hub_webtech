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
    <?php if(isset($message)):?>
        <p class="message"><?php echo $message;?> </p>
    <?php endif;?>
    <form id="registerForm" method="POST" action="../php/register_controller.php">
        <label>First Name </label>
        <input type="text" name="first_name" required>
        <label>Last Name </label>
        <input type="text" name="last_name" required>
        <label>Username </label>
        <input type="text" name="username" required>
        <label>Password</label>
        <input type="password" name="password" required>
        <label>Confirm password </label>
        <input type="password" name="confirm_password" required>
        <label>ID Number</label>
        <input type="text" name="id_number" required>
        <label>Phone Number</label>
        <input type="text" name="phone" required>
        <label>Location</label>
        <input type="text" name="location" required>
        <button type="submit"> Register </button>
    
    </form>
    <p>Already have an Smart City Hub account?<a href="login.php">Click here</a> </p>
    </div>
</body>
</html>