<?php
require_once "config.php";
mysqli_query($db,"BEGIN");
$rollback = mysqli_query($db,"ROLLBACk");
if ($rollback) {
    ?>
        <div class="wrapper">
                        <div class="col-lg-4" style="margin-top: 10%">
                        <div class="alert alert-danger">
                            <h4><center><i class="icon fa fa-check"></i> UNDO SUCCESS</center></h4>
                            <center>BACK</center>
                            <center>
                                <a href="index.php" class="btn btn-danger">Back</a>
                            </center>
                        </div>
                        </div>
                    </div>
    <?php
}else{
    
}
        
?>