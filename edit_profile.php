<?php
include("printing_service_header.php");
include("admin/db_connect.php");
?>

<style>
    .join_form {
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form-control {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .note {
        font-size: 12px;
        color: #666;
    }

    /* Responsive styles */
    @media (max-width: 600px) {
        .container {
            padding: 10px;
        }
    }
</style>

<div class="content-wrap">
    <div class="container clearfix">
        <div class="fancy-title title-center title-border">
            <h3 class="center">MODIFY YOUR INFORMATION</h3>
        </div>

        <div class="join_form">
            <form id="myForm" method="POST" action="login.php">
                <table>
                <tr>
    <td>
        <label for="b_name">Business Name</label>
    </td>
    <td>
        <?php if(isset($_SESSION['business'])): ?>
            <input type="text" name="b_name" id="old_name" class="form-control" value="<?php echo $_SESSION['business'];?>">
        <?php endif; ?>
    </td>
</tr>

                    <tr>
                        <td>
                            <label for="name">Registered Mobile No.</label>
                        </td>
                        <td>
                        <?php if(isset($_SESSION['mobile'])): ?>
                            <input type="number" name="new_password" id="new_password" class="form-control"value="<?php echo $_SESSION['mobile'];?>">
                        <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="password">Country</label>
                        </td>
                        <td>
                            <?php if(isset($_SESSION['country_name'])):?>
                            <input type="text" name="confirm_password" id="confirm_password" class="form-control" value="<?php echo $_SESSION['country_name'];?>">
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="password">State</label>
                        </td>
                        <td>
                        <?php if(isset($_SESSION['state_name'])):?>
                            <input type="text" name="confirm_password" id="confirm_password" class="form-control" value="<?php echo $_SESSION['state_name'];?>">
                      <?php endif;?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="password">City</label>
                        </td>
                        <td>
                        <?php if(isset($_SESSION['city_name'])):?>
                            <input type="text" name="confirm_password" id="confirm_password" class="form-control" value="<?php echo $_SESSION['city_name']; ?>">
                            <?php endif;?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="password">GST Number</label>
                        </td>
                        <td>
                        <?php if(isset($_SESSION['gst_num'])):?>
                            <input type="text" name="confirm_password" id="confirm_password" class="form-control" value="<?php echo $_SESSION['gst_num']?>">
                            <?php endif;?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="password">Contact Person</label>
                        </td>
                        <td>
                        <?php if(isset($_SESSION['member_name'])):?>
                            <input type="text" name="confirm_password" id="confirm_password" class="form-control" value="<?php echo $_SESSION['member_name']?>">
                            <?php endif;?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="password">E-mail</label>
                        </td>
                        <td>
                        <?php if(isset($_SESSION['email_id'])):?>
                            <input type="email" name="confirm_password" id="confirm_password" class="form-control" value="<?php echo $_SESSION['email_id']; ?>">
                            <?php endif;?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="password">Pin Code</label>
                        </td>
                        <td>
                        <?php if(isset($_SESSION['pincode_no'])):?>
                            <input type="number" name="confirm_password" id="confirm_password" class="form-control" value="<?php echo $_SESSION['pincode_no']; ?>">
                            <?php endif;?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="password">Address</label>
                        </td>
                        <td>
                        <?php if(isset($_SESSION['address_name'])):?>
                            <input type="text" name="confirm_password" id="confirm_password" class="form-control" value="<?php echo $_SESSION['address_name']; ?>">
                            <?php endif;?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Save Changes" class="form-control btn btn-lg btn-success panelshadow" style="height: 50px;">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>

<?php
include("footer.php");
?>