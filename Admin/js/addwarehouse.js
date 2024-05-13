document.addEventListener("DOMContentLoaded", function () {
  var form = document.getElementById("addWarehouseForm");
  form.addEventListener("submit", function (event) {
    var totalCapacity = document.getElementById("total_capacity").value;
    var noOfEmployees = document.getElementById("no_of_employees").value;
    var isValid = true;

    if (parseInt(totalCapacity, 10) < 100) {
      alert("Capacity should be >= 100");
      isValid = false;
    }

    if (parseInt(noOfEmployees, 10) < 5) {
      alert("Employee should be greater than 5");
      isValid = false;
    }

    if (!isValid) {
      event.preventDefault();
    }
  });

  // Check if the chart container is present (indicates successful addition)
  if (document.getElementById('locationChart')) {
    console.log("Canvas element found, fetching data for chart."); // Debugging
    fetch('../control/fetchWarehouseData.php')
      .then(response => response.json())
      .then(data => {
        console.log(data); // Debugging: Log the fetched data
        var ctx = document.getElementById('locationChart').getContext('2d');
        new Chart(ctx, {
          type: 'pie',
          data: {
            labels: data.labels,
            datasets: [{
              data: data.values,
              backgroundColor: ['#ff6b6b', '#ffcc5c', '#1e3c72', '#43cea2', '#185a9d']
            }]
          },
          options: {
            responsive: true,
            plugins: {
              legend: {
                position: 'top',
              },
              title: {
                display: true,
                text: 'Warehouse Capacity Distribution by Location'
              }
            }
          }
        });
      })
      .catch(error => console.error('Error fetching warehouse data:', error));
  } else {
    console.log("Canvas element not found."); // Debugging
  }
});
