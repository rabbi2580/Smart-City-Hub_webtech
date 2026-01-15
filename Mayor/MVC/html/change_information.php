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
        <a href="mayor_dashboard.php" class="back-btn"><- Back to Dashboard</a>
        <?php if($success): ?>
            <p style="color: aqua;"><?php echo $success; ?></p>
        <?php endif ?>
        <?php if ($error): ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php endif; ?>
        

    </div>
</body>
</html>