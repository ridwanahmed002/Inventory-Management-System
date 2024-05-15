function validateForm() {
  if (validateName() === false) {
      return false;
  }
  return true;
}

function validateName() {
  var username = document.getElementById("username").value;
  if (username === "") {
      document.getElementById("usernameError").innerHTML = "Please enter a username";
      return false;
  } else {
      return true;
  }
}

document.getElementById("addAdminForm").onsubmit = function(event) {
  event.preventDefault();
  if (validateForm()) {
      var formData = new FormData();
      formData.append('username', document.getElementById('username').value);
      formData.append('password', document.getElementById('password').value);
      formData.append('email', document.getElementById('email').value);

      var xhr = new XMLHttpRequest();
      xhr.open('POST', '../control/processaddadmin.php', true);
      xhr.onreadystatechange = function() {
          if (this.readyState === 4 && this.status === 200) {
              document.getElementById('usernameError').innerHTML = this.responseText;
          }
      };
      xhr.send(formData);
  }
};
