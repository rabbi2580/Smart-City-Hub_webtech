<!DOCTYPE html>
<html>
<head>
    <title>Submit Complaint</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<h2>Submit Complaint</h2>

<form method="post">
    <label>Title</label><br>
    <input type="text" name="title"><br><br>

    <label>Description</label><br>
    <textarea name="description" rows="5"></textarea><br><br>

    <label>Location</label><br>
    <input type="text" name="location"><br><br>

    <input type="submit" value="Submit Complaint">
</form>

<p style="color:green;"><?php echo $success; ?></p>
<p style="color:red;"><?php echo $error; ?></p>

<br>
<a href="dashboard.php">Back to Dashboard</a>

</body>
</html>
