<?php
$ext = substr(__FILE__, strrpos(__FILE__, ".") + 1);
require dirname(__FILE__)."/config.$ext";
$s_dbid = FALSE;

   function symp_connect() {
         global $s_dbhost, $s_dbuser, $s_dbpass, $s_dbname,$s_dbid;
   
            $s_dbid = @mysqli_connect($s_dbhost, $s_dbuser, $s_dbpass,$s_dbname);
   
            
      }
   
       function symp_disconnect() {
         global $s_dbid;
   
            mysqli_close($s_dbid);
            $s_dbid = FALSE;
      }
   
	
	symp_connect();
?>

<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <title>Welcome || Spatto Services</title>

    <!-- Fav Icons -->
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;1,400;1,500&display=swap">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/menu.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/leaflet.css">
    <link rel="stylesheet" href="assets/css/spacing.min.css">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="assets/css/responsive.css">

    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
</head>

<body>
    <div class="page-wrapper">

        <!-- Preloader -->
        <div class="preloader"></div>

        <!--==================================================================== 
                                Start Header area
        =====================================================================-->
        <header class="main-header">

            <div class="header-top bg-orange">
                <div class="container">
                    <div class="top-inner">
                        <ul class="top-left">
                            <li><i class="fa fa-envelope"></i> <a href="mailto:info@spatto.biz">info@spatto.biz</a></li>
                            <li><i class="fas fa-map-marker-alt"></i> Dehradun, Uttarakhand - India</li>
                        </ul>

                        <div class="top-right ml-auto">
                            <div class="social-style-one">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-youtube"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Header-Upper-->
            <div class="header-upper">
                <div class="container clearfix" style="background: #fff;">

                    <div class="header-inner d-lg-flex align-items-center">

                        <div class="logo-outer d-flex align-items-center">
                            <div class="logo" style="width: 100%;"><a href="home.php"><img src="assets/images/logo-2.png" alt="" title="" style="margin-left: 30%;"></a></div>
                        </div>

                        <div class="nav-outer clearfix ml-lg-auto mr-lg-auto">
                            <!-- Main Menu -->
                            <nav class="main-menu navbar-expand-lg">
                                <div class="navbar-header clearfix">
                                    <!-- Toggle Button -->
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" style="border: 2px #fe6600 solid;background-color: #fe6600;border-radius: 8px;color: #fff;">
                                        <span class="icon-bar" style="background-color:#fff;"></span>
                                        <span class="icon-bar" style="background-color:#fff;"></span>
                                        <span class="icon-bar" style="background-color:#fff;"></span>
                                    </button>
                                </div>

                                <div class="navbar-collapse collapse clearfix">
                                    <ul class="navigation clearfix">
                                        <li><a href="home.php">Home</a></li>
                                        <li><a href="about.php">About</a></li>
                                        <li><a href="/user">Login</a></li>
                                        <li><a href="/user/signup.php">A/C Open</a></li>
                                        <li><a href="contact.php">Contact</a></li>
                                        <li><a href="news.php">New Update</a></li>
                                        <li><a href="/user/rules.php">Agreement</a></li>
                                        <li><a href="spatto-shopkeeper-agreement.pdf">Download</a></li>
                                    </ul>
                                </div>

                            </nav>
                            <!-- Main Menu End-->
                        </div>

                        <div class="menu-number">
                            <!--<i class="flaticon-people"></i> <a href="callto:+918892666688">+91 8892 6666 88</a>-->
                        </div>
                    </div>

                </div>
            </div>
            <!--End Header Upper-->
        </header>
        <!--==================================================================== 
                                End Header area
        =====================================================================-->

        <!--==================================================================== 
            Start Hero Section
        =====================================================================-->
        <style>
        .hero-inner h1 span:after {
            content: '';
            color: var(--primary-color, #fe6600);
        }
        </style>
        <section class="hero-section overlay" style="margin-top: 0px;">
            <div class="container">
                <div class="hero-inner" style="padding-top: 10px;padding-bottom: 0px;text-align: center;max-width: 100%;">
                    
                   <h1 style="margin: 0px;font-size: 100px;color: #fe6600;;"> Spatto </h1>  <h1 style="margin-top: 5px;font-size: 25px; line-height: 2;">
                     <span class="wow fadeInUp" data-wow-duration="1s"  data-wow-delay="0.5s">एक कस्टमर प्रोवाईड़र कम्पनी है।<br> जिसका हैड ऑफिस उतराखण्ड के देहरादून मे है। <br>जो 100% ट्रांसपेंरेंट ड़ील करती है।</span><br></h1>

                    <!--<a href="#about" style="padding: 10px 20px;" class="theme-btn wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s">Click Here <i class="fas fa-arrow-down" style="font-size: 20px;"></i> &nbsp; ( यहाँ दबाएँ )  </a>-->
                    <a href="#about" style="visibility: visible; animation-duration: 1s; animation-delay: 1s; animation-name: fadeInUp; padding-top: 5px; min-width: 150px; margin-top: 10px;height: 40px;" class="theme-btn wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s"> <i class="fas fa-arrow-down" style="font-size: 25px;padding: 0px;"></i> </a>
                    
                    
                    
                    
                </div>
            </div>
        </section>
        <!--==================================================================== 
            End Hero Section
        =====================================================================-->

        <!--==================================================================== 
            Start Our Success Section
        =====================================================================-->
        

<?php


$sql = "select `username` from `join_store` where username not like 'demo' order by id desc limit 1";           
$result = @mysqli_query($s_dbid,$sql);
list($user) = @mysqli_fetch_row($result);

$total_id = substr($user,2);




$sql = "select `username` from `join` order by id desc limit 1";           
$result = @mysqli_query($s_dbid,$sql);
list($user) = @mysqli_fetch_row($result);

$total_user = substr($user,2);

?>
        
        
        <div class="our-success pb-30 rpb-0 wow fadeInUp" data-wow-duration="2s" style="visibility: visible; animation-duration: 2s; animation-name: fadeInUp;margin-top: 120px;">
            <div class="container">
                <div class="success-wrap bg-orange">
                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="success-item">
                                <div class="success-icon">
                                    <i class="flaticon-badge"></i>
                                </div>
                                <div class="success-content">
                                    <span class="count-text" data-speed="2500" data-stop="<?=$total_id?>">0</span>
                                    <p>Total Vendor</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="success-item">
                                <div class="success-icon">
                                    <i class="flaticon-edit"></i>
                                </div>
                                <div class="success-content">
                                    <span class="count-text" data-speed="2500" data-stop="<?=$total_id-20?>">0</span>
                                    <p>Happy Vendor</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="success-item">
                                <div class="success-icon">
                                    <i class="flaticon-computer"></i>
                                </div>
                                <div class="success-content">
                                    <span class="count-text" data-speed="2500" data-stop="<?=$total_id-12?>">0</span>
                                    <p>Active Vendor</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="success-item">
                                <div class="success-icon">
                                    <i class="flaticon-review"></i>
                                </div>
                                <div class="success-content">
                                    <span class="count-text" data-speed="2500" data-stop="<?php echo $total_user?>">0</span>
                                    <p>Regular Customer</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--==================================================================== 
            End Our Success Section
        =====================================================================-->

        <!--==================================================================== 
            Start About Us Section
        =====================================================================-->
        <section id="about" class="about-us pb-150 rpb-100">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="about-image rmb-50">
                            <img class="wow fadeInBottomLeft" data-wow-duration="2s" src="about-new.jpg" alt="About Spatto">
                            <!--<div class="about-border"></div>-->
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-content">
                            <div class="section-title mb-25 wow fadeInUp" data-wow-duration="2s">
                                <h3 style="text-align: center;">We Will Help You get <br>Financial <span style="color:#F16614" >Freedom.</span></h3>
                                <h3 style="text-align: center;">हम आपको आर्थिक <span style="color:#F16614">स्वतंत्रता</span> <br>दिलाने में मदद करेंगे।</h3>
                            </div>
                            <ul>
                                <li  style="color: #c34224;list-style: disc;">We want to empower shopowners. Our aim is to provide financial freedom to shopowners in india and make their lives better.<br></li>
                                <li style="list-style: disc"><p class="wow fadeInUp" data-wow-duration="2s">हम अपने ग्राहकों द्वारा, दुकानों से बिक्री करवाकर बाजार की मंदी ख़तम करना चाहते हैं और दुकानदारों को सशक्त बनाना ही हमारा मकसद है </p>
                                  <hr style="border-top: 2px solid #1f9810;">
                                </li>
                                <!--<li  style="color: #c34224;list-style: disc;"><i class="wow fadeInUp" data-wow-duration="2s">Traditional, 100% for daily essentials grocery market with 100% profit for everyone. To fullfill daily needs of everyone. Same day delivery, TV Promotion and Customer Care Number will be provided for easy access. <br>-->
                                <!--    </i></li>-->
                                <!--<li style="list-style: disc"><p class="wow fadeInUp" data-wow-duration="2s">पारम्परिक ,100% जीविका के लिये, घर के सामान का प्रॉफिट बाज़ार, यहाँ, सभी को 100% प्रॉफिट होगा , जिससे परिवार की जरूरतों को पूरा कर सकते है। होम डिलीवरी सर्विस, टीवी पे विज्ञापन, और कस्टमर केयर नम्बर के साथ ।</p></i></li>-->
                            </ul>
                            

                            
                            
                            <!--<a href="about.php" class="theme-btn wow fadeInUp" data-wow-duration="2s" style=" background-color:#1f9810; visibility: visible; animation-duration: 2s; animation-name: fadeInUp;padding: 10px;min-width: 100px;">अधिक जानिए <i class="fas fa-arrow-right"></i></a>-->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--==================================================================== 
            End About Us Section
        =====================================================================-->
   
        <!--==================================================================== 
            Start Service Section
        =====================================================================-->
        <section class="services-section bg-snow pt-140 rpt-90 pb-110 rpb-60" style="padding-top: 70px;">
            <div class="container">
                <div class="row justify-content-center" style="background-color: #fe6600;margin-bottom: 70px;">
                    <div class="col-lg-7 col-md-8">
                        <div class="section-title text-center wow fadeInUp animated" data-wow-duration="2s" style="visibility: visible; animation-duration: 2s; animation-name: fadeInUp;padding: 30px 10px;">
                            <!--<h2 style="color: #177fdf;">Services We Offer.</h2>-->
                            <!--<h3 style="color: #177fdf;">(हम जो सेवाएं प्रदान करते हैं)</h3>-->
                            <!--<p><span style="color: #c34224;">Know more about the services and facilities we provide </span><br>हमारे द्वारा प्रदान की जाने वाली सेवाओं और सुविधाओं के बारे में अधिक जानें</p>-->
                            <h3 style="line-height: 1.5;color: #fff;">Our Services<br>हमारी सेवाएँ</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-lg-4 col-md-6">
                        <div class="service-item wow fadeInUp" data-wow-duration="2s">
                            <div class="service-icon d-flex">
                                <img src="progress-deal.png" alt="Services">
                                <a href="contact.php" class="ml-auto"><i class="fas fa-angle-double-right"></i></a>
                            </div>
                            <div class="service-content">
                                <h4><a href="about.php" style="color: #177fdf;">Progress Deal</a></h4>
                                <ul>
                                  <li  style="list-style: disc;color: #c34224;">Spatto will provide more customers to increase sales</li>
                                  <li style="list-style: disc;">Spatto आपके के बिज़नेस लिये ग्राहक भेजकर, बिज़नेस की सेल और आपकी इन्कम बढाने का काम करती है।।<br><br></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6">
                        <div class="service-item wow fadeInUp" data-wow-duration="2s">
                            <div class="service-icon d-flex">
                                <img src="comfort-deal.png" alt="Services">
                                <a href="contact.php" class="ml-auto"><i class="fas fa-angle-double-right"></i></a>
                            </div>
                            <div class="service-content">
                                <h4><a href="about.php" style="color: #177fdf;">Comfort Deal</a></h4>
                                <ul>
                                  <li  style="list-style: disc;color: #c34224;">You will manage your Shop/Business as you were doing with no conditions </li>
                                  <li style="list-style: disc;">आप अपने बिज़नेस को पहले की तरह ही, सब कुछ खुद से ही मैनेज करोगे, बिना किसी कंडीशन के।<br><br></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6">
                        <div class="service-item wow fadeInUp" data-wow-duration="2s">
                            <div class="service-icon d-flex">
                                <img src="assets/images/services/icon6.png" alt="Services">
                                <a href="business-listing.php" class="ml-auto"><i class="fas fa-angle-double-right"></i></a>
                            </div>
                            <div class="service-content">
                                <h4><a href="about.php" style="color: #177fdf;">Grow Your Business</a></h4>
                                <ul>
                                  <li  style="list-style: disc;color: #c34224;">Promote your own busines with Spatto </li>
                                  <li style="list-style: disc;">Spatto के माध्यम से आपका Business <br> बहुत अच्छे लेवल पर मुफ्त मे प्रमोट होता है ।<br><br></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                
                    
                    <div class="separetor wow fadeInUp" data-wow-duration="2s"></div>
                    
                    <div class="col-lg-4 col-md-6">
                        <div class="service-item wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.3s">
                            <div class="service-icon d-flex">
                                <img src="assets/images/services/spatto-delivery-van.png" alt="Services" style="height: 60px;">
                                <a href="about.php" class="ml-auto"><i class="fas fa-angle-double-right"></i></a>
                            </div>
                            <div class="service-content">
                                <h4><a href="about.php" style="color: #177fdf;">Delivery Option</a></h4>
                                <ul>
                                  <li style="list-style: disc;color: #c34224;">Customers will be provided Home Delivery from Spatto</li>
                                  <li style="list-style: disc;">हमारे द्वारा, आपके स्टोर से, बेचा हुआ सामान, <br>Spatto डिलीवरी पहुंचाने का काम भी करेंगी ।<br></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6">
                        <div class="service-item wow fadeInUp" data-wow-duration="2s">
                            <div class="service-icon d-flex">
                                <img src="assets/images/services/growth-icon.png" alt="Services">
                                <a href="contact.php" class="ml-auto"><i class="fas fa-angle-double-right"></i></a>
                            </div>
                            <div class="service-content">
                                <h4><a href="about.php" style="color: #177fdf;">Business Growth</a></h4>
                                <ul>
                                  <li  style="list-style: disc;color: #c34224;">Refer any Daily Essential Shop/Business to Spatto </li>
                                  <li style="list-style: disc;">रोजाना की जरुरत वाले, <br>व्यवसाय को growth करवाने के लिये <br>Spatto से Tie-up करवायें ।</li> 
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6">
                        <div class="service-item wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.3s">
                            <div class="service-icon d-flex">
                                <img src="assets/images/services/insurance-icon.png" alt="Services">
                                <a href="about.php" class="ml-auto"><i class="fas fa-angle-double-right"></i></a>
                            </div>
                            <div class="service-content">
                                <h4><a href="about.php" style="color: #177fdf;">Insurance Advisor</a></h4>
                                <ul>
                                  <li style="list-style: disc;color: #c34224;">Soon we will provide Insurance Facility to Shopkeepers. </li>
                                  <li style="list-style: disc;">हम अपने, सभी दुकानदारों को उनकी दुकान के लिये बीमा कम्पनी से, बीमे की सेवा प्रदान कर रहे हैं ।<br><br></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <div class="separetor wow fadeInUp" data-wow-duration="2s"></div>
                    
                    <div class="col-lg-4 col-md-6">
                        <div class="service-item wow fadeInUp" data-wow-duration="2s" style="visibility: visible; animation-duration: 2s; animation-name: fadeInUp;padding-bottom: 80px;">
                            <div class="service-icon d-flex">
                                <img src="assets/images/services/jobs.png" alt="Services">
                                <a href="career.php" class="ml-auto"><i class="fas fa-angle-double-right"></i></a>
                            </div>
                            <div class="service-content">
                                <h4><a href="about.php" style="color: #177fdf;">Apply for job</a></h4>
                                <ul>
                                  <li  style="list-style: disc;color: #c34224;">For Jobs in your Local Area</li>
                                  <li style="list-style: disc;">अपने क्षेत्र मे, Spatto से, नौकरी दिलवाने के लिये,  वायोड़ाटा हमें भिजवायें - <a href="mailto:Spattoask@gmail.com"  style="color: #177fdf;">Spattoask@gmail.com</a></li>
                                  
                                </ul>
                            </div>
                        </div>
                        <form method="post" action="spatto-shopkeeper-agreement.pdf"><button class="theme-btn" type="submit" style="background-color:#1f9810; padding: 7px 0px 7px 0px;min-width: 150px;margin-top: 10px;margin-left: 15px;">Next</button></form>
                    </div>
                    
                    
                    
                </div>
                
                
            </div>
        </section>
        <!--==================================================================== 
            End Service Section
        =====================================================================-->
   
        
   
      
   
   
        <!--==================================================================== 
            Start Call Back Section
        =====================================================================-->
        <!-- <section class="call-back-section text-white py-150 rpt-90 rpb-100">
            <div class="call-back-shap"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="section-title wow fadeInUp"  data-wow-duration="2s">
                            <h2>Request A Call Back.</h2>
                            <p>कृपया हमें अपने बारे में जानकारी प्रदान करें, ताकि हम आपको वापस कॉल कर सकें</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <form id="call-back-form" class="call-back-form" name="call-back-form" action="#" method="post">
                            <div class="row clearfix">
                                <div class="col-md-6">        
                                    <div class="form-group">
                                        <input type="text" name="full-name" class="form-control" value="" placeholder="Full Name" required="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" name="email-address" class="form-control" value="" placeholder="Email Here" required="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="phone-number" class="form-control" value="" placeholder="Phone No.">
                                    </div>
                                </div>
                                <div class="col-md-6">        
                                    <div class="form-group">
                                        <input type="text" name="subject" class="form-control" value="" placeholder="Subject" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-10">        
                                    <div class="form-group">
                                        <input type="text" name="short-text" class="form-control" value="" placeholder="Short Text">
                                    </div>
                                </div>                                               
                            </div>
                            <div class="form-group call-submit text-center">
                                <button class="theme-btn" type="submit">Submit Now <i class="fas fa-arrow-right"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section> -->

        <section class="cta-section bg-orange pt-130 rpt-80 pb-135 rpb-100">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <div class="cta-text wow fadeInUp rmb-25" data-wow-duration="2s">
                            <h3>क्या आप सर्वश्रेष्ठ उपभोक्ता <br>सेवा कंपनी के साथ <br>काम करना चाहते हैं?</h3>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="cta-btn wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.3s">
                            <a href="user/rules.php" style="min-width: 150px;padding: 7px 47px 7px 45px; min-width: 150px; margin-top: 10px;margin-left: 10px;" class="theme-btn">संपर्क करें </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--==================================================================== 
            End Call Back Section
        =====================================================================-->
   
        
        <!--==================================================================== 
                                Start Footer Section
        =====================================================================-->
        <footer class="footer-section bg-black pt-10 rpt-50">
            
            
            <!-- Copyright Area-->
            <div class="copyright-area rmt-45">
               <div class="container">
                    <div class="copyright-inner align-items-center">
                        <div class="copyright-wrap order-2 order-md-1">
                            <p>Copyright © Spatto <span>2021</span> | All Rights Reserved. CIN No. : <font style="color:#fe6600">U74999UR2021PTC013067</font></p>
                            <!-- Scroll Top Button -->
                            <button class="scroll-top scroll-to-target wow fadeInUp" data-wow-duration="2s" data-target="html"><i class="fas fa-angle-double-up"></i></button>
                            <!-- footer menu -->
                        </div>
                        <ul class="footer-menu order-1 order-md-2">
                            <li><a href="career.php">Jobs</a></li>
                            <li><a href="#">Support</a></li>
                            <li><a href="#">FAQ</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <!--==================================================================== 
                                End Footer Section
        =====================================================================-->
    </div>
    <!--End pagewrapper-->
    
    <!-- jequery plugins -->
    <script src="assets/js/jquery-3.5.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/leaflet.min.js"></script>
    <script src="assets/js/appear.js"></script>
    <!-- Custom script -->
    <script src="assets/js/script.js"></script>
</body>
</html>