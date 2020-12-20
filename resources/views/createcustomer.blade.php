<!DOCTYPE html>
<html lang="en">
  <head>
    <title>PT. MDC Trans Lamongan</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="asset/vegfoods/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="asset/vegfoods/css/animate.css">
    
    <link rel="stylesheet" href="asset/vegfoods/css/owl.carousel.min.css">
    <link rel="stylesheet" href="asset/vegfoods/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="asset/vegfoods/css/magnific-popup.css">

    <link rel="stylesheet" href="asset/vegfoods/css/aos.css">

    <link rel="stylesheet" href="asset/vegfoods/css/ionicons.min.css">

    <link rel="stylesheet" href="asset/vegfoods/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="asset/vegfoods/css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="asset/vegfoods/css/flaticon.css">
    <link rel="stylesheet" href="asset/vegfoods/css/icomoon.css">
    <link rel="stylesheet" href="asset/vegfoods/css/style.css">
  </head>
  <body class="goto-here">
		<div class="py-1 bg-danger">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text">(0322) 3101285</span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <span class="text">groupmdc@gmail.com</span>
					    </div>
					    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
						    <span class="text">PT. MDC Trans &amp; 24/7 Discussion</span>
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
		<a class="navbar-brand" href="{{ url('/') }}">
			<img src="{{ url('asset/vegfoods/images/mdc.png') }}" class="rounded" alt="image">
	    </a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="{{ url('/') }}" class="nav-link">Home</a></li>
	          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Information</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
              	<a class="dropdown-item" href="{{ url('shopbus') }}">Armada</a>
                <!-- <a class="dropdown-item" href="{{ url('detailbus') }}">Informasi Armada</a> -->
                <a class="dropdown-item" href="{{ url('shoppaket') }}">Paket Wisata</a>
                <!-- <a class="dropdown-item" href="{{ url('detailpaket') }}">Informasi Paket Wisata</a> -->
                <!-- <a class="dropdown-item" href="{{ url('cart') }}">Cart</a> -->
                <a class="dropdown-item" href="{{ url('checkout') }}">Booking</a>
              </div>
            </li>
	          <li class="nav-item"><a href="{{ url('about') }}" class="nav-link">About</a></li>
	          <!-- <li class="nav-item"><a href="{{ url('testimony') }}" class="nav-link">Testimony</a></li> -->
	          <li class="nav-item"><a href="{{ url('contact') }}" class="nav-link">Contact</a></li>
	          <li class="nav-item cta cta-colored"><a href="{{ url('cart') }}" class="nav-link"><span class="icon-bus"></span></a></li>

	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    <div class="hero-wrap hero-bread" style="background-image: url('asset/vegfoods/images/baground2.jpeg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
            <h1 class="mb-0 bread">My Cart</h1>
          </div>
        </div>
      </div>
    </div>
