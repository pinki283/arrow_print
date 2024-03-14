<?php
include("printing_service_header.php");

$sql = "SELECT * FROM main_category";
$result = mysqli_query($conn, $sql);
?>

<div class="services-card">
    <div class="container">
        <h1><center>LIST OF PRINTING SERVICES</center></h1>
        <div class="row">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['main_category_id'];
                $image = $row['image'];
                $title = $row['title'];
            ?>
                <div class="col-md-2">
                    <a href="addOrderViewCategory.php?main_id=<?php echo $id; ?>">
                        <img src="admin/upload/<?php echo $image; ?>" alt="...">
                        <h5><?php echo $title; ?></h5>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<style>
    /* Your CSS styles */
</style>

<?php
// Retrieve the member_id from the session
$member_id = $_SESSION['member_id'];

// SQL query to select rows from the production table for a particular member_id
$sql = "SELECT * FROM production WHERE member_id = '$member_id' ORDER BY updated_at DESC LIMIT 10";

// Execute the query
$result = mysqli_query($conn, $sql);

?>

<div class="services-card">
    <div class="container">
        <h1><center>RECENT ORDERS</center></h1>
        <table>
            <thead>
                <tr>
                    <th scope="col">ORDER NO.</th>
                    <th scope="col">DATE</th>
                    <th scope="col">ORDER NAME</th>
                    <th scope="col">ORDER DETAIL</th>
                    <th scope="col">CURRENT STATUS</th>
                    <th scope="col"></th> <!-- Additional column without thead -->
                    <th scope="col"></th> <!-- Additional column without thead -->
                    <th scope="col"></th> <!-- Additional column without thead -->
                </tr>
            </thead>
            <tbody>

                <?php
                while ($order = mysqli_fetch_assoc($result)) {
                    $order_id = $order['order_id'];
                    $order_name = $order['order_name'];
                    $order_amount = $order['order_amount'];
                    $order_date = $order['updated_at'];
                    $product_name = $order['product_name'];
                    $order_details = $order['order_details'];
                    $front_side_pdf = $order['front_side_pdf'];
                    $status = $order['status'];
                ?>
                    <tr>
                        <td data-label='ORDER NO.'><?php echo $order_id; ?></td>
                        <td data-label='DATE'><?php echo $order_date; ?></td>
                        <td data-label='ORDER NAME'><?php echo $order_name; ?></td>
                        <td class='order-detail' data-label='ORDER DETAIL'><?php echo $product_name; ?></td>
                        <td data-label='CURRENT STATUS'>
                            <?php
                                                                         
                          if ($status == 0) {
                            echo "Cancelled";
                        } elseif ($status == 1) {
                            echo "Order booked";
                        } elseif ($status == 2) {
                            echo "File Uploaded";
                        } elseif ($status == 3) {
                            echo "Under Process";
                        } elseif ($status == 4) {
                            echo "Dispatched";
                        } elseif ($status == 5) {
                            echo "Delivered";
                        } else {
                            echo "Unknown"; 
                        }
                            ?>
                        </td>
                        <!-- <td data-label='cancel_button'><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editRemarkModal<?php echo $order_id; ?>">Cancel</button></td> -->
                        <td data-label='cancel_button'>
                            <?php if ($status != 0 && $status != 4 && $status != 5) { ?>
                                <!-- Show cancel button if order status is 'Order booked' -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editRemarkModal<?php echo $order_id; ?>">Cancel</button>
                            <?php } ?>
                        </td>
                      <td data-label='upload_files'>
                      <?php if (empty($front_side_pdf) && $status == 1) { ?>
    
    <button type="button" class="btn btn-success" onclick="redirectToUploadPage(<?php echo $order_id; ?>)">Upload Files</button>
<?php } ?>

<script>

    function redirectToUploadPage(orderId) {
        // Redirect to the upload files page with the order ID as a query parameter
        window.location.href = 'order_page.php?orderId=' + orderId;
        // window.history.back();
    }

</script>

                        </td>
                        <td data-label='details_button'>
    <a href="by_orderNo.php?orderId=<?php echo $order_id; ?>"><button type="button" class="btn btn-success">Details</button></a>
</td>

                    </tr>

                    <!-- Edit Remark Modal -->
                    <div class="modal fade" id="editRemarkModal<?php echo $order_id; ?>" tabindex="-1" role="dialog" aria-labelledby="editRemarkModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editRemarkModalLabel">ARE YOU SURE TO CANCEL ORDER?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label for="customerName">Customer Name:</label>
                                            <input type="text" class="form-control" id="customerName" name="customerName" value="<?php echo $order_name; ?>" readonly>
                                        </div>
                                        <!-- Other form fields -->
                                        <div class="form-group">
                        <label for="orderId">Order Id:</label>
                        <input type="text" class="form-control" id="orderId" name="orderId" value="<?php echo $order_id;?>" readonly>
                    </div>
                    <div class="form-group">
    <label for="orderDetail">Order Detail:</label>
    <textarea class="form-control" id="detail" name="detail"readonly><?php echo $order_details; ?></textarea>
</div>

                    <div class="form-group">
                        <label for="currentStatus">Current Status:</label>
                        <input type="text" class="form-control" id="currentStatus" name="currentStatus" value=" <?php
                          
                          if ($status == 0) {
                            echo "Cancelled";
                        } elseif ($status == 1) {
                            echo "Order booked";
                        } elseif ($status == 2) {
                            echo "File Uploaded";
                        } elseif ($status == 3) {
                            echo "Under Process";
                        } elseif ($status == 4) {
                            echo "Dispatched";
                        } elseif ($status == 5) {
                            echo "Delivered";
                        } else {
                            echo "Unknown"; 
                        }
                            ?>" readonly>
                    </div>
                                        <!-- <button type="submit" name="update" class="btn btn-danger">Cancel Order</button> -->
                                        
                                        <input type="hidden" name="orderId" value="<?php echo $order_id; ?>">
                    <button type="submit" name="cancelOrder" class="btn btn-danger">Cancel Order</button>
                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php
if(isset($_POST['cancelOrder'])) {
    $order_id_to_cancel = $_POST['orderId'];
    $sql = "UPDATE production SET status = 0 WHERE order_id = '$order_id_to_cancel'";
    $result = mysqli_query($conn, $sql);
    
    if($result) {
        // Update successful
        // You can add a success message or redirect the user
    } else {
        // Update failed
        // Handle the error
    }
}
?>

<?php
include("footer.php");
?>
