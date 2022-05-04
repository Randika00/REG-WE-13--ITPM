<?php


    require_once "conn.php";

    if(isset($_POST['submit'])){

        $fname=$_POST['firstname'];
        $lname=$_POST['lastname'];
        $mobilenumber=$_POST['mobilenumber'];
        $email=$_POST['email'];
        $address=$_POST['address'];
        $empid=$_POST['empid'];
      
      $sql = mysqli_query($conn,"INSERT INTO momentsadmin(firstname,lastname,mobilenumber,email,address,empid)VALUES('$fname','$lname','$mobilenumber','$email','$address','$empid')");

    if($sql){
        echo "<script>alert('New record successfully added !!!');</script>";
        echo "<script>document.location='employee.php';</script>";
    }else{
        echo "<script>alert('Somthing went worng!!!');</script>";
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

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--<link rel="stylesheet" href="../css1/homeCSS.css">-->
</head>
<body>
<div class="login-wrap">
	  <div class="login-html">
<nav class="navbar navbar-light bg-light fixed-top">
          <div class="container-fluid">
          <!--<div class = "logo"> a href = "#">img src = "logo.png"></a>-->
            <a class="navbar-brand" href="#" style="color:purple; font-size: 25px; text-align: left;">moments.lk</a>
              <table class="align-text-bottom">
                <tr>
                  <td><a class="navbar-brand" href="Adminhome.php" style="font-size: 17px;">Home</a></td>
                  <td><a class="navbar-brand" href="employee.php" style="font-size: 17px;">Add New Employee</a></td>
                  <td><a class="navbar-brand" href="index.php" style="font-size: 17px;">Employee List</a></td>
                  <td><a class="navbar-brand" href="#" style="font-size: 17px;">Order Details</a></td>
                  <td><a class="navbar-brand" href="#" style="font-size: 17px;">Customer List</a></td>
                  <td><a class="navbar-brand" href="#" style="font-size: 17px;">Review</Details></a></td>
                
                </tr>
              </table>
          </div>
        </nav>
</br></br></br></br></br></br>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Add New Employee</h2>
            </div>
        </div>
        <form method="POST">
            <div class="row">
                <div class="col-md-6">
                    <label>First Name</label>
                    <input type="text" name="firstname" class="form-control" placeholder="Enter First Name" required>
                </div>
                
                <div class="col-md-6">
                <label>Last Name</label>
                    <input type="text" name="lastname" class="form-control" placeholder="Enter Last Name" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label>Mobile Number</label>
                    <input type="text" name="mobilenumber" class="form-control" placeholder="Enter Mobile Number" pattern="[0]{1}{7}{1}[0-9]{8}" required>
                </div>
                </div>

                <div class="row">
                <div class="col-md-6">
                <label>Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Enter email" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                <label>Address</label>
                    <input type="text" name="address" class="form-control" placeholder="Enter address" required>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                <label>Emp ID</label>
                    <input type="text" name="empid" class="form-control" placeholder="Enter Emp ID" required>
                </div>
            </div>

            <div class="row" style="margin-top:1%">
                <div class="col-md-6">
                    <button type="text" name="submit" class="btn btn-primary">Submit</button>
                    <a href="index.php" class="btn btn-success">View Record</a>
            </div>
            </div>
        </form>
    </div>
</body>
</head>
</html>