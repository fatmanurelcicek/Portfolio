<?php
  
  include "config/config.php";
  
 ?>
<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Giriş Yap!</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Lütfen Giriş Yapınız!</p>

      <form method="POST">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="kullaniciadi" placeholder="Kullanıcı Adı">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="sifre" placeholder="Şifre">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
     
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="girisyap" class="btn btn-primary btn-block">Giriş Yap</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

   
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>

<?php 

  if(isset($_POST['girisyap']) AND isset($_POST['sifre']) AND isset($_POST['kullaniciadi'])){


        if (!empty($_POST['sifre']) AND !empty($_POST['kullaniciadi'])) {
            

            $kullanicisor = $db->prepare("SELECT * FROM kullanicilar WHERE kullanici_adi = ? AND sifre = ?");
            $kullanicisor->execute(array($_POST['kullaniciadi'],md5($_POST['sifre'])));

            if($kullanicisor->rowCount() > 0){

                $_SESSION['kullaniciadi'] = $_POST['kullaniciadi'];
                header("Location:index.php");


            }else{

              header("Location:login.php?login=no");

            }





        }



  }



 ?>
