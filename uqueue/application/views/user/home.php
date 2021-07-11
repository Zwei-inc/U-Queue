<?php echo $header; ?>
<body class="index-page sidebar-collapse">
    <!-- Extra details for Live View on GitHub Pages -->
    <nav class="navbar navbar-color-on-scroll navbar-transparent    fixed-top  navbar-expand-lg " color-on-scroll="100" id="sectionsNav">
      <div class="container">
        <div class="navbar-translate">
          <a class="navbar-brand" href="<?php echo base_url(); ?>">
            <?php echo brand_name; ?> </a>
        </div>
      </div>
    </nav>
    <div class="page-header header-filter clear-filter" data-parallax="true" style="background-image: url('<?php echo base_url();?>assets/img/bg0.jpg');">
      <div class="container">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto">
            <div class="brand"><h1>
                Branding
            </h1>
              <h3 class="title">All Components </h3>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="main main-raised">
        <div class="section section-basic">
          <div class="container">
          <div class="row justify-content-center">
                <button class="btn btn-primary btn-raised btn-round col-lg-4 col-sm-2" data-toggle="modal" data-target="#signupModal">
                    Get Token
                  </button>
              </div>
              <?php if(isset($_SESSION['error'])){ ?>

                <div class="text-center text-danger"><?php echo $_SESSION['error']; ?></div>
              <?php $this->session->sess_destroy(); } ?>
              <form class="form ml-auto" action="<?php echo base_url(); ?>/user/search" method="POST">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-sm-4">
                            <div class="form-group">
                                <label for="exampleInput1" class="bmd-label-floating">Enter Token</label>
                                <input type="text" name='token' class="form-control">
                                <span class="bmd-help">You will be able to see your serial in details (Put the token as it is.Case Sensative)</span>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-raised btn-round">
                            <i class="material-icons">search</i>
                        </button>
                    </div>
                </form>

              
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
            <div class="row">
              <div class="col-md-5 ml-auto">
                <div class="info info-horizontal">
                  <div class="icon icon-rose">
                    <i class="material-icons">double_arrow</i>
                  </div>
                  <div class="description">
                    <h4 class="info-title">Quick</h4>
                    <p class="description">
                      U-Queue provide remote registration. You can get an appoitment,serial,token from any where like home , car , hotel or movie theatre.
                    </p>
                  </div>
                </div>
                <div class="info info-horizontal">
                  <div class="icon icon-primary">
                    <i class="material-icons">devices_other</i>
                  </div>
                  <div class="description">
                    <h4 class="info-title">Fully Responsive</h4>
                    <p class="description">
                      You can use any device you are using. our software is device friendly.
                    </p>
                  </div>
                </div>
                <div class="info info-horizontal">
                  <div class="icon icon-info">
                    <i class="material-icons">group</i>
                  </div>
                  <div class="description">
                    <h4 class="info-title">Happy Customer</h4>
                    <p class="description">
                      A quick , hassle free disiplined service so happy customer, happy you. 
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-md-5 mr-auto">
                
                <form class="form" method="POST" action="<?php echo base_url();?>User/get_token_data">
                  <div class="card-body">
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="material-icons">face</i>
                          </span>
                        </div>
                        <input type="text" class="form-control" placeholder="First Name..." name="fname">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="material-icons">mail</i>
                          </span>
                        </div>
                        <input type="email" class="form-control" placeholder="Email..." name="email">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="material-icons">work</i>
                          </span>
                        </div>
                          <div class="select">
                        <select class="selectpicker" data-style="select-with-transition" title="Service Type" data-size="7" name="service">
                            <option disabled>Choose Service</option>
                            <?php foreach($services as $service){ ?>
                            <option value="<?php echo $service->id; ?>"><?php echo $service->name; ?></option>
                            <?php } ?>
                        </select>
                          </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="material-icons">date_range</i>
                          </span>
                        </div>
                        <input type="text" class="form-control datepicker" value="01/01/2020" name="date">
                      </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="material-icons">timer</i>
                            </span>
                          </div>
                          <input type="text" class="form-control timepicker" value="10/10/2016" name="time">
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
                    <!-- <button type="submit" data-target="#tokenModal" class="btn btn-primary btn-round" data-toggle="modal" data-dismiss="modal">Get Token</button> -->
                    <input type="submit" class="btn btn-primary btn-round" name = "submitted" value="Get Token">
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