<?php //error_reporting(0) ?>
<?php include "../fungsi/koneksi.php"; ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo PLUGIN ?>/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo PLUGIN ?>/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo DIST ?>/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="shortcut icon" href="<?php echo TEMPLATES ?>/<?php echo $aw->alamat_website ?>/uploads/ico/<?php echo $aw->favicon ?>" type="image/vnd.microsoft.icon" />
</head>
<body class="hold-transition login-page">
	<div id="loader"><div class="spinner"></div></div>
  	<script>
    	window.addEventListener('load', function load() {
			const loader = document.getElementById('loader');
      	setTimeout(function() {
      		loader.classList.add('fadeOut');
      	}, 300);
    	});
	</script>
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>PAMSIMAS</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
		<?php
			include "statik_variable.php";
			session_start();
			if(isset($_COOKIE['cookielogin'])){
				if(($_COOKIE['cookielogin']['user']==$statik_user)&&($_COOKIE['cookielogin']['pass']==$statik_password)){
					print_r($_COOKIE);
					$_SESSION['logged']=1;
					header('location:media.php?module=home');
				}
			}
		?>
		<?php
			if (!empty($_GET['msg'])){
				if($_GET['msg']==1){
					echo '<div style="text-align:center; color:red; font-weight:bold;"><i class="fa fa-warning fa-3x"></i><br>Are you a robot?</div>';
				}elseif ($_GET['msg']==2){
					echo '<div style="text-align:center; color:red; font-weight:bold;"><i class="fa fa-warning fa-3x"></i><br>Pastikan user dan password benar</div>';
				}elseif ($_GET['msg']==3){
					echo '<div style="text-align:center; color:red; font-weight:bold;"><i class="fa fa-warning fa-3x"></i><br>Maaf akun Anda diblokir</div>';
				}elseif ($_GET['msg']==4){
					echo '<div style="text-align:center; color:red; font-weight:bold;"><i class="fa fa-warning fa-3x"></i><br>Maaf akun Anda belum diaktivasi silahkan cek email</div>';
				}
			}
		?>
	  <form id="login-form" class="needs-validation" novalidate action="cek_login2.php" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" placeholder="Username" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
		  </div>
		  <div class="invalid-feedback">Wajib diisi.</div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
		  </div>
		  <div class="invalid-feedback">Wajib diisi.</div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
				<input type="checkbox" name="setcookie" value="true" id="remember">
				<label for="remember"> Ingat sandi</label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <!-- /.social-auth-links -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo PLUGIN ?>/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo PLUGIN ?>/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo DIST ?>/js/adminlte.min.js"></script>
<script src="<?php echo PLUGIN ?>/bootstrap/js/form-validation.js"></script>
</body>
</html>