<?php
include('include/config.php');
$val=mysqli_query($con,"select * from settings where id = 1");
while ($row_val=mysqli_fetch_array($val)) {
	$name = $row_val['HealthCenter'];
	$no = $row_val['ContactNo'];
	$email = $row_val['EmailAdd'];
	$hour = $row_val['OpeningHour'];
	$doctor = $row_val['Doctor'];
	$about = $row_val['About'];
	$map = $row_val['Map'];
}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title><?php echo $name;?></title>
		<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<link rel="icon" type="image/x-icon" href="images/logo.png">
		<link href='http://fonts.googleapis.com/css?family=Ropa+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/responsiveslides.css">
		<link rel="stylesheet" href="css/tooplate-style.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		 <link rel="stylesheet" href="css/font-awesome.min.css">
		 <link rel="stylesheet" href="css/animate.css">
		 <link rel="stylesheet" href="css/owl.carousel.css">
		 <link rel="stylesheet" href="css/owl.theme.default.min.css">
	 
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="js/responsiveslides.min.js"></script>
		  <script>
		    // You can also use "$(window).load(function() {"
			    $(function () {
			
			      // Slideshow 1
			      $("#slider1").responsiveSlides({
			        maxwidth: 1600,
			        speed: 600
			      });
			});
		  </script>
		  
		  <style>
		  header span i {
			color: #3391E7;
			margin-right: 5px;
		  }
		  
		  .navbar-default .navbar-nav>li>a {
				color: #fff;
			}
			
		.col-sm-6 {
			width: 49%;
		}
		
		.col-sm-4 {
			width: 32.2%;
		}
		
		.section-btn {
			background-color: #3391E7;
			color: #fff;
			padding: 20px;
		}
		
		.btn-default {
			border-color: #3391E7;
		}
		
		.slider .item-first {
			background-image: url(images/slider1.jpg);
		  }

		  .slider .item-second {
			background-image: url(images/slider2.jpg);
		  }

		  .slider .item-third {
			background-image: url(images/slider3.jpg);
		  }
			
		.angle-up-btn a:hover {
			background-color: #3391E7;
		}
		
		h1, h2, h3, h4, h5, h6 {
			font-weight: 600;
			line-height: inherit;
		}
		
		a {
		color: #000;
		}
		
		.social-icon li a:hover {
			background: #3391E7;
			color: #ffffff;
		}
		  </style>
	
	</head>
	<body>
		<!--start-wrap-->
		
		<!-- HEADER -->
     <header>
          <div class="container">
               <div class="row">

                    <div class="col-md-4 col-sm-5">
                         <a href="index.php" class="navbar-brand" style="padding-left:0px;"><i class="fa fa-h-square" style="color:#3391E7"></i>ealth Center</a>
                    </div>
                         
                    <div class="col-md-8 col-sm-7 text-align-right">
                         <span class="phone-icon"><i class="fa fa-phone"></i>
						 <?php echo $no;?></span>
                         <span class="date-icon"><i class="fa fa-calendar-plus-o"></i><?php echo $hour;?></span>
                         <span class="email-icon"><i class="fa fa-envelope-o"></i> <a href="https://<?php echo $email;?>/" target="_blank"><?php echo $email;?></a></span>
                    </div>

               </div>
          </div>
     </header>
	 <!-- end-HEADER -->
	 
			<!--start-header-->
		<section class="navbar navbar-default navbar-static-top" role="navigation" style="padding-bottom:0px;padding-left:0px;padding-top:5px;">
				
				<div class="header">
				
					<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>
					
						<!--start-logo-->
						<div class="logo">
							<a href="index.php" style="font-size: 30px;margin-left:65px;"><?php echo $name;?></a>
						</div>
						<!--end-logo-->
						<!--start-top-nav-->
						<div class="top-nav collapse navbar-collapse">
							<ul class="nav navbar-nav navbar-right">
								<li><a href="#home" class="smoothScroll" style="padding-left:30px;padding-right:30px;">Home</a></li>
								<li><a href="#about" class="smoothScroll" style="padding-left:20px;padding-right:20px;">About Us</a></li>
								<li><a href="#news" class="smoothScroll" style="padding-left:25px;padding-right:25px;">Events</a></li>
								<li><a href="#contact" class="smoothScroll" style="padding-left:27px;padding-right:27px;">Contact</a></li>
							</ul>					
						</div>
						<div class="clear"> </div>
						<!--end-top-nav-->
					
					<!--end-header-->
				</div>
		</section>
		
		<!-- HOME -->
			 <section id="home" class="slider" data-stellar-background-ratio="0.5">
				  <div class="container">
					   <div class="row">

								 <div class="owl-carousel owl-theme">
									  <div class="item item-first">
										   <div class="caption">
												<div class="col-md-offset-1 col-md-10">
													 <h3>Let's make your life healthier</h3>
													 <h1>Healthy Living</h1>
													 <a href="#about" class="section-btn btn btn-default smoothScroll">More About Us</a>
												</div>
										   </div>
									  </div>
									
									
									 <div class="item item-third">
										   <div class="caption">
												<div class="col-md-offset-1 col-md-10">
													 <h3>Let's make your life happier</h3>
													 <h1>Your Health Benefits</h1>
													 <a href="#news" class="section-btn btn btn-default btn-blue smoothScroll">Read Stories</a>
												</div>
										   </div>
									  </div>
									  
									  
									  <div class="item item-second">
										   <div class="caption">
												<div class="col-md-offset-1 col-md-10">
													 <h3>Let's create your way of living</h3>
													 <h1>New Lifestyle</h1>
													 <a href="#contact" class="section-btn btn btn-default btn-gray smoothScroll">Contact Us</a>
												</div>
										   </div>
									  </div>

									 
								 </div>
								 
								 
								 

					   </div>
				  </div>
			 </section>
					
		    <div class="clear"> </div>
		    <div class="content-grids">
		    	<div class="wrap">
		    	<div class="section group">

					<div class="listview_1_of_3 images_1_of_3 col-sm-4">
					<div class="listimg listimg_1_of_2">
						  <img src="images/grid-img2.png">
					</div>
					<div class="text list_1_of_2">
						  <h3>Admin</h3>
						
						  <div class="button"><span><a href="admin/login.php">Click Here</a></span></div>
				     </div>
				</div>

				<div class="listview_1_of_3 images_1_of_3 col-sm-4">
					<div class="listimg listimg_1_of_2">
						  <img src="images/grid-img1.png">
					</div>
					<div class="text list_1_of_2">
						  <h3>Doctors</h3>
						
						  <div class="button"><span><a href="doctor/login.php">Click Here</a></span></div>
					</div>
				</div>
				
				<div class="listview_1_of_3 images_1_of_3 col-sm-4">
					<div class="listimg listimg_1_of_2">
						  <img src="images/grid-img3.png">
					</div>
					<div class="text list_1_of_2">
						  <h3>Duty Personnels</h3>
						
						  <div class="button"><span><a href="dutypersonnel/login.php">Click Here</a></span></div>
					</div>
				</div>


			</div>
		    </div>
		   </div>
		   
		   
		   <!-- ABOUT -->
     <section id="about">
          <div class="container">
               <div class="row">

                    <div class="col-md-6 col-sm-6">
                         <div class="about-info">
                              <h2 class="wow fadeInUp" data-wow-delay="0.6s" style="font-size:2.5em;">Welcome to <?php echo $name;?></h2>
                              <div class="wow fadeInUp" data-wow-delay="0.8s">
                                   <p><?php echo $about;?></p>
                              </div>
                              <figure class="profile wow fadeInUp" data-wow-delay="1s">
                                   <img src="images/doctor-image.png" class="img-responsive" alt="">
                                   <figcaption>
                                        <h3><?php echo $doctor;?></h3>
                                        <p>Facility Head</p>
                                   </figcaption>
                              </figure>
                         </div>
                    </div>
                    
               </div>
          </div>
     </section>
	 <!-- end-ABOUT -->
	 
	 <!-- NEWS -->
     <section id="news" data-stellar-background-ratio="2.5" style="padding-top:70px;">
          <div class="container" style="padding-right:0px;">
               <div class="row" style="margin-left:0xp;">

                    <div class="col-md-12 col-sm-12">
                         <!-- SECTION TITLE -->
                         <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                              <h2>Latest Events</h2>
                         </div>
                    </div>
					
					<div class="col-md-4 col-sm-6">
                         <!-- NEWS THUMB -->
                         <div class="news-thumb wow fadeInUp" data-wow-delay="0.6s">
                              <a href="news-detail.html">
                                   <img src="images/news-image2.jpg" class="img-responsive" alt="">
                              </a>
                              <div class="news-info">
                                   <span>January 4, 2021</span>
                                   <h3><a href="#">Liver Cancer and Viral Hepatitis</a></h3>
                                   <p>Take care of your liver because every January, we celebrate Liver Cancer and Viral Hepatitis Awareness and Prevention Month! This 2021, with a healthy liver, surely life will be fun!
								   <br/><span style="color:#3391E7;">#HealthyPilipinas</p>
                                   <div class="author">
                                        <img src="images/author-image.png" class="img-responsive" alt="">
                                        <div class="author-info">
                                             <h5>Dr. Amelita M. Pangilinan</h5>
                                             <p>Director III</p>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
					
                    <div class="col-md-4 col-sm-6">
                         <!-- NEWS THUMB -->
                         <div class="news-thumb wow fadeInUp" data-wow-delay="0.4s">
                              <a href="news-detail.html">
                                   <img src="images/news-image1.jpg" class="img-responsive" alt="">
                              </a>
                              <div class="news-info">
                                   <span>January 19, 2021</span>
                                   <h3><a href="#">National Deworming Month</a></h3>
                                   <p>Ngayong buwan ng Enero, ginugunita natin ang National Deworming Month. Makilahok sa Oplan Goodbye Bulate para maging malusog, masigla, at matalino ang inyong mga anak!
								   <br/><span style="color:#3391E7;">#HealthyPilipinas</p>
								   <div class="author">
                                        <img src="images/author-image.png" class="img-responsive" alt="">
                                        <div class="author-info">
                                             <h5>Dr. Amelita M. Pangilinan</h5>
                                             <p>Director III</p>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
					
					<div class="col-md-4 col-sm-6">
                         <!-- NEWS THUMB -->
                         <div class="news-thumb wow fadeInUp" data-wow-delay="0.4s">
                              <a href="news-detail.html">
                                   <img src="images/news-image1.jpg" class="img-responsive" alt="" style="margin-top: 20px;">
                              </a>
                              <div class="news-info">
                                   <span>January 19, 2021</span>
                                   <h3><a href="#">National Deworming Month</a></h3>
                                   <p>Ngayong buwan ng Enero, ginugunita natin ang National Deworming Month. Makilahok sa Oplan Goodbye Bulate para maging malusog, masigla, at matalino ang inyong mga anak!
								   <br/> <span style="color:#3391E7;">#HealthyPilipinas</span></p></p>
                                   <div class="author">
                                        <img src="images/author-image.png" class="img-responsive" alt="">
                                        <div class="author-info">
                                             <h5>Dr. Amelita M. Pangilinan</h5>
                                             <p>Director III</p>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                         <!-- NEWS THUMB -->
                         <div class="news-thumb wow fadeInUp" data-wow-delay="0.8s">
                              <a href="news-detail.html">
                                   <img src="images/news-image3.jpg" class="img-responsive" alt="" style="margin-top: 20px;">
                              </a>
                              <div class="news-info">
                                   <span>February 4, 2021</span>
                                   <h3><a href="#">World Cancer Day</a></h3>
                                   <p>May kakilala ka bang may kanser o survivor nito? Kilalanin natin ang kanilang karanasan ngayong ika-4 ng Pebrero bilang paggunita sa World Cancer Day.
								   <br/> <span style="color:#3391E7;">#HealthyPilipinas</span></p>
                                   <div class="author">
                                        <img src="images/author-image.png" class="img-responsive" alt="">
                                        <div class="author-info">
                                             <h5>Dr. Amelita M. Pangilinan</h5>
                                             <p>Director III</p>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>

               </div>
          </div>
     </section>
	 
	 
	 <!-- GOOGLE MAP -->
     <section id="contact">
     <!-- How to change your own map point
            1. Go to Google Maps
            2. Click on your location point
            3. Click "Share" and choose "Embed map" tab
            4. Copy only URL and paste it within the src="" field below
	-->
          <iframe src="<?php echo $map;?>" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
     </section>           


     <!-- FOOTER -->
     <footer data-stellar-background-ratio="5">
          <div class="container">
               <div class="row" style="margin-left:70px;">

                    <div class="col-md-4 col-sm-4">
                         <div class="footer-thumb"> 
                              <h4 class="wow fadeInUp" data-wow-delay="0.4s">Contact Info</h4>

                              <div class="contact-info">
                                   <p><i class="fa fa-phone"></i><?php echo $no;?></p>
                                   <p><i class="fa fa-envelope-o"></i> <a href="#"><?php echo $email;?></a></p>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-4"> 
                         <div class="footer-thumb"> 
                              <h4 class="wow fadeInUp" data-wow-delay="0.4s">Latest News</h4>
                              <div class="latest-stories">
                                   <div class="stories-image">
                                        <a href="#"><img src="images/author-image.png" class="img-responsive" alt=""></a>
                                   </div>
                                   <div class="stories-info">
                                        <a href="#"><h5>Liver Cancer and Viral</br>Hepatitis</h5></a>
                                        <span>January 4, 2021</span>
                                   </div>
                              </div>

                              <div class="latest-stories">
                                   <div class="stories-image">
                                        <a href="#"><img src="images/author-image.png" class="img-responsive" alt=""></a>
                                   </div>
                                   <div class="stories-info">
                                        <a href="#"><h5>National Deworming Month</h5></a>
                                        <span>January 19, 2021</span>
                                   </div>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-4"> 
                         <div class="footer-thumb">
                              <div class="opening-hours">
                                   <h4 class="wow fadeInUp" data-wow-delay="0.4s">Opening Hours</h4>
                                   <p><?php echo $hour;?></p>
                                   <p>Saturday <span>Closed</span></p>
                                   <p>Sunday <span>Closed</span></p>
                              </div> 

                              <ul class="social-icon">
                                   <li><a href="#" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                                   <li><a href="#" class="fa fa-twitter"></a></li>
                                   <li><a href="#" class="fa fa-instagram"></a></li>
                              </ul>
                         </div>
                    </div>

                    <div class="col-md-12 col-sm-12 border-top">
                         <div class="col-md-4 col-sm-4">
                              <div class="copyright-text"> 
                                   <p>Copyright &copy; 2021</p>
                              </div>
                         </div>
						 
						 <div class="text-align-center">
                              <div class="angle-up-btn" style="float:right;"> 
                                  <a href="#home" class="smoothScroll wow fadeInUp" data-wow-delay="1.2s"><i class="fa fa-angle-up"></i></a>
                              </div>
                         </div> 
						 
                         <div class="col-md-6 col-sm-6">
                              <div class="footer-link"> 
                                   <a href="#">Laboratory Tests</a>
                                   <a href="#">Departments</a>
                                   <a href="#">Insurance Policy</a>
                                   <a href="#">Careers</a>
                              </div>
                         </div>
                         
                    </div>
                    
               </div>
          </div>
     </footer>
	 
	 
		   <div class="clear"> </div>
		   <div class="footer">
		   	 <div class="wrap">
		   	<div class="footer-left">
		   			<ul>
						<li><a href="#home">Home</a></li>
						<li><a href="#contact">contact</a></li>
					</ul>
		   	</div>
		   
		   	<div class="clear"> </div>
		   </div>
		   </div>
		<!--end-wrap-->
		
		<!-- SCRIPTS -->
     <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/jquery.sticky.js"></script>
     <script src="js/jquery.stellar.min.js"></script>
     <script src="js/wow.min.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/owl.carousel.min.js"></script>
     <script src="js/custom.js"></script>
	</body>
</html>