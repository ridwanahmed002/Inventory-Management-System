// addadmin.js
document.addEventListener("DOMContentLoaded", function () {
  var unameInput = document.getElementById("uname");
  var emailInput = document.getElementById("email");
  var form = document.getElementById("addAdminForm");

  unameInput.addEventListener("blur", function () {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../control/checkUsername.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
      if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
        if (this.responseText !== "0") {
          document.getElementById("unameError").textContent =
            "Username is already taken.";
        } else {
          document.getElementById("unameError").textContent = "";
        }
      }
    };
    xhr.send("uname=" + unameInput.value);
  });

  form.onsubmit = function (e) {
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    document.getElementById("unameError").textContent = "";
    document.getElementById("emailError").textContent = "";

    if (!emailPattern.test(emailInput.value)) {
      document.getElementById("emailError").textContent =
        "Invalid email format";
      e.preventDefault();
    }
  };
});
