<?php
include("printing_service_header.php");
?>
<div class="content-wrap">
    <div class="container clearfix">
        <div class="fancy-title title-center title-border">
            <h3 class="center">SELECT DISPATCH OPTION</h3>
        </div>
        
        <div class="join_form">
            <form id="myForm" method="POST" action="login.php">
                <label>
                    <input type="radio" name="dispatch_option" value="dispatch_immediately"> Dispatch Immediately
                </label>
                <p>On selecting this option your parcel shall be dispatched immediately after production.</p>

                <label>
                    <input type="radio" name="dispatch_option" value="online_request"> Only After Online Request
                </label>
                <p>On selecting this option your parcel will be dispatched only after Online Dispatch Request from your side.</p>

                <label>
                    <input type="radio" name="dispatch_option" value="selected_weekdays"> Only on Selected Weekdays
                </label>
                <p>On selecting this option your order shall be dispatched on selected weekdays.</p>
              
                    <input type="checkbox" name="" value=""> Mon
                    <input type="checkbox" name="" value=""> Tue
                    <input type="checkbox" name="" value=""> Wed
                    <input type="checkbox" name="" value=""> Thu
                    <input type="checkbox" name="" value=""> Fri
                    <input type="checkbox" name="" value=""> Sat
               
                <input type="submit" name="submit" value="Save Changes" class="form-control btn btn-lg btn-success panelshadow" style="height: 50px">
            </form>
        </div>
    </div>
</div>


<?php
include("footer.php");
?>