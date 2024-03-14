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
    $title = mysqli_real_escape_string($conn, $_POST['product']);
    $head1 = mysqli_real_escape_string($conn, $_POST['heading_1']);
    $desc1 = mysqli_real_escape_string($conn, $_POST['description_1']);
    $head2 = mysqli_real_escape_string($conn, $_POST['heading_2']);
    $desc2 = mysqli_real_escape_string($conn, $_POST['description_2']);
    $head3 = mysqli_real_escape_string($conn, $_POST['heading_3']);
    $desc3 = mysqli_real_escape_string($conn, $_POST['description_3']);

    // Create a directory for product images if not exists
    $image_dir = "upload/product_img/";
    if (!file_exists($image_dir)) {
        mkdir($image_dir, 0777, true);
    }

    $image_names = array(); // Array to store image file names

    // Handle multiple image file uploads
    if (!empty($_FILES['img']['name'][0])) {
        foreach ($_FILES['img']['tmp_name'] as $key => $temp_name) {
            $image_name = basename($_FILES['img']['name'][$key]);
            $target_image_file = $image_dir . $image_name;

            // Move the uploaded image file
            if (!move_uploaded_file($temp_name, $target_image_file)) {
                echo "Error uploading image file.";
                exit;
            }
            $image_names[] = $image_name; // Add image name to array
        }
    } else {
        echo "Image files are required.";
        exit;
    }

    // Convert array of image names to comma-separated string
    $image_names_str = implode(",", $image_names);

    // Insert product data into the database
    $sql = "INSERT INTO product (sub_category_id, main_category_id, image, title, heading1, description1, heading2, description2, heading3, description3) VALUES ('$subCategory', '$mainCategory', '$image_names_str', '$title','$head1','$desc1','$head2','$desc2','$head3','$desc3')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('location:product.php');
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
                        <label for="img">Images</label>
                        <input type="file" class="form-control" name="img[]" multiple required>
                    </div>
                    <div class="form-group">
                        <label for="title">Product</label>
                        <input type="text" class="form-control" name="product" placeholder="Enter Product Name" required>
                    </div>
                    <div class="form-group">
                        <label for="title">Product Heading 1</label>
                        <input type="text" class="form-control" name="heading_1" placeholder="Enter Product Heading1" >
                    </div>
                    <div class="form-group">
                        <label for="title">Product Description 1</label>
                        <textarea type="text" class="form-control" name="description_1" placeholder="Enter Product Description1" ></textarea>
                    </div>
                    <div class="form-group">
                        <label for="title">Product Heading 2</label>
                        <input type="text" class="form-control" name="heading_2" placeholder="Enter Product Heading2" >
                    </div>
                    <div class="form-group">
                        <label for="title">Product Description 2</label>
                        <textarea class="form-control" name="description_2" placeholder="Enter Product Description2" ></textarea>
                    </div>
                    <div class="form-group">
                        <label for="title">Product Heading 3</label>
                        <input type="text" class="form-control" name="heading_3" placeholder="Enter Product Heading3" >
                    </div>
                    <div class="form-group">
                        <label for="title">Product Description 3</label>
                        <textarea type="text" class="form-control" name="description_3" placeholder="Enter Product Description3" ></textarea>
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
                    // $('#product').html(data.products);
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
