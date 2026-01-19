document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector("form");
  if (!form) return;

  const password = document.querySelector('input[name="password"]');
  const confirmPassword = document.querySelector('input[name="confirm_password"]');
  const phone = document.querySelector('input[name="phone"]');
  const idNumber = document.querySelector('input[name="id_number"]');
  const role = document.getElementById("role");
  const accessCode = document.getElementById("access_code");

  form.addEventListener("submit", function (e) {
    if (password.value !== confirmPassword.value) {
      e.preventDefault();
      alert("Password not matched");
      return;
    }

    if (password.value.length < 8) {
      e.preventDefault();
      alert("Password must be at least 8 characters");
      return;
    }

    const phoneValue = phone.value.replace(/\D/g, "");
    if (phoneValue.length !== 11) {
      e.preventDefault();
      alert("Phone number must be 11 digit");
      phone.focus();
      return;
    }

    const idValue = idNumber.value.trim();
    if (idValue !== "" && !/^\d+$/.test(idValue)) {
      e.preventDefault();
      alert("ID Number must be numeric");
      idNumber.focus();
      return;
    }

    if (role && role.value !== "citizen") {
      if (!accessCode || accessCode.value.trim() === "") {
        e.preventDefault();
        alert("Access code is required for non-citizen roles.");
        return;
      }
    }
  });
});
