(function () {
  var form = document.getElementById("complaintForm");
  if (!form) return;

  var msgBox = document.getElementById("msgBox");
  var submitBtn = document.getElementById("submitBtn");

  function showMessage(ok, text) {
    if (ok) {
      msgBox.innerHTML = '<div class="notice">' + text + "</div>";
    } else {
      msgBox.innerHTML = '<div class="alert">' + text + "</div>";
    }
  }

  form.addEventListener("submit", function (e) {
    e.preventDefault();

    msgBox.innerHTML = "";
    submitBtn.disabled = true;
    submitBtn.innerText = "Submitting...";

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
      if (this.readyState === 4) {
        submitBtn.disabled = false;
        submitBtn.innerText = "Submit Complaint";

        if (this.status === 200) {
          try {
            var res = JSON.parse(this.responseText);
            if (res.ok) {
              showMessage(true, res.message);
              form.reset();
            } else {
              showMessage(false, res.message);
            }
          } catch (err) {
            showMessage(false, "Invalid server response.");
          }
          return;
        }

        if (this.status === 400) {
          try {
            var res2 = JSON.parse(this.responseText);
            showMessage(false, res2.message || "Validation error.");
          } catch (err2) {
            showMessage(false, "Validation error.");
          }
          return;
        }

        if (this.status === 500) {
          showMessage(false, "Server error. Try again.");
          return;
        }

        showMessage(false, "Request failed. Status: " + this.status);
      }
    };

    xhttp.open("POST", "../php/complaint_create_ajax.php", true);
    xhttp.send(new FormData(form));
  });
})();
