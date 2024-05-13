function validatePaymentForm() {
    let cardNumber = document.getElementById("card_number").value;
    let expiryDate = document.getElementById("expiry_date").value;
    let cvv = document.getElementById("cvv").value;
    let isValid = true;

    document.getElementById("cardNumberError").innerHTML = "";
    document.getElementById("expiryDateError").innerHTML = "";
    document.getElementById("cvvError").innerHTML = "";

    if (cardNumber === "" || cardNumber.length !== 4 || isNaN(cardNumber)) {
        document.getElementById("cardNumberError").innerHTML = "Invalid card number";
        isValid = false;
    }



    if (cvv === "" || cvv.length !== 3 || isNaN(cvv)) {
        document.getElementById("cvvError").innerHTML = "Invalid CVV";
        isValid = false;
    }

    if (!isValid) {
        alert("Please fix the errors in the form.");
    }

    return isValid;
}
