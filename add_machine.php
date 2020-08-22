<!DOCTYPE html>
<?php require_once "config.php";?>
 
<html>
<head>
    
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Atm Inventory  | Dashboard</title>
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
                if(empty($_SESSION['username'])){
                    ?>
                    <div class="wrapper">
                        <div class="col-lg-4" style="margin-left: 33%; margin-top: 10%">
                        <div class="alert alert-danger">
                            <h4><center><i class="icon fa fa-ban"></i> Error !</center></h4>
                            <center>Please Login</center>
                            <center>
                                <a href="login.php" class="btn btn-danger">Back</a>
                            </center>
                        </div>
                        </div>
                    </div>
                    <?php
                        
                        
                }else{
                //membuat variabel berdasarkan user yang di input
                $users = $_SESSION['username'];
                // query buat select
                $profile = mysqli_query($db, "SELECT * FROM login WHERE username = '$users'");
                // jalanin querinya
                $row=mysqli_fetch_array($profile);
?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>GRG&nbsp;</b>ATM</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs"><?php echo $_SESSION['username'] ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <p>
                  <?php echo $_SESSION['username'] ?> - <?php echo $row['level'] ?>
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="index.php"><i class="fa fa-circle-o"></i>Home</a></li>
          </ul>
        </li>
        <li>
          <a href="pages/widgets.html">
            <i class="fa fa-th"></i> <span>Menus</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Charts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href=""><i class="fa fa-circle-o"></i> Monthly Data </a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Forms</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href=""><i class="fa fa-circle-o"></i> Machines</a></li>
            <li><a href=""><i class="fa fa-circle-o"></i> Users</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Tables</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li><a href="machine.php"><i class="fa fa-circle-o"></i> Machines</a></li>
          </ul>
        </li>
        
        
        
        
        
        <li class="header">LABELS</li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Form
        <small> Machine</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Form</li>
        <li class="active">Machine</li>
      </ol>
    </section>
    
    <?php
    $sql = "SELECT * FROM machine ORDER BY machine_cd DESC LIMIT 5";
    $result = mysqli_query($db,$sql);
    $undo = mysqli_rollback($db)
    ?>
    <!-- Main content -->
    <section class="content">
        <!-- form -->
        <?php
if(isset($_POST['submit'])) {
    $code = $_POST['codes'];
    $name = $_POST['name'];
    $type = $_POST['type'];
    $model = $_POST['model'];
    $qty = $_POST['qty'];
    $location = $_POST['location'];
    $datein = $_POST['datein'];
    $dateout = $_POST['dateout'];
    $status = $_POST['status'];

    $sql = "INSERT INTO machine (machine_cd, machine_name, machine_type, machine_model, machine_quantity, machine_location, date_in, date_out, machine_status)" .
        "VALUE ('$code','$name','$type','$model','$qty','$location','$datein','$dateout','$status')";
        //mengecek jika query benar, maka akan menambahkan data
        if (mysqli_query($db,$sql)){
                ?>
                <div class="alert alert-success">
                    <h4><i class="icon fa fa-ban"></i> success !</h4>
                    <a href="add_machine.php" class="btn btn-danger btn-flat">Add another data</a>
                    <a href="undo_machine.php" class="btn btn-danger btn-flat">undo</a>
                    <a href="index.php" class="btn btn-danger btn-flat">Home</a>
                </div>
        
                <?php
                $sql = "SELECT * FROM machine";
                $result = mysqli_query($db,$sql);
                ?>
       
        <div class="box box-info">
                    <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                      
                  <tr>
                    <th>Machine ID</th>
                    <th>Machine Name</th>
                    <th>Quantity</th>
                    <th>Location</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php

	if (mysqli_num_rows($result)>0):

	while ($row = mysqli_fetch_assoc($result)){

				?>
                  <tr>
                    <td><a href="pages/examples/invoice.html"><?=$row['machine_cd'];?></a></td>
                    <td><?=$row['machine_name'];?></td>
                    <td><span class="label label-success"><?=$row['machine_quantity'];?></span></td>
                    <td>
                      <div class="sparkbar" data-color="#00a65a" data-height="20"><?=$row['machine_location'];?></div>
                    </td>
                  </tr>
                  <?php 
                    }
                    endif;
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            </div>
                <?php
        }else{
            // jika ada kesalahan
                ?>
                <div class="alert alert-danger">
                    <h4><i class="icon fa fa-ban"></i> Error !</h4>
                </div>
                <?php
                    die("<a href=\"javascript:history.back()\">Back</a>");
            }
    // jika isset tidak mempunyai nilai
}else{
?>
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Machine</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST">
              <div class="box-body">
                <div class="form-group  col-xs-2">
                  <label for="exampleInputEmail1">Machine Code</label>
                  <?php
                  $random = (rand(1, 9999));
                  ?>
                  <input readonly="" name="codes" type="text" class="form-control" id="exampleInputEmail1" placeholder="K<?php  echo $random; ?>" value="K<?php  echo $random; ?>" >
                  
                </div>
                  
                  <div class="form-group  col-xs-2">
                  <label for="exampleInputEmail1">Machine Name</label>
                  <input name="name"  type="text"  class="form-control" id="exampleInputEmail1" placeholder="">
                </div>
                  
                  <div class="form-group  col-xs-2">
                  <label for="exampleInputEmail1">Machine Type</label>
                  <select name="type"  class="form-control">
                    <option>TALL</option>
                    <option>SHORT</option>
                    <option>4 POCKET</option>
                    <option>2 POCKET</option>
                    <option>1 POCKET</option>
                  </select>
                </div>
                  
                  <div class="form-group  col-xs-2">
                  <label for="exampleInputEmail1">Machine Model</label>
                  <select name="model"  class="form-control">
                    <option>H22NL</option>
                    <option>H22VL</option>
                    <option>H68NL</option>
                    <option>H68VL</option>
                    <option>P2800</option>
                    <option>P2800</option>
                    <option>P2801</option>
                    <option>CM 400</option>
                    <option>CM 200</option>
                    <option>CM 100</option>
                  </select> 
                </div>
              </div>
                
                <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Quantity</label>
                  <input name="qty"  type="text"  class="form-control" id="exampleInputEmail1" placeholder="">
                </div>
                  
                  <div class="form-group">
                  <label for="exampleInputEmail1">Machine Location</label>
                  <input name="location"  type="text"  class="form-control" id="exampleInputEmail1" placeholder="">
                </div>
                  
                  <div class="form-group">
                  <label for="exampleInputEmail1">Date In</label>
                  <input name="datein"  type="date"  class="form-control" id="exampleInputEmail1" placeholder="">
                </div>
                  
                  <div class="form-group">
                  <label for="exampleInputEmail1">Date Out</label>
                  <input name="dateout" type="date"  class="form-control" id="exampleInputEmail1" placeholder="">
                </div>
                  
                  <div class="form-group">
                  <label for="exampleInputEmail1">Machine Status</label>
                  <select name="status"  class="form-control">
                    <option>GOOD</option>
                    <option>DEFECT</option>
                  </select>
                </div>
                </div>
              <!-- /.box-body -->

              <div class="box-footer">
                  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
              </div>
            </form>
          </div>
        <!-- form -->
    <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">ATM Machines</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                      
                  <tr>
                    <th>Machine ID</th>
                    <th>Machine Name</th>
                    <th>Quantity</th>
                    <th>Location</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php

	if (mysqli_num_rows($result)>0):

	while ($row = mysqli_fetch_assoc($result)){

				?>
                  <tr>
                    <td><a href="pages/examples/invoice.html"><?=$row['machine_cd'];?></a></td>
                    <td><?=$row['machine_name'];?></td>
                    <td><span class="label label-success"><?=$row['machine_quantity'];?></span></td>
                    <td>
                      <div class="sparkbar" data-color="#00a65a" data-height="20"><?=$row['machine_location'];?></div>
                    </td>
                  </tr>
                  <?php 
                    }
                    endif;
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
            </div>
            <!-- /.box-footer -->
          </div>    
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.8
    </div>
    <strong>Copyright &copy; 2017 <a href="http://almsaeedstudio.com">Wijoyo Wisnu Mukti</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
<?php 
} 
                }
?>
</html>