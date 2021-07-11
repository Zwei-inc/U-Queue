	  <!-----footer here----->
	  <br><br><br><br>
	<footer class="footer footer-white footer-big">
	<div class="container">
	  <div class="content">
		<div class="row">
			<div class="col-sm-4">
              <h4>Brand logo</h4>
              <img src="assets/img/brandlogodef.png" alt="Rounded Image" class="rounded img-fluid">
            </div>
			<div class="col-md-4">
                    <h5>Quick links</h5>
                    <ul class="links-vertical">
                      <li>
                        <a href="#">
                         Link1
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          Link2
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          Link3
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          Link4
                        </a>
                      </li>
                    </ul>
            </div>
		  <div class="col-md-4">
			<h5>Reserved Section</h5>
			<!---
			<div class="social-feed">
			  <div class="feed-line">
				<i class="fa fa-twitter"></i>
				<p>How to handle ethical disagreements with your clients.</p>
			  </div>
			  <div class="feed-line">
				<i class="fa fa-twitter"></i>
				<p>The tangible benefits of designing at 1x pixel density.</p>
			  </div>
			  <div class="feed-line">
				<i class="fa fa-facebook-square"></i>
				<p>A collection of 25 stunning sites that you can use for inspiration.</p>
			  </div>
			</div>
			---->
		  </div>
		</div>
	  </div>
	  <hr>
	  <!---
	  <ul class="float-left">
		<li>
		  <a href="#pablo">
			Blog
		  </a>
		</li>
		<li>
		  <a href="#pablo">
			Presentation
		  </a>
		</li>
		<li>
		  <a href="#pablo">
			Discover
		  </a>
		</li>
		<li>
		  <a href="#pablo">
			Payment
		  </a>
		</li>
		<li>
		  <a href="#pablo">
			Contact Us
		  </a>
		</li>
	  </ul>
	  --->
	  <div class="copyright float-center">
		Copyright © <script>
		  document.write(new Date().getFullYear())
		</script> U-Queue All Rights Reserved.
	  </div>
	</div>
  </footer>
	
 
  <!--   Core JS Files   -->
  <script src="<?php echo $baseurl ?>assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="<?php echo $baseurl ?>assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="<?php echo $baseurl ?>assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="<?php echo $baseurl ?>assets/js/plugins/moment.min.js"></script>
  <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="<?php echo $baseurl ?>assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="<?php echo $baseurl ?>assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Yno10-YTnLjjn_Vtk0V8cdcY5lC4plU"></script>
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="../../buttons.github.io/buttons.js"></script>
  <!--	Plugin for Sharrre btn -->
  <script src="<?php echo $baseurl ?>assets/js/plugins/jquery.sharrre.js" type="text/javascript"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="<?php echo $baseurl ?>assets/js/plugins/bootstrap-tagsinput.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="<?php echo $baseurl ?>assets/js/plugins/bootstrap-selectpicker.js" type="text/javascript"></script>
  <!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="<?php echo $baseurl ?>assets/js/plugins/jasny-bootstrap.min.js" type="text/javascript"></script>
  <!--	Plugin for Small Gallery in Product Page -->
  <script src="<?php echo $baseurl ?>assets/js/plugins/jquery.flexisel.js" type="text/javascript"></script>
  <!-- Plugins for presentation and navigation  -->
  <script src="<?php echo $baseurl ?>assets/demo/modernizr.js" type="text/javascript"></script>
  <script src="<?php echo $baseurl ?>assets/demo/vertical-nav.js" type="text/javascript"></script>
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="../../buttons.github.io/buttons.js"></script>
  <!-- Js With initialisations For Demo Purpose, Don't Include it in Your Project -->
  <script src="<?php echo $baseurl ?>assets/demo/demo.js" type="text/javascript"></script>
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo $baseurl ?>assets/js/material-kit.mind1f1.js?v=2.2.0" type="text/javascript"></script>
  <script src="<?php echo $baseurl ?>assets/js/modal.js" type="text/javascript"></script>
  <script>
    $(document).ready(function() {
      //init DateTimePickers
      materialKit.initFormExtendedDatetimepickers();

      // Sliders Init
    //   materialKit.initSliders();
    });
  </script>
  <!-- <nav id="cd-vertical-nav">
    <ul>
      <li>
        <a href="#buttons" data-number="1">
          <span class="cd-dot"></span>
          <span class="cd-label">Basic Elements</span>
        </a>
      </li>
      <li>
        <a href="#navigation" data-number="2">
          <span class="cd-dot"></span>
          <span class="cd-label">Navigation</span>
        </a>
      </li>
      <li>
        <a href="#notifications" data-number="3">
          <span class="cd-dot"></span>
          <span class="cd-label">Notifications</span>
        </a>
      </li>
      <li>
        <a href="#footers" data-number="4">
          <span class="cd-dot"></span>
          <span class="cd-label">Footers</span>
        </a>
      </li>
      <li>
        <a href="#typography" data-number="5">
          <span class="cd-dot"></span>
          <span class="cd-label">Typography</span>
        </a>
      </li>
      <li>
        <a href="#contentAreas" data-number="6">
          <span class="cd-dot"></span>
          <span class="cd-label">Content Areas</span>
        </a>
      </li>
      <li>
        <a href="#cards" data-number="7">
          <span class="cd-dot"></span>
          <span class="cd-label">Cards</span>
        </a>
      </li>
      <li>
        <a href="#morphingCards" data-number="8">
          <span class="cd-dot"></span>
          <span class="cd-label">Morphing Cards</span>
        </a>
      </li>
      <li>
        <a href="#javascriptComponents" data-number="9">
          <span class="cd-dot"></span>
          <span class="cd-label">Javascript</span>
        </a>
      </li>
    </ul>
  </nav> -->
</body>
</html>