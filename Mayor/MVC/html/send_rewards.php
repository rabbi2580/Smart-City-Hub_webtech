<?php
$username = 'Mayor'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Rewards - Mayor</title>
    <link rel="stylesheet" href="../css/mayor-style.css">
</head>
<body>
    <div class="container">
        <h1>Send Rewards Message</h1>
        <a href="/SmartCityHub/Mayor/MVC/html/mayor_dashboard.php" class="back-btn"><- Back to Dashboard</a>
        <?php if(isset($success)&& $success): ?>
            <p style ="color:black; font-weight:bold;text-align:center;margin:20px 0;padding:15px; background:rgba(0,255,0,0.2);border-radius:8px;">
                <?= htmlspecialchars($success) ?>
            </p>
        <?php endif; ?>
        <?php if(isset($error)&& $error): ?>
            <p style ="color:red; font-weight:bold;text-align:center;margin:20px 0;padding:15px; background:rgba(255,0,0,0.2);border-radius:8px;">
                <?= htmlspecialchars($error) ?>
            </p>
        <?php endif; ?>

        <?php if(empty($complaints_info)): ?>
            <p style ="color: orange; text-align:center;"> No complain selected ,please select a complain</p>
        <?php else: ?>
            <div style="margin: 20px 0; padding:15px; background:rgba(255, 255, 255, 0.1); border-radius:8px">
                <strong> selected Complaints(<?= count($complaints_info)?>):</strong>
                <ul>
                    <?php foreach($complaints_info as $c): ?>
                        <li>ID #<?= $c['id'] ?>-<?= htmlspecialchars($c['title']) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <form method="POST" action="">
            <input type="hidden" name="selected_ids" value="<?= htmlspecialchars(implode(',', array_column($complaints_info, 'id'))) ?>">
            <label>Reward Message</label>
            <textarea name="reward_message" rows="5" required style="width:100%;"> Thank you for ur report . your issue will be solved in asap</textarea>
            <button type="submit" style="margin-top: 15px;">Send reward</button>    
        </form>
    <?php endif;?>
    </div>
</body>
</html>