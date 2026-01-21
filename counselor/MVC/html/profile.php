<?php
session_start();
require $_SERVER['DOCUMENT_ROOT']."/Smart-City-Hub_webtech/counselor/MVC/db/coun.php";
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'counselor') {
    header("Location: ../login_view.php");
    exit;
}

$counselor_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT name, email, area FROM counselors WHERE id = ?");
$stmt->bind_param("i", $counselor_id);
$stmt->execute();
$result = $stmt->get_result();
$counselor = $result->fetch_assoc();

$counselor_name = $counselor['name'] ?? '';
$counselor_area = $counselor['area'] ?? '';
$counselor_email = $counselor['email'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Counselor Profile</title>
    <link rel="stylesheet" href="/Smart-City-Hub_webtech/counselor/MVC/css/profile.css">


</head>
<body>

<h1>Your Profile</h1>

<?php if (isset($_GET['success'])): ?>
    <p class="success">Profile updated successfully!</p>
<?php elseif (isset($_GET['error'])): ?>
    <p class="error">Error updating profile. Try again.</p>
<?php endif; ?>

<div class="profile-container">
    <form method="post" action="../Controller/updateProfile.php">
        <input type="hidden" name="id" value="<?= $counselor_id ?>">

        <label>Name:</label>
        <input type="text" name="name" value="<?= htmlspecialchars($counselor_name) ?>" required>

        <label>Area:</label>
        <input type="text" name="area" value="<?= htmlspecialchars($counselor_area) ?>" required>

        <label>New Password (leave blank to keep current):</label>
        <input type="password" name="password">

        <button type="submit">Update Profile</button>
    </form>
</div>

<button class="back-btn" onclick="history.back()">← Back</button>

</body>
</html>
