<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" media="all" />
	<title></title>
</head>
<body>
	
	<!--login-->
	
	<?php
	$connect=mysqli_connect('localhost','root','','phphotel');
	
	if(isset($_POST['login'])){
    
    $uname=$_POST['email'];
    $password=$_POST['phone'];
    
    $sql="select * from login where email='".$uname."'AND phone='".$password."' limit 1";
    
    $result=mysql_query($sql);
    
    if(mysql_num_rows($result)==1){
        echo " You Have Successfully Logged in";
        exit();
    }
    else{
        echo " You Have Entered Incorrect Password";
        exit();
		}
	}
?>
<div class="container">
	<h1>LOGIN</h1>
	
	<form action="user_reg.php" method="post">
		<div class="form-input">
		<input type="text" name="email" placeholder="Enter the Email" class="form-control"/>	
		</div>
		<div class="form-input">
		<input type="password" name="phone" placeholder="Phone Number" class="form-control"/>
		</div>
		<input type="submit" name="login" value="LOGIN" class="btn btn-primary"/>
	</form>
</div>
	

	
	<!--Registration-->
	
	
<?php
$connect=mysqli_connect('localhost','root','','phphotel');

if(isset($_POST['reg_submit'])){
	$name=$_POST['name'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	
	
	$reg_insert=mysqli_query($connect,"INSERT INTO login (name,phone,email) VALUES ('$name','$phone','$email')");
	if($reg_insert){
		$usersuccess='Your registration has been successful';
	}
	else{
		$usersuccess='Data not inserted';
	}
}
?>

	
<div class="container">
	<h1>Registration</h1>
	
	<form action="" method="post">
	
			<?php 
				if(isset($usersuccess)){
					
					echo "<h2 class='bg-success'>$usersuccess</h2>";
									}
			?>
	
		
			
		<div class="form-group">
			<lable>Name</lable>
			<input type="text" name="name" class="form-control" />
		</div>
		<div class="form-group">
			<lable>Phone</lable>
			<input type="tel" name="phone" class="form-control" />
		</div>
		<div class="form-group">
			<lable>Email</lable>
			<input type="text" name="email" class="form-control" />
		</div>
		
		<button type="submit"  name="reg_submit" class="btn btn-primary">REGISTRATION</button>
		
	
	</form>
	</div>
	
	
	
	
	
	
</body>
</html>