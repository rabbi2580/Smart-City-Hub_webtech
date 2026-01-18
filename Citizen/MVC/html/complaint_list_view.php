<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>My Complaints</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<header class="gov-header">
    <div class="wrap">
        <div class="gov-left">
            <div class="seal">SC</div>
            <div class="brand">
                <div class="title">Smart City Citizen Portal</div>
                <div class="subtitle">My Complaints</div>
            </div>
        </div>

        <div class="gov-right">
            <a class="btn-logout" href="../html/dashboard.php">Back</a>
        </div>
    </div>
</header>

<main class="container">
    <div class="card">
        <div class="card-head">
            <h2>Complaint History</h2>
            <p>Review your submitted complaints and their current status.</p>
        </div>

        <div class="card-body">
            <div style="overflow-x:auto;">
                <table border="1" cellpadding="10" style="width:100%; border-collapse:collapse;">
                    <tr>
                        <th>Title</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Location</th>
                        <th>ID</th>
                    </tr>

                    <?php if ($complaints && $complaints->num_rows > 0) { ?>
                        <?php while ($row = $complaints->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row["title"] ?? ""); ?></td>
                                <td><?php echo htmlspecialchars($row["type"] ?? ""); ?></td>
                                <td><?php echo htmlspecialchars($row["status"] ?? ""); ?></td>
                                <td><?php echo htmlspecialchars($row["location"] ?? ""); ?></td>
                                <td><?php echo htmlspecialchars($row["id"] ?? ""); ?></td>
                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <tr>
                            <td colspan="5" style="text-align:center;">No complaints submitted yet.</td>
                        </tr>
                    <?php } ?>
                </table>
            </div>

            <div class="actions" style="margin-top:14px;">
                <a class="btn btn-primary" href="../php/complaint_create_controller.php">Submit New Complaint</a>
                <a class="btn" href="../html/dashboard.php">Back to Dashboard</a>
            </div>
        </div>
    </div>
</main>

</body>
</html>
