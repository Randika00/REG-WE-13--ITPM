<?php
include "config.php";

    	if (isset($_POST['update'])) {
			$ordrtype = $_POST['ordrtype'];
			$user_id = $_POST['id'];
			$name = $_POST['name'];
			$mnumber = $_POST['mnumber'];
			$qty = $_POST['qty'];
			$price = $_POST['price'];

			// update
			$sql = "UPDATE `ordadd` SET `ordrtype`='$ordrtype',`name`='$name',`mnumber`='$mnumber',`qty`='$qty',`price`='$price' WHERE `id`='$user_id'";
			// execute the query
			$result = $conn->query($sql);

			if ($result == TRUE) {
				header('Location: ordView.php');
			}else{
				echo "Error:" . $sql . "<br>" . $conn->error;
			}
		}
		
		if (isset($_GET['id'])) {
			$user_id = $_GET['id'];
			// get user data
			$sql = "SELECT * FROM `ordadd` WHERE `id`='$user_id'";
			// execute the sql
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					$ordrtype = $row['ordrtype'];
					$name = $row['name'];
					$mnumber = $row['mnumber'];
					$qty = $row['qty'];
					$price = $row['price'];
					$id = $row['id'];
				}
	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title></title>
</head>
<body>
    <div class="container" align="center">
    <h1 class="fs-3 mt-5" align="left">Update Order Details</h1>
    <div class="card" style="width: 68rem;">
    <div class="card-body">
    <form action="" method="POST" class="mt-5">
    <div class="mb-3" align="left">
        <label for="exampleInputEmail1" class="form-label">Order Type:</label>
        <input type="text" class="form-control"  name="ordrtype" value="<?php echo $ordrtype; ?>" required>
		<input type="hidden" name="id" value="<?php echo $user_id; ?>">
    </div>
    <div class="mb-3" align="left">
        <label for="exampleInputPassword1" class="form-label">Name</label>
        <input type="text" class="form-control"  name="name" value="<?php echo $name; ?>" required>
    </div>
    <div class="mb-3" align="left">
        <label for="exampleInputPassword1" class="form-label">Mobile Number</label>
        <input type="mobile" maxlength="10" minlength="10" class="form-control"  name="mnumber" value="<?php echo $mnumber; ?>" required>
    </div>
    <div class="mb-3" align="left">
        <label for="exampleInputPassword1" class="form-label">Qty:</label>
        <input type="number" class="form-control"  name="qty" value="<?php echo $qty; ?>" required>
    </div>
    <div class="mb-3" align="left">
        <label for="exampleInputPassword1" class="form-label">Price:</label>
        <input type="price" class="form-control"  name="price" value="<?php echo $price; ?>" required>
    </div>
    <div align="left">
	<input type="submit" class="btn btn-primary" value="Update" name="update">
    </div>
    </form>
    </div>
    </div>
    </div>
	
	</body>
</html>

<?php
	} 
	else{
		// If the 'id' value is not valid, redirect the user back to read.php page
		header('Location: read.php');
	}
}
?>