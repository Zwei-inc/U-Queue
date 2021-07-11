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
                    <div class="col-lg-8 col-md-6 ml-auto mr-auto">
                        <div class="card card-signup card-plain bg-primary">
                            <div class="card-body justify-content-center">
                            <h3 class="card-category card-category-social text-center">
                                <i class="fa fa-newspaper-o"></i> Your Token No
                            </h3>
                            <h4 class="card-title text-center">
                                <a href="#">&quot;<?php echo $token; ?>&quot;</a>
                            </h4>
                            <h3 class="card-category card-category-social text-center">
                                <i class="fa fa-newspaper-o"></i> Your Token Time
                            </h3>
                            <h4 class="card-title text-center">
                                <a href="#"><?php echo $time; ?></a>
                            </h4>
                            <h3 class="card-category card-category-social text-center">
                                <i class="fa fa-newspaper-o"></i> Your Token Counter
                            </h3>
                            <h4 class="card-title text-center">
                                <a href="#"><?php echo $counter; ?></a>
                            </h4>
                            <p class="card-description text-center">
                            <?php 
                                if($email=="1"){
                                    echo "Check your email for further details.Check spam folder if not seen in the inbox Thank You.";
                                }else{
                                    echo $email;
                                }
                            
                            ?>
                            </p>
                            
                            </div>
                        </div>
                    </div>
            </div>
    </div>

  <?php echo $footer; ?>