<?php
include("admin/db_connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve order ID and new remark from the form
    $orderId = $_POST['orderId'];
    $newRemark = $_POST['remark'];

    // Update the special remark in the database
    $updateSql = "UPDATE orders SET special_remark = '$newRemark' WHERE order_id = $orderId";
    $updateResult = mysqli_query($conn, $updateSql);

    if ($updateResult) {
        echo "Remark updated successfully.";
    } else {
        echo "Error updating remark: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}
?>
