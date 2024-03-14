<?php
include("header.php");
include("admin/db_connect.php");

if (isset($_POST['request_otp'])) {
    $mobile_number = $_POST['mobileNumber'];

    // Check if the user exists with the provided mobile number
    $query = "SELECT * FROM sign_up WHERE wh_no='$mobile_number'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // User found, generate and store OTP in the database
        $otp = rand(100000, 999999); // Generate a random OTP
        $query_update_otp = "UPDATE sign_up SET otp='$otp' WHERE wh_no='$mobile_number'";
        mysqli_query($conn, $query_update_otp);

        // Redirect the user to the page where they can enter OTP
        header("Location: enter_otp.php?mob=$mobile_number");
        exit();
    } else {
        // User not found with the provided mobile number, handle accordingly
        echo "User not found. Please check your mobile number and try again.";
    }
}
?>
 
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="fancy-title title-center title-border">
                <h3> Password Retrieval </h3>
            </div>
            <br>
            <div style="background-color: #f5f5f5; width: 50%; margin: 0 auto; padding: 20px;">
    <form id="myForm" method="post">
        <div style="margin-bottom: 20px;">
            <label for="mobileNumber">Enter Registered Mobile No.</label><br>
            <input type="text" id="mobileNumber" name="mobileNumber" maxlength="10" style="width: 100%; padding: 5px;">
        </div>
        <div style="margin-bottom: 20px;">
            <input type="button" name="request_otp" value="Request OTP" onclick="sendOTP()" style="width: 48%; padding: 10px; background-color: #dc3545; color: #fff; font-size: 16px; border: none;">
            <input type="button" value="Already Have OTP" onclick="useOTP()" style="width: 48%; padding: 10px; background-color: #28a745; color: #fff; font-size: 16px; border: none;">
        </div>
        <div id="otpSection" style="display: none; margin-bottom: 20px;">
    <div class="alert alert-info">
        <strong>Note: </strong>The OTP sent on your Mobile Number is Valid for 1 day
    </div>
    <label for="otp">Enter OTP</label><br>
    <input type="text" id="otp" name="otp" maxlength="10" style="width: 100%; padding: 5px;">
    <input type="submit" name="ctl00$ContentPlaceHolder1$btnVerifyOTP" value="Verify Mobile Number"
           onclick="if (!Page_ClientValidate('otp')){ return false; } return VerifyOtp();WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions('ctl00$ContentPlaceHolder1$btnVerifyOTP', '', true, 'otp', '', false, false))"
           id="ctl00_ContentPlaceHolder1_btnVerifyOTP"
           class="btn btn-success btn-lg top-buffer" style="width: 95%; font-size: 20px;">
</div>

        <div id="newPasswordSection" style="display: none;">
            <div style="margin-bottom: 20px;">
                <label for="newPassword">Enter New Password</label><br>
                <input type="password" id="newPassword" name="newPassword" maxlength="50" style="width: 100%; padding: 5px;">
            </div>
            <div style="margin-bottom: 20px;">
                <label for="confirmPassword">Confirm New Password</label><br>
                <input type="password" id="confirmPassword" name="confirmPassword" maxlength="50" style="width: 100%; padding: 5px;">
            </div>
            <div>
                <input type="button" value="SUBMIT" onclick="submitForm()" style="width: 48%; padding: 10px; background-color: #28a745; color: #fff; font-size: 16px; border: none; margin-right: 2%;">
                <input type="button" value="CANCEL" onclick="cancelForm()" style="width: 48%; padding: 10px; background-color: #ffc107; color: #212529; font-size: 16px; border: none;">
            </div>
        </div>
    </form>
</div>

        </div>
    </div>

    
<script>
    function sendOTP() {
        // Your code to handle sending OTP
        document.getElementById("otpSection").style.display = "block";
    }

    function useOTP() {
        // Your code to handle using existing OTP
        document.getElementById("otpSection").style.display = "block";
    }

    function submitForm() {
        // Your code to handle form submission
        document.getElementById("newPasswordSection").style.display = "none";
        document.getElementById("myForm").submit(); // Submit the form
    }

    function cancelForm() {
        // Your code to handle form cancellation
        document.getElementById("newPasswordSection").style.display = "none";
    }
</script>
            <!-- #content end -->
          <?php
          include("footer.php");
          ?>