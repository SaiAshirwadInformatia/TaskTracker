</head>
<body class="hold-transition register-page">
  <div class="register-box">
    <div class="register-logo">
      <a href="../../index2.html"><b>Task Tracker</b></a>
    </div>

    <div class="register-box-body">
      <?php $this->load->view('inc_bootstrap_alerts')?>
      <p class="login-box-msg">Register a new membership</p>
      <form action="<?php echo base_url('Register/action') ?>" method="post">
        <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="First name" name="fname" id="fname"
          <?php
            echo isset($fname)?'value="'.$fname.'"': '' ?>> 
          <span class="fa fa-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="Last name" name="lname" id="lname"
          <?php
            echo isset($lname)?'value="'.$lname.'"': '' ?>> 
          <span class="fa fa-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="Username" name="username" id="username"
          <?php
            echo isset($username)?'value="'.$username.'"': '' ?>> 
          <span class="fa fa-usd form-control-feedback" id="username-icon"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="email" class="form-control" placeholder="Email" name="email" id="email" <?php
            echo isset($email)?'value="'.$email.'"' : '' ?>>
          <span class="fa fa-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="Phone number" name="phone" id="phone" <?php
            echo isset($phone)?'value="'.$phone.'"' : '' ?>>
          <span class="fa fa-phone form-control-feedback"></span>
        </div>  
        <div class="row">
          <div class="col-xs-8">
            <div class="checkbox icheck">
              <label>
                <input type="checkbox"> I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat" name="register" value="register">Register</button>
          </div>
        </div>
      </form>
      <a href="<?php echo base_url('Login')?>" class="text-center">I already have a membership</a>
    </div>
  </div>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
    
  });
</script>
