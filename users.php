<?php
date_default_timezone_set('Asia/Dhaka');

$date=date('l, jS F h:i A');
  
  echo "<h1>$date</h1>"; 
?>


<?php
$connect=mysqli_connect('localhost','root','','phphotel');

$userquery=mysqli_query($connect,"SELECT * FROM user_reg");
//print_r($userquery);
//$queryfetch=mysqli_fetch_assoc($userquery); //if only what to show one row
$queryfetch=mysqli_fetch_all($userquery,MYSQLI_ASSOC);//for all row
//print_r($queryfetch);

?>

<!DOCTYPE HTML>
<html lang="en-US">
 <head>
 	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" media="all" />
 	<title></title>
 </head>
<body>

<div class="container">	
	<form action="user_reg.php" method="post">
		<button   type="submit"    class="btn btn-primary">Guest Registration</button>
	</form>
	<form action="users.php" method="post">
		<button   type="submit"  class="btn btn-primary">Guests</button>
	</form>
	<form action="serch.php" method="post">
		<button   type="submit" class="btn btn-primary">Guest Status</button>
	</form>
	<form action="login.php" method="post">
		<button   type="submit" class="btn btn-primary">Logout</button>
	</form>
</div>





	<table class="table table-bordered table-hover">
		<tr>
		<th>Serial</th>
		<th>Room</th>
		<th>Price</th>
		<th>Name</th>
		<th>Phone</th>
		<th>Email</th>
		<th>Passport/NID</th>
		<th>Image</th>
		<th>Address</th>
		<th>Purpose</th>
		<th>Date</th>
		<th>Time</th>
		</tr>
	
	<?php
		foreach($queryfetch as $value){
			#echo $value['fast_name'];
	?>
	
	
	<tr>
		<td><?php echo $value['serial_no']; ?></td>
		<td><?php echo $value['room']; ?></td>
		<td><?php echo $value['price']; ?></td>
		<td><?php echo $value['name']; ?></td>
		<td><?php echo $value['phone']; ?></td>
		<td><?php echo $value['email']; ?></td>
		<td><?php echo $value['passport_nid']; ?></td>
		<td><?php echo $value['img']; ?></td>
		<td><?php echo $value['address']; ?></td>
		<td><?php echo $value['purpose']; ?></td>
		<td><?php echo $value['date']; ?></td>
		<td><?php echo $value['time']; ?></td>
		
		
	</tr>
	
	
	<?php
	
	
		}

	?>
	
	</table>
	
	
	
</body>
</html>

