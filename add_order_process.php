<?php

include("printing_service_header.php");
include("admin/db_connect.php");

$id = $_GET['cat_id'];
$sql = "SELECT * FROM product where sub_category_id=$id";
$result = mysqli_query($conn, $sql);

$order_sql = "SELECT * FROM orders";
$order_result = mysqli_query($conn, $order_sql);

if ($order_result && mysqli_num_rows($order_result) > 0) {
    $order = mysqli_fetch_assoc($order_result);
    $order_id = $order['order_id'];
}

?>

<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    // Retrieve form data
    $order_name = $_POST['order_name'];
    $product_id = $_POST['product'];
    $quantity = $_POST['quantity'];
    $cost = $_POST['cost'];
    $gst = $_POST['gst'];
    $amount_payable = $_POST['amountPayable'];
   // Check if the specialRemark field is empty
if (empty($_POST['specialRemark'])) {
    // If it's empty, set a default value to be inserted into the database
    $special_remark = "N/A";
} else {
    // If it's not empty, use the value submitted via POST
    $special_remark = $_POST['specialRemark'];
}
    $file_option = $_POST['fileOption'];

    // Initialize arrays for details form fields and selected options
    $details_form_fields = array();
    $selected_options = array();

    // Check if details form fields are submitted as an array
    if (!empty($_POST['details_form_field']) && is_array($_POST['details_form_field'])) {
        // Add each form field value to the details_form_fields array
        foreach ($_POST['details_form_field'] as $field) {
            $details_form_fields[] = $field;
        }
    }

    // Check if selected options are submitted as an array
    if (!empty($_POST['selected_option']) && is_array($_POST['selected_option'])) {
        // Add each selected option to the selected_options array
        foreach ($_POST['selected_option'] as $option) {
            // Ensure proper sanitation of input
            $selected_options[] = mysqli_real_escape_string($conn, $option);
        }
    }

    // Serialize the arrays before storing in the database
    $serialized_details_form_fields = serialize($details_form_fields);
    $serialized_selected_options = serialize($selected_options);

// Fetch sub_category_id and main_category_id from product table based on product_id
$product_query = "SELECT sub_category_id, main_category_id FROM product WHERE product_id = $product_id";
$product_result = mysqli_query($conn, $product_query);

if ($product_result && mysqli_num_rows($product_result) > 0) {
    $product_row = mysqli_fetch_assoc($product_result);
    $sub_category_id = $product_row['sub_category_id'];
    $main_category_id = $product_row['main_category_id'];
}

    // Insert data into the database
    $sql = "INSERT INTO orders (member_id, order_name, product_id, sub_category_id,main_category_id, quantity, cost, gst, amount_payable, special_remark, file_option, details_form_field, select_option) 
    VALUES ('" . $_SESSION['member_id'] . "', '$order_name', '$product_id',' $sub_category_id',' $main_category_id', '$quantity', '$cost', '$gst', '$amount_payable', '$special_remark', '$file_option', '$serialized_details_form_fields', '$serialized_selected_options')";


    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Order added successfully, redirect to order_page.php with orderId parameter
        $orderId = $conn->insert_id;
        echo "<script>alert('Order added successfully.'); window.location.href = 'order_page.php?orderId=" . $orderId . "';</script>";

        // echo "<script>window.location.href = 'order_page.php?orderId=" . $orderId . "';</script>";
    } else {
        // Failed to add order, display error message
        echo "<script>alert('Error! Order cannot be booked. Reason Insufficient Funds. Error: " . mysqli_error($conn) . "');</script>";
    }
    
}

?>


