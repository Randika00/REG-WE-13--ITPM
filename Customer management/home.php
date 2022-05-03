<?php
include 'cusdbconnection.php';

$uid = $_GET['userID'];

if(isset($_POST['deleteUser'])){
	header('location:deleteUser.php?id='.$uid);
}

if(isset($_GET['toast'])){
 echo '<script language="javascript">alert("Successfuly updated!");</script>';
}

?>

<!doctype html>
<html lang="en">
  <head>
    <style>
      body{
        margin:0;
        color:#6a6f8c;
        background:#c8c8c8;
        font:600 16px/18px 'Open Sans',sans-serif;
      }
      *,:after,:before{box-sizing:border-box}
      .clearfix:after,.clearfix:before{content:'';display:table}
      .clearfix:after{clear:both;display:block}
      a{color:inherit;text-decoration:none}

      .login-wrap{
        width:100%;
        margin:auto;
        max-width:100%;
        min-height:770px;
        position:relative;
        background:url(https://images4.alphacoders.com/255/thumb-1920-255596.jpg) no-repeat center;
        box-shadow:0 12px 15px 0 rgba(0,0,0,.24),0 17px 50px 0 rgba(0,0,0,.19);
      }
      .login-html{
        width:100%;
        height:100%;
        position:absolute;
        padding:90px 70px 50px 70px;
        background:rgba(114, 80, 122, 0.9);
      }
      *,
      *::before,
      *::after {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }


      /* other */
      .info {
        margin: 20px 0;
        text-align: center;
      }

      p {
        color: #2e2e2e;
        margin-bottom: 20px;
      }


      /* block-$ */
      .block-effect {
        font-size: calc(8px + 6vw);
      }

      .block-reveal {
        --t: calc(var(--td) + var(--d));

        color: transparent;
        padding: 4px;

        position: relative;
        overflow: hidden;

        animation: revealBlock 0s var(--t) forwards;
      }

      .block-reveal::after {
        content: '';

        width: 0%;
        height: 100%;
        padding-bottom: 4px;

        position: absolute;
        top: 0;
        left: 0;

        background: var(--bc);
        animation: revealingIn var(--td) var(--d) forwards, revealingOut var(--td) var(--t) forwards;
      }


      /* animations */
      @keyframes revealBlock {
        100% {
          color: #ffffff;
        }
      }

      @keyframes revealingIn {

        0% {
          width: 0;
        }

        100% {
          width: 100%;
        }
      }

      @keyframes revealingOut {

        0% {
          transform: translateX(0);
        }

        100% {
          transform: translateX(100%);
        }

      }

      .abs-site-link {
        position: fixed;
        bottom: 20px;
        left: 20px;
        color: hsla(0, 0%, 0%, .6);
        font-size: 16px;
      }

      .right {
        position: absolute;
        right: 0px;
        width: 400px;
        padding: 10px;
      }
    </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--<link rel="stylesheet" href="../css1/homeCSS.css">-->
    <title>Moments.lk</title>
  </head>
  <body>
  <div class="login-wrap">
	  <div class="login-html">
      <!--<div class = "logo"> a href = "#">img src = "logo.png"></a>-->
        <nav class="navbar navbar-light bg-light fixed-top">
          <div class="container-fluid">
          <!--<div class = "logo"> a href = "#">img src = "logo.png"></a>-->
            <a class="navbar-brand" href="#" style="color:purple; font-size: 25px;">moments.lk</a>
              <table class="align-text-bottom">
                <tr>
                  <td><a class="navbar-brand" href="#" style="font-size: 17px;">Home</a></td>
                  <td><a class="navbar-brand" href="../it20161460/ordAdd.php" style="font-size: 17px;">Order</a></td>
                  <td><a class="navbar-brand" href="../feedback/r.php" style="font-size: 17px;">Review</a></td>
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
        <script>
        </script>
        <div class="container" style="padding: 30px;">
          <div class="row">
            <div class="row">
              <p class="w-75 p-3" style="color: white; opacity: 0.7;">
                Color photography started to become popular and accessible with the release of Eastman Kodak’s “Kodachrome” film in the 1930s. Before that, almost all photos were monochromatic – although a handful of photographers, toeing the line between chemists and alchemists, had been using specialized techniques to capture color images for decades before.
                You’ll find some fascinating galleries of photos from the 1800s or early 1900s captured in full color, worth exploring if you have not seen them already.
                These scientist-magicians, the first color photographers, are hardly alone in pushing the boundaries of one of the world’s newest art forms. The history of photography has always been a history of people – artists and inventors who steered the field into the modern era.
              </p>
            </div>
            <div class="row">
              <p class="w-50 p-3" style="color: white; opacity: 0.7;">
                So, below, you’ll find a brief introduction to some of photography’s most important names. Their discoveries, creations, ideas, and photographs shape our own pictures to this day, subtly or not. Although this is just a brief bird’s-eye view, these nonetheless are people you should know before you step into the technical side of photography:
              </p>
            </div>
          </div>
          <div class="row align-items-end">
            <div class="row">
              <h4 class="block-effect" style="--td: 1.2s">
                <div class="block-reveal" style="--bc: #ffffff; --d: .1s; font-size: 70px;">We capture</div>
                <div class="block-reveal" style="--bc: #ffffff; --d: .5s; font-size: 70px;">your memories forever...</div>
              </h4>
            </div>
          </div>
          <div class="right">
            <a
            class="btn btn-link btn-floating btn-lg text-dark m-1"
            href="#!"
            role="button"
            data-mdb-ripple-color="dark"
            ><svg xmlns="http://www.w3.org/2000/svg" style="color: white;" width="16" height="16" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
                <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
              </svg>
            </a>
            <a
              class="btn btn-link btn-floating btn-lg text-dark m-1"
              href="#!"
              role="button"
              data-mdb-ripple-color="dark"
              ><svg xmlns="http://www.w3.org/2000/svg" style="color: white;" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                  <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                </svg>
            </a>
            <a
              class="btn btn-link btn-floating btn-lg text-dark m-1"
              href="#!"
              role="button"
              data-mdb-ripple-color="dark"
              ><svg xmlns="http://www.w3.org/2000/svg" style="color: white;" width="16" height="16" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                  <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                </svg>
            </a>
            <a
              class="btn btn-link btn-floating btn-lg text-dark m-1"
              href="#!"
              role="button"
              data-mdb-ripple-color="dark"
              ><svg xmlns="http://www.w3.org/2000/svg" style="color: white;" width="16" height="16" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                  <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z"/>
                </svg>
            </a>
            <a
              class="btn btn-link btn-floating btn-lg text-dark m-1"
              href="#!"
              role="button"
              data-mdb-ripple-color="dark"
              ><svg xmlns="http://www.w3.org/2000/svg" style="color: white;" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                  <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                </svg>
            </a>
            <a
              class="btn btn-link btn-floating btn-lg text-dark m-1"
              href="#!"
              role="button"
              data-mdb-ripple-color="dark"
              ><svg xmlns="http://www.w3.org/2000/svg" style="color: white;" width="16" height="16" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                  <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/>
                </svg>
            </a>
          </div>
        </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </div>
  </div>
  </body>
</html>