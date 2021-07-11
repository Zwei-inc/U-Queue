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
                <div class="bg-rose text-center text-uppercase text-primary">
                    <h3><b>Name:&nbsp;</b><?php echo $name; ?></h3><br>
                    <h3><b>Service:&nbsp;</b><?php echo $service; ?></h3><br>
                    <h3><b>Token:&nbsp;</b><?php echo $token; ?></h3><br>
                    <h3><b>Time:&nbsp;</b><?php echo $time; ?></h3><br>
                    <h3><b>Counter No:&nbsp;</b><?php echo $counter; ?></h3><br>

                    <form>
                      <input class="btn btn-primary" type="submit" name="holdon" value="Hold On">
                    </form>
                </div>
            </div>
        </div>
    </div>




  <?php echo $footer; ?>