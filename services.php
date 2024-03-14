<?php
include("header.php");
?>

<?php

if(isset($_SESSION['mobile'])) {
    
    echo "Session mobile number: " . $_SESSION['mobile'];
} else {
    
    echo "Session mobile number is not set.";
}

?>
      
            
    <!-- Page Title
		============================================= -->

    <section id="page-title">

			<div class="container clearfix">
				<h1>Services</h1>
				<span>Wide Range Of Printing Services</span>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
					<li class="breadcrumb-item active" aria-current="page">Services</li>
				</ol>
			</div>

		</section>

    <!-- #page-title end -->

    <!-- Page Sub Menu
		============================================= -->
    <!-- Content
		============================================= -->
    <section id="content">
    <div class="container clearfix" id="section-services"><br><br>
                    <div class="heading-block center" style="margin-top: 10px;">
                    <h2>Our Services</h2>
                </div>
                
                <div class="row justify-content-center col-mb-50 mb-0">
                    <div class="col-md-6 col-lg-4">
                        <div class="feature-box fbox-plain service-item item-min-height" onclick="location.href='services.php'">
                            <div class="fbox-content">
                                <h3>Printing Exhibition<br><small style="font-size:8px;font-weight:bold">Arrow Print Club</small></h3>
                                
                                <div class="fbox-icon" data-animate="bounceIn" data-delay="200" style="margin:0px auto;width:150px;height:125px">
                            
                                    <img src="can_images/services/service.png" title="Wide range of excellent printing services at low cost with committed turnout time. Like visting cards, pamphlets, posters, stationery etc..." alt="Responsive Layout">
                            </div>
                                <p>District Level & National Level Exhibition on Printing Services & Printing Machinery</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
    <?php if(isset($_SESSION['mobile'])){ ?>
        <div class="feature-box fbox-plain service-item item-min-height" onclick="redirectToPrintingService()">
            <div class="fbox-content">
                <h3>Printing Services</h3>
                <div class="fbox-icon" data-animate="bounceIn" data-delay="200" style="margin:0px auto;width:150px;height:125px">
                    <img src="can_images/services/service (2).png" title="Wide range of excellent printing services at low cost with committed turnout time. Like visiting cards, pamphlets, posters, stationery etc..." alt="Responsive Layout">
                </div>
                <p>Wide range of excellent printing services at low cost with committed turnout time. Like visiting cards, pamphlets, posters, stationery, etc...</p>
            </div>
        </div>
    <?php } else { ?>
        <div class="feature-box fbox-plain service-item item-min-height" onclick="location.href='services.php'">
            <div class="fbox-content">
                <h3>Printing Services</h3>
                <div class="fbox-icon" data-animate="bounceIn" data-delay="200" style="margin:0px auto;width:150px;height:125px">
                    <img src="can_images/services/service (2).png" title="Wide range of excellent printing services at low cost with committed turnout time. Like visiting cards, pamphlets, posters, stationery, etc..." alt="Responsive Layout">
                </div>
                <p>Wide range of excellent printing services at low cost with committed turnout time. Like visiting cards, pamphlets, posters, stationery, etc...</p>
            </div>
        </div>
    <?php } ?>
</div>

<script>
    function redirectToPrintingService() {
        // Check if the mobile number session is set
        <?php if(isset($_SESSION['mobile'])){ ?>
            // Redirect to the printing_service.php page
            location.href = 'printing_service.php';
        <?php } ?>
    }
</script>


                    <div class="col-md-6 col-lg-4">
                        <div class="feature-box fbox-plain service-item item-min-height" onclick="location.href='free_design_files.php'">
                            <div class="fbox-content">
                                <h3>Free Design Files</h3>
                                <div class="fbox-icon" data-animate="bounceIn" data-delay="400" style="margin:0px auto;width:150px;height:125px">
                               
                                    <img src="can_images/services/service (3).png" title="Free to use design resources for Printing & advertising agencies." alt="Free downloads">
                            </div>
                                <p>Free Design & Graphic Resources for Printers & Advertising Agencies.</p>
                            </div>
                            
                        </div>
                    </div>
                </div>
             
    <br>
                <h2 class="center text-uppercase">Wide range of Printing Services</h2>
                        <div class="container clearfix">
                            <div class="row col-mb-50">

                                <div class="col-sm-6 col-lg-4">
                                    <div class="feature-box fbox-rounded fbox-effect">
                                    <div class="fbox-icon">
    <a href="javascript:void(0);"><i class="icon-arrow-right"></i></a>
