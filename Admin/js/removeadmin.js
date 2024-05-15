function removeAdmin() {
  var adminId = document.getElementById('adminId').value;
  var formData = new FormData();
  formData.append('adminId', adminId);

  var xhr = new XMLHttpRequest();
  xhr.open('POST', '../control/processremoveadmin.php', true);
  xhr.onreadystatechange = function() {
      if (this.readyState === 4 && this.status === 200) {
          document.getElementById('message').innerHTML = this.responseText;
      }
  };
  xhr.send(formData);
}
