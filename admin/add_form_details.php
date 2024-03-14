<?php
session_start();
include("db_connect.php");

$user_profile = $_SESSION['user_name'];
if (!$user_profile) {
    header('location:index.php');
    exit; // Add exit after header redirect to stop further execution
}

if (isset($_POST['submit'])) {
    $productId = mysqli_real_escape_string($conn, $_POST['product']);
    $subCategory = mysqli_real_escape_string($conn, $_POST['sub_cat']);
    $mainCategory = mysqli_real_escape_string($conn, $_POST['main_cat']);
    $title = mysqli_real_escape_string($conn, $_POST['form_field']);
    
    // Insert product data into the database
    $sql = "INSERT INTO form_details (product_id, sub_category_id, main_category_id, form_field_name) VALUES ('$productId', '$subCategory', '$mainCategory', '$title')";
    
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        header('location:form_details.php');
        exit; // Add exit after header redirect to stop further execution
    } else {
        echo "Error adding sub-category: " . mysqli_error($conn);
    }
}    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Sub-Category</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="main_category">Main-Category</label>
                        <select name="main_cat" id="main_cat" class="form-control">
                            <option value="">Choose Option</option>
                            <?php
                            // Fetch data from the main_category table
                            $sql = "SELECT main_category_id,title FROM main_category";
                            $result = mysqli_query($conn, $sql);
                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<option value="' . $row['main_category_id'] . '">' . $row['title'] . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="product">Sub-Category</label>
                        <select name="sub_cat" id="sub_cat" class="form-control">
                            <option value="">Choose Option</option>
                        </select>
                    </div>

                    <div class="form-group">
    <label for="product">Product Name</label>
    <select name="product" id="product" class="form-control">
        <option value="">Choose Option</option>
    </select>
</div>
           
                    <div class="form-group">
                        <label for="title">Form Fields</label>
                        <input type="text" class="form-control" name="form_field" placeholder="Enter form details name" required>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Submit" name="submit">
                </form>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>
    <script>
    $(document).ready(function() {
        $('#main_cat').change(function() {
            var mainCategoryId = $(this).val();
            $.ajax({
                url: 'get_products.php', // Updated URL
                type: 'POST',
                data: {
                    main_category_id: mainCategoryId // Send main category ID
                },
                success: function(response) {
                    var data = JSON.parse(response);
                    $('#sub_cat').html(data.subCategories);
                    $('#product').html(data.products);
                }
            });
        });
    });
</script>

</body>
</html>

<?php
// Close the database connection
mysqli_close($conn);
?>
