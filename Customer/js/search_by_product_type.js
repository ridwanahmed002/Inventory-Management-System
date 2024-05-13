function fetchOrders() {
    let productType = document.getElementById("product_type").value;
    if (productType !== "") {
        $.ajax({
            url: "../control/fetch_orders.php",
            type: "POST",
            data: {product_type: productType},
            success: function(data) {
                $("#orders_table").html(data);
            }
        });
    } else {
        $("#orders_table").html("");
    }
}