</div>

                                        <div class="fbox-content">
                                            <h3>Die Cut Business Cards</h3>
                                            <p>We are specialists in “Die Cut” visiting card printing, which makes us India’s No. 1 Die Cut Card Manufacturer.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-lg-4">
                                    <div class="feature-box fbox-rounded fbox-effect">
                                    <div class="fbox-icon">
    <a href="javascript:void(0);"><i class="icon-arrow-right"></i></a>
</div>

                                        <div class="fbox-content">
                                            <h3>Premium Business Cards</h3>
                                            <p>We manufacture various range of premium cards like Velvet Card, PVC card, Matt Card, Gloss Card, Embossed Card etc.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-lg-4">
                                    <div class="feature-box fbox-rounded fbox-effect">
                                    <div class="fbox-icon">
    <a href="javascript:void(0);"><i class="icon-arrow-right"></i></a>
</div>

                                        <div class="fbox-content">
                                            <h3>Leaflets & Posters</h3>
                                            <p>We deliver premium quality pamphlet/poster, printed by Komori Machine on premium quality paper.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-lg-4">
                                    <div class="feature-box fbox-rounded fbox-effect">
                                    <div class="fbox-icon">
    <a href="javascript:void(0);"><i class="icon-arrow-right"></i></a>
</div>

                                        <div class="fbox-content">
                                            <h3>Stickers</h3>
                                            <p>Wide range of stickers are available with half cut and lamination options.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-lg-4">
                                    <div class="feature-box fbox-rounded fbox-effect">
                                    <div class="fbox-icon">
    <a href="javascript:void(0);"><i class="icon-arrow-right"></i></a>
</div>

                                        <div class="fbox-content">
                                            <h3>ATM Pouches</h3>
                                            <p>The atm pouch is the best alternate of Visiting Card, Printers can order atm pouches in very minimum quantity of 1000.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-lg-4">
                                    <div class="feature-box fbox-rounded fbox-effect">
                                    <div class="fbox-icon">
    <a href="javascript:void(0);"><i class="icon-arrow-right"></i></a>
</div>

                                        <div class="fbox-content">
                                            <h3>Garment Tags</h3>
                                            <p>Minimum Order quantity as low as 2000 tags only. Various size and quality options are available with premium and fast printing in minimal costs.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                    <div class="feature-box fbox-rounded fbox-effect">
                                    <div class="fbox-icon">
    <a href="javascript:void(0);"><i class="icon-arrow-right"></i></a>
</div>

                                        <div class="fbox-content">
                                            <h3>Doctor Files</h3>
                                            <p>Files used by Hospitals, Clinics and Doctors with various quality options are available.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                    <div class="feature-box fbox-rounded fbox-effect">
                                    <div class="fbox-icon">
    <a href="javascript:void(0);"><i class="icon-arrow-right"></i></a>
</div>

                                        <div class="fbox-content">
                                            <h3>Shooting Targets</h3>
                                            <p>We print 'Shooting Targets' according to ISSF norms. Also, we deliver quality printing on a grade paper.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                    <div class="feature-box fbox-rounded fbox-effect">
                                    <div class="fbox-icon">
    <a href="javascript:void(0);"><i class="icon-arrow-right"></i></a>
</div>

                                        <div class="fbox-content">
                                            <h3>Digital Paper Printing</h3>
                                            <p>We deliver high end printing quality by latest “Xerox 3100 Digital Press”.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                    <div class="feature-box fbox-rounded fbox-effect">
                                    <div class="fbox-icon">
    <a href="javascript:void(0);"><i class="icon-arrow-right"></i></a>
</div>

                                        <div class="fbox-content">
                                            <h3>Letter Head & Envelopes</h3>
                                            <p>We use a grade super fine paper for letter head and envelopes. And provide superior printing quality by Komori Lithrone.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                    <div class="feature-box fbox-rounded fbox-effect">
                                    <div class="fbox-icon">
    <a href="javascript:void(0);"><i class="icon-arrow-right"></i></a>
</div>

                                        <div class="fbox-content">
                                            <h3>Multicolored Invoice Book</h3>
                                            <p>We reduce printing cost by club printing and offer premium quality invoice book in low cost.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                    <div class="feature-box fbox-rounded fbox-effect">
                                    <div class="fbox-icon">
    <a href="javascript:void(0);"><i class="icon-arrow-right"></i></a>
</div>

                                        <div class="fbox-content">
                                            <h3>Printed Pen</h3>
                                            <p>Wide range of printed pens starting from Rs.10 to Rs. 500 per piece. Both Laser Printing and Screen Printing options available</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <br>
<br>
                </div>
	</section>
    <!-- #content end -->

            <!-- #content end -->
        <?php
        include("footer.php");
        ?>