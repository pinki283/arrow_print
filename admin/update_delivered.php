<?php
session_start();

$user_profile = $_SESSION['user_name'];
if (!$user_profile) {
    header('location:index.php');
    exit;
}

include("db_connect.php");

$id = $_GET['update_id'];

$sql = "SELECT * FROM production WHERE order_id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$order_id = $row['order_id'];
$order_date = $row['updated_at'];
$order_name = $row['order_name'];
$product_name =  $row['product_name']; 
$status = $row['status'];
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Update Production</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <h4>Update Production</h4>
            <form action="" method="POST">

                <div class="form-group">
                    <label for="">Production Id</label>
                    <input type="text" class="form-control" name="order_id" value="<?php echo $order_id; ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="">Order Date</label>
                    <input type="text" class="form-control" name="order_date" value="<?php echo $order_date; ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="">Order Name</label>
                    <input type="text" class="form-control" name="order_name" value="<?php echo $order_name; ?>">
                </div>

                <div class="form-group">
                    <label for="">Product Name</label>
                    <input type="text" class="form-control" name="product_name" value="<?php echo $product_name; ?>">
                </div>

                <div class="form-group">
                    <label for="">Status</label>
                    <input type="text" class="form-control" name="status" value="<?php echo $status; ?>">
                </div>

                <div class="form-group">
                <label for="">Update Status</label>
                <select class="form-control" name="update_status">

    <option value="">Select status</option>
    <option value="0">Cancelled</option>
    <option value="1">Order booked</option>
    <option value="2">File Uploaded</option>
    <option value="3">Under Process</option>
    <option value="4">Dispatched</option>
    <option value="5">Delivered</option>
   
</select>
                </div>
                <input type="submit" value="Update" name="update" class="btn btn-primary">
            </form>
        </div>
        <div class="col-lg-2"></div>
    </div>
</div>

<?php
if(isset($_POST['update'])) {
    $order_id = $_POST['order_id'];
    $order_date =  $_POST['order_date'];
    $order_name =  $_POST['order_name'];
    $product_name =   $_POST['product_name']; 
    $status =  $_POST['update_status'];
    $sql = "UPDATE production SET order_id='$order_id', order_date='$order_date',order_name='$order_name',product_name='$product_name', status='$status' WHERE order_id='$id'";
    $result = mysqli_query($conn, $sql);

    if($result) {
        header('location:delivered.php');
        exit;
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

</body>
</html>
