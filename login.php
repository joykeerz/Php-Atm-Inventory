<?php
require_once 'config.php';
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>GRG Inventory | Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<?php
session_start();
// kalo submit dipencet jalanin ini
if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // query buat select
    $login = mysqli_query($db, "SELECT * FROM login WHERE username = '$username' AND password='$password'");
    
    // jalanin querinya
    $row=mysqli_fetch_array($login);
    
    // cek kalo login ada isinya. 1 itu artinya true
if(mysqli_num_rows($login)==1)
{
    
    
    
    //cek level admin
    if ($row['level'] == 'admin')
        {
            session_start();
            $_SESSION['username'] = $row['username'];
            $_SESSION['password'] = $row['password'];
            header('location:index.php');
        }
        //cek level user
    elseif ($row['level'] == 'user') 
        {   
            session_start();
            $_SESSION['username'] = $row['username'];
            $_SESSION['password'] = $row['password'];
            header('location:index.php');    
        }
    else
        {
        ?>
                <div class="alert alert-danger">
                    <h4><i class="icon fa fa-ban"></i> Error !</h4>
                    Wrong Password Or Username
                </div>
        <?php
                    die("<a href=\"javascript:history.back()\">Back</a>");
        }
        
    
// tutup num rows
}else{
    ?>
                        <div class="col-lg-4" style="margin-left: 33%; margin-top: 10%">
                        <div class="alert alert-danger">
                            <h4><center><i class="icon fa fa-ban"></i> Error !</center></h4>
                            <center>Please use the correct username or password</center>
                            <center>
                                <?php
                                    die("<a href=\"javascript:history.back()\">Back</a>"); 
                                ?>
                            </center>
                        </div>
                        </div>
        <?php
}
// tutup isset
}
?>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
      <a href="../../index2.html"><b>ATM&nbsp;</b>INVENTORY</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Please Sign In</p>

    <form name="login" method="post">
      <div class="form-group has-feedback">
          <input type="username" class="form-control" placeholder="username" name="username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-4">
          
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat" name="submit">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>


    <br>
    <a href="register.php" class="text-center">Register a new membership</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
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
