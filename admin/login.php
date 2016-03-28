<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>E-Raport SMPN 1 Mataram | Log in Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>E-Raport</b><br/> Login Admin</a>
  </div>
  <!-- /.login-logo -->
  <?php
                if (isset($_SESSION['alert'])) {
                    echo $_SESSION['alert'];
                } unset($_SESSION['alert']);
                ?>
  <div class="login-box-body">
   

    <form action="login-admin.php" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="user-admin" autofocus required placeholder="Username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="pass-admin" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat"><i class="fa fa-lock"> Login</i></button>
        </div>
        
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
     
      <a href="#" data-toggle="modal" data-target="#lupaModal" class="btn btn-block btn-social btn-facebook btn-flat"><i class="glyphicon glyphicon-question-sign"></i> Lupa Password</a>
      
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-users"></i> Registrasi User</a>
    </div>
    <!-- /.social-auth-links -->

   

  </div>
  <!-- /.login-box-body -->
</div>
 <div class="modal fade" id="lupaModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-history fa-fw fa-lg"></i> Lupa Password</h4>
                    </div>
                      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div class="modal-body">
                       
                                   
                                  
                                    <div class="form-group has-feedback">
                                    <div class="form-group">
                                        <label>Masukkan Email</label>
                                      <input type="email" class="form-control" name="email_to" placeholder="Masukkan Email">
                                      <!-- <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
                                    </div>
                                    </div>
                                        
                                    
                               
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <button type="submit" name="forgot_pass" class="btn btn-primary">Kirim Konfirmasi <i class="fa fa-sign-out fa-fw fa-lg"></i></button>
                   
                    </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
<!-- /.login-box -->

<!-- jQuery 2.2.0 -->
<script src="../plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>

<?php
if (isset($_POST['forgot_pass'])) {
    include '../config/config.php';
    $m = $_POST['email_to'];
    $m_sql = mysqli_query($link, "SELECT email,username,pass2 from admin where email = '$m'");
    $c_m = mysqli_num_rows($m_sql);
    if ($c_m > 0) {
        $mail_to = mysqli_fetch_assoc($m_sql);
        $rpass1 = $mail_to['pass2'];
        $rusername = $mail_to['username'];
        $mail_from = mail_server();
        $subject = "Permintaan Perubahan Password Admin";
        $pesan = "<div style='margin: 20px 0; padding: 20px; border-left: 3px solid #eee;background-color: #f4f8fa; border-color: #bce8f1;'>
                    <h4><strong>Hai $username</strong>, Password Anda Berhasil Dirubah</h4>
                    <p>Silahkan Login menggunakan Username dan Password dibawah ini :</p>
                    <p>Username : $rusername</p>
                    <p>Password : $rpass1</p>
                  </div>";
        $message = $pesan;
        $headers = "From: $mail_from\r\n";
        $headers .= "Reply-To: $mail_from\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
        if (mail($mail_to['email'], $subject, $message, $headers)) {
//        mail($mail_to['email'], $subject, 
//                "<div style='margin: 20px 0; padding: 20px; border-left: 3px solid #eee;background-color: #f4f8fa; border-color: #bce8f1;'>
//                    <h4>Password Anda Berhasil Dirubah</h4>
//                    <p>Username : $rusername</p>
//                    <p>Password : $rpass1</p>
//                  </div>", 
//                "To: $mail_to[email]\n" .
//                "From: webmaster@gmail.com>\n" .
//                "MIME-Version: 1.0\n" .
//                "Content-type: text/html; charset=iso-8859-1");
            $alert = "<div class=\"alert alert-success\">
                     <strong>Berhasil!</strong><br/> Permintaan Perubahan Password Berhasil Terkirim Ke Email Anda.
                  </div>";
            $_SESSION['alert'] = $alert;
        } else {
            $alert = "<div class=\"alert alert-danger\">
                     <strong>Gagal!</strong><br/> Permintaan Perubahan Password Gagal Terkirim Ke Email Anda.
                  </div>";
            $_SESSION['alert'] = $alert;
        }
    } else {
        $alert = "<div class=\"alert alert-warning\">
                     <strong>Gagal!</strong><br/> Email Anda Tidak Ditemukan Di Server.
                  </div>";
        $_SESSION['alert'] = $alert;
    }
    ?>
    <script>
        window.location = "login.php";
    </script>
    <?php
}
