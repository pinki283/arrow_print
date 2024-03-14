<?php

include("printing_service_header.php");
include("admin/db_connect.php");

// Check if 'orderId' is set in the URL
if (isset($_GET['orderId'])) {
    $id = $_GET['orderId'];

    // Retrieve order details from the database
    $sql = "SELECT * FROM orders where order_id=$id";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $order = mysqli_fetch_assoc($result);
        $order_id = $order['order_id'];
        $member_id=$order['member_id'];
        $quantity = $order['quantity'];
        $order_name = $order['order_name'];
        $cost=$order['cost'];
        $gst=$order['gst'];
        $order_amount = $order['amount_payable'];
        $special_remark = $order['special_remark'];
        $order_date = $order['updated_at'];
        $product_id = $order['product_id'];
        $sub_cat_id = $order['sub_category_id'];
        $main_cat_id = $order['main_category_id'];
        $order_details = unserialize($order['details_form_field']); // unserialize the serialized data
        $select_option = unserialize($order['select_option']); // unserialize the serialized data

        // Retrieve product details based on product_id
        $product_sql = "SELECT * FROM product WHERE product_id = $product_id";
        $product_result = mysqli_query($conn, $product_sql);

        if ($product_result && mysqli_num_rows($product_result) > 0) {
            $product = mysqli_fetch_assoc($product_result);
            $product_name = $product['title'];
            // Display order details

            // Check if form is submitted
            if (isset($_POST['submit'])) {
                // Gather other necessary data from the form
            
                $upload_dir = "admin/upload/pdf_file/";
            
                // Check if front-side PDF is uploaded
                if (!empty($_FILES["front_pdf"]["name"])) {
                    $filename1 = basename($_FILES["front_pdf"]["name"]);
                    $front_side_pdf_path = $upload_dir . $filename1;
                    move_uploaded_file($_FILES["front_pdf"]["tmp_name"], $front_side_pdf_path);
                } else {
                    $front_side_pdf_path = ''; // Set an empty path if the file is not uploaded
                }
            
                // Check if back-side PDF is uploaded
                if (!empty($_FILES["back_pdf"]["name"])) {
                    $filename2 = basename($_FILES["back_pdf"]["name"]);
                    $back_side_pdf_path = $upload_dir . $filename2;
                    move_uploaded_file($_FILES["back_pdf"]["tmp_name"], $back_side_pdf_path);
                } else {
                    $back_side_pdf_path = ''; // Set an empty path if the file is not uploaded
                }
            
                // Combine order details with select options
                $combined_details = array();
                foreach ($order_details as $key => $value) {
                    $combined_details[] = $value . ' :' . $select_option[$key] . '';
                }

                // -------------------------------------------------------------------------------------------------------- 
                                   
                // Check if order_id already exists in the production table
                $sql_check_existence = "SELECT * FROM production WHERE order_id = '$order_id'";
                $result_check_existence = mysqli_query($conn, $sql_check_existence);
                
                if (mysqli_num_rows($result_check_existence) > 0) {
                    // If order_id exists, update the existing record
                    $update_sql = "UPDATE production SET status = 2,member_id = '$member_id', order_name = '$order_name',cost='$cost',gst='$gst', order_amount = '$order_amount', order_date = '$order_date', product_name = '$product_name', quantity = '$quantity', order_details = '" . implode(', ', $combined_details) . "', special_remark = '$special_remark', front_side_pdf = '$front_side_pdf_path', back_side_pdf = '$back_side_pdf_path' WHERE order_id = '$order_id'";
                    
                    if (mysqli_query($conn, $update_sql)) {
                        echo "<script>alert('Data updated in production table successfully.'); window.location.href = 'printing_service.php';</script>";
                    } else {
                        echo "Error: " . $update_sql . "<br>" . mysqli_error($conn);
                    }
                } else {
                    // If order_id does not exist, insert a new record
                    $insert_sql = "INSERT INTO production (member_id, order_id, product_id, sub_category_id, main_category_id, order_name, cost,gst,order_amount, order_date, product_name, quantity, order_details, special_remark, front_side_pdf, back_side_pdf) VALUES ('$member_id', '$order_id', '$product_id','$sub_cat_id','$main_cat_id','$order_name','$cost','$gst', '$order_amount', '$order_date', '$product_name', '$quantity', '" . implode(', ', $combined_details) . "', '$special_remark', '$front_side_pdf_path', '$back_side_pdf_path')";
                    
                    if (mysqli_query($conn, $insert_sql)) {
                        echo "<script>alert('Data inserted into production table successfully.'); window.location.href = 'by_cat.php';</script>";
                    } else {
                        echo "Error: " . $insert_sql . "<br>" . mysqli_error($conn);
                    }
                }
                             
            }
            
            // ... (continue with the rest of your code)
            ?>
            
            <style>
                span {
                    color: #474747 !important;
                }
            </style>

            <div class="container">
                <form action="" method="POST" enctype="multipart/form-data">

                    <input type="hidden" id="order_id" name="order_id" value="<?php echo $order_id; ?>">
                    <h1>
                        <center> ORDERS NO. <span><?php echo $order_id; ?></span></center>
                    </h1>

                    <div class="row">
                        <div class="col-md-4">
                            <label for="order_name">Order Name:</label>
                            <input type="text" id="order_name" name="order_name" class="form-control" value="<?php echo $order_name; ?>"><br>
                        </div>
                        <div class="col-md-4">
                            <label for="order_amount">Order Amount:</label>
                            <input type="text" id="order_amount" name="order_amount" class="form-control" value="<?php echo $order_amount; ?>"><br>
                        </div>
                        <div class="col-md-4">
                            <label for="order_date">Order Date:</label>
                            <input type="text" id="order_date" name="order_date" class="form-control" value="<?php echo $order_date; ?>"><br>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="product_name">Product:</label>
                            <input type="text" id="product_name" name="product_name" class="form-control" value="<?php echo $product_name; ?>"><br>
                        </div>
                        <div class="col-md-4">
                            <label for="quantity">Quantity:</label>
                            <input type="text" id="quantity" name="quantity" class="form-control" value="<?php echo $quantity; ?>"><br>
                        </div>
                        <div class="col-md-2"></div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label for="order_details">Order Details:</label>
                            <?php
                            // Combine order details with select options
                            $combined_details = array();
                            foreach ($order_details as $key => $value) {
                                $combined_details[] = $value . ' :' . $select_option[$key] . '';
                            }
                            ?>
                            <textarea class="form-control" id="special_remark" name="special_remark" rows="3"><?php echo implode(', ', $combined_details); ?></textarea>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label>Image file details: <span>Allowed File: 20.00 MB, PDF & CDR Only </span></label><br>
                            <input type="file" id="front_pdf" name="front_pdf">
                            <input type="file" id="back_pdf" name="back_pdf">
                        </div>

                        <div class="col-md-6">
                            <label for="special_remark">Customer's Remark:</label>
                            <textarea class="form-control" id="special_remark" name="special_remark" rows="3"><?php echo $special_remark; ?></textarea>
                            <a href="#" data-toggle="modal" data-target="#editRemarkModal">(Edit This Remark)</a><br>
                        </div>
                    </div><br><br>

                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" name="submit" value="Save & Proceed for Production" class="form-control btn btn-lg btn-success panelshadow">
                        </div>
                    </div>
                </form>
            </div>

            <!-- Edit Remark Modal -->
            <div class="modal fade" id="editRemarkModal" tabindex="-1" role="dialog" aria-labelledby="editRemarkModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editRemarkModalLabel">Edit Remark</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="update_remark.php" method="post">
                                <div class="form-group">
                                    <label for="remarkTextarea">Remark:</label>
                                    <textarea class="form-control" id="remarkTextarea" name="remark" rows="3"><?php echo $special_remark; ?></textarea>
                                    <input type="hidden" name="orderId" value="<?php echo $order_id; ?>">
                                </div>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

<?php
        } else {
            echo "Product not found.";
        }
    } else {
        echo "Order not found.";
    }
} else {
    echo "Order ID not provided.";
}

include("footer.php");

?>