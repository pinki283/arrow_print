<?php

include("header.php");
include("admin/db_connect.php");

// Check if the user is already logged in, redirect to services.php if logged in


if (isset($_POST['login'])) {

    $mobile_number = $_POST['mob'];
    $password = $_POST['password'];

    // SQL query to check if the user exists in the database
    $query = "SELECT * FROM sign_up WHERE wh_no='$mobile_number' AND new_pass='$password' AND status=1";
    $result = mysqli_query($conn, $query);


    $num=mysqli_num_rows($result);

    if($num > 0){

        $row=mysqli_fetch_assoc($result);

        $_SESSION['mobile']=$row['wh_no'];
        $_SESSION['member_id'] = $row['id'];
        $_SESSION['member_name'] = $row['name'];
        $_SESSION['business']=$row['b_name'];
        $_SESSION['country_name'] = $row['country'];
        $_SESSION['state_name'] = $row['state'];
        $_SESSION['city_name']=$row['city'];
        $_SESSION['pincode_no'] = $row['pincode'];
        $_SESSION['gst_num'] = $row['gst_no'];
        $_SESSION['email_id']=$row['email'];
        $_SESSION['address_name'] = $row['address'];
        echo "<script> window.location='services.php';</script>";


    }else{

        echo "<script>alert('Invalid Login Details ');</script>";

    }

    // if ($result) {
    //     echo "<script>alert('login successful'); window.open('popup.html', '_blank');</script>";
    // } else {
    //     echo "<script>alert('login failed. Error: " . mysqli_error($conn) . "');</script>";
    // }
    }

mysqli_close($conn); // Close database connection
?>


<section id="page-title" class="page-title-center">
    <h1>Login</h1>
    <span>to the world of infinite opportunities in printing industry</span>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="default.aspx.html">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Login</li>
    </ol>
</section>
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">


            <div class="owl-carousel image-carousel carousel-widget flip-card-wrapper clearfix" data-margin="20" data-nav="true" data-pagi="false" data-items-xs="2" data-items-sm="2" data-items-md="2" data-items-lg="2" data-items-xl="2" style="overflow: visible;">

                <div class="flip-card top-to-bottom">
                    <div class="flip-card-front dark" style="background-image: url('demos/photography/images/items/18.jpg')">
                        <div class="flip-card-inner">
                            <div class="card bg-transparent border-0">
                                <div class="card-body">
                                    <h3 class="card-title mb-0 center">Not a Member ?</h3>
                                    <img src="images/join-us.png" style="margin: 0px auto; width: 60%; border-radius: 10px" alt="join Printers Club of India Limited as distributor or agent" title="join 'Printers Club of India' as Distributor / Printing Press & become prestigious member of India's largets club of Printing Agencies">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flip-card-back bg-danger no-after">
                        <div class="flip-card-inner">
                            <h3 class="card-title mb-0 center text-white">CREATE ACCOUNT</h3>
                            <p class="mb-2 text-white">Get access to the world of expert printing service with live status updates.</p>
                            <button type="button" class="btn btn-outline-light mt-2" onclick="location.href='join.php'">CLICK HERE</button>
                        </div>
                    </div>
                </div>

                <div>
                    <form method="POST" action="">
                        <div id="loginFormContainer" style="background-color:#08a0d0;border-radius:5px;color:white;padding:10px;width:100%;max-width:800px;margin:0 auto;">
                            <h4 style="color:#f0ca36;margin-bottom:17px;text-align:center;">Already have an Account</h4>
                            <span id="loginMessage" style="display:none;"></span>
                            <div style="margin-bottom:10px;">
                                <label for="mob">Mobile Number:</label><br>
                                <input name="mob" type="text" id="mob" class="form-control" style="width:100%;padding:5px;">
                            </div>
                            <div style="margin-bottom:10px;">
                                <label for="password">Password:</label>
                                <a href="ForgotPassword.php" tabindex="-1" style="float:right;color:#ffffff;font-size:12px;text-decoration:none;">Forgot Password</a><br>
                                <input name="password" type="password" id="password" class="form-control" style="width:100%;padding:5px;">
                            </div>
                            <div style="text-align:center;">
                                <input type="submit" name="login" value="Login" id="login" class="btn btn-warning mb-2" style="width:100%;background-color:#f0ca36;color:white;text-transform:uppercase;font-size:20px;">
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- #content end -->
<?php
include("footer.php");
?>