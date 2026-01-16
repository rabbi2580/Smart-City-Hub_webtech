function updateStatus(id, status) {
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "../Controller/ajaxUpdateStatus.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      var data = JSON.parse(xhr.responseText);
      if (data.success) {
        var statusCell = document.getElementById("status-" + id);
        statusCell.innerHTML = data.status;
        statusCell.className = "status " + data.status;
      }
    }
  };

  xhr.send("id=" + id + "&status=" + status);
}
