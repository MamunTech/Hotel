<?php
$connect=mysqli_connect('localhost','root','','phphotel');

if(isset($_POST['reg_submit'])){
	$room=$_POST['room'];
	$price=$_POST['price'];
	$name=$_POST['name'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$passport_nid=$_POST['passport_nid'];
	$address=$_POST['address'];
	$purpose=$_POST['purpose'];
	$in_date=$_POST['in_date'];
	$in_time=$_POST['in_time'];
	$status=$_POST['status'];
	
	
	$reg_insert=mysqli_query($connect,"INSERT INTO user_reg (room,price,name,phone,email,passport_nid,address,purpose,in_date,in_time,status) VALUES ('$room','$price','$name','$phone','$email','$passport_nid','$address','$purpose','$in_date','$in_time','$status')");
	if($reg_insert){
		$usersuccess='Your registration has been successful';
	}
	else{
		$usersuccess='Data not inserted';
	}
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
</div>



	<div class="container">
	<h1>Registration form for Hotel Guest </h1>
	
	<form action="" method="post">
	
			<?php 
				if(isset($usersuccess)){
					
					echo "<h2 class='bg-success'>$usersuccess</h2>";
				}
			?>
	
	
		<div class="form-group">
			<lable>Rooom</lable>
			<input type="text" name="room" class="form-control" required />
		</div>
		<div class="form-group">
			<lable>Price</lable>
			<input type="tel" name="price" class="form-control" required />
		</div>
		<div class="form-group">
			<lable>Name</lable>
			<input type="text" name="name" class="form-control" required />
		</div>
		<div class="form-group">
			<lable>Phone</lable>
			<input type="tel" name="phone" class="form-control" required />
		</div>
		<div class="form-group">
			<lable>Email</lable>
			<input type="text" name="email" class="form-control" />
		</div>
		<div class="form-group">
			<lable>Passport/NID</lable>
			<input type="text" name="passport_nid" class="form-control" />
		</div>
		<div class="form-group">
			<lable>Address</lable>
			<input type="text" name="address" class="form-control" />
		</div>
		<div class="form-group">
			<lable>Purpose</lable>
			<input type="text" name="purpose" class="form-control" />
		</div>
		<div class="form-group">
			<lable>In Date</lable>
			<input type="date" name="in_date" class="form-control" required />
		</div>
		<div class="form-group">
			<lable>In Time</lable>
			<input type="time" name="in_time" class="form-control" required />
		</div>
		<div class="form-group">
			<lable>Guest Status: </lable>
				<select name="status">
					<option>In</option>
					<!--
					<option>Out</option>
					-->
				</select>
		</div>
		<button type="submit"  name="reg_submit" class="btn btn-primary">SUBMIT</button>
		
	</div>
	</form>
	
</body>
</html>