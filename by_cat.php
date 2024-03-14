<?php
include("printing_service_header.php");
?>
 <!-- filter table -->
 <style>
    /* Filtering table */

/* Hide all rows by default */
.table-filter tbody tr {
    display: none;
}

/* Generic styling for radio buttons */
input[type="radio"].tablefilter {
    height: 0;
    width: 0;
    visibility: hidden;
    position: absolute;
    opacity: 0;
    z-index: -1;
}

/* Use the label as a button */
label.filterBtn {
    cursor: pointer;
    display: inline-block;
    position: relative;
    transition: 0.3s;
    padding: 0.5em 1em;
    border: 1px solid #eee;
}

input[type="radio"].tablefilter:checked + label {
    background: white;
    color: #000;
    transition: 0.3s;
}

input[type="radio"].tablefilter:not(checked) + label {
    background: #fff;
    color: #1ABC9C;
    transition: 0.3s;
}

/* Show only Cat1 rows */
input[type="radio"].tablefilter[data-filter="Cat1"]:checked ~ .table-filter tbody tr[data-filter="Cat1"] {
    display: table-row;
}

/* Show only Cat2 rows */
input[type="radio"].tablefilter[data-filter="Cat2"]:checked ~ .table-filter tbody tr[data-filter="Cat2"] {
    display: table-row;
}

/* Show only Cat3 rows */
input[type="radio"].tablefilter[data-filter="Cat3"]:checked ~ .table-filter tbody tr[data-filter="Cat3"] {
    display: table-row;
}

/* Show only Cat4 rows */
input[type="radio"].tablefilter[data-filter="Cat4"]:checked ~ .table-filter tbody tr[data-filter="Cat4"] {
    display: table-row;
}

/* Show only Cat5 rows */
input[type="radio"].tablefilter[data-filter="Cat5"]:checked ~ .table-filter tbody tr[data-filter="Cat5"] {
    display: table-row;
}

/* Show all rows */
input[type="radio"].tablefilter[data-filter="All"]:checked ~ .table-filter tbody tr {
    display: table-row;
}

/* Responsive table styles */
@media (max-width: 768px) {
    .table-adaptive thead {
        border: none;
        clip: rect(0 0 0 0);
        height: 1px;
        margin: -1px;
        overflow: hidden;
        padding: 0;
        position: absolute;
        width: 1px;
    }

    .table-adaptive tr {
        border-bottom: 15px solid #fff;
        display: block;
    }

    .table-adaptive td {
        display: block;
        text-align: right;
        border: 1px solid #ddd;
        border-bottom: 0;
    }

    .table-adaptive td:last-child {
        border-bottom: 1px solid #ddd;
    }

    .table-adaptive td::before {
        content: attr(data-label);
        float: left;
    }
}

</style>

<?php

// Query to retrieve main categories
$sql_main_categories = "SELECT * FROM main_category";
$result_main_categories = mysqli_query($conn, $sql_main_categories);

?>

<?php
// Retrieve the member_id from the session
$member_id = $_SESSION['member_id'];
 
// Default query to select data for the recent date
$sql_production = "SELECT * FROM production WHERE member_id = '$member_id' ORDER BY updated_at DESC";

// Execute the query for production data
$result_production = mysqli_query($conn, $sql_production);

$counting_table=mysqli_query($conn,$sql_production);

// Initialize variables to count rows for each category
$countCat1 = 0;
$countCat2 = 0;
$countCat3 = 0;
$countCat4 = 0;
$countCat5 = 0;

while ($count = mysqli_fetch_assoc($counting_table)) {
    // Counting logic for each category
    $status = $count['status'];
    switch ($status) {
        case 0:
            $countCat1++;
            break;
        case 1:
            $countCat2++;         
            break;
        case 2:
            $countCat3++;
        
            break;
        case 3:
            $countCat4++;
         
            break;
        case 4:
            $countCat5++;
            break;
        default:
            // Handle unknown status values if necessary
            break;
    }
}
?>

