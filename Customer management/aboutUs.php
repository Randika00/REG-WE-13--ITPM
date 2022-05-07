
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
                  <td><a class="navbar-brand" href="../it20161460/ordAdd.php?id=<?php echo $uid ?>" style="font-size: 17px;">Order</a></td>
                  <td><a class="navbar-brand" href="feedback/r.php" style="font-size: 17px;">Review</a></td>
                  <td><a class="navbar-brand" href="#" style="font-size: 17px;">About Us</a></td>
                
                </tr>
              </table>
          </div>
        </nav>
        <script>
        </script>
        <div class="container" style="padding: 30px;">
          <div class="row">
            <div class="row">
              <p class="w-75 p-3" style="color: white; opacity: 0.7;">
                
              </p>
            </div>
            <div class="row">
              <p class="w-50 p-3" style="color: white; opacity: 0.7;">
              
              </p>
            </div>
          </div>
          <div class="row align-items-end">
            <div class="row">
  <div class="container" style="color: white; padding: 10px;">
  <h1>About us</h1>
          <div class="row">
            <div class="row">
              <p class="w-75 p-3" style="color: white; opacity: 0.7;">
                Color photography started to become popular and accessible with the release of Eastman Kodak’s “Kodachrome” film in the 1930s. Before that, almost all photos were monochromatic – although a handful of photographers, toeing the line between chemists and alchemists, had been using specialized techniques to capture color images for decades before.
                You’ll find some fascinating galleries of photos from the 1800s or early 1900s captured in full color, worth exploring if you have not seen them already.
              </p>
  
  

</div>
   
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </div>
  </div>
  </body>
</html>