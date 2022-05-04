<?php
include 'cusdbconnection.php';

$uid = $_GET['id'];
$uname = $_GET['name'];
$uemail = $_GET['email'];
$umobile = $_GET['mobile'];
$unic = $_GET['nic'];
$uaddress = $_GET['address'];

if(isset($_POST['updateUser'])){

    $uNname = $_POST['nameU'];
    $uNemail = $_POST['emailU'];
    $uNmobile = $_POST['mobileU'];
    $uNnic = $_POST['nicU'];
    $uNaddress = $_POST['addressU'];

    $sql = "UPDATE `cusregister` SET `Name`='$uNname',`Address`='$uNaddress',`NIC`='$uNnic',`Email`='$uNemail',`contactNum`='$uNmobile' WHERE `cusId`='$uid'";

    $result = mysqli_query($con,$sql);

    if($result){
        header ('location:home.php?userID='.$uid.'&toast=""');
    }else{
        echo "Failed";
    }
}


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>moments.lk</title>
  </head>
  <body>

  <nav class="navbar navbar-light bg-light fixed-top">
          <div class="container-fluid">
          <!--<div class = "logo"> a href = "#">img src = "logo.png"></a>-->
            <a class="navbar-brand" href="#" style="color:purple; font-size: 25px;">moments.lk</a>
              <table class="align-text-bottom">
                <tr>
                  <td><a class="navbar-brand" href="http://localhost/ITPM/IT20237622/home.php?userID=47" style="font-size: 17px;">Home</a></td>
                  <td><a class="navbar-brand" href="#" style="font-size: 17px;">Order</a></td>
                  <td><a class="navbar-brand" href="#" style="font-size: 17px;">Review</a></td>
                  <td><a class="navbar-brand" href="#" style="font-size: 17px;">About Us</a></td>
                  <td>
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                          <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                          <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                      </svg>
                    </button>
                  </td>
                </tr>
              </table>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
              <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">My profile</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
              </div>
              <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                  <div class="container">
                  <img src="https://icons-for-free.com/iconfiles/png/512/person+profile+user+icon-1320184051308863170.png" width="200" height="200">
                  </div>
                  <li class="nav-item">
                    <?php
                      $sql = "SELECT * FROM `cusregister` WHERE cusId = '$uid'";
                      $result = mysqli_query($con, $sql);

                      if($result){
                        while($row= mysqli_fetch_assoc($result)){
                          $cusId = $row['cusId'];
                          $name = $row['Name'];
                          $Address = $row['Address'];
                          $NIC = $row['NIC'];
                          $Email = $row['Email'];
                          $contactNum = $row['contactNum'];

                          echo
                          '<h3>'.$name.'</h3>
                          </li>
                          <li class="nav-item">
                            <a href="#">'.$Email.'</a>
                          </li>
                          <hr>
                          <li class="nav-item">
                            NIC : '.$NIC.' 
                          </li>
                          <li class="nav-item">
                            Customer ID : '.$cusId.' 
                          </li>
                          <li class="nav-item">
                            Contact number : '.$contactNum.' 
                          </li>
                          <li class="nav-item">
                            Address : '.$Address.' 
                          </li>
                          ';
                        }
                      }
                    ?>
                  <hr>
                  <button type="button" class="btn btn-success" disabled data-bs-toggle="button" autocomplete="off"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box" viewBox="0 0 16 16">
                    <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5 8 5.961 14.154 3.5 8.186 1.113zM15 4.239l-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
                  </svg> &nbsp; My Activity</button>
                  <table>
                    <tr>
                      <td>
                        &nbsp;
                      </td>
                    </tr>
                    <tr>
                      <td>
                        &nbsp;
                        &nbsp;
                        <?php
                        echo '
                        <a href="updateUser.php?id='.$cusId.'&name='.$name.'&email='.$Email.'&mobile='.$contactNum.'&nic='.$NIC.'&address='.$Address.'">
                          <button type="submit" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                          </svg> &nbsp; Edit Account</button>
                        </a>
                        <button onclick="deleteUser('.$cusId.')" type="submit" name="deleteUser" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                          <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                          <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg> &nbsp; Delete Account</button>
                        ';
                        ?>
                        <script type="text/javascript">
                            function deleteUser(cusId) {
                              let text1 = "Are you sure do you want to delete your account?";
                              let text2 = "Your data will permanently deleted!!!";
                              if (confirm(text1) == true) {
                                if (confirm(text2) == true) {
                                  var url = "deleteUser.php?id=" +cusId;
                                  window.location.href = url;
                                }
                              }
                            };
                        </script>

                      </td>
                    </tr>
                  </table>
                </ul>

              </div>
            </div>
          </div>
        </nav>

    </br></br></br>
  <div class="card" style="width: 630px; margin: auto">
  </br>
  <h5 class="card-title fw-bold fs-1" style="margin: auto">Update user</h5>
  <duv class="container">
    </br>
    <form method="post">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label fw-bold">User ID</label>
        <input type="text" class="form-control" id="exampleInputEmail1" style="width: 600px" value="<?php echo $uid ?>">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label fw-bold">Name</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="nameU" style="width: 600px" value="<?php echo $uname ?>">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label fw-bold">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="emailU" style="width: 600px" value="<?php echo $uemail ?>">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label fw-bold">NIC</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="nicU" style="width: 600px" value="<?php echo $unic ?>">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label fw-bold">Contact number</label>
        <input type="tel" class="form-control" id="exampleInputEmail1" name="mobileU" style="width: 600px" value="<?php echo $umobile ?>">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label fw-bold">Address</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="addressU" style="width: 600px" value="<?php echo $uaddress ?>">
    </div>
    </br>
    <button type="submit" name="updateUser" class="btn btn-primary col-6" style="margin: auto">Update</button>
    </form>
    </br></br>
</div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>