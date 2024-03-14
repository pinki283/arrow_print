<?php
session_start();
include("db_connect.php");

$user_profile = $_SESSION['user_name'];
if (!$user_profile) {
    header('location:index.php');
    exit; // Add exit after header redirect to stop further execution
}

if (isset($_POST['submit'])) {
    // Escape user inputs for security
    $mainCategory = mysqli_real_escape_string($conn, $_POST['main_cat']);
    $subCategory = mysqli_real_escape_string($conn, $_POST['sub_cat']);
    $productId = mysqli_real_escape_string($conn, $_POST['product']);
    $formDetails = mysqli_real_escape_string($conn, $_POST['form_d']);
    $optionFields = mysqli_real_escape_string($conn, $_POST['option']);
    $cost = mysqli_real_escape_string($conn, $_POST['cost']);

    // Insert product data into the database
    $sql = "INSERT INTO cost (select_option_id,form_field_id,product_id,sub_category_id, main_category_id, select_option_cost) VALUES (' $optionFields ','$formDetails', '$productId','$subCategory', '$mainCategory', '$cost')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('location:cost.php');
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
                        <label for="form_d">Form-Details</label>
                        <select name="form_d" id="form_d" class="form-control">
                        <option value="">Choose Option</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="option">Select Option Field</label>
                        <select name="option" id="option" class="form-control">
                        <option value="">Choose Option</option>
                        </select>
                    </div>
                  
                    <div class="form-group">
                        <label for="title">Select Option Cost</label>
                        <input type="text" class="form-control" name="cost" placeholder="Enter Select Option" required>
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
        var productId = $('#product').val(); // Get selected product ID
        $.ajax({
            url: 'get_products.php',
            type: 'POST',
            data: {
                main_category_id: mainCategoryId,
                product_id: productId // Send product ID
            },
            success: function(response) {
                var data = JSON.parse(response);
                $('#sub_cat').html(data.subCategories);
                $('#product').html(data.products);
                $('#form_d').html(data.formDetails); // Update form details
                $('#option').html(data.optionFields);
            }
        });
    });

    $('#product').change(function() {
        var mainCategoryId = $('#main_cat').val();
        var productId = $(this).val();
        $.ajax({
            url: 'get_form_details.php',
            type: 'POST',
            data: {
                main_category_id: mainCategoryId,
                product_id: productId
            },
            success: function(response) {
                var data = JSON.parse(response);
                $('#form_d').html(data.formDetails); // Update form details
            }
        });
    });

    $('#form_d').change(function() {
        var mainCategoryId = $('#main_cat').val();
        var productId = $('#product').val();
        var formFieldId = $(this).val();
        $.ajax({
            url: 'get_select_option.php', // Correct AJAX URL
            type: 'POST',
            data: {
                main_category_id: mainCategoryId,
                product_id: productId,
                form_field_id: formFieldId // Send form field ID
            },
            success: function(response) {
                var data = JSON.parse(response);
                $('#option').html(data.optionFields); // Update select option
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
