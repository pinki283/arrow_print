<?php
include("header.php");
?>
            <div id="ctl00_alertMessage1_divMessage" class="style-msg errormsg" style="font-size: 20px; text-align: center; z-index: 5; position: fixed; width: 100%;">
    <div class="sb-msg">
        <strong>
            Error!</strong>
        Please login to View Advertisements Posted in your Account
    </div>
    <a href="#" id="btnAlertClose" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    
    
</div>
<script type="text/javascript">
    var noAutoClose = getQueryStringValue("noautoclose");
    if (noAutoClose == "")
        window.setTimeout(function () { $("#btnAlertClose").click(); }, 5000);
</script>

            
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
                                <button type="button" class="btn btn-outline-light mt-2" onclick="location.href='AddFranchise.aspx'">CLICK HERE</button>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div id="ctl00_ContentPlaceHolder1_divLoginBack" style="background-color:#2957A4;border-radius:5px;color:white;padding:10px;">
	
                                    <h4 style="color:orange;margin-bottom:17px;" class="horizontal-align-center">Already have an Account</h4>
                                    <span id="ctl00_ContentPlaceHolder1_lbMessage" style="display:none"></span>
                                        <table border="0" style="width: 100%;margin-bottom:10px; color: white;margin-top:-5px">
                                        <tr>
                                            <td>
                                                <span>Mobile Number</span>
                                                <input name="ctl00$ContentPlaceHolder1$txtUserName" type="text" id="ctl00_ContentPlaceHolder1_txtUserName" class="form-control">
                                                
                                            </td>
                                        </tr><tr><td></td></tr>
                                        <tr>
                                            <td>
                                                <span>Password</span><a href="ForgotPassword.aspx.html" tabindex="-1" style="float:right" class="dark-link">Forgot Password</a>
                                                <input name="ctl00$ContentPlaceHolder1$txtPassword" type="password" id="ctl00_ContentPlaceHolder1_txtPassword" class="form-control">
                                                
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <br>
                                                
                                                <div style="text-align: center;">
                                                    <input type="submit" name="ctl00$ContentPlaceHolder1$btnLogin" value="Login" onclick="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$ContentPlaceHolder1$btnLogin&quot;, &quot;&quot;, true, &quot;adm&quot;, &quot;&quot;, false, false))" id="ctl00_ContentPlaceHolder1_btnLogin" class="btn btn-warning mb-2" style="width: 100%;background-color:orange;color:white;text-transform:uppercase;font-size:20px">
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                    <script type="text/javascript">
                                        $("#ctl00_ContentPlaceHolder1_txtUserName").focus();
                                    </script>
                        
</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

            <!-- #content end -->
           <?php
           include("footer.php");
           ?>