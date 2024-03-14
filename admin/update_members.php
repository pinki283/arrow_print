<?php
session_start();

$user_profile = $_SESSION['user_name'];
if (!$user_profile) {
    header('location:index.php');
    exit;
}

include("db_connect.php");

$id = $_GET['update_id'];

$sql = "SELECT * FROM sign_up WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$m_id = $row['id'];
$date = $row['updated_at'];
$b_name = $row['b_name'];
$m_name =  $row['name']; 
$mob_no = $row['wh_no'];
$pass =  $row['new_pass']; 
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
                    <label for="">Member Id</label>
                    <input type="text" class="form-control" name="m_id" value="<?php echo $m_id; ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="">Join Date</label>
                    <input type="text" class="form-control" name="join_date" value="<?php echo $date; ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="">Business Name</label>
                    <input type="text" class="form-control" name="business_name" value="<?php echo $b_name; ?>">
                </div>

                <div class="form-group">
                    <label for="">Member Name</label>
                    <input type="text" class="form-control" name="member_name" value="<?php echo $m_name; ?>">
                </div>

                <div class="form-group">
                    <label for="">Status</label>
                    <input type="text" class="form-control" name="status" value="<?php echo $status; ?>">
                </div>

                <div class="form-group">
                <label for="">Update Status</label>
                <select class="form-control" name="update_status">

    <option value="">Select status</option>
    <option value="0">Deactivate</option>
    <option value="1">Active</option>
   
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
    $order_id = $_POST['m_id'];
    $order_date =  $_POST['join_date'];
    $order_name =  $_POST['business_name'];
    $product_name =   $_POST['member_name']; 
    $status =  $_POST['update_status'];
    $sql = "UPDATE sign_up SET id='$order_id', updated_at='$order_date',b_name='$order_name',name='$product_name', status='$status' WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if($result) {
        header('location:members.php');
        exit;
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

</body>
</html>
