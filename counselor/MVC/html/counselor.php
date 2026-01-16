  
  <?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
/*require "../db/coun.php";
$result = mysqli_query($conn, "SELECT * FROM complaints");
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Counselor Dashboard | Smart City Hub</title>
<div class="user-info">
    Welcome, Counselor John Doe |
    <a href="profile.html">Manage Profile</a> |
    <a href="change-password.html">Change Password</a> |
    <a href="login.html">LogIn</a>
    <a href="logout.php">Logout</a>

  </div>
<link rel="stylesheet" href="../css/counselor.css">

</head>
<body>
 <h1>Smart City Hub – Counselor Dashboard</h1>

<div class="menu">
  
  <div class="menu">
  
 <a href="allcomplaint.php">All Complaints</a>
<a href="verification.php">Pending Verification</a>
<a href="valid.php">Valid Complaint</a>
</div>  
</div>
 <div class="container">
    <h2>Complaints Awaiting Verification / All Complaints in Your Area</h2>
    <p>View and manage complaints submitted by citizens in your zone. Mark as valid/invalid, add comments, and forward valid ones to the Secretary.</p>
 <?php
require $_SERVER['DOCUMENT_ROOT']."/Smart-City-Hub_webtech/counselor/MVC/db/coun.php";

$result = mysqli_query($conn, "
    SELECT id, title, description, location, image_path, status, counselor_comment
    FROM complaints
");
?>
<table>
  <tr>
    <th>ID</th>
    <th>Description</th>
    <th>Photo</th>
    <th>Location</th>
    <th>Status</th>
    <th>Comment</th>
    <th>Action</th>
  </tr>

<?php while ($row = mysqli_fetch_assoc($result)) { ?>
<tr>
    <td><?php echo $row['id']; ?></td>

    <td><?php echo $row['description']; ?></td>

    <td>
        <?php if ($row['image_path']) { ?>
            <img src="<?php echo $row['image_path']; ?>" width="80">
        <?php } ?>
    </td>

    <td><?php echo $row['location']; ?></td>

   <td class="status <?php echo $row['status']; ?>">
    <?php echo $row['status']; ?>
</td>


    <td>
        <form method="post" action="../Controller/saveComment.php">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <textarea name="comment"><?php echo $row['counselor_comment']; ?></textarea>
            <button type="submit">Save Comment</button>
        </form>
    </td>

    <td>
        <form method="post" action="../Controller/markValid.php">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <button class="btn-valid">Mark Valid</button>

        </form>

        <form method="post" action="../Controller/markInvalid.php">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
           <button class="btn-invalid">Mark Invalid</button>

        </form>

        <form method="post" action="../Controller/forward.php">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <button class="btn-forward">Forward</button>

        </form>
    </td>
</tr>
<?php } ?>
</table>

   <!-- <table>
      <tr>
        <th>ID</th>
        <th>Description</th>
        <th>Photo</th>
        <th>Location</th>
        <th>Status</th>
        <th>Comment</th>
        <th>Action</th>
      </tr>

 <tr>
    <td>101</td>
    <td>Broken street light near park</td>
<td><img src="" alt="Broken street light"></td>
<td>Zone 4</td>
<td>Pending</td>
<td><textarea rows="2" placeholder="Add commment.."></textarea></td>
<td>
<button class="btn btn-valid">Mark Valid</button><br>
<button class="btn btn-invalid">Mark InValid</button><br>
<button class="btn btn-forward">Forward to secretary</button><br>
<button class="btn btn-comment">Save comment</button><br>
<button class="btn btn-view-history">View History</button><br>
</td>
</tr> 

<tr>
 <td>102</td>
  <td>Garbage not collected in area</td>
<td><img src="garbage.jpg" alt="Garbage pile"></td>
<td>Zone 2</td>
 <td>Pending</td>
 <td><textarea rows="2" placeholder="Add comment..."></textarea></td>
 <td>
<button class="btn btn-valid">Mark Valid</button><br>
<button class="btn btn-invalid">Mark Invalid</button><br>
<button class="btn btn-forward">Forward to Secretary</button><br>
 <button class="btn btn-comment">Save Comment</button><br>
  <button class="btn btn-view-history">View History</button>
 </td>
 </tr>



  <tr>
<td>103</td>
<td>Pothole on main road</td>
<td><img src="pothole.jpg" alt="Pothole"></td>
 <td>Zone 4</td>
<td>Valid (Forwarded)</td>
<td>Urgent repair needed.</td>
 <td>
 <button class="btn btn-view-history">View History</button>
 </td>
 </tr>

 </table> -->
  </div>
  <footer>
  © 2026 Smart City Hub | Counselor Panel
</footer>
</body>
</html>