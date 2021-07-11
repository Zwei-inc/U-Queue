<?php echo $header; ?>
              
<body class="index-page sidebar-collapse">
		<div class="subscribe-line subscribe-line-image" style="margin-top:10%; background-image: url('<?php echo $baseurl ?>assets/img/bg7.jpg');">
          <div class="container">
            <div class="row">
              <div class="col-md-6 ml-auto mr-auto">
                <div class="text-center">
                  <h3 class="title">Admin Login</h3>
                  <p class="description">
					only for admins
                  </p>
                </div>
                <div class="card card-raised card-form-horizontal">
                  <div class="card-body ">
                    <form method="POST" action="<?php echo $baseurl ?>Admin/admin_login" >
						<input type="text" value="" placeholder="Your Email..." class="form-control" name="em"><br>
						<input type="password" value="" placeholder="Your Email..." class="form-control" name="pass"><br>
						<input type="submit" class="btn btn-primary btn-block">
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
  </body>
 </html>