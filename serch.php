

<?php
$connect=mysqli_connect('localhost','root','','phphotel') or die("Could not connect");
//$userquery=mysqli_query($connect,"SELECT * FROM user_reg") or die("Could not connect database");

if(isset($_POST['serch'])){
	$searchq=$_POST['serch'];
	//print_r ($searchq);
	$query=mysqli_query($connect,"SELECT * FROM user_reg WHERE phone LIKE $searchq") or die("Could not search");
	//print_r ($query);
				
			$value=mysqli_fetch_array($query);
				echo $value['serial_no']; 
		        echo $value['room']; 
				echo $value['price']; 
				echo $value['name']; 
				echo $value['phone']; 
				echo $value['email']; 
				echo $value['passport_nid']; 
				echo $value['img']; 
				echo $value['address']; 
				echo $value['purpose']; 
				echo $value['date'];
				echo $value['time'];
		}

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

	
	
	
	<form action="serch.php" method="post">
		<input type="tel" name="serch" placeholder="Search number" />
		<input type="submit" value="Leave"/>
	
	</form>
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
	
</table>
	
	
	
	<h1>Total cost </h1>
	<?php
	
	//total cost
	
	$date1=date_create($value['date']);
	$date2= date_create(date('Y-m-d'));
	//echo $date1;
	echo nl2br("\r\n");
	//echo $date2 ;
	echo nl2br("\r\n");
	$interval = date_diff($date1, $date2);
	
	$num=$interval->format('%R%a days');
	echo $num;
	echo nl2br("\r\n");
	
	if($num==0){
		//same day leave
		echo $value['price'];
	}
	else{
	echo nl2br("\r\n");
	$price=$value['price'];
	$tprice=$price*$num;
	echo $tprice;
	}
	
	echo nl2br("\r\n");
	?>

	
</div>	

	
</body>
</html>




	