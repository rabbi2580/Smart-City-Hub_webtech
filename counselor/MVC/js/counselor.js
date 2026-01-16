function updateStatus(id, status) {
  fetch("../Controller/ajaxUpdateStatus.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded"
    },
    body: "id=" + id + "&status=" + status
  })
  .then(response => response.json())
  .then(data => {
    if (data.success) {
      const statusCell = document.getElementById("status-" + id);
      statusCell.textContent = data.status;
      statusCell.className = "status " + data.status;
    }
  });
}
