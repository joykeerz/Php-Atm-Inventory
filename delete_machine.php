<?php
include "./config.php";
$a="delete from machine where machine_cd='$_GET[machine_cd]'";
$b=mysqli_query($db,$a);
    if($b){
    header("location:machine.php");
    }else{
    echo "Data gagal dihapus";
    }
?>