<style>

    .join_form {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form-control {
        width: 100%;
        padding: 0px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .note {
        font-size: 12px;
        color: #666;
    }

    /* Responsive styles */
    @media (max-width: 600px) {
        .container {
            padding: 10px;
        }
    }

</style>

<div class="content-wrap">
    <div class="container clearfix">
        <div class="fancy-title title-center title-border">
            <h3 class="center">ADD ORDER</h3>
        </div>

        <div class="join_form">
            <form id="myForm" method="POST" action="order_page.php?orderId=<?php echo $order_id;?>">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Form Fields -->
                            <label for="order_name">Order Name</label>
                            <input type="text" name="order_name" id="order_name" class="form-control" placeholder="Enter customer's name for easy order status checking.." required>

                            <label for="product">Select Product</label>
                            <select name="product" id="product" class="form-control" onchange="showDetails(this.value)" required>
                                <option value="0">--All Products--</option>
                                <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $productId = $row['product_id'];
                                    // $sub_category_id=$row['sub_category_id'];
                                    // $main_category_id=$row['main_category_id'];
                                    $title = $row['title'];
                                    $image = $row['image'];
                                ?>
                                    <option value="<?php echo $productId; ?>"><?php echo $title; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <!-- Static Quantity Field -->

                            <!-- <input type="number" id="quantity" name="quantity" value="1" onchange="calculate()"> -->
                            <label for="quantity" id="quantity_label" style="display: none;">Quantity</label>
                            <input type="text" name="quantity" id="quantity" class="form-control" style="display: none;" min="10" step="10" value="0" onchange="calculateCost()"required>

                            <!-- Details Fields -->
                            <div id="detailsFields" style="display: none;">

                            </div>

                            <!-- File Options -->
                            <div id="fileOptions" style="display: none;">
                                <h5>Select File Option</h5>
                                <div>
                                    <input type="radio" id="attachFileOnline" name="fileOption" value="Attach file Online" onchange="toggleMoreInfoLink(this)">
                                    <label for="attachFileOnline">Attach file Online</label>
                                    <a href="images/online.jpg" target="_blank" class="more-info-link" style="display: none;"><u>More Info1</u></a>
                                </div>

                                <div>
                                    <input type="radio" id="sendFileViaEmail" name="fileOption" value="Send file via Email" onchange="toggleMoreInfoLink(this)">
                                    <label for="sendFileViaEmail">Send file via Email</label>
                                    <a href="images/email.jpg" target="_blank" class="more-info-link" style="display: none;"><u>More Info2</u></a>
                                </div>
                                <table class="table">
                                    <tr>
                                        <td><label for="cost">Cost</label></td>
                                        <td>Rs. <input type="text" name="cost" id="cost" class="form-control" value="0.00"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="gst">GST (18.00%)</label></td>
                                        <td>Rs. <input type="text" name="gst" id="gst" class="form-control" value="0.00"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="amountPayable">Amount Payable</label></td>
                                        <td>Rs. <input type="text" name="amountPayable" id="amountPayable" class="form-control" value="0.00"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="specialRemark">Special Remark (Optional)</label></td>
                                        <td><textarea name="specialRemark" id="specialRemark" class="form-control" rows="4" cols="5" placeholder="Remark for order processing team...."></textarea></td>
                                    </tr>
                                </table>
                                <div style="margin-top: 10px;">
                                    <center><button type="submit" class="btn btn-primary">Add Order</button></center>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" id="product_img_container">
                            
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function showDetails(productId) {
        var detailsFields = document.getElementById("detailsFields");
        var fileOptions = document.getElementById("fileOptions");
        var product_img = document.getElementById("product_img_container");

        // Show details fields and file options
        detailsFields.style.display = "block";
        fileOptions.style.display = "block";
        product_img.style.display = "block"; // Display product_img

        // Show quantity field and label
        document.getElementById("quantity_label").style.display = "block";
        document.getElementById("quantity").style.display = "block";

        // Reset fields
        detailsFields.innerHTML = ""; // Clear any previous details
        document.getElementById("cost").value = "0.00"; // Reset the cost to 0.00
        document.getElementById("gst").value = "0.00"; // Reset the GST to 0.00
        document.getElementById("amountPayable").value = "0.00"; // Reset the amount payable to 0.00

        // Uncheck file options
        var fileOptionRadios = document.querySelectorAll('input[name="fileOption"]');
        fileOptionRadios.forEach(function(radio) {
            radio.checked = false;
        });

        if (productId != 0) {
            // Make AJAX request to get form details
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Update details fields with response
                    detailsFields.innerHTML = this.responseText;

                    // Reattach event listeners to select elements
                    var selectElements = document.querySelectorAll("select[name^='selected_option']");
                    selectElements.forEach(function(selectElement) {
                        selectElement.addEventListener("change", calculateCost);
                    });
                }
            };
            xhttp.open("GET", "get_form_fields.php?productid=" + productId, true);
            xhttp.send();
        }
    }

    function calculateCost() {
        // Get the quantity entered by the user
        var quantity = parseInt(document.getElementById("quantity").value);

        // Get the selected options and their costs
        var selectedOptions = document.querySelectorAll("select[name^='selected_option'] option:checked");
        var totalCost = 0;

        selectedOptions.forEach(function(option) {
            totalCost += parseFloat(option.dataset.cost);
        });

        // Calculate the total cost
        var cost = quantity * totalCost;

        // Update the cost field
        document.getElementById("cost").value = isNaN(cost) ? "0.00" : cost.toFixed(2);

        // Calculate GST (assuming 18%)
        var gst = (cost * 0.18);
        document.getElementById("gst").value = isNaN(gst) ? "0.00" : gst.toFixed(2);

        // Calculate the amount payable
        var amountPayable = (cost + parseFloat(gst));
        document.getElementById("amountPayable").value = isNaN(amountPayable) ? "0.00" : amountPayable.toFixed(2);
    }

    // Add event listeners to quantity input field and select elements
    document.getElementById("quantity").addEventListener("input", calculateCost);
    var selectElements = document.querySelectorAll("select[name^='selected_option']");
    selectElements.forEach(function(selectElement) {
        selectElement.addEventListener("change", calculateCost);
    });


    var previousRadioButton; // Global variable to store the previously selected radio button

    function toggleMoreInfoLink(radioButton) {
        var label = radioButton.parentNode.querySelector("label");
        var link = radioButton.parentNode.querySelector(".more-info-link");

        // Hide the link associated with the previously selected radio button, if any
        if (previousRadioButton && previousRadioButton !== radioButton) {
            var previousLink = previousRadioButton.parentNode.querySelector(".more-info-link");
            previousLink.style.display = "none";
        }

        // Show the link associated with the currently selected radio button
        if (radioButton.checked) {
            link.style.display = "inline-block"; // Show the link
            previousRadioButton = radioButton; // Update the previous radio button
        } else {
            link.style.display = "none"; // Hide the link
        }
    }
</script>

<?php
include("footer.php");
?>