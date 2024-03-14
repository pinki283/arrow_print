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
    
    $sql = "SELECT * FROM cost WHERE cost_id='$id'";
    $result = mysqli_query($conn, $sql);
    
    if($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $category = $row['select_option_id'];
        $title = $row['product_cost'];
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
                        <label for="sub_category">Select-Option-Field</label>
                        <select name="sub_cat" id="sub_cat" class="form-control">
                            <option value="<?php echo $category; ?>"><?php echo $category; ?></option>
                            <?php
                            // Fetch data from the main_category table
                            $sql = "SELECT product_cost FROM cost";
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
                        <label for="exampleInputPassword1">Title</label>
                        <input type="text" class="form-control" name="title" value="<?php echo $title; ?>" placeholder="Enter movie name">
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
        $category = $_POST['sub_cat'];
       
                // Image uploaded successfully, update database
                $sql = "UPDATE cost SET product_cost='$title'WHERE form_field_id='$id'";
                $result = mysqli_query($conn, $sql);

                if($result){
                    header('location:select_option.php');
                }else{
                  echo "not updated";
                }
        }  
    ?>

</body>
</html>
