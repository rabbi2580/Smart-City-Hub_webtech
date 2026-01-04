<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Final Approvals - Mayor</title>
    <link rel="stylesheet" href="../css/mayor-style.css">
</head>
<body>
    <div class ="container">
        <h1>Final Approvals</h1>
        <a href="mayor_dashboard.php" class="back-btn"><- BAck to Dashboard</a>
        <form>
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
                <tbody>
                    <tr>
                        <td><input type="checkbox" name ="complaints[]" value="1"></td>
                        <td>1</td>
                        <td>Broken Streetlight</td>
                        <td>Streetlight</td>
                        <td>Completed</td>
                        <td>Test Citizen </td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="complaints[]" value="2"></td>
                        <td>2</td>
                        <td>Garbage Pile</td>
                        <td>Waste</td>
                        <td>Completed</td>
                        <td>Citizen 2</td>

                    </tr>
                </tbody>
            </table>
            <div class="action-buttons">
                <button type="submit" name="action" value="approve" class="approve-btn">Final Approve Selected</button>
                <button type="submit" name="action" value="reject" class="reject-btn">Reject </button>
            </div>
        </form>
    </div>
</body>
</html>