function updateStatus(id, status) {
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "../Controller/ajaxStatus.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      var res = JSON.parse(xhr.responseText);
      if (res.success) {
        var cell = document.getElementById("status-" + id);
        cell.innerHTML = res.status;
        cell.className = "status " + res.status;
      }
    }
  };

  xhr.send("id=" + id + "&status=" + status);
}
