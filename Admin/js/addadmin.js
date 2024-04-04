document.addEventListener("DOMContentLoaded", function () {
  var addAdminForm = document.getElementById("addAdminForm");
  addAdminForm.onsubmit = function (e) {
    var uname = document.getElementById("uname").value;
    var email = document.getElementById("email").value;
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    var isValid = true;

    document.getElementById("unameError").textContent = "";
    document.getElementById("emailError").textContent = "";

    if (!emailPattern.test(email)) {
      document.getElementById("emailError").textContent =
        "Invalid email format";
      isValid = false;
    }

    if (!isValid) {
      e.preventDefault();
    }
  };
});
