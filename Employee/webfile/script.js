

// Function to populate edit user modal with user data
function populateEditUserModal(user_id, first_name, last_name, email, dob, mobile, gender) {
    document.getElementById('user_id').value = user_id;
    document.getElementById('first_name').value = first_name;
    document.getElementById('last_name').value = last_name;
    document.getElementById('email').value = email;
    document.getElementById('dob').value = dob;
    document.getElementById('mobile').value = mobile;
    document.getElementById('gender').value = gender;
}



// Function to save user changes
function saveUserChanges() {
    // Get form data
    var user_id = $('#user_id').val();
    var first_name = $('#first_name').val();
    var last_name = $('#last_name').val();
    var email = $('#email').val();
    var dob = $('#dob').val();
    var mobile = $('#mobile').val();
    var gender = $('#gender').val();

    // Perform validation if needed

    // AJAX call to update user information
    $.ajax({
        url: 'update_user.php',
        method: 'POST',
        data: {
            user_id: user_id,
            first_name: first_name,
            last_name: last_name,
            email: email,
            dob: dob,
            mobile: mobile,
            gender: gender
        },
        success: function(response) {
            console.log("Success Response:", response);
            // Update the UI with the updated user data
            updateUI(response, function() {
                // This function will be called after updating the list
                console.log("List updated");
                // Place any additional logic you want to execute after updating the list here
            });
            alert("Data saved successfully!");
        },
        error: function(xhr, status, error) {
            console.error("Error saving data:", error);
            alert("Error: Unable to save data. Please try again later.");
        }
    });
}

// Function to update the UI (list) with new data
function updateUI(updatedUserData, callback) {
    // Assuming updatedUserData is an array of updated user data
    // Clear the existing list
    $('#userList').empty();

    // Iterate over the updated user data array and append each user to the list
    updatedUserData.forEach(function(user) {
        var listItem = $('<li>').text(user.first_name + ' ' + user.last_name);
        $('#userList').append(listItem);
    });

    // Call the callback function if provided
    if (typeof callback === 'function') {
        callback();
    }
}






// function saveUserChanges() {
//     // Get form data
//     var user_id = $('#user_id').val();
//     var first_name = $('#first_name').val();
//     var last_name = $('#last_name').val();
//     var email = $('#email').val();
//     var dob = $('#dob').val();
//     var mobile = $('#mobile').val();
//     var gender = $('#gender').val();

//     // Perform validation if needed

//     // AJAX call to update user information
//     $.ajax({
//         url: 'update_user.php',
//         method: 'POST',
//         data: {
//             user_id: user_id,
//             first_name: first_name,
//             last_name: last_name,
//             email: email,
//             dob: dob,
//             mobile: mobile,
//             gender: gender
//         },
//         success: function(response) {
//             console.log("Success Response:", response);
//             updateUI(response);
//             alert("Data saved successfully!");
           
//         },
//         error: function(xhr, status, error) {
//             console.error("Error saving data:", error);
//             alert("Error: Unable to save data. Please try again later.");
//         }
//     });

//     // $('#editUserModal').modal('hide');
// }

// function updateUI(updatedUserData) {
//     // Update the UI with the updated user data
//     // For example, assuming user_id is updated in the UI
//     $('#user_id').val(updatedUserData.user_id);
//     $('#first_name').val(updatedUserData.first_name);
//     $('#last_name').val(updatedUserData.last_name);
//     $('#email').val(updatedUserData.email);
//     $('#dob').val(updatedUserData.dob);
//     $('#mobile').val(updatedUserData.mobile);
//     $('#gender').val(updatedUserData.gender);
// }


   

document.addEventListener("DOMContentLoaded", function() {
    var deleteButtons = document.querySelectorAll('.delete-btn');

    deleteButtons.forEach(function(button) {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            var userId = getUserIdFromURL(button.getAttribute('href'));
            deleteUser(user_id);
        });
    });

    function getUserIdFromURL(url) {
        var params = url.split('?')[1].split('&');
        for (var i = 0; i < params.length; i++) {
            var param = params[i].split('=');
            if (param[0] === 'user_id') {
                return param[1];
            }
        }
        return null;
    }

    function deleteUser(user_id) {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'delete.php?user_id=' + user_id, true);
    
        xhr.onload = function() {
            if (xhr.status == 200) {
                // If deletion is successful, display an alert message
                alert('User deleted successfully');
            } else {
                // If there is an error, display an alert with the error message
                alert('Error deleting user: ' + xhr.responseText);
            }
        };
    
        xhr.send();
    }
    
});