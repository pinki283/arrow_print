<?php
session_start();
include("admin/db_connect.php");
// echo $_SESSION['mobile'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<script type="text/javascript">
(function(w,d,s,r,k,h,m){
	if(w.performance && w.performance.timing && w.performance.navigation) {
		w[r] = w[r] || function(){(w[r].q = w[r].q || []).push(arguments)};
		h=d.createElement('script');h.async=true;h.setAttribute('src',s+k);
		d.getElementsByTagName('head')[0].appendChild(h);
		(m = window.onerror),(window.onerror = function (b, c, d, f, g) {
		m && m(b, c, d, f, g),g || (g = new Error(b)),(w[r].q = w[r].q || []).push(["captureException",g]);})
	}
})(window,document,'//static.site24x7rum.in/beacon/site24x7rum-min.js?appKey=','s247r','b3bbc2c2483ae68dc1870622d1af43b5');
</script>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"><meta name="author" content="Arrow Print Club">

    <script type="text/javascript" src="ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
        document.onkeydown = function (e) {
            if (event.keyCode == 123) {
                return false;
            }
            if (e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
                return false;
            }
            if (e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
                return false;
            }
            if (e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
                return false;
            }
            if (e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
                return false;
            }
        }
    </script>
    <script type="text/javascript">
        $(window).on('beforeunload', function () {
            $("#blockMessage").css("top", Math.max(0, (($(window).height() - $(this).outerHeight()) / 2) + $(window).scrollTop()) + "px");
            $("#blockMessage").css("left", Math.max(0, (($(window).width() - $(this).outerWidth()) / 2) + $(window).scrollLeft()) + "px");
            $("#blockMessage").show();
        });

        function SetLoadingMessage(val) {
            $("#blockMessage").css("top", Math.max(0, (($(window).height() - $(this).outerHeight()) / 2) + $(window).scrollTop()) + "px");
            $("#blockMessage").css("left", Math.max(0, (($(window).width() - $(this).outerWidth()) / 2) + $(window).scrollLeft()) + "px");
            if (val == true)
                $("#blockMessage").show();
            else
                $("#blockMessage").hide();
        }
    </script>
    <!-- Stylesheets
    ============================================= -->
    <link rel="icon" type="image/png" href="f_Icon.ico"><link href="css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&amp;display=swap" rel="stylesheet" type="text/css"><link rel="stylesheet" href="can_css/bootstrap.css" type="text/css"><link rel="stylesheet" href="can_css/style.css" type="text/css"><link rel="stylesheet" href="can_css/swiper.css" type="text/css"><link rel="stylesheet" href="can_css/dark.css" type="text/css"><link rel="stylesheet" href="can_css/font-icons.css" type="text/css"><link rel="stylesheet" href="can_css/animate.css" type="text/css"><link rel="stylesheet" href="can_css/magnific-popup.css" type="text/css"><link rel="stylesheet" href="can_css/custom.css" type="text/css"><meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Document Title
    ============================================= -->
    <title>
	Arrow Print Club - Visiting Card Manufacturer | Business Card 
</title>
    <style type="text/css">
        .loading-message {
            border: 16px solid #f3f3f3; /* Light grey */
            border-top: 16px solid #00FFFF; /* CYAN */
            border-right: 16px solid #FF00FF; /* Megenta */
            border-bottom: 16px solid #FFFF33; /* Yellow */
            border-left: 16px solid #000000; /* Yellow */
            border-radius: 50%;
            width: 120px;
            height: 120px;
            margin: 0px auto;
            margin-top: 100px;
            animation: spin 2s linear infinite;
        }

        .block-ui-style {
            height: 100%;
            min-height: 100%;
            display: none;
            z-index: 6;
            position: absolute;
            border: none;
            background-color: #5e0000;
            width: 100%;
            opacity: 0.6;
        }

        .dark-link {
            color: white;
            font-size: 11px;
        }

            .dark-link:hover {
                color: yellow;
            }
    </style>
    <script type="text/javascript">
        function getQueryStringValue(key) {
            return decodeURIComponent(window.location.search.replace(new RegExp("^(?:.*[&\\?]" + encodeURIComponent(key).replace(/[\.\+\*]/g, "\\$&") + "(?:\\=([^&]*))?)?.*$", "i"), "$1"));
        }
    </script>
    
    <meta name="title" content="Arrow Print Club - Visiting Card Manufacturer | Business Card ">
    <meta name="description" content="we are a firm serving only printers and advertisers Pan India with printing services">
    <meta name="keywords" content="visiting cards, atm pouch, for printers and advertisers">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="English">

    <style type="text/css">
        .slider-caption h2{
            font-size:55px !important;
        }
        .slider-caption h4 {
        margin-top:10px;
        }

        .item-min-height {
            min-height: 320px !important;
        }

        .fbox-content h3 {
            margin-bottom: 10px;
        }

        .fbox-content p {
            font-size: 14px;
        }

        .service-item {
            cursor: pointer;
            text-align: center;
            border: solid 1px #cccccc;
            min-height: 300px;
            border-radius: 5px;
            padding: 10px;
            margin: 10px;
        }

            .service-item:hover, .service-item:hover h3, .service-item:hover p {
                background-color: #2957A4;
                color: white;
            }
    </style>
    <style type="text/css">
        .splPosition {
            margin-top: 400px;
        }

        @media screen and (max-width: 600px) {
            .splPosition {
                margin-top: 200px;
            }

            .slider-caption h2 {
                font-size: 25px !important;
            }
            .slider-caption h3 {
                font-size: 15px !important;
            }
            .slider-caption h4 {
                font-size: 12px !important;
                margin-bottom: 10px;
            }
        }
    </style>
