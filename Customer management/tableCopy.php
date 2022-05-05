<?php
include 'cusdbconnection.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>All</title>
  </head>
  <body>
</br></br></br>
    
    <div class="container my-5">
    
    <div class="row">
        <div class="col-md-7">
            <form action="" method="GET">
            <div class="input-group mb-3">
                <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; }  ?>" class="form-control" placeholder="Search">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>
        <button class="btn btn-success justify-content-md-end" onclick="window.location.href ='pdfCusreport.php';" type="button">Generate PDF</button>
        
        </div>
    </div>

    
        <div class="my-3">
        <table class="table table-hover">
        <thead>
        <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Mobile</th>
        <th>NIC</th>
        <th>Address</th>
        <th>Operation</th>
        </tr>
        </thead>
        <tbody>
        <?php
            if(!(isset($_GET['search']))){
                $sql = "SELECT * FROM `cusregister`";
                $result = mysqli_query($con,$sql);
                
                if($result){
                    while($row = mysqli_fetch_assoc($result)){
                        $id = $row['cusId'];
                        $name = $row['Name'];
                        $nic = $row['NIC'];
                        $email = $row['Email'];
                        $mobile = $row['contactNum'];
                        $address = $row['Address'];

                        echo '<tr>
                        <td>'.$id.'</td>
                        <td>'.$name.'</td>
                        <td>'.$email.'</td>
                        <td>'.$mobile.'</td>
                        <td>'.$nic.'</td>
                        <td>'.$address.'</td>
                        <td>
                        <button type="button" onclick="deleteUser('.$id.')" class="btn btn-danger">Delete</button>
                        </td>
                        </tr>';

                    }
                }
            }
            
        ?>
        <script type="text/javascript">
            function deleteUser(cusId) {
                let text1 = "Are you sure do you want to delete this user?";
                if (confirm(text1) == true) {
                    var url = "customerAdminDelete2.php?id=" +cusId;
                    window.location.href = url;
                }
            };
        </script>

<?php 

    if(isset($_GET['search']))
    {
        $filtervalues = $_GET['search'];
        $query = "SELECT * FROM cusregister WHERE CONCAT(cusId,Name,Email,contactNum,NIC,Address) LIKE '%$filtervalues%' ";
        $query_run = mysqli_query($con, $query);

        if(mysqli_num_rows($query_run) > 0)
        {
            foreach($query_run as $items)
            {
                $id = $items['cusId'];
                $name = $items['Name'];
                $nic = $items['NIC'];
                $email = $items['Email'];
                $mobile = $items['contactNum'];
                $address = $items['Address'];
                ?>
                    <td><?= $id; ?></td>
                    <td><?= $name; ?></td>
                    <td><?= $email; ?></td>
                    <td><?= $mobile; ?></td>
                    <td><?= $nic; ?></td>
                    <td><?= $address; ?></td>
                    <td>
                        <button type="button" onclick="deleteUser('.$id.')" class="btn btn-danger">Delete</button>
                    </td>
                </tr>
                <?php
            }
        }
        else
        {
            ?>
                <tr>
                    <td colspan="4">No Record Found</td>
                </tr>
            <?php
        }
    }
?>

        </tbody>
        </table>
        </div>
      </div>
      <nav class="navbar navbar-light bg-light fixed-top">
          <div class="container-fluid">
          <!--<div class = "logo"> a href = "#">img src = "logo.png"></a>-->
            <a class="navbar-brand" href="#" style="color:purple; font-size: 25px;">moments.lk</a>
              <table class="align-text-bottom">
                <tr>
                  <td><a class="navbar-brand" href="../IT20244798/Adminhome.php" style="font-size: 17px;">Home</a></td>
                  <td><a class="navbar-brand" href="../IT20244798/employee.php" style="font-size: 17px;">Add New Employee</a></td>
                  <td><a class="navbar-brand" href="../IT20244798/index.php" style="font-size: 17px;">Employee List</a></td>
                  <td><a class="navbar-brand" href="../it20161460/ordView.php" style="font-size: 17px;">Order Details</a></td>
                  <td><a class="navbar-brand" href="#" style="font-size: 17px;">Customer List</a></td>
                  <td><a class="navbar-brand" href="../feedback/r.php" style="font-size: 17px;">Review</a></td>
                </tr>
              </table>
          </div>
        </nav>
        
  </body>
</html>