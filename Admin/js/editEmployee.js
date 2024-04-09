document.addEventListener("DOMContentLoaded", function () {
  // Attaching the event listener to the search form
  document
    .getElementById("searchEmployeeForm")
    .addEventListener("submit", function (e) {
      e.preventDefault();
      var contact = document.getElementById("contactSearch").value;

      fetch("../control/processEditEmployee.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded",
        },
        body: `action=search&contact=${contact}`,
      })
        .then((response) => response.json())
        .then((data) => {
          if (data.success && data.employee) {
            // Display the edit form container
            document.getElementById("editFormContainer").style.display =
              "block";

            // Populate the edit form fields with the employee data
            document.getElementById("employee_id").value =
              data.employee.employee_id;
            document.getElementById("fname").value = data.employee.fname;
            document.getElementById("lname").value = data.employee.lname;
            document.getElementById("email").value = data.employee.email || "";
            document.getElementById("section").value =
              data.employee.section || "";
            document.getElementById("contact").value =
              data.employee.contact || "";
            document.getElementById("age").value = data.employee.age || "";
            document.getElementById("gender").value =
              data.employee.gender || "";
            document.getElementById("address").value =
              data.employee.address || "";
            // Populate other fields in a similar manner...
          } else {
            alert(data.message);
            document.getElementById("editFormContainer").style.display = "none";
          }
        })
        .catch((error) => {
          console.error("Error:", error);
        });
    });
});
