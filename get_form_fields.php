<?php
// Database connection
include("admin/db_connect.php");

// Get selected product ID and sanitize input
$productId = isset($_GET['productid']) ? mysqli_real_escape_string($conn, $_GET['productid']) : '';

// Initialize HTML variables
$htmlFormFields = '';
$htmlProductImage = '';

// Check if product ID is provided and valid
if (!empty($productId) && is_numeric($productId)) {
    
    $query = "SELECT form_field_id, form_field_name FROM form_details WHERE product_id = $productId";
    $result = mysqli_query($conn, $query);

    // Check if there are any form details found
    if (mysqli_num_rows($result) > 0) {
        $htmlFormFields .= '<div class="form-group">';
     
        while ($row = mysqli_fetch_assoc($result)) {
            $formFieldId = $row['form_field_id'];
            $field_name = $row['form_field_name'];

            // Start building HTML for each form field
            $htmlFormFields .= '<input type="text" name="details_form_field[]" hidden value="' . $field_name . '">' . htmlspecialchars($field_name);
            $htmlFormFields .= '<select name="selected_option[]' . $formFieldId . '" id="selected_option' . $formFieldId . '" class="form-control" onchange="calculate()">';
            $htmlFormFields .= '<option value="0">--Select--</option>';
            
            $queryOptions = "SELECT select_option_id, select_option_name FROM select_option WHERE form_field_id = $formFieldId";
            $resultOptions = mysqli_query($conn, $queryOptions);

            // Check if the query execution was successful
            if ($resultOptions) {
                while ($rowOption = mysqli_fetch_assoc($resultOptions)) {
                    $selectOptionName = $rowOption['select_option_name'];
                    $selectOptionId = $rowOption['select_option_id']; // Assuming this field exists in your select_option table
                
                    // Fetch the cost from the cost table based on the select option id
                    $queryCost = "SELECT select_option_cost FROM cost WHERE select_option_id = $selectOptionId";
                    $resultCost = mysqli_query($conn, $queryCost);
                
                    if ($resultCost && mysqli_num_rows($resultCost) > 0) {
                        $rowCost = mysqli_fetch_assoc($resultCost);
                        $selectOptionCost = $rowCost['select_option_cost'];
                    } else {
                        // Default to 0 if cost is not found
                        $selectOptionCost = 0;
                    }
                
                    // Build the option with the data-cost attribute
                    $htmlFormFields .= '<option value="' . htmlspecialchars($selectOptionName) . '" data-cost="' . $selectOptionCost . '">' . htmlspecialchars($selectOptionName) . '</option>';
                }
                
            } else {
                // Error handling for query execution failure
                $htmlFormFields .= '<option value="">Error fetching select options</option>';
            }

            // Close select element for the current form field
            $htmlFormFields .= '</select>';
        }

        $htmlFormFields .= '</div>'; // Close form-group
    } else {
        $htmlFormFields .= '<p>No form details found for the selected product.</p>';
    }

    // Fetch product image
    // Replace this query with your actual query to fetch the product image based on the product ID
    $queryImage = "SELECT image FROM product WHERE product_id = $productId";
    $resultImage = mysqli_query($conn, $queryImage);

    // Check if the query execution was successful
    if ($resultImage && mysqli_num_rows($resultImage) > 0) {
        $rowImage = mysqli_fetch_assoc($resultImage);
        $image = $rowImage['image'];
        
        // Display the product image within the product_img_container div
        $htmlProductImage .= '<img src="admin/upload/product_img/' . $image . '" alt="Product Image" class="img-fluid">';
    } else {
        // Error handling for query execution failure
        $htmlProductImage .= '<p>Error fetching product image</p>';
    }
} else {
    $htmlFormFields .= '<p>Invalid or missing product ID.</p>';
}

// Echo the HTML for the product image
echo $htmlProductImage;

// Echo the HTML for the form fields
echo $htmlFormFields;

// Close database connection
mysqli_close($conn);
?>
