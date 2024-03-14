<?php
session_start();

$user_profile = $_SESSION['user_name'];
if (!$user_profile) {
    header('location:index.php');
    exit; // Stop further execution
}

include("db_connect.php");

if(isset($_GET['update_id'])) {
    $id = $_GET['update_id'];
    
    $sql = "SELECT * FROM product WHERE product_id='$id'";
    $result = mysqli_query($conn, $sql);
    
    if($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $category = $row['main_category_id'];
        $image = $row['image'];
        $title = $row['title'];
        $head1 = $row['heading1'];
        $desc1 = $row['description1'];
        $head2 = $row['heading2'];
        $desc2 = $row['description2'];
        $head3 = $row['heading3'];
        $desc3 = $row['description3'];
    } else {
        echo "No record found";
        exit; // Stop further execution
    }
} else {
    echo "Invalid request";
    exit; // Stop further execution
}
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Update</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="sub_category">Sub-Category</label>
                        <select name="sub_cat" id="sub_cat" class="form-control">
                            <option value="<?php echo $category; ?>"><?php echo $category; ?></option>
                            <?php
                            // Fetch data from the main_category table
                            $sql = "SELECT title FROM main_category";
                            $result = mysqli_query($conn, $sql);
                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<option value="' . $row['title'] . '">' . $row['title'] . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Image</label>
                        <input type="file" class="form-control" name="image" accept="image/*">
                        <img src="upload/<?php echo $image; ?>" name="image" height="100px" width="100px">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Title</label>
                        <input type="text" class="form-control" name="title" value="<?php echo $title; ?>" placeholder="Enter product name">
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputPassword1">heading 1</label>
                        <input type="text" class="form-control" name="head1" value="<?php echo $head1; ?>" placeholder="Enter heading 1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Description 1</label>
                        <input type="text" class="form-control" name="desc1" value="<?php echo $desc1; ?>" placeholder="Enter Description 1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">heading 2</label>
                        <input type="text" class="form-control" name="head2" value="<?php echo $head2; ?>" placeholder="Enter heading 2">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Description 2</label>
                        <input type="text" class="form-control" name="desc2" value="<?php echo $desc2; ?>" placeholder="Enter Description 2">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">heading 3</label>
                        <input type="text" class="form-control" name="head3" value="<?php echo $head3; ?>" placeholder="Enter heading 3">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Description 3</label>
                        <input type="text" class="form-control" name="desc3" value="<?php echo $desc3; ?>" placeholder="Enter Description 3">
                    </div>
                    <input type="submit" value="Update" name="update">
                </form>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>
    <?php
    if(isset($_POST['update'])) {
        $title = $_POST['title'];
        $head1 = $_POST['head1'];
        $desc1 = $_POST['desc1'];
        $head2 = $_POST['head2'];
        $desc2 = $_POST['desc2'];
        $head3 = $_POST['head3'];
        $desc3 = $_POST['desc3'];
        // $id = $_POST['product_id']; 
        
        $category = $_POST['sub_cat'];
        // Handle image upload
        if($_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $temp_name = $_FILES['image']['tmp_name'];
            $image_name = $_FILES['image']['name'];
            $upload_directory = 'upload/product_img/';
            $target_path = $upload_directory . $image_name;
            if(move_uploaded_file($temp_name, $target_path)) {
                // Image uploaded successfully, update database
                $conn = mysqli_connect("localhost", "username", "password", "database_name"); // Initialize or include $conn
                $sql = "UPDATE product SET image='$image_name', title='$title', heading1='$head1', description1='$desc1', heading2='$head2', description2='$desc2' , heading3='$head3', description3='$desc3' WHERE product_id='$id'";
                $result = mysqli_query($conn, $sql);
                if($result) {
                    header('location:product.php');
                    exit; // Stop further execution
                } else {
                    echo "Error updating record: " . mysqli_error($conn);
                }
            } else {
                echo "Error uploading image.";
            }
        } else {
            echo "Error: " . $_FILES['image']['error'];
        }
    }
?>

</body>
</html>
