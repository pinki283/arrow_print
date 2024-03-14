<?php
session_start();
include("db_connect.php");

$user_profile = $_SESSION['user_name'];
if (!$user_profile) {
    header('location:index.php');
    exit; // Add exit after header redirect to stop further execution
}

if(isset($_POST['main_category_id']) && isset($_POST['product_id']) && isset($_POST['form_field_id'])) {
    $mainCategoryId = $_POST['main_category_id'];
    $productId = $_POST['product_id'];
    $formFieldId = $_POST['form_field_id'];

    // Fetch form options based on the selected form field ID
    $sqlOptions = "SELECT select_option_id, select_option_name FROM select_option WHERE form_field_id = $formFieldId";
    $resultOptions = mysqli_query($conn, $sqlOptions);
    if($resultOptions) {
        $optionFields = '<option value="">Choose Option</option>';
        while ($rowOption = mysqli_fetch_assoc($resultOptions)) {
            $optionFields .= '<option value="' . $rowOption['select_option_id'] . '">' . $rowOption['select_option_name'] . '</option>';
        }
    }

    $response = array(
        'optionFields' => $optionFields
    );

    echo json_encode($response);
}
?>
