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
            <p>Review your submitted complaints and current status.</p>
        </div>

        <div class="card-body">
            <div id="complaintsMsg"></div>

            <div class="actions" style="display:flex; gap:10px; flex-wrap:wrap; margin-bottom:14px;">
                <button class="btn btn-primary" id="refreshComplaintsBtn" type="button">Refresh</button>
                <a class="btn" href="../php/complaint_create_controller.php">Submit New Complaint</a>
            </div>

            <div class="table-wrap">
                <table class="gov-table">
                    <thead>
                        <tr>
                            <th class="col-title">Title</th>
                            <th class="col-status">Status</th>
                            <th class="col-location">Location</th>
                            <th class="col-id">ID</th>
                        </tr>
                    </thead>
                    <tbody id="complaintsTbody">
                        <tr>
                            <td colspan="4" style="text-align:center;">Loading...</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="actions" style="margin-top:14px;">
                <a class="btn" href="../html/dashboard.php">Back to Dashboard</a>
            </div>
        </div>
    </div>
</main>

<script src="../js/complaints_list_ajax.js"></script>

</body>
</html>
