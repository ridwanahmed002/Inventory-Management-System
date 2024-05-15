function removeWarehouse() {
  var warehouseId = document.getElementById('warehouseId').value;
  var formData = new FormData();
  formData.append('warehouseId', warehouseId);

  var xhr = new XMLHttpRequest();
  xhr.open('POST', '../control/processremoveware.php', true);
  xhr.onreadystatechange = function() {
      if (this.readyState === 4 && this.status === 200) {
          document.getElementById('message').innerHTML = this.responseText;
      }
  };
  xhr.send(formData);
}