<div class="content-wrap">
    <div class="container clearfix">
        <div class="fancy-title title-center title-border">
            <h3 class="center">ORDER STATUS</h3>
        </div>

        <form id="myForm" method="POST" action="">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <label for="b_name">Select Product</label>
                        <select name="product" id="product" class="form-control">
                            <option value="-1">--All Products--</option>
                            <?php while ($row = mysqli_fetch_assoc($result_main_categories)) {
                                $main_cat_id=$row['main_category_id']; ?>
                                <option value="<?php echo $main_cat_id ?>"><?php echo $row['title']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="name">Enter Customer Name</label>
                        <input type="text" name="c_name" id="c_name" class="form-control">
                    </div>

                    <div class="col-md-1">
                        <br>
                        <input type="submit" name="submit" value="Show" class="form-control btn btn-success "style="height: 36px;">
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
        </form>

        <!-- filter table -->
    
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!--Filter-->
                        <!-- Your radio button and label code goes here -->
                        <input type="radio" class="tablefilter" name="Filters" id="All" data-filter="All" checked />
        <label for="All" class="filterBtn">All</label>
        
        <input type="radio" class="tablefilter" name="Filters" id="Cat2" data-filter="Cat2" />
<label for="Cat2" class="filterBtn">Order Booked (<?php echo $countCat2; ?>)</label>

<input type="radio" class="tablefilter" name="Filters" id="Cat3" data-filter="Cat3" />
<label for="Cat3" class="filterBtn">File Uploaded (<?php echo $countCat3; ?>)</label>

<input type="radio" class="tablefilter" name="Filters" id="Cat4" data-filter="Cat4" />
<label for="Cat4" class="filterBtn">Under Process (<?php echo $countCat4; ?>)</label>

<input type="radio" class="tablefilter" name="Filters" id="Cat5" data-filter="Cat5" />
<label for="Cat5" class="filterBtn">Dispatched(<?php echo $countCat5; ?>)</label>

<input type="radio" class="tablefilter" name="Filters" id="Cat1" data-filter="Cat1" />
<label for="Cat1" class="filterBtn">Cancelled (<?php echo $countCat1; ?>)</label>

                        <!--Table-->
                        <table class="table table-striped table-filter table-adaptive">
                            <thead>
                                <!-- ORDER NO. DATE MEMBER ID PRINTING PRESS ORDER NAME ORDER DETAIL -->
                                <tr>
                                    <th scope="col">ORDER NO.</th>
                                    <th scope="col">ORDER DATE</th>
                                    <th scope="col">MEMBER ID</th>
                                    <th scope="col">ORDER NAME</th>
                                    <th scope="col">ORDER DETAIL</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($order = mysqli_fetch_assoc($result_production)) {
                                     $order_id = $order['order_id'];
                                     $member_id=$order['member_id'];
                                     $order_name = $order['order_name'];
                                     $order_amount = $order['order_amount'];
                                     $order_date = $order['updated_at'];
                                     $product_name = $order['product_name'];
                                     $order_details = $order['order_details'];
                                     $front_side_pdf = $order['front_side_pdf'];
                    
    $status = $order['status'];
    switch ($status) {
        case 0:
            $category = 'Cat1';  // Cancelled
            break;
        case 1:
                $category = 'Cat2';  // Order Booked
                break;
        case 2:
            $category = 'Cat3'; // File Uploaded
            break;
        case 3:
            $category = 'Cat4'; //  Under Process
            break;
        case 4:
            $category = 'Cat5'; // Dispatched
            break;
       
        default:
            $category = ''; // Unknown or other status
            break;
    }
    
?>
                                
                                <tr data-filter="<?php echo $category; ?>">
                                    <td data-label='ORDER NO.'><?php echo $order_id; ?></td>
                        <td data-label='DATE'><?php echo $order_date; ?></td>
                        <td data-label='Member id'><?php echo $member_id; ?></td>
                        <td data-label='ORDER NAME'><?php echo $order_name; ?></td>
                        <td class='order-detail' data-label='ORDER DETAIL'><?php echo $product_name; ?></td>
                     
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
                            if ($status == 1) {
                                echo "Order booked";
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
            </div>
        </section>
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
    </div>
</div>


<?php include("footer.php"); ?>
