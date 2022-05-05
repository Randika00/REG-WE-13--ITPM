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
      <div class="container my-5">

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
            
        ?>
        <script type="text/javascript">
            function deleteUser(cusId) {
                let text1 = "Are you sure do you want to delete this user?";
                if (confirm(text1) == true) {
                    var url = "customerAdminDelete.php?id=" +cusId;
                    window.location.href = url;
                }
            };
        </script>
        </tbody>
        </table>
        </div>
      </div>
  </body>
</html>