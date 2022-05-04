<?php
    $con = new mysqli('localhost','root','','moments');

    if(!$con){
        die(mysqli_error($con));
    }

?>