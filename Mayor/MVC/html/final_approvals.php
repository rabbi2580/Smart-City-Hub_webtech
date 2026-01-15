<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Final Approvals - Mayor</title>
    <link rel="stylesheet" href="../css/mayor-style.css">
    <script src ="../js/mayor-ajax.js"></script>
</head>
<body>
    <div class ="container">
        <h1>Final Approvals</h1>
        <a href="mayor_dashboard.php" class="back-btn"><- BAck to Dashboard</a>
        <div id="message" style="color: antiquewhite; font-weight: bold; margin: 20px o; text-align: center;"></div>
        <?php if(empty($complaints)): ?>
            <p>No complaints ready for final approval. </p>
            <?php else:?>

        <form id="finalApprovalForm">
            <table>
                <thead>
                    <tr>
                        <th>Select</th>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Citizen</th>
                    </tr>
                </thead>
                <tbody id ="tableBody">
                    <?php foreach($complaints as $c): ?>
                        <tr data-id="<?php echo $c['id']; ?>">
                        <td><input type="checkbox" name="selected[]" value="<?php echo $c['id']; ?>"></td>
                                <td><?php echo $c['id']; ?></td>
                                <td><?php echo htmlspecialchars($c['title']); ?></td>
                                <td><?php echo htmlspecialchars($c['type']); ?></td>
                                <td><?php echo htmlspecialchars($c['status']); ?></td>
                                <td><?php echo htmlspecialchars($c['citizen_name']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                
                </tbody>
            </table>
            <div class="action-buttons">
                <button type="button" id="approveSelected" class="approve-btn">Final Approve Selected</button>
                <button type="button" id="rejectSelected" class="reject-btn">Reject </button>
            </div>
        </form>
        <?php endif; ?>
    </div>
</body>
</html>