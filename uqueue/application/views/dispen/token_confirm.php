<?php echo $header; ?>
<body class="login-page sidebar-collapse">
    <!-- Extra details for Live View on GitHub Pages -->
    <nav class="navbar navbar-color-on-scroll navbar-transparent    fixed-top  navbar-expand-lg " color-on-scroll="100" id="sectionsNav">
      <div class="container">
        <div class="navbar-translate">
          <a class="navbar-brand" href="<?php echo base_url(); ?>">
            <?php echo brand_name; ?> </a>
        </div>
      </div>
    </nav>
    <div class="page-header header-filter" style="background-image: url('<?php echo base_url();?>assets/img/bg7.jpg'); background-size: cover; background-position: top center;">
    
    <div class="container">
      <div class="row justify-content-center">
          <form class="form" method="POST" action="<?php echo base_url();?>Dispenser/confirm_token_data">
            <div class="col-lg-8 col-md-6 ml-auto mr-auto">
                <div class="card card-signup card-plain bg-primary">
                    <div class="card-body justify-content-center">
                    <h3 class="card-category card-category-social text-center">
                        <i class="fa fa-newspaper-o"></i> Your Prefered Token Time will be
                    </h3>
                    <h4 class="card-title text-center">
                        <a href="#">&quot;<?php echo $time; ?>&quot;</a>
                        <p>Counter No: <?php echo $counter; ?></p>
                    </h4>
                    <p class="card-description text-center">
                       Would you like to confirm your serial for the given time ? If yes then please click Confirm else click Cancel.
                       Thank you.
                    </p>
                    <div class="row m-auto">
                        
                            
                                <input type="submit" name="submit" class="btn btn-white btn-round ml-auto" value="Cancel">
                            
                                <input type="submit" name="submit" class="btn btn-white btn-round mr-auto" value="Confirm">
                            
                        
                    </div>
                    </div>
                </div>
            </div>
          </form>
      </div>
    </div>
  <!-- Login Modal -->
  <div class="modal">
    <div class="modal-dialog modal-login" role="document">
      <div class="modal-content">
        <div class="card card-signup card-plain">
          <div class="modal-header">
            <div class="card-header card-header-primary text-center">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
              <h4 class="card-title">Token Number</h4>
            </div>
          </div>
          <div class="modal-body">
            <div class="col-lg-auto col-md-auto">
                <div class="card card-pricing bg-primary">
                  <div class="card-body ">
                    <div class="icon">
                      <i class="material-icons">check_circle_outline</i>
                    </div>
                    <h3 class="card-title">XXXXXXX</h3>
                    <p class="card-description">
                      This is your token and also check your email for more...
                    </p>
                    <!-- <a href="#pablo" class="btn btn-white btn-round">Choose Plan</a> -->
                  </div>
                </div>
              </div>
          </div>
          <!-- <div class="modal-footer justify-content-center">
            <a href="#pablo" class="btn btn-primary btn-link btn-wd btn-lg">Get Started</a>
          </div> -->
        </div>
      </div>
    </div>
  </div>
  <!--  End Modal -->

  <?php echo $footer; ?>