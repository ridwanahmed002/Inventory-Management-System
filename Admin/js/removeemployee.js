function removeEmployee() {
  var employeeId = document.getElementById('employeeId').value;
  var formData = new FormData();
  formData.append('employeeId', employeeId);

  var xhr = new XMLHttpRequest();
  xhr.open('POST', '../control/processremoveemployee.php', true);
  xhr.onreadystatechange = function() {
      if (this.readyState === 4 && this.status === 200) {
          document.getElementById('message').innerHTML = this.responseText;
      }
  };
  xhr.send(formData);
}
