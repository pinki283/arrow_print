<?php
session_start();
include("db_connect.php");

$user_profile = $_SESSION['user_name'];
if (!$user_profile) {
    header('location:index.php');
    exit; // Add exit after header redirect to stop further execution
}

if(isset($_POST['main_category_id']) && isset($_POST['product_id'])) {
    $mainCategoryId = $_POST['main_category_id'];
    $productId = $_POST['product_id'];

    // Fetch form details based on the selected product ID
    $sqlForm = "SELECT form_field_id, form_field_name FROM form_details WHERE product_id = $productId";
    $resultForm = mysqli_query($conn, $sqlForm);
    if($resultForm) {
        $formOptions = '<option value="">Choose Option</option>';
        while ($rowForm = mysqli_fetch_assoc($resultForm)) {
            $formOptions .= '<option value="' . $rowForm['form_field_id'] . '">' . $rowForm['form_field_name'] . '</option>';
        }
    }

    $response = array(
        'formDetails' => $formOptions
    );

    echo json_encode($response);
}

?>