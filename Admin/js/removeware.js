document.addEventListener("DOMContentLoaded", function () {
  // Fetch the list of warehouses from the server
  fetch("../control/processremoveware.php?action=list")
    .then((response) => response.json())
    .then((data) => {
      let tbody = document.getElementById("warehouse-list");
      data.forEach((warehouse) => {
        let tr = document.createElement("tr");
        tr.innerHTML = `
                    <td>${warehouse.warehouse_id}</td>
                    <td>${warehouse.full_location}</td>
                    <td><button onclick="confirmRemoval(${warehouse.warehouse_id})">❌</button></td>
                `;
        tbody.appendChild(tr);
      });
    })
    .catch((error) => console.error("Error:", error));
});

function confirmRemoval(warehouseId) {
  if (confirm("Are you sure you want to remove this warehouse?")) {
    fetch(
      `../control/processremoveware.php?action=delete&warehouse_id=${warehouseId}`
    )
      .then((response) => response.json())
      .then((data) => {
        if (data.success) {
          window.location.reload(); // Reload the page to update the list
        } else {
          alert("Error: Could not delete the warehouse.");
        }
      })
      .catch((error) => console.error("Error:", error));
  }
}
