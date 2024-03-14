<?php
session_start();
include("db_connect.php");

$user_profile = $_SESSION['user_name'];
if (!$user_profile) {
    header('location:index.php');
    exit; // Add exit after header redirect to stop further execution
}

if(isset($_POST['main_category_id'])) { // Change to main_category_id
    $mainCategoryId = $_POST['main_category_id'];
    $subCategoryOptions = '<option value="">Choose Option</option>';
    $productOptions = '<option value="">Choose Option</option>';
    $formFields = '<option value="">Choose Option</option>';
    
    // Fetch sub-categories based on the main category ID
    $sqlSub = "SELECT sub_category_id, title FROM sub_category WHERE main_category_id = $mainCategoryId";
    $resultSub = mysqli_query($conn, $sqlSub);
    if($resultSub) {
        while ($rowSub = mysqli_fetch_assoc($resultSub)) {
            $subCategoryOptions .= '<option value="' . $rowSub['sub_category_id'] . '">' . $rowSub['title'] . '</option>';
        }
    }
    
    // Fetch products based on the main category ID
    $sqlProd = "SELECT product_id, title FROM product WHERE main_category_id = $mainCategoryId";
    $resultProd = mysqli_query($conn, $sqlProd);
    if($resultProd) {
        while ($rowProd = mysqli_fetch_assoc($resultProd)) {
            $productOptions .= '<option value="' . $rowProd['product_id'] . '">' . $rowProd['title'] . '</option>';
        }
    }
    
    $response = array(
        'subCategories' => $subCategoryOptions,
        'products' => $productOptions
    );
    
    echo json_encode($response); // Send JSON response
}

?>
