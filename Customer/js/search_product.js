function validateSearchForm() {
    let quantity = document.getElementById("quantity").value;
    let isValid = true;

    document.getElementById("quantityError").innerHTML = "";

    if (quantity <= 0) {
        document.getElementById("quantityError").innerHTML = "Quantity must be greater than 0";
        isValid = false;
    }

    if (!isValid) {
        alert("Please fix the errors in the form.");
    }

    return isValid;
}
