<?php
    include "config.php";

        if (isset($_POST['submit'])) {
            $ordrtype = $_POST['ordrtype'];
            $name = $_POST['name'];
            $mnumber = $_POST['mnumber'];
            $qty = $_POST['qty'];
            $price = $_POST['price'];

        //write sql query
        $sql = "INSERT INTO `ordadd`(`ordrtype`, `name`, `mnumber`, `qty`, `price`) VALUES ('$ordrtype','$name','$mnumber','$qty','$price')";
        //execute the query 
        $result = $conn->query($sql);
        if ($result == TRUE) {
            header('location:ordView.php');
        }else{
            echo "Error:" . $sql . "<br>" . $conn->error;
        }
        $conn->close();
        }
?>
<!-- <form action="" method="POST"> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- <link rel="stylesheet" type="text/css"  href="css/add.css"> -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title></title>
</head>
<body>
    <div class="container" align="center">
    <h1 class="fs-3 mt-5" align="left">Orders +New Orders</h1>
    <div class="card" style="width: 70rem;">
    <div class="card-body">
    <form action="" method="POST" class="mt-5">
    <div class="mb-3" align="left">
        <label for="exampleInputPassword1" class="form-label">Customer Id:</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="cusid" required>
    </div>
    <div class="mb-3" align="left">
        <label for="exampleInputEmail1" class="form-label">Order Type:</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="ordrtype" required>
    </div>
    <div class="mb-3" align="left">
        <label for="exampleInputPassword1" class="form-label">Name:</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="name" required>
    </div>
    <div class="mb-3" align="left">
        <label for="exampleInputPassword1" class="form-label">Mobile Number:</label>
        <input type="mobile" class="form-control" maxlength="10" minlength="10" id="exampleInputPassword1" name="mnumber" required>
    </div>
    <div class="mb-3" align="left">
        <label for="exampleInputPassword1" class="form-label">Qty:</label>
        <input type="number" class="form-control" id="exampleInputPassword1" name="qty" required>
    </div>
    <div class="mb-3" align="left">
        <label for="exampleInputPassword1" class="form-label">Price:</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="price" required>
    </div>
    <div align="left">
    <button type="submit" class="btn btn-primary"  name="submit" value="Add">Submit</button>
    <button type="reset" class="btn btn-danger">Reset</button>
    </div>
    </form>
    </div>
    </div>
    </div>
    <!-- <form action="" method="POST">
       <div class="container">
                   
            <div class="field name">
            Order Type:
            </div> 
            <div class="w-50">
            <input type="text" class="form-control"  name="ordrtype" required></div>

            
            Name:<br> 
            <div class="w-50">
            <input type="text" class="form-control"  name="name" required></div>

            
            Mobile Number:<br> 
            <div class="w-50">
            <input type="tel" maxlength="10" minlength="10" class="form-control" name="mnumber" required></div>   

            
            Qty:<br> 
            <div class="w-50">
            <input type="number" class="form-control"  name="qty" required></div>    

            
            Price:<br> 
            <div class="w-50">
            <input type="text" class="form-control" name="price" required></div>

                <input type="submit" class="btn btn-primary-submit"  name="submit" value="Add">
                <input type="reset" class="btn btn-primary-reset"  name="reset" value="Reset">
        </div>
    </form> -->

    <!-- <input type="submit" class="btn btn-primary-submit"  name="submit" value="Add">
                <input type="reset" class="btn btn-primary-reset"  name="reset" value="Reset"> -->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
<html>
    