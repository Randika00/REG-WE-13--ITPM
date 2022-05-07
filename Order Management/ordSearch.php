<?php

$servername = "localhost:3308";
    $username = "root";
    $password = "";
    $dbname = "moments";

	// Create connection
	$conn = mysqli_connect($servername, $username,$password, $dbname );
	$sql = "SELECT * FROM ordadd WHERE name LIKE '%".$_POST['name']."%'";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result)>0){
		while ($row=mysqli_fetch_assoc($result)) {
			echo "	<tr>
						<td>".$row['id']."</td>
						<td>".$row['cusid']."</td>
						<td>".$row['ordrtype']."</td>
						<td>".$row['name']."</td>
						<td>".$row['mnumber']."</td>
						<td>".$row['qty']."</td>
						<td>".$row['price']."</td>
					</tr>";
		}
	}
	
	else{
		echo "<td>No result's found</td>";
	}

?>
