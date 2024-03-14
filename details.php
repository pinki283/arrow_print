<?php
include("printing_service_header.php");
?>

<?php
// Check if 'orderId' is set in the URL
if (isset($_GET['orderId'])) {
  $id = $_GET['orderId'];

  // Retrieve order details from the database
  $sql = "SELECT * FROM production where order_id=$id";
  $result = mysqli_query($conn, $sql);

  if ($result && mysqli_num_rows($result) > 0) {
      $order = mysqli_fetch_assoc($result);
      $production_id = $order['production_id'];
      $order_id = $order['order_id'];
      $member_id=$order['member_id'];
      $quantity = $order['quantity'];
      $order_name = $order['order_name'];
      $order_amount = $order['order_amount'];
      $order_date = $order['updated_at'];
      $product_name = $order['product_name'];
      $front_side_pdf = $order['front_side_pdf'];
      $back_side_pdf = $order['back_side_pdf'];
      $order_details = $order['order_details'];
      $status = $order['status'];
?>

<div class="content-wrap">
	<div class="container clearfix">
	<div class="fancy-title title-center title-border">
			<h3 class="center">SEARCH ORDER
			</h3>
		</div>
	
   <div class="join_form">
   <form id="myForm" method="GET" action="">
    <div class="container">
    <div class="row">
       <div class="col-md-2"></div>
        <div class="col-md-6">       
                <input type="text" name="orderNo" id="orderNo" class="form-control" placeholder="Enter Order No">        
        </div>
        <div class="col-md-2">
        <button type="submit" class="btn btn-primary">Search</button>
        </div>
      <div class="col-md-2"></div>
    </div>
</div>
</form>
  </div>

   <div class="container">
   <div class="row">
    <div class="col-md-8">
        <h3>SELECTED ORDER ID : <?php echo $order_id;?></h3>
        <div class="row">
    <div class="col-md-6">
        <embed src="<?php echo $front_side_pdf; ?>" type="application/pdf" width="200px" height="200px" />
        <br>
        <a href="<?php echo $front_side_pdf; ?>" download>Download File</a>
    </div>
    <div class="col-md-6">
        <embed src="<?php echo $back_side_pdf; ?>" type="application/pdf" width="200px" height="200px" />
        <br>
        <a href="<?php echo $back_side_pdf; ?>" download>Download File</a>
    </div>
</div>

            
    </div>
    <div class="col-md-4">
    <button type="button" class="btn btn-success">Current Status -  <?php
                            if ($status == 1) {
                                echo "Order booked";
                            } elseif ($status == 0) {
                                echo "Cancelled";
                            } elseif ($status == 2) {
                                echo "Dispatched";
                            } elseif ($status == 3) {
                                echo "Under Process";
                            } else {
                                echo "Unknown";
                            }
                            ?></button><br><br>
        <p>Delivery Code - <?php echo $production_id;?></p>
        <p>Order Name - <?php echo $order_name;?></p>
        <p>Order Date - <?php echo $order_date;?></p>
        <p>Order Amount - <?php echo $order_amount;?></p>
        <p>Product Name- <?php echo $product_name;?></p>
        <p>Order Details- <?php echo $order_details;?></p>
        <button type="button" class="btn btn-info">Show Processing Log</button>
    </div>
</div>

</div>

</div>
</div>


<?php
       
    } else {
        echo "Order not found.";
    }
} else {
    echo "Order ID not provided.";
}

include("footer.php");
?>