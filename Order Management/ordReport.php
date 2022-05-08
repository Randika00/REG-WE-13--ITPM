<?php 
include "config.php";

    //get data from users table
    $sql = "SELECT * FROM ordadd";
    //execute the query
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Page</title>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->

    <meta charset="utf-8">
    <meta name="searchport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <style type="text/css" media="print">
        @media print{
            .btn-lg, .btn-lg *{
                display: none !important;
            }
            #search, #search *{
                display: none !important;
            }
            .btn-outline-primary{
                display: none !important;
            }
            h1{
                display: none !important;
            }
        }
    </style>
</head>

<body>

<div class="container mt-5">


<h1 class="fs-2 mt-5">Search Order Details</h1>
<h4 class=" mt-2">View Report</h4>
<div class="input-group" style="margin:30px 0px 60px 0px; width:30%; float:right">
  <input type="search" id="search"class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
  <button type="button" class="btn btn-outline-primary">search</button>
</div>


      
            <table class="table table-hover mt-5">
            
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Customer Id</th>
                        <th>Order Type</th>
                        <th>Name</th>
                        <th>Mobile Number</th>
                        <th>Qty</th>
                        <th>Price</th>
                    </tr>
                </thead>

                <tbody id="output">
                    <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                    ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['cusid']; ?></td>
                                <td><?php echo $row['ordrtype']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['mnumber']; ?></td>
                                <td><?php echo $row['qty']; ?></td>
                                <td><?php echo $row['price']; ?></td>
                            </tr>

                    <?php     
                            }   
                        }
                    ?>
                </tbody>
            </table>
            <br><br>
            <button onclick="window.print()" class="btn btn-primary btn-lg" style="float:right;">Download
            </button>    
        </div>

       
             <script type="text/javascript">
                $(document).ready(function(){
                    $("#search").keypress(function(){
                        $.ajax({
                            type:'POST',
                            url:'ordSearch.php',
                            data:{
                            name:$("#search").val(),
                            },
                            success:function(data){
                            $("#output").html(data);
                            }
                        });
                    });
                });
            </script> 
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
    
</html>