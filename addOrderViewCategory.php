<?php
include("printing_service_header.php");


$id = $_GET['main_id']; // Correct syntax to access value of id from $_GET superglobal

$sql = "SELECT * FROM sub_category WHERE main_category_id = $id";
$result = mysqli_query($conn, $sql);
?>


    <div class="services-card">
        <div class="container">
   <h1> <center>SELECT CATEGORY</center></h1>
        <div class="row">

        <?php
      
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['sub_category_id'];
        $image = $row['image'];
        $title = $row['title'];
    ?>
    
<div class="col-md-2">
    <a href="add_order_process.php?cat_id=<?php echo $id; ?>">
        <img src="admin/upload/sub_category_img/<?php echo $image; ?>" alt="...">
        <h5><?php echo $title; ?></h5>
    </a>
</div>

        <?php } ?>
        </div>
        </div>
    </div>

</div>
<!--  -->
<?php
include("footer.php");
?>
