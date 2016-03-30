<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Attachments</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">    
	  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">
    <!-- Jasny bootstrap -->
    <link href="<?php echo base_url(); ?>assets/css/jasny-bootstrap.min.css" rel="stylesheet" media="screen">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>  	
    <section id="form-container">
      <div class="container">    
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <h1>Attachments</h1>

            <form action="<?php echo site_url("site/upload") ?>" id="form-upload">            
              
            </form>

            <!-- <progress id="progress-bar" max="100" value="0"></progress> -->
            <div class="progress" style="display:none;">
              <div id="progress-bar" class="progress-bar progress-bar-success progress-bar-striped " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
                20%
              </div>
            </div>

            <ul class="list-group"><ul>
          </div>
        </div>
      </div><!-- /.container -->
    </section>
      

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url(); ?>/assets/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url(); ?>/assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/jasny-bootstrap.min.js"></script>    
    <script src="<?php echo base_url(); ?>/assets/js/custom.js"></script>    
  </body>
</html>