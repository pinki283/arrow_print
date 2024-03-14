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
    $subCategory = mysqli_real_escape_string($conn, $_POST['sub_cat']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);

    // Handle image upload
    $image_dir = "upload/sub_category_img/"; // Create a directory for product images
    $image_name = mysqli_real_escape_string($conn, $_FILES['img']['name']);
    $target_image_file = $image_dir . basename($image_name);

    // Check if an image file is uploaded
    if (!empty($image_name)) {
        // Move the uploaded image file
        if (!move_uploaded_file($_FILES['img']['tmp_name'], $target_image_file)) {
            echo "Error uploading image file.";
            exit;
        }
    } else {
        echo "Image file is required.";
        exit;
    }

    // Handle CDR file upload if provided
    $cdr_dir = "upload/cdr_files/"; // Create a directory for CDR files
    $cdr_name = "";
    $target_cdr_file = "";
    if (!empty($_FILES['cdr']['name'])) {
        $cdr_name = mysqli_real_escape_string($conn, $_FILES['cdr']['name']);
        $target_cdr_file = $cdr_dir . basename($cdr_name);

        // Move the uploaded CDR file
        if (!move_uploaded_file($_FILES['cdr']['tmp_name'], $target_cdr_file)) {
            echo "Error uploading CDR file.";
            exit;
        }
    }

    // Insert product data into the database
    $sql = "INSERT INTO sub_category (main_category_id, image, cdr_file, title) VALUES ('$subCategory', '$image_name', '$cdr_name', '$title')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('location:freeDesignSub.php');
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
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <form action="" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="sub_category">Sub-Category</label>
                        <select name="sub_cat" id="sub_cat" class="form-control">
                            <option value="">Choose Option</option>
                            <?php
                            // Fetch data from the main_category table
                            $sql = "SELECT main_category_id,title FROM main_category";
                            $result = mysqli_query($conn, $sql);
                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<option value="'. $row['main_category_id'] .'">' . $row['title'] . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="img">Image</label>
                        <input type="file" class="form-control" name="img" required>
                    </div>
                    <div class="form-group">
                        <label for="cdr">CDR File (Optional)</label>
                        <input type="file" class="form-control" name="cdr">
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Enter Title" required>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Submit" name="submit">
                </form>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>
</body>
</html>

<?php
// Close the database connection
mysqli_close($conn);
?>
