<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Submit Complaint</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<header class="gov-header">
    <div class="wrap">
        <div class="gov-left">
            <div class="seal">SC</div>
            <div class="brand">
                <div class="title">Smart City Citizen Portal</div>
                <div class="subtitle">Submit Complaint</div>
            </div>
        </div>

        <div class="gov-right">
            <a class="btn-logout" href="../html/dashboard.php">Back</a>
        </div>
    </div>
</header>

<main class="container">
    <div class="auth-grid">
        <div class="card">
            <div class="card-head">
                <h2>Submit a Complaint</h2>
                <p>Provide accurate details so the issue can be processed efficiently.</p>
            </div>

            <div class="card-body">
                <div id="msgBox"></div>

                <form id="complaintForm">
                    <label>Title</label>
                    <input type="text" name="title" required>

                    <label>Description</label>
                    <textarea name="description" rows="6" required></textarea>

                    <label>Type</label>
                    <select name="type" required>
                        <option value="">Select type</option>
                        <option value="waste_management">Waste Management</option>
                        <option value="drainage">Drainage</option>
                        <option value="road_damage">Road Damage</option>
                        <option value="streetlight">Street Light</option>
                        <option value="other">Other</option>
                    </select>

                    <label>Location</label>
                    <input type="text" name="location" required>

                    <div class="actions">
                        <button class="btn btn-primary" id="submitBtn" type="submit">Submit Complaint</button>
                        <a class="btn" href="../html/dashboard.php">Cancel</a>
                    </div>
                </form>

                <div class="notice">
                    You can track status from the “My Complaints” page.
                </div>
            </div>
        </div>
    </div>
</main>

<script src="../js/complaint_ajax.js"></script>

</body>
</html>
