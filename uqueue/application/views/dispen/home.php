<?php echo $header; ?>
<body class="index-page sidebar-collapse">
   
    <div id='container'>
    
    <div id='mainDiv' class="main main-raised">
        <div class="modal-header justify-content-center">
        <h3 class="modal-title card-title ">Local Dispenser</h3>
      </div>
        <div class="section section-basic">
          <div class="container">
              <div class="row justify-content-center">
                    <div class="col-lg-12 text-center">
                    <button class="btn btn-primary btn-raised btn-round col-lg-8 col-md-4" data-toggle="modal" data-target="#signupModal">
                        <?php echo "Get Token"; ?>
                    </button>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>

<!-- Register Modal -->
  <div class="modal fade" id="signupModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-signup" role="document">
      <div class="modal-content">
        <div class="card card-signup card-plain">
          <div class="modal-header">
            <h3 class="modal-title card-title">Get Your Serial/Appointment</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <i class="material-icons">clear</i>
            </button>
          </div>
          <div class="modal-body">
            <div class="row justify-content-center">
              <div class="col-md-4 col-lg-8">
                
                <form class="form" method="POST" action="<?php echo base_url();?>Dispenser/get_token">
                  <div class="card-body">
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="material-icons">face</i>
                          </span>
                        </div>
                        <input type="text" name = "name" class="form-control" placeholder="First Name...">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="material-icons">phone</i>
                          </span>
                        </div>
                        <input type="text" name = "phone" class="form-control" placeholder="Phone Number...">
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="input-group">
                      <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="material-icons">ballot</i>
                          </span>
                        </div>
                        <select class="selectpicker col-lg-10" data-style="select-with-transition" title="Service Type" data-size="12" name="service">
                            <option disabled>Choose Service</option>
                            <?php foreach($services as $service){ ?>
                            <option value="<?php echo $service->id; ?>"><?php echo $service->name; ?></option>
                            <?php } ?>
                        </select>
                      </div>
                    </div>

                    
                    <!-- <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" value="" checked>
                        <span class="form-check-sign">
                          <span class="check"></span>
                        </span>
                        I agree to the <a href="#something">terms and conditions</a>.
                      </label>
                    </div> -->
                  </div>
                  <div class="modal-footer justify-content-center">
                    <button class="btn btn-primary btn-round">Print Token</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--  End Modal -->

  <!-- Login Modal -->
  <div class="modal fade" id="tokenModal" tabindex="-1" role="dialog">
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