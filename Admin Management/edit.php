<?php

require_once "conn.php";

if(isset($_POST['update'])){

    $eid =$_GET['editid'];

    $fname =$_POST['firstname'];
    $lname =$_POST['lastname'];
    $fname =$_POST['firstname'];
    $mobilenumber =$_POST['mobilenumber'];
    $email =$_POST['email'];
    $address =$_POST['address'];

    $sql =mysqli_query($conn,"UPDATE momentsadmin SET firstname='$fname', lastname='$lname',mobilenumber='$mobilenumber',email='$email',address='$address' WHERE id='$eid'");
    if($sql){
        echo "<script>alert('You have successfully updated employee details!');</script>";
        echo "<script>document.location='index.php';</script>";
    }else{
        echo "<script>alert('Somethin went wrong!!!');</script>";
    }
}

?>
<html>
<head>
<title>Add New Employee</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css"rel="stylesheet">
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script scr="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap.min.css"rel="stylesheet"/>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>update Employee Details</h2>
            </div>
        </div>
        <form method="POST">
            <?php
            
                $eid =$_GET['editid'];
                $sql=mysqli_query($conn,"SELECT * FROM momentsadmin WHERE id='$eid'");
                while($row=mysqli_fetch_array($sql)){
            ?>
            <div class="row">
                <div class="col-md-6">
                    <label>First Name</label>
                    <input type="text" name="firstname" value="<?php echo $row['firstname'];?>" class="form-control" placeholder="Enter First Name" required>
                </div>
                
                <div class="col-md-6">
                <label>Last Name</label>
                    <input type="text" name="lastname" value="<?php echo $row['lastname'];?>" class="form-control" placeholder="Enter Last Name" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label>Mobile Number</label>
                    <input type="text" name="mobilenumber" value="<?php echo $row['mobilenumber'];?>" class="form-control" placeholder="Enter Mobile Number" required>
                </div>
                </div>

                <div class="row">
                <div class="col-md-6">
                <label>Email</label>
                    <input type="text" name="email" value="<?php echo $row['email'];?>" class="form-control" placeholder="Enter email" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                <label>Address</label>
                    <input type="text" name="address" value="<?php echo $row['address'];?>" class="form-control" placeholder="Enter address" required>
                </div>
            </div>
            
            <?php }?>
            <div class="row" style="margin-top:1%">
                <div class="col-md-6">
                    <button type="text" name="update" class="btn btn-primary">Submit</button>
                    <a href="index.php" class="btn btn-success">View Record</a>
            </div>
            </div>
        </form>
    </div>
</body>
</head>
</html>