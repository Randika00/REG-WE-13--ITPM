<?php
    include "config.php";

    if(isset($_GET['id'])){
        $user_id = $_GET['id'];

        // delete
        $sql  = "DELETE FROM `ordadd` WHERE `id`= '$user_id'";

        // execute the query
        $result = $conn->query($sql);
        if ($result == TRUE) {
            header('location:ordView.php');
    	}else{
			echo "Error:" . $sql . "<br>" . $conn->error;
        }
    }
?>