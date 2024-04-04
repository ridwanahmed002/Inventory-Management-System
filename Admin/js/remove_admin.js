function validateAdminRemoval() {
  var username = document.getElementById("username").value;
  var errorDiv = document.getElementById("usernameError");

  if (username === "") {
    errorDiv.textContent = "Username cannot be empty.";
    return false;
  }

  errorDiv.textContent = "";
  return true;
}
