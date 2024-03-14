<?php
include("printing_service_header.php");
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
			<h3 class="center">Change Your Password
			</h3>
		</div>
	
   <div class="join_form">
    <form id="myForm" method="POST" action="login.php">
        <label for="b_name">Old Password</label>
        <input type="password" name="password" id="password" class="form-control" required>

        <label for="name">New Password</label>
        <input type="password" name="password" id="password" class="form-control" required>
        <label for="password">Confirm New Password</label>
        <input type="password" name="password" id="password" class="form-control" required>

        <input type="submit" name="submit" value="Submit" class="form-control btn btn-lg btn-success panelshadow"style="height: 50px">
        <input type="submit" name="submit" value="Cancel" class="form-control btn btn-lg btn-success panelshadow"style="height: 50px">
    </form>
   </div>
</div>
	</div>
            <?php
            include("footer.php");
            ?>