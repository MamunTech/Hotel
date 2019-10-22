

<?php
$connect=mysqli_connect('localhost','root','','phphotel') or die("Could not connect");
//$userquery=mysqli_query($connect,"SELECT * FROM user_reg") or die("Could not connect database");

				$serial= 0; 
		        $room=  0; 
				$price = 0; 
				$name = 0; 
				$phone = 0; 
				$email = 0; 
				$passport_nid= 0; 
				$address = 0; 
				$purpose = 0; 
				$in_date = 0;
				$in_time = 0;
				$status = 0;
				$out_date = 0;
				$out_time = 0;
				$payment = 0;

				
if(isset($_POST['serch'])){
	$searchq=$_POST['serch'];
	//print_r ($searchq);
	$query=mysqli_query($connect,"SELECT * FROM user_reg WHERE phone LIKE $searchq") or die("Could not search");
	//print_r ($query);
				
			$value=mysqli_fetch_array($query);
				$serial= $value['serial_no']; 
		        $room=  $value['room']; 
				$price = $value['price']; 
				$name = $value['name']; 
				$phone = $value['phone']; 
				$email = $value['email']; 
				$passport_nid= $value['passport_nid']; 
				$address = $value['address']; 
				$purpose = $value['purpose']; 
				$in_date = $value['in_date'];
				$in_time = $value['in_time'];
				$status = $value['status'];
				$out_date = $value['out_date'];
				$out_time = $value['out_time'];
				$payment = $value['payment'];
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

	
	<!--Serch-->
	
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
		<th>Address</th>
		<th>Purpose</th>
		<th>In Date</th>
		<th>In Time</th>
		<th>Status</th>
		<th>Out Date</th>
		<th>Out Time</th>
		<th>Payment</th>
		</tr>
	
	
	<tr>
		<td><?php echo $serial; ?></td>
		<td><?php echo $room; ?></td>
		<td><?php echo $price; ?></td>
		<td><?php echo $name; ?></td>
		<td><?php echo $phone; ?></td>
		<td><?php echo $email; ?></td>
		<td><?php echo $passport_nid; ?></td>
		<td><?php echo $address; ?></td>
		<td><?php echo $purpose; ?></td>
		<td><?php echo $in_date; ?></td>
		<td><?php echo $in_time; ?></td>
		<td><?php echo $status; ?></td>
		<td><?php echo $out_date; ?></td>
		<td><?php echo $out_time; ?></td>
		<td><?php echo $payment; ?></td>
		
	</tr>
	
</table>
	
	
</div>	


<div class="container">

		<form action="serch.php" method="post">
					
			
			
			<?php
			
			/*$in="In";
			$out="Out";
			
			
			switch($status){
				case '$in':
					echo "<h1>this guest is staying</h1>";
				break;
				
				case 0:
					echo "<h1>Please reload the page again</h1>";	
				break;
				
				case $out:
					echo "<h1>this guest is alrealdy out</h1>";
				break;
				
				
			}
			*/
			
			
			if($status=="In"){
				echo "<h1>this guest is staying</h1>";
							
				echo "	<lable>Phone</lable>
						<input type='tel' name='phone' class='form-control' required />
				
						<lable>Out Date</lable>
						<input type='date' name='out_date' class='form-control' required />

						<lable>Out Time</lable>
						<input type='time' name='out_time' class='form-control'  />
						
						<lable>Guest Status: </lable>
						<select name='status'>
							<option>Out</option>
						</select>
						
						<br />
						
						<button   type='submit' name='submit' class='btn btn-primary'  >leave</button> ";
						
						
					

			}
			elseif($status=="Out"){
				echo "<h1>this guest is alrealdy out</h1>";	
			}
			else{
				echo "<h1>Put number in search bar or reload this page</h1>";	
				
			}
			
			
			if(isset($_POST['submit'])){
				//parsing data from form
				$phone=$_POST['phone'];
				$out_date=$_POST['out_date'];
				$out_time=$_POST['out_time'];
				$status=$_POST['status'];
				echo $out_date;
				echo $status;
				
			// caculate total payable amount
				$query=mysqli_query($connect,"SELECT * FROM user_reg WHERE phone LIKE $phone") or die("Could not search");
					//print_r ($query);
								
					$value=mysqli_fetch_array($query);
					
					$date1=date_create($value['in_date']);
					//echo $out_date;
					$date2= date_create($out_date);
					//echo $date1;
					echo nl2br("\r\n");
					//echo $date2 ;
					echo nl2br("\r\n");
					$interval = date_diff($date1, $date2);
					
					$num=$interval->format('%R%a days');
					echo "<h1>You live here for $num </h1>";
					echo nl2br("\r\n");
					
					if($num==0){
						// if same day leave
						echo $value['price'];
					}
					else{
					echo nl2br("\r\n");
					$price=$value['price'];
					$tprice=$price*$num;
					echo "<h1>Total amount you have to pay $tprice </h1>";
					}
				
				
				
				
				
					//update out date, time and status, payment
					$sql = "UPDATE user_reg SET  out_date='$out_date',out_time='$out_time',status='Out', payment='$tprice' WHERE phone=$phone";
					if(mysqli_query($connect, $sql)){
						echo "Records were updated successfully.";
					}
					else {
							echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
					}
			}
			
			
			?>
			
			
			
		</form>	
	
</div>
	
		
	
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
</body>
</html>




	