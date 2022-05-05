<?php
include 'cusdbconnection.php';

if(isset($_GET['id'])){
    
    $id = $_GET['id'];

    $sql = "DELETE FROM `cusregister` WHERE `cusId` = $id";
    $result = mysqli_query($con,$sql);

    if($result){
        header ('location:customerAdminView.php');
    }else{
        die(mysqli_error($result));
    }
}
?>
