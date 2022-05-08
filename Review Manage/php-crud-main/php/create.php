<?php 

if (isset($_POST['create'])) {
	include "../db_conn.php";
	function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

	$name = validate($_POST['name']);
	$comment = validate($_POST['comment']);

	$user_data = 'name='.$name. '&comment='.$comment;

	if (empty($name)) {
		header("Location: ../index.php?error=Name is required&$user_data");
	}else if (empty($comment)) {
		header("Location: ../index.php?error=Comment is required&$user_data");
	}else {

       $sql = "INSERT INTO users(name, comment) 
               VALUES('$name', '$comment')";
       $result = mysqli_query($conn, $sql);
       if ($result) {
       	  header("Location: ../read.php?success=successfully created");
       }else {
          header("Location: ../index.php?error=unknown error occurred&$user_data");
       }
	}

}