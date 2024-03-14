<?php
include("printing_service_header.php");
?>

<style>

ol.progtrckr {
    margin: 0;
    padding: 0;
    list-style-type none;
}

ol.progtrckr li {
    display: inline-block;
    text-align: center;
    line-height: 3.5em;
}

ol.progtrckr[data-progtrckr-steps="2"] li { width: 49%; }
ol.progtrckr[data-progtrckr-steps="3"] li { width: 33%; }
ol.progtrckr[data-progtrckr-steps="4"] li { width: 24%; }
ol.progtrckr[data-progtrckr-steps="5"] li { width: 19%; }
ol.progtrckr[data-progtrckr-steps="6"] li { width: 16%; }
ol.progtrckr[data-progtrckr-steps="7"] li { width: 14%; }
ol.progtrckr[data-progtrckr-steps="8"] li { width: 12%; }
ol.progtrckr[data-progtrckr-steps="9"] li { width: 11%; }

ol.progtrckr li.progtrckr-done {
    color: black;
    border-bottom: 4px solid yellowgreen;
}
ol.progtrckr li.progtrckr-todo {
    color: silver; 
    border-bottom: 4px solid silver;
}

ol.progtrckr li:after {
    content: "\00a0\00a0";
}
ol.progtrckr li:before {
    position: relative;
    bottom: -2.5em;
    float: left;
    left: 50%;
    line-height: 1em;
}
ol.progtrckr li.progtrckr-done:before {
    content: "\2713";
    color: white;
    background-color: yellowgreen;
    height: 2.2em;
    width: 2.2em;
    line-height: 2.2em;
    border: none;
    border-radius: 2.2em;
}
ol.progtrckr li.progtrckr-todo:before {
    content: "\039F";
    color: silver;
    background-color: white;
    font-size: 2.2em;
    bottom: -1.2em;
}

</style>

<?php 

if (isset($_GET['orderId'])) {
    // Logic for handling search by order ID in the URL
    $id = $_GET['orderId'];
    $sql = "SELECT * FROM production where order_id = $id";
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
			<h3 class="center">ORDER STATUS FOR ORDER NO. <?php echo $order_id;?>
			</h3>
		</div>

<ol class="progtrckr" data-progtrckr-steps="5">
    <?php if ($status == 0): ?>
        <li class="progtrckr-done">Cancelled</li>
        <li class="progtrckr-todo">File Uploaded</li>
        <li class="progtrckr-todo">Under Process</li>
        <li class="progtrckr-todo">Dispatched</li>
        <li class="progtrckr-todo">Delivered</li>
    <?php else: ?>
        <li class="<?php echo ($status >= 1) ? 'progtrckr-done' : 'progtrckr-todo'; ?>">Order Booked</li>
        <li class="<?php echo ($status >= 2) ? 'progtrckr-done' : 'progtrckr-todo'; ?>">File Uploaded</li>
        <li class="<?php echo ($status >= 3) ? 'progtrckr-done' : 'progtrckr-todo'; ?>">Under Process</li>
        <li class="<?php echo ($status >= 4) ? 'progtrckr-done' : 'progtrckr-todo'; ?>">Dispatched</li>
        <li class="<?php echo ($status >= 5) ? 'progtrckr-done' : 'progtrckr-todo'; ?>">Delivered</li>
    <?php endif; ?>
</ol>

    </div>
</div>

<?php
    } else {
        echo "Order not found.";
    }
}
?>

<?php
include("footer.php");
?>