</br>
</br>
</br>
<section id="hero">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">
        <div class="kotak">
          <div class="row">
            <div class="col-md-12 text-center">
            <h1>Formulir Pemesanan</h1>
              <hr>
            </div>
            <div class="col-md-8 text-left">
            <p class="alert alert-primary">
                Isi data diri Anda dengan lengkap dan benar.
              </p>
                            <form action="customerstore" method="post">
                                @csrf
                                <div class="form-group row">
                                  <label class="col-sm-4 control-label text-right">Nama Anda<span class="text-danger">*</span></label>
                                  <div class="col-sm-8">
                                    <input type="text"  id="nama" name="nama" class="form-control" placeholder="Nama Anda" required>
                                  </div>
                                </div>

                                <div class="form-group row">
                                  <label class="col-sm-4 control-label text-right">Nomor HP/Whatsapp <span class="text-danger">*</span></label>
                                  <div class="col-sm-8">
                                    <input type="text" id="telephone" name="telephone" class="form-control" placeholder="Nomor HP/Whatsapp" required>
                                  </div>
                                </div>

                                <div class="form-group row">
                                  <label class="col-sm-4 control-label text-right">Email</label>
                                  <div class="col-sm-8">
                                    <input type="email" id="email" name="email" class="form-control" 
                                    placeholder="Email Anda" required>
                                  </div>
                                </div>

                                <div class="form-group row">
                                  <label class="col-sm-4 control-label text-right">Alamat</label>
                                  <div class="col-sm-8">
                                    <textarea id="alamat" name="alamat" class="form-control" placeholder="Alamat"></textarea>
                                  </div>
            </div>
                                
                            <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" id="berhasil">Next</button>
                            </div>
                            </form>
                            </div>
                            <div class="col-md-4">
                <img src="{{ url('asset/vegfoods/images/bismillah.jpg') }}" class="img img-thumbnail img-fluid" >  
            </div>
                            </div>
			</div>
      </br>
      </br>
      </br>
		</section>
    <section class="ftco-section bg-light">
		</section>
                            <footer class="ftco-footer ftco-section">
      <div class="container">
      	<div class="row">
      		<div class="mouse">
						<a href="#" class="mouse-icon">
							<div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
						</a>
					</div>
      	</div>
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
			<h2 class="ftco-heading-2">PT. MDC Trans</h2>
              <p> Merupakan PO bus pariwisata yang berasal dari Lamongan, Jawa Timur.
                  Bus pariwisata ini melayani transportasi wisata di Indonesia, khususnya di Pulau Jawa, Bali, Lombok, 
                  dan sebagian Sumatera.
                  Bus pariwisata MDC Trans Trans melayani antar jemput, drop bandara, trip wisata, wisata ziarah, 
                  kunjungan industri dan atau menyesuaikan kebutuhan pelanggan.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Menu</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Informasi</a></li>
                <li><a href="#" class="py-2 d-block">About</a></li>
                <li><a href="#" class="py-2 d-block">Testimony</a></li>
                <li><a href="#" class="py-2 d-block">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Help</h2>
              <div class="d-flex">
	              <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
	                <li><a href="#" class="py-2 d-block">Booking Information</a></li>
	                <li><a href="#" class="py-2 d-block">Make an Appoitment</a></li>
					<li><a href="#" class="py-2 d-block">Contact</a></li>
	              </ul>
	              <!-- <ul class="list-unstyled">
	                <li><a href="#" class="py-2 d-block">Contact</a></li>
	              </ul> -->
	            </div>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">Jl. Soewoko No.43 A, RT.2/RW.2, Jetis, Kec. Lamongan, Kabupaten Lamongan, Jawa Timur 62211</span></li></br>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">0823-6330-6033</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">groupmdc@gmail.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  PT. Madina Dzikra Cemerlang <script>document.write(new Date().getFullYear());</script> | MDC Trans Lamongan <i class="icon-bus color-danger" aria-hidden="true"></i> <a href="#" target="_blank"></a>
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="asset/vegfoods/js/jquery.min.js"></script>
  <script src="asset/vegfoods/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="asset/vegfoods/js/popper.min.js"></script>
  <script src="asset/vegfoods/js/bootstrap.min.js"></script>
  <script src="asset/vegfoods/js/jquery.easing.1.3.js"></script>
  <script src="asset/vegfoods/js/jquery.waypoints.min.js"></script>
  <script src="asset/vegfoods/js/jquery.stellar.min.js"></script>
  <script src="asset/vegfoods/js/owl.carousel.min.js"></script>
  <script src="asset/vegfoods/js/jquery.magnific-popup.min.js"></script>
  <script src="asset/vegfoods/js/aos.js"></script>
  <script src="asset/vegfoods/js/jquery.animateNumber.min.js"></script>
  <script src="asset/vegfoods/js/bootstrap-datepicker.js"></script>
  <script src="asset/vegfoods/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="asset/vegfoods/js/google-map.js"></script>
  <script src="asset/vegfoods/js/main.js"></script>
    
  </body>
</html>