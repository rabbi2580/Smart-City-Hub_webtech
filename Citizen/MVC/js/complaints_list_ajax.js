(function () {
  function esc(s) {
    return String(s ?? "")
      .replaceAll("&", "&amp;")
      .replaceAll("<", "&lt;")
      .replaceAll(">", "&gt;")
      .replaceAll('"', "&quot;")
      .replaceAll("'", "&#039;");
  }

  var btn = document.getElementById("refreshComplaintsBtn");
  var tbody = document.getElementById("complaintsTbody");
  var msg = document.getElementById("complaintsMsg");

  function setMsg(ok, text) {
    if (!msg) return;
    if (!text) {
      msg.innerHTML = "";
      return;
    }
    msg.innerHTML = ok
      ? '<div class="notice">' + esc(text) + "</div>"
      : '<div class="alert">' + esc(text) + "</div>";
  }

  function renderRows(rows) {
    if (!tbody) return;

    if (!rows || rows.length === 0) {
      tbody.innerHTML =
        '<tr><td colspan="6" style="text-align:center;">No complaints submitted yet.</td></tr>';
      return;
    }

    var html = "";
    for (var i = 0; i < rows.length; i++) {
      var r = rows[i];
      html += "<tr>";
      html += "<td>" + esc(r.title) + "</td>";
      html += "<td>" + esc(r.status) + "</td>";
      html += "<td>" + esc(r.location) + "</td>";
      html += "<td>" + esc(r.id) + "</td>";
      html += "</tr>";
    }
    tbody.innerHTML = html;
  }

  function loadComplaints() {
    setMsg(true, "");
    if (btn) {
      btn.disabled = true;
      btn.innerText = "Refreshing...";
    }

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
      if (this.readyState === 4) {
        if (btn) {
          btn.disabled = false;
          btn.innerText = "Refresh";
        }

        if (this.status === 200) {
          try {
            var res = JSON.parse(this.responseText);
            if (res.ok) {
              renderRows(res.data);
            } else {
              setMsg(false, res.message || "Failed to load complaints.");
            }
          } catch (e) {
            setMsg(false, "Invalid JSON response.");
          }
          return;
        }

        setMsg(false, "Request failed. Status: " + this.status);
      }
    };

    xhttp.open("GET", "../php/complaints_json.php", true);
    xhttp.send();
  }

  if (btn) {
    btn.addEventListener("click", function (e) {
      e.preventDefault();
      loadComplaints();
    });
  }

  loadComplaints();
})();