<link href="App_Themes/can_New/select2.min.css" type="text/css" rel="stylesheet"><link href="App_Themes/can_New/StyleSheet.css" type="text/css" rel="stylesheet"><link href="App_Themes/can_New/templateItem.css" type="text/css" rel="stylesheet"></head>
<body class="stretched">
    <script type="text/javascript">
        SetLoadingMessage(true);
    </script>
    <form method="post" action="" id="aspnetForm">
<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="/wEPDwUJMzI3MzEzMjQ0D2QWAmYPZBYCAgMPZBYCAgMPDxYCHgdWaXNpYmxlaGRkZF539a/0KfYvftS6bMjorJ07uf8r">


<script src="ScriptResource.axd?d=pwauGQ8nzcLEtnhkoV_HBeP5UmfOqAP5Xpck21uCEcayBrbYYqmw9ZphflWk8pTc4sB95vs4MurPgaPz5iucmSlhv_izUijXquj0M2-uh4U8X6ojO3BZeI9HYzjuC76-wbUkCppEcWXbAWrceoCSLumeCKMAuTIRIfT03z2TDmxS1s_g0&amp;t=96346c8" type="text/javascript"></script>
<input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="CA0B0334">
        
        <div class="container-fluid">
            <div id="blockMessage" class="block-ui-style">
                <div class="loading-message"></div>
            </div>
        </div>

        <!-- Document Wrapper
    ============================================= -->
        <div id="wrapper" class="clearfix">
            <!-- Header
        ============================================= -->
            <header id="header" class="full-header transparent-header" data-sticky-class="not-dark">
                <div id="header-wrap">
                    <div class="container">
                        <div class="header-row">
                            <!-- Logo
                        ============================================= -->
                            <div id="logo" style="border: none">
                                <a href="default.php" class="standard-logo" data-dark-logo="can_images/new_logo.png">
                                    <img src="can_images/new_logo.png" alt="Arrow Print Club"></a>
                                <a href="default.php" class="retina-logo" data-dark-logo="can_images/new_logo.png">
                                    <img src="can_images/new_logo.png" alt="Arrow Print Club"></a>
                                <!--Arrow Print Club-->
                            </div>
                            <!-- #logo end -->

                            <div class="header-misc" style="margin-left:5px;">

                                <?php if(isset($_SESSION['mobile'])){ ?>

                                    <div class="dropdown mx-3 mr-lg-0">
								    <a href="logout.php" id="ctl00_lnkLogin" class="btn btn-secondary btn-sm" aria-haspopup="false" aria-expanded="true">Logout</a>
								
                                    </div>
                                <?php }else{ ?>
                                <div class="dropdown mx-3 mr-lg-0">
								    <a href="login.php" id="ctl00_lnkLogin" class="btn btn-secondary btn-sm" aria-haspopup="false" aria-expanded="true">Login</a>
								
							    </div>

                                <?php } ?>
                            </div>

                            <div id="primary-menu-trigger">
                                <svg class="svg-trigger" viewbox="0 0 100 100">
                                    <path d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"></path><path d="m 30,50 h 40"></path><path d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"></path></svg>
                            </div>

                            <!-- Primary Navigation
                        ============================================= -->
                            <nav class="primary-menu">

                                <ul class="menu-container">
                                    <li class="menu-item">
                                        <a class="menu-link" href="index.php">
                                            <div>Home</div>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a class="menu-link" href="about.php">
                                            <div>About Us</div>
                                        </a>
                                       
                                    </li>
                                    <li class="menu-item">
                                        <a class="menu-link" href="services.php#section-services">
                                            <div>Our Services</div>
                                        </a>
                                    </li>

                                    <?php if(!isset($_SESSION['mobile'])){ ?>
                                    <li id="ctl00_lnkBecomePartner" class="menu-item mega-menu">
                                        <a class="menu-link" href="join.php">
                                            <div>Join Us</div>
                                        </a>
                                    </li>
                                    <?php } ?>
                                    <li class="menu-item">
                                        <a class="menu-link" href="contact.php">
                                            <div>Contact</div>
                                        </a>
                                    </li>
                                </ul>

                            </nav>
                        </div>
                    </div>
                </div>
                <div class="header-wrap-clone"></div>
            </header>
            <!-- #header end -->