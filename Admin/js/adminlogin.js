function validateAdminLoginForm() {
  var username = document.getElementById("username").value;
  var password = document.getElementById("password").value;

  if (username === "" || password === "") {
    alert("Both username and password must be filled out");
    return false;
  }
  return true;